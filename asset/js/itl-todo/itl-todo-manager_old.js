
function template(data, container) {
	var matches = data.text.match(/\b(\w)/g);
	var acronym = matches.join(''); 
	return acronym;
}
function closeCat(setid,element,e){
	e.stopPropagation();
	if($(element).closest('.li-cat').hasClass('new-mode')){
		$(element).closest('.li-cat').remove();
	}else{
		$(element).closest('.li-cat').prev().show();
		$(element).closest('.li-cat').remove();
		
	}
	
}
function doneCat(element){
	
	var e = $.Event('keydown');
	e.which = 13; // Character 'A'
	
	$(element).closest('.li-cat').find('.cls-cat-name').trigger(e);
}
function setCat(setid,element){
	//var catserial=$(element).attr('data-serial');
	var todoserial=$(element).closest('.keep-open').attr('data-serial');
	
	var request = $.ajax({
		url: base_url+"todo/upNewCat",
		method: 'POST',
		data: {
			catserial: setid,
			todoserial: todoserial,
		},
		dataType: 'JSON'
	});
	
	request.done(function(response){
		
		console.log($('#todoRow'+todoserial).find('.fa-category-gray'));
		$(element).closest('.keep-open').find('.li-cat').removeClass('active');
		$(element).closest('.li-cat').addClass('active');
		
		$('#todoRow'+todoserial).find('.fa-category-gray').css('color',response.cat_color);
		$(element).closest('.ul-cat').attr('data-catid',setid);
		$('#todoRow'+todoserial).find('.fa-category-gray').attr('data-catid',setid);
		$('*').qtip('hide');
		
	});
}
function delCat(setid,userid,element,e){
	e.stopPropagation();
	//var catserial=$(element).attr('data-serial');
	var todoserial=$(element).closest('.keep-open').attr('data-serial');
	
	if(user_id==userid){
		
		var request = $.ajax({
			url: base_url+"todo/delNewCat",
			method: 'POST',
			data: {
				catserial: setid,
				todoserial: todoserial,
				userid:userid
			},
			dataType: 'JSON'
		});
		
		request.done(function(response){
			console.log(response);
			$('#todoRow'+todoserial).find('.li-cat').removeClass('active');
			$(element).closest('.li-cat').remove();
			//$('body').find('.li-cat[data-serial='+setid+']').remove();
			$('.fa-category-gray[data-catid="'+setid+'"]').css('color','');
			
		});
	}else{
		swal('You cannot delete it');
	}
}

function updateCat(setid,userid,element,e){
	// edit mode
	e.stopPropagation();
	
	//var catserial=$(element).attr('data-serial');
	var todoserial=$(element).closest('.keep-open').attr('data-serial');
	
	if(user_id==userid){
		
		var _this_li=$(element).closest('.li-cat');
		
		var newid=(Date.now());
		
		var editcat='<li id="editcat_'+newid+'" class="li-cat edit-mode">'
		+'<div class="row" style="margin:0px">'
		
		+'<div class="col-lg-2 div-cat-color">'
		+'<input class="cls-cat-color" type="color">'
		+'</div>'
		
		+'<div class="col-lg-6 div-cat-name">'
		+'<input type="text" class="cls-cat-name" value="'+_this_li.find('.cat-text').text()+'">'
		+'</div>'
		
		// +'<div onclick="doneCat(this)" class="col-lg-2 div-cat-done">'
		// +'<span class="fa fa-check"></span>'
		// +'</div>'
		
		+'<div class="col-lg-2 div-cat-close">'
		+'<span onclick="closeCat('+newid+',this,event)" class="fa fa-times"></span>'
		'</div>'
		
		+'</div>'
		+'</li>';
		
		editcat=$(editcat);
		$(_this_li).hide();
		var prevColor=$(_this_li).find('.fa-circle').attr('style');
		$(_this_li).after(editcat);
		
		editcat.find('.cls-cat-color').on('change', function (e) {
			e.stopPropagation();
			$(this).closest('.li-cat').find('.cls-cat-name').focus();
		});
		
		editcat.find('.cls-cat-color').val(prevColor.split(':')[1]);
		
		editcat.find('.cls-cat-name').focus();
		editcat.find('.cls-cat-name').on('keydown', function (e) {
			var _this=this;
			
			//e.preventDefault();
			if (e.keyCode == 13) {
				
				var edit_catname=editcat.find('.cls-cat-name').val();
				var edit_catcolor=editcat.find('.cls-cat-color').val();
				
				var request = $.ajax({
					url: base_url+"todo/upSelfCat",
					method: 'POST',
					data: {
						edit_catname: edit_catname,
						edit_catcolor: edit_catcolor,
						setid:setid
						
					},
					dataType: 'JSON'
				});
				
				request.done(function(v){
					console.log(v);
					$('#editcat_'+newid).remove();
					
					//'<li id="catid_'+v.id+'" class="li-cat" onclick="setCat('+v.id+',this)" data-serial='+v.id+'>'
					var newcat='<div class="row" style="margin:0px">'
					
					+'<div class="col-lg-2 div-cat-color">'
					+'<span class="fa fa-circle active" style="color:'+edit_catcolor+'"></span>'
					+'</div>'
					
					+'<div class="col-lg-6 div-cat-name">'
					+'<span class="cat-text">'+edit_catname+'</span>'
					+'</div>'
					
					+'<div class="col-lg-2 div-cat-update">'
					+'<span onclick="updateCat('+v.id+','+v.user_id+',this,event)" class="fa fa-pencil-square-o"></span>'
					+'</div>'
					
					+'<div class="col-lg-2 div-cat-delete">'
					+'<span onclick="delCat('+v.id+','+v.user_id+',this,event)" class="fa fa-trash"></span>'
					+'</div>'
					
					+'</div>';
					//+'</li>';
					
					newcat=$(newcat);
					$(_this_li).html(newcat).show();
					$('.fa-category-gray[data-catid="'+setid+'"]').css('color',edit_catcolor);
					
				});
				
			}
		});
		
		
	}else{
		swal('You cannot edit it');
	}
}
$(document).on('click','.dd-parent',function(e){
	$('.icon-check').removeClass('activeit');
	$(this).find('.icon-check').addClass('activeit');
	
	$('.todo-text').removeClass('highlight-todo');
	$(this).find('.todo-text').addClass('highlight-todo');
});

// 	$(document).on("click", ".dropdown-menu", function (e) {
	//     $(this).parent().is(".open") && e.stopPropagation();
	// });

	$(document).on("click", ".add-category", function (e) {

		e.stopPropagation();
		var newid=(Date.now());
		var _cthis=this;

		var newcat='<li id="newcat_'+newid+'" class="li-cat new-mode">'
		+'<div class="row" style="margin:0px">'

		+'<div class="col-lg-2 div-cat-color">'
		+'<input class="cls-cat-color" type="color">'
		+'</div>'

		+'<div class="col-lg-6 div-cat-name">'
		+'<input type="text" class="cls-cat-name">'
		+'</div>'

		// +'<div onclick="doneCat(this)" class="col-lg-2 div-cat-done">'
		// +'<span class="fa fa-check"></span>'
		// +'</div>'

		+'<div class="col-lg-2 div-cat-close">'
		+'<span onclick="closeCat('+newid+',this,event)" class="fa fa-times"></span>'
		+'</div>'

		+'</div>'
		+'</li>';

		newcat=$(newcat);
		$(_cthis).before(newcat);

		newcat.find('.cls-cat-name').focus();

		newcat.find('.cls-cat-color').on('change', function (e) {
			e.stopPropagation();
			$(this).closest('.li-cat').find('.cls-cat-name').focus();
		});

		newcat.find('.cls-cat-name').on('keydown', function (e) {
			var _this=this;

			if (e.keyCode == 13) {

				var catname=newcat.find('.cls-cat-name').val();
				var catcolor=newcat.find('.cls-cat-color').val();

				var request = $.ajax({
					url: base_url+"todo/addNewCat",
					method: 'POST',
					data: {
						cat_name: catname,
						cat_color: catcolor,

					},
					dataType: 'JSON'
				});

				request.done(function(v){
					$('#newcat_'+newid).remove();

					var newcat='<li id="catid_'+v.id+'" class="li-cat" onclick="setCat('+v.id+',this)" data-serial='+v.id+'>'
					+'<div class="row" style="margin:0px">'

					+'<div class="col-lg-2 div-cat-color">'
					+'<span class="fa fa-circle active" style="color:'+catcolor+'"></span>'
					+'</div>'

					+'<div class="col-lg-6 div-cat-name">'
					+'<span class="cat-text">'+catname+'</span>'
					+'</div>'


					+'<div class="col-lg-2 div-cat-update">'
					+'<span onclick="updateCat('+v.id+','+v.user_id+',this,event)" class="fa fa-pencil-square-o"></span>'
					+'</div>'

					+'<div class="col-lg-2 div-cat-delete">'
					+'<span onclick="delCat('+v.id+','+v.user_id+',this,event)" class="fa fa-trash"></span>'
					+'</div>'

					+'</div>'
					+'</li>';

					newcat=$(newcat);
					$('.add-category').before(newcat);

				});

			}
		});
	});

	function qtipAssignee(element,data,crm_users){

		
		var todo_serial=data.projecttaskid;
		var qt='<div class="assign-title">Members:</div><select  class="form-control size-family-weight select_user_new" style="width:100%" name="select_user_new[]" multiple="multiple" >';

		$.each(crm_users, function (key, value) {

			qt+='<option value="' + value.ID + '">' + value.display_name + '</option>';

		});

		qt+='</select>';

		$(element).qtip({

			show: {
				event: 'click'
			},
			hide: 'unfocus click',

			content: {
				text: qt

			},

			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window)

			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font',
				width: '300'
			},


			events: {
				show: function(event, api) {

					var _this=this;

					var requestass = $.ajax({
						url: base_url+"todo/getTodoAssignee",
						method: 'POST',
						data: {

							"todo_serial":todo_serial

						},
						dataType: 'JSON'
					});

					requestass.done(function(response){
						console.log('getTodoAssignee');console.log(response);

						var tag_ids=[];
						$.each(response,function(i,el){
							tag_ids.push(el.userteamid);
						});

						$(_this).find('.select_user_new').val(tag_ids).trigger('change.select2');
					});
				},
				render: function(event, api) {
					$('body').on('keydown.qtipAssignee', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});

					var _this=this;

					$(_this).find('.select_user_new').select2({
						placeholder: "Type user name here to add...",
						templateSelection: template
					})
					.on("change", function(e) {

						if($('.todoRow'+todo_serial).attr('data-access')=="write"){

							var request = $.ajax({
								url: base_url+"todo/updateTodoAssign",
								method: 'POST',
								data: {
									"select_user_new":$(e.currentTarget).val(),
									"todo_serial":todo_serial,
									"user_status":2

								},
								//dataType: 'JSON'
							});


							request.done(function(response){

								var newass=($(_this).find('.select_user_new').val());
								if(newass !=null){
									$('#todoRow'+todo_serial).find('.dt-assignto').attr('data-assid',newass.join());
								}else{
									$('#todoRow'+todo_serial).find('.dt-assignto').attr('data-assid','');
								}
							});


							flag_update_filters=true;

						}else{
							swal('Access Denied !!! ')
						}
					});



				},

			}
		});

	}

	function qtipStatus(element,data){
		var todo_serial=data.projecttaskid;
		var qhtml=	'<li class="workspace4" style="display:inline">'
		+'<ul class="keep-open">'
		+		'	<li class="dropdown-menu-header">Status:</li>';

		$.each(allprojectstatus,function(i,v){
			qhtml+='<li data-status="'+v.projectstatus+'" onclick="change_projectstatus(\'' + v.projectstatus + '\','+todo_serial+',this)" class="li-status '+(data.projectstatus==v.projectstatus ? 'active' : '')+'"><div> '+v.projectstatus+'</div></li>';

		});

		qhtml+=		'</ul></li>';

		$(element).qtip({

			show: {
				event: 'click'
			},
			hide: 'unfocus click',

			content: {text: qhtml },

			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window),
				adjust: {
					mouse: true,
					scroll: true
				}

			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font',
				width: '300'
			},

			events: {
				show: function(event, api) {
					console.log($(this));console.log(event);console.log(api);

					var serial=($(api.elements.target).attr('data-serial'));
					if($('#todoRow'+serial).find('.chk-complete').is(':checked')){
						$(api.elements.content).find('.li-status').removeClass('active');
						$(api.elements.content).find('.li-status[data-status="completed"]').addClass('active');
					}else{
						var oldstatus=$('.link_status_text'+serial).attr('data-status');
						$(api.elements.content).find('.li-status').removeClass('active');
						$(api.elements.content).find('.li-status[data-status="'+oldstatus+'"]').addClass('active');
					}

				},
				render:function(event,api){
					$('body').on('keydown.qtipStatus', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				}


			}
		});
	}
	function qtipCategory(element,data){
		var todo_serial=data.projecttaskid;
		var qtc='<li class="workspace4" style="display:inline">'

		+		'<ul data-serial="'+data.projecttaskid+'" data-catid="'+data.category_id+'" class="keep-open ul-cat">'
		+			'<li class="dropdown-menu-header">Category:</li>'
		+			'<li class="dropdown-menu-footer add-category"><i class="fa fa-plus-circle"></i> Add Category</li>'
		+		'</ul>'

		+'</li>';

		$(element).qtip({

			show: {
				event: 'click'
			},
			hide: 'unfocus click',

			content: {text: qtc },

			position: {
				at: 'bottom right',  
				my: 'top right', 
				viewport: $(window),
				adjust: {
					mouse: true,
					scroll: true
				}

			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font',
				width: '300'
			},


			events: {
				show: function(event, api) {

					var requestass = $.ajax({
						url: base_url+"todo/getAllCategory",
						method: 'POST',
						dataType: 'JSON'
					});

					requestass.done(function(response){
						$(event.currentTarget).find('.li-cat').remove();

						$.each(response.allcategory, function(k,v){

							var loadcat='<li id="catid_'+v.id+'" class="li-cat" onclick="setCat('+v.id+',this)" data-serial='+v.id+'>'
							+'<div class="row" style="margin:0px">'

							+'<div class="col-lg-2 div-cat-color">'
							+'<span class="fa fa-circle active" style="color:'+v.cat_color+'"></span>'
							+'</div>'

							+'<div class="col-lg-6 div-cat-name">'
							+'<span class="cat-text">'+v.cat_name+'</span>'
							+'</div>'

							+'<div class="col-lg-2 div-cat-update">'
							+'<span onclick="updateCat('+v.id+','+v.user_id+',this,event)" class="fa fa-pencil-square-o"></span>'
							+'</div>'

							+'<div class="col-lg-2 div-cat-delete">'
							+'<span onclick="delCat('+v.id+','+v.user_id+',this,event)" class="fa fa-trash"></span>'
							+'</div>'

							+'</div>'
							+'</li>';
							loadcat=$(loadcat);

							$(event.currentTarget).find('.add-category').before(loadcat);

							$(event.currentTarget).find('[class="li-cat"][data-serial="'+$(event.currentTarget).find('.ul-cat').attr('data-catid')+'"]').addClass('active');

						});
					});

				},
				render:function(event,api){
					$('body').on('keydown.qtipStatus', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				}

			}
		});
	}

	function qtipPriority(element,data){
		var todo_serial=data.projecttaskid;
		var qhtml=	'<li class="workspace4" style="display:inline">'
		+'<ul class="keep-open">'
		+		'	<li class="dropdown-menu-header">Priority:</li>'
		+			'<li onclick="changePriority(\'Low\','+todo_serial+',this)" class="li-prio '+(data.projecttaskpriority=="Low" ? 'active' : '')+'"><div> Low</div></li>'
		+			'<li onclick="changePriority(\'Medium\','+todo_serial+',this)" class="li-prio '+(data.projecttaskpriority=="Medium" ? 'active' : '')+'"><div> Medium</div></li>'
		+			'<li onclick="changePriority(\'High\','+todo_serial+',this)" class="li-prio '+(data.projecttaskpriority=="High" ? 'active' : '')+'"><div> High</div></li>'

		+		'</ul>'
		+ '</li>';


		$(element).qtip({
			show: {
				
				event: 'click'
			},
			hide: 'click unfocus',
			content: {
				text: qhtml

			},
			events: {
				
				render: function(event, api) {
					$('body').on('keydown.qtipPriority', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				}
			},

			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window)

			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font',
				width: '200'
			},


		});
	}


	function todoAttachDesign(){
		var tabDetail ='  <div class="row">';
		tabDetail +='    <div class="col-lg-12 projectfilefDiv" style="">';
		tabDetail +='         <a style="margin-right: 2px;background-color: #686868;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a>  Add Files';
		tabDetail +='			<div class="filterDiv">';
		tabDetail +='     	  		<span class="dropdown-toggle pull-right filter" data-toggle="dropdown">Filter <i class="fa fa-caret-down"></i></span>';
		tabDetail +='				<ul class="dropdown-menu pull-right filterUpdate">';
		tabDetail +='					<div class="arrow-top-right"></div>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> Select All</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> Doc</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> PDF</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> XLS</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> TXT</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> JPG</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"><i class="fa fa-circle-o"></i> PNG</a></li>';
		tabDetail +='		  		</ul>';	
		tabDetail +='			</div>';
		tabDetail +='			<div class="ViewDiv">';
		tabDetail +='     	  		<span class="dropdown-toggle pull-right view" data-toggle="dropdown">View <i class="fa fa-caret-down"></i></span>';
		tabDetail +='				<ul class="dropdown-menu pull-right viewUpdate">';
		tabDetail +='					<div class="arrow-top-right"></div>';
		tabDetail +='					<li><a href="javascript:void(0);"> Recently Modified</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"> Starred</a></li>';
		tabDetail +='					<li><a href="javascript:void(0);"> File type</a></li>';
		tabDetail +='		  		</ul>';	
		tabDetail +='			</div>';
		tabDetail +='     </div>';
		tabDetail +='     <div style="    border-top: 1px solid #e0dddd;margin-top: 7%;width: 96%; margin-left: 2%;">&nbsp;</div>';
		tabDetail +='     <div class="row attachListDiv">';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='		<div class="col-lg-12" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;">';
		tabDetail +='			<div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <span style="color: #c5c5c5;font-size: 15px;">Example File</span></div>';
		tabDetail +='			<div class="col-lg-3 attachMid">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Star.png">';
		tabDetail +='				<img class="icon-todo-menu" src="'+base_url+'icons/Profile.png">';
		tabDetail +='				<img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
		tabDetail += '				<ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
		tabDetail += '					<div class="arrow-top-right"></div>';
		tabDetail += '					<li> <i class="fa fa-info"></i> Details</li>';
		tabDetail += '					<li> <i class="fa fa-pencil"></i> Rename</li>';
		tabDetail += '					<li> <i class="fa fa-download"></i> Downalod</li>';
		tabDetail += '					<li> <i class="fa fa-trash-o"></i> Delete</li>';
		tabDetail += '				</ul>';
		tabDetail +='			</div>';
		tabDetail +='			<div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">10KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">1 Day Ago</span></div>';
		tabDetail +='		</div>';
		tabDetail +='	  </div>';
		tabDetail +=' </div>';
		return tabDetail;
	}

	function qtipAttach(element,data){
		var projectID=data.projecttaskid;
		var attr='attach';

		var floatingDiv =  ' <div class=""  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="">';
		floatingDiv += '    <div class="panel panel-default" style="border: none;">';
		floatingDiv += '        <div class="panel-heading" style="height:60px;">';
		floatingDiv += '            <span class="col-lg-11 proDivname">';
		floatingDiv += '                <span class="todo-text-prop">'+data.projecttaskname+'</span>';
		floatingDiv += '                <span class="todo-createdby">Created By: '+data.creator_name+'</span>';
		floatingDiv += '            </span>';
		floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
		floatingDiv += '        </div>';
		floatingDiv += '        <div class="panel-body">'+todoAttachDesign()+'</div>';
		floatingDiv += '     </div>';
		floatingDiv += ' </div></div>';

		$(element).qtip({
			show: {
				event: 'click'
			},
			hide: 'click unfocus',
			content: {
				text: floatingDiv

			},
			events: {

				render: function(event, api) {
					$('body').on('keydown.qtipAttach', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				}
			},
			position: {
				
				my: 'right center', 
				at: 'left center',  
				viewport: $(window),
				adjust: {
					method: 'none shift'
				}

			},
			style: {
				classes: 'qtip-light',
				width: '800',
				tip: {
					corner: true,
					width: 40,
					height: 40,
					//offset: -190
				}
			},


		});
	}

	function todoComments(projectID,attr,data){
		var floatingDiv =  ' <div class=""  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="">';
		floatingDiv += '    <div class="panel panel-default" style="border: none;">';
		floatingDiv += '        <div class="panel-heading" style="height:60px;">';
		floatingDiv += '            <span class="col-lg-11 proDivname">';
		floatingDiv += '                <span class="todo-text-prop">'+data.projecttaskname+'</span>';
		floatingDiv += '                <span class="todo-createdby">Created By: '+data.creator_name+'</span>';
		floatingDiv += '            </span>';
		floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
		floatingDiv += '        </div>';
		floatingDiv += '        <div class="panel-body">'+todoCommentsDesign(data)+'</div>';
		floatingDiv += '     </div>';
		floatingDiv += ' </div></div>';

		$("#projectBody").append(floatingDiv);



	}

	function todoCommentsDesign(data,projectsid){
		var tabDetail ='  <div class="row">';

		tabDetail +='    		<div class="col-lg-12 projectfilefDiv" style="padding: 3% 4% 1% 4%;">';
		tabDetail +='    			<span class="pull-left col-lg-11 comtag" id="tagBtnDiv'+projectsid+'" style="margin-top: 0px;"></span>';
		tabDetail += '				<div class="col-lg-1 col-sm-1 col-md-1">'
		+'<li class="ddm-com-set" style="display:inline">'

		+	'<a class="dropdown-toggle dt-com-set" data-toggle="dropdown"><img class="" src="'+base_url+'icons/Settings.png"></a>'

		+	'<ul class="dropdown-menu dropdown-com-set">'

		+		'<div class="arrow-position-view"></div>'

		+		'<li><a>Archive</a></li>'
		+		'<li><a>Clear</a></li>'
		+		'<li><a>Block</a></li>'
		+		'<li><a>Starred</a></li>'
		+		'<li><a>Mute</a></li>'
		+		'<li><a>Mark as unread</a></li>'
		+		'<li><a>Select</a></li>'
		+	'</ul>'
		+'</li>'

		+'</div>';
		

		tabDetail +='				</div>';


		tabDetail +='    <div style="    border-top: 1px solid #e0dddd;margin-top: 10.5%;width: 96%; margin-left: 2%;">&nbsp;</div>';
		tabDetail +='    <div class="row attachListDiv feed" id="attachListDivCommnet">';

		
		$.each(data.allComm,function(k,v){
			tabDetail +='		<div class="panel panel-default proComm">';
			tabDetail +='			<div class="panel-body status status-left">';
			tabDetail +='				<div class="who clearfix">';
			tabDetail +='					<img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="chatimgleft">';
			tabDetail +='					<div class="name dropdown"><b>'+data.allComm[k].full_name+'</b>';

			tabDetail +='					<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">';
			tabDetail +='					<i class="fa fa-chevron-down pull-right"></i>';
			tabDetail +='					</a>';

			tabDetail +=					'<ul class="dropdown-menu pull-right">';
			tabDetail +=					'<div class="arrow-top-right"></div>';
			tabDetail +=					'<li><a onclick="openmessageinfo()">Msg Info</a></li>';
			tabDetail +=					'<li><a onclick="singlemsgaction('+projectsid+', \'delete\')">Clear</a></li>';
			tabDetail +=					'<li><a onclick="singlemsgaction('+projectsid+', \'forward\')">Forward</a></li>';
			tabDetail +=					'</ul>';
			tabDetail +=					'<i class="fa fa-star-o pull-right" id="starico'+projectsid+'" onclick="changestarlinktext('+projectsid+')"></i>';
			tabDetail +=											'<input type="checkbox" class="pull-right" id="msgid'+projectsid+'" name="msgid" value="'+projectsid+'"></div>';

			tabDetail +='					<span class="name" style="font-size: 9px;">'+moment(data.allComm[k].CreatedDate).format('LLLL')+'</span>';
			tabDetail +='					<span  class="from">'+data.allComm[k].Description+'</span>';
			tabDetail +='				</div>';
			tabDetail +='			</div>';
			tabDetail +='		</div>';
		});

		tabDetail +='	 <div class="projectInput">';
		tabDetail +='	 	<div class="col-lg-12" id="input_container">';
		tabDetail +='	 		<input type="text" id="commentinput" class="form-control commentinput"/>';
		tabDetail +='	 		<img src="'+base_url+'icons/emo.png" id="input_img1">';
		tabDetail +='	 		<img src="'+base_url+'icons/attach.png" id="input_img2">';
		tabDetail +='	 	</div>';
		tabDetail +='	 </div>';
		tabDetail +=' </div>';

		$("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);


		return tabDetail;
	}

	function qtipComment(element,data){

		if($(element).qtip('api')==undefined){
			var projectID=data.projecttaskid;
			var attr='comments';

			$(element).qtip({
				show: {
					ready: true
				},
				hide: 'click unfocus',
				content: {
					text: 'Loading...'

				},
				events: {
					hide: function (event, api) {
						$(this).qtip('destroy');
						$( 'body').unbind( "keydown.qtipComment" );

					},
					render: function(event, api) {
						$('body').on('keydown.qtipComment', function(event) {
							if(event.keyCode === 27) {
								api.hide(event);
							}
						});
					},
					show: function(event, api) {

						$.ajax({
							url: base_url+'todo/getCommentForTodo', // URL to the local file
							type: 'POST', // POST or GET
							data: {projectID:projectID}, // Data to pass along with your request
							success: function(resp, status) {
								console.log('getCommentForTodo');console.log(resp);
								var floatingDiv =  ' <div class="" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="">';
								floatingDiv += '    <div class="panel panel-default" style="border: none;">';
								floatingDiv += '        <div class="panel-heading" style="height:60px;">';
								floatingDiv += '            <span class="col-lg-11 proDivname">';
								floatingDiv += '                <span class="todo-text-prop">'+data.projecttaskname+'</span>';
								floatingDiv += '                <span class="todo-createdby">Created By: '+data.creator_name+'</span>';
								floatingDiv += '            </span>';
								floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
								floatingDiv += '        </div>';
								floatingDiv += '        <div class="panel-body">'+todoCommentsDesign(resp,projectID)+'</div>';
								floatingDiv += '     </div>';
								floatingDiv += ' </div></div>';
								floatingDiv += ' <input type="hidden" id="newTaskInput" data-projectid="'+projectID+'" class="form-control border-rad">';
								api.set('content.text', floatingDiv);
								setProjecttag(resp,projectID);
							},
							error: function (jqXHR, textStatus, errorThrown) {
								// Some code to debbug e.g.:               
								console.log(jqXHR);
								console.log(textStatus);
								console.log(errorThrown);
							}
						});

					},

				},
				position: {

					my: 'right center', 
					at: 'left center',  
					viewport: $(window),
					adjust: {
						method: 'none shift'
					}


				},
				style: {
					classes: 'qtip-light',
					width: '800',
					tip: {
						corner: true,
						width: 40,
						height: 40,
						//offset: -220
					}
				},


			});
		}else{
			$(element).qtip('hide');
		}

	}

	function qtipProperties(element,data,viewtype){

		
			var projectID=data.projecttaskid;
			var attr='properties';
			if(viewtype=='task'){
					posmy= 'right center';
					posat= 'left center';
			}else{
				posat= 'right center';
					posmy= 'left center';
			}
				var floatingDiv =  ' <div data-serial="'+projectID+'" class="backDiv" style="position:relative;background:none" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div style="" id="Pro'+projectID+'">';
						floatingDiv += '    <div class="panel panel-default" style="border: none;">';
						floatingDiv += '        <div class="panel-heading" style="height:60px;">';
						floatingDiv += '            <span class="col-lg-11 proDivname">';
						floatingDiv += '                <span id="todo_name_text'+projectID+'" class="todo-text-prop">'+data.projecttaskname+'</span>';
						floatingDiv += '                <span class="todo-createdby">Created By: '+data.creator_name+'</span>';
						floatingDiv += '            </span>';
						floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
						floatingDiv += '        </div>';
						floatingDiv += '        <div class="panel-body">'+tabsDesignTodo(projectID)+'</div>';
						floatingDiv += '     </div>';
						floatingDiv += ' </div></div>';

					

			$(element).qtip({
				show: {
				event: 'click'
			},
				
				hide: 'click unfocus',
				content: {
					text: floatingDiv

				},
				position: {

					my: posmy, 
					at: posat,  
					viewport: $(window),
					adjust: {
						method: 'none shift'
					}

				},
				style: {
					classes: 'qtip-light',
					width: '700',
					//height: '500',
					tip: {
						corner: true,
						width: 40,
						height: 40,
						//offset: -220
					}
				},
				

			});


}

	

function dMembers(){
	
	if($('#addMember option').length==0){
		

		$.ajax({
			url: ''+base_url+'todo/getUsersForTodo', // URL to the local file
			type: 'GET', // POST or GET
			data: {}, // Data to pass along with your request
			success: function(data, status) {
				// Process the data
				
				// Set the content manually (required!)
				console.log(data);
				
				//$("#addMember option:selected").removeAttr("selected");
				$("#addMember").html("");
				
				$.each(data.users, function (key, value) {
					
					$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
				});

				$("#addMember").select2('open');
				
			}
		});
	}else{
		$("#addMember").select2('open');
	}
	
}

function dSupervisor(){
	
	if($('#addAdmin option').length==0){
		
		$.ajax({
			url: ''+base_url+'todo/getUsersForTodo', // URL to the local file
			type: 'GET', // POST or GET
			data: {}, // Data to pass along with your request
			success: function(data, status) {
				// Process the data
				
				// Set the content manually (required!)
				console.log(data);
				
				//$("#addAdmin option:selected").removeAttr("selected");
				$("#addAdmin").html("");
				
				$.each(data.users, function (key, value) {
					
					$("#addAdmin").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
				});

				$("#addAdmin").select2('open');
				
				// $("#addAdmin").trigger("change.select2", [true]);
				// $("#tagAddAdmin .select2-search__field").trigger('click');
				
			}
		});
	}else{
		//$("#tagAddAdmin .select2-search__field").trigger('click');
		$("#addAdmin").select2('open');
	}
	
}


//var api = $('#qtip-apiTest').qtip('api');

function addAdmin(userid,username){
	var matches = username.match(/\b(\w)/g);
	var acronym = matches.join(''); 
	console.log($('#userChk'+userid).is(':checked'));
	if($('#userChk'+userid).is(':checked')){
		$("#tagAddAdmin").append('<a id="philBtn'+userid+'" title="'+username+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
		$("#dSupervisor").qtip('reposition');
	}else{
		$("#philBtn"+userid).remove();
		$("#dSupervisor").qtip('reposition');
	}
	
}

function tabsDesignTodo(projectid){
	
	var tabsDesign =  ' <ul class="nav nav-tabs">';
	tabsDesign += '     <li class="active"><a data-toggle="tab" href="#home">Properties</a></li>';
	tabsDesign += '     <li><a data-toggle="tab" href="#menu1">Quotations</a></li>';
	tabsDesign += '     <li><a data-toggle="tab" href="#menu2">Invoices</a></li>';
	tabsDesign += ' </ul>';
	tabsDesign += ' <div class="tab-content" style="padding: 10px;">';
	tabsDesign += '     <div id="home" class="tab-pane fade in active">';
	tabsDesign +=           propertiesTodoOne(projectid);
	tabsDesign += '     </div>';
	tabsDesign += '     <div id="menu1" class="tab-pane fade">';
	tabsDesign +=           propertiesTodoTwo();
	tabsDesign += '     </div>';
	tabsDesign += '     <div id="menu2" class="tab-pane fade">';
	tabsDesign +=           propertiesTodoTwo();;
	tabsDesign += '     </div>';
	tabsDesign += ' </div>';
	
	return tabsDesign;
}

function propertiesTodoOne(projectid){
	console.log('propertiesTodoOne');
	console.log(projectstatus);
	console.log(selectArray);
	console.log(client);
	
	var tabDetail ='  <div class="row">';
	tabDetail +='    <div class="col-lg-12">';
	tabDetail +='         <a href="" style="right: 43px;position: absolute;"><img src="'+base_url+'icons/proCopy.png"></a>';
	tabDetail +='         <a onclick="fun_delTodo('+projectid+')" style="right: 6px;position: absolute;"><img src="'+base_url+'icons/proDlt.png"></a>';
	tabDetail +='     </div>';
	tabDetail +='     <form action="#" method="POST" name="projectdrawing" id="projectdrawing" class="projectdrawing" style="margin-top: -131px;padding-top: 1px;" >';
	tabDetail +='           <div class="col-lg-12" style="margin-top: 8%;padding: 0% 5%;">';
	tabDetail +='               <div class="form-group">';
	tabDetail +='                   <textarea name="projectDescription" id="projectDescription" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Description\'" class="col-lg-12 proTaskarea" rows="3" placeholder="Enter ..."></textarea>';
	tabDetail +='                   <input type="text" name="projectStartdate" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Startdate\'" class="col-lg-4 proInputText" onclick="togglecalendar_start('+projectid+')" placeholder="Startdate" id="projectstartDate'+projectid+'" value="">';
	tabDetail +='                   <input type="number" name="projectDuration" id="projectDuration" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Duration\'" class="col-lg-4 proInputText" style="width: 32%;" placeholder="Duration">';
	tabDetail +='                   <input type="text" name="projectEnddate" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enddate\'" class="col-lg-4 proInputText"  style="width: 32%;margin-right: 0%;margin-left: 6px;" placeholder="Enddate" onclick="togglecalendar_end('+projectid+')" id="projectendtDate' + projectid + '"  value="">';
	tabDetail +='                   <input type="hidden" name="parentid" value="'+projectid+'">';
	tabDetail +='               </div>';
	tabDetail +='           </div>';
	tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 27%;width: 90%; margin-left: 5%;">&nbsp;</div>';
	tabDetail +='           <div class="col-lg-12" style="    padding: 0px 22px;margin-bottom: 8px;">';
	tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span>Add To-Do Admin...</span>';
	tabDetail +='               </div>';
	tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
	tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddAdmin" id="tagAddAdmin"><select name="addAdmin" multiple="multiple" id="addAdmin" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dSupervisor" onclick="dSupervisor()" style="margin-right: 2px;margin-left: 3px;margin-top:5px" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="Tagadmin" onclick="Tagadmin()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
	tabDetail +='               </div>';
	tabDetail +='           </div>';
	tabDetail +='           <div class="col-lg-12" style="padding: 0px 22px;margin-bottom: 8px;">';
	tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span>Add To-Do Members...</span>';
	tabDetail +='               </div>';
	tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
	tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddMember" id="tagAddMember"><select name="addMember" multiple="multiple" id="addMember" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dMembers" onclick="dMembers()" style="margin-right: 2px;margin-left: 3px;margin-top:5px" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="TagMemberBtn" onclick="TagMemberBtn()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
	tabDetail +='               </div>';
	tabDetail +='           </div>';
	tabDetail +='           <div style="border-top: 1px solid #e0dddd;margin-top: 17%;width: 90%; margin-left: 5%;">&nbsp;</div>';
	tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
	tabDetail +='               <div class="col-lg-4">';
	tabDetail +='                   <label>Project Group</label>';
	tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectGroup" name="projectGroup">';
	$.each(projectArray, function (key, value) {
		tabDetail +='<option value="'+value.ID+'">'+value.type+'</option>';
	});
	tabDetail +='                   </select>';
	tabDetail +='               </div><div class="col-lg-4">';
	tabDetail +='                   <label>Client</label>';
	tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectCLient" name="projectCLient">';
	$.each(client, function (key, value) {
		tabDetail +='<option value="'+value.contactid+'">'+value.firstname+' '+value.lastname+'</option>';
	});
	tabDetail +='                   </select>';
	tabDetail +='               </div><div class="col-lg-4">';
	tabDetail +='                   <label>Status</label>';
	tabDetail +='                   <select name="projectStatus" id="projectStatus" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText">';
	$.each(projectstatus, function (key, value) {
		tabDetail +='<option value="'+value.projectstatus+'">'+value.projectstatus+'</option>';
	});
	tabDetail +='                   </select>';
	tabDetail +='               </div>';
	tabDetail +='           </div>';
	tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 10%;width: 90%; margin-left: 5%;">&nbsp;</div>';
	tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
	tabDetail +='               <a class="btn btn-default pull-right" href="javascript:void(0);" id="saveDrawing">Update</a>';
	tabDetail +='               <a onclick="CloseFlotDiv()" class="btn btn-default pull-right" href="javascript:void(0);" style="margin-right: 2%;">Cancel</a>';
	tabDetail +='           </div>';
	tabDetail +='     </form>';
	tabDetail +=' </div>';
	
	return tabDetail;
}

function propertiesTodoTwo(){
	
	var tabDetail ='  <div class="row">';
	tabDetail +='    <div class="col-lg-12">';
	tabDetail +='         <a href=""><img src="'+base_url+'icons/proDlt.png"></a>';
	tabDetail +='         <a href=""><img src="'+base_url+'icons/proCopy.png"></a>';
	tabDetail +='     </div>';
	tabDetail +='     <div class="col-lg-12"></div>';
	tabDetail +='     <div class="col-lg-12"></div>';
	tabDetail +='     <div class="col-lg-12"></div>';
	tabDetail +='     <div class="col-lg-12"></div>';
	tabDetail +=' </div>';
	return tabDetail;
}

function tab1dataload(projectID){
	$.ajax({
		url : base_url+'projects/getNewProjectdetails',
		type : 'POST',
		data : {projectID:projectID},
		success : function(data) {
			console.log(data);
			
			$("#projectDescription").val(data.detail[0].Description);
			$("#projectStartdate"+projectID).val(data.detail[0].Startdate);
			$("#projectDuration").val(data.detail[0].Duration);
			$("#projectendtDate"+projectID).val(data.detail[0].Enddate);
			
			$('#projectGroup option[value="' + data.detail[0].HasGroup + '"]').prop("selected", "selected");
			$('#projectCLient option[value="' + data.detail[0].HasClient + '"]').prop("selected", "selected");
			$('#projectStatus option[value="' + data.detail[0].Status + '"]').prop("selected", "selected");
		},
		error: function (jqXHR, textStatus, errorThrown) {
			
			console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
		}
	});
}

function qtipAssignHover(element,data){
	var todo_serial=data.projecttaskid;
	

	$(element).qtip({
		
		content: {
			text: '<div class="assign-title">Members:</div><ul></ul>'
			
		},
		
		position: {
			at: 'bottom center',  
			my: 'top center', 
			viewport: $(window)
			
		},
		style: {
			classes: 'qtip-light qtip-rounded qtip-font',
			width: '300'
		},
		
		
		events: {
			show: function(event, api) {
				
				var _this=this;
				
				var requestass = $.ajax({
					url: base_url+"todo/getTodoAssignee",
					method: 'POST',
					data: {
						"todo_serial":todo_serial
					},
					dataType: 'JSON'
				});
				
				requestass.done(function(response){
					
					console.log(response);
					$(_this).find('ul').empty();
					
					$.each(response,function(i,el){
						$(_this).find('ul').append('<li>'+el.display_name+'</li>');
					});
					
					
				});
			},
			
			
		}
	});
	
}

function qtipPriorityHover(element,data){
	var todo_serial=data.projecttaskid;
	$(element).qtip({
		hide: 'click mouseout',
		content: {
			text: '<p><b>Priority: </b><span id="hover_priority'+todo_serial+'">'+data.projecttaskpriority +'</span></p>'
			
		},
		
		position: {
			at: 'bottom center',  
			my: 'top center', 
			viewport: $(window)
			
		},
		style: {
			classes: 'qtip-light qtip-rounded qtip-font',
			width: '200',
			
		},
		
		
	});
}

function qtipDescriptionHover(element,data){
	var todo_serial=data.projecttaskid;
	
	var qtc='<p><b>'+data.projecttaskname +'</b></p>';
	
	if(data.description){
		qtc+='<p class="todo-desc-text"><i>'+data.description +'</i></p>';
	}
	
	$(element).qtip({
		
		content: {
			text: qtc
			
		},
		
		position: {
			at: 'bottom left',  
			my: 'top left', 
			viewport: $(window)
			
		},
		style: {
			classes: 'qtip-light qtip-rounded todo-desc',
			width: '300'
		},
		
	});
}

function setProjecttag(data,tagDivID){
	console.log(data.tag);
	console.log(tagDivID);
	var totalMember = data.tag.length;
	var remainingNum = 0;
	
	if(totalMember > 3){
		
		remainingNum = totalMember-3;
		
		for(var i = 0;i < 3;i++){
			
			var matches = data.tag[i].display_name.match(/\b(\w)/g);
			var acronym = matches.join(''); 
			$("#tagBtnDiv").append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
			$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
		}
		
		$("#tagBtnDiv").append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
		$("#tagBtnDiv"+tagDivID).append('<a style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">+'+remainingNum+'</a>');
	}else{
		
		for(var i = 0;i < totalMember;i++){
			
			var matches = data.tag[i].display_name.match(/\b(\w)/g);
			var acronym = matches.join(''); 
			$("#tagBtnDiv").append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
			$("#tagBtnDiv"+tagDivID).append('<a title="'+data.tag[i].display_name+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
		}
	}
	
}

$(document).on('click','.todo-text-prop',function(e){
	var serial=$(e.currentTarget).closest('.backDiv').attr('data-serial');
	
	if($('.todoRow'+serial).attr('data-access')=="write"){

		$(e.currentTarget).attr('contenteditable','true').addClass('single-line');
		$(e.currentTarget).focus();
		$(e.currentTarget).css('text-overflow','initial');
	}
});

$(document).on('blur','.todo-text-prop',function(e){
	var serial=$(e.currentTarget).closest('.backDiv').attr('data-serial');

	if($(e.currentTarget).text() !=""){
		var request = $.ajax({
			url: base_url+"todo/updateTodoName",
			method: 'POST',
			data: {
				"todoname": $(e.currentTarget).text(),
				"todoserial": serial,
			},
			dataType: 'JSON'
		});

		request.done(function(response){

			console.log(response);
			$(e.currentTarget).css('text-overflow','ellipsis');
			$('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');


		});
	}
});

$(document).on('change keyup mousewheel','#projectDuration',function(e){

	var serial=$(e.currentTarget).closest('.backDiv').attr('data-serial');
	var sel_date=moment($('#projectstartDate'+serial).val()).add($(e.currentTarget).val(), 'days').format('MMM-DD-YYYY HH:mm:ss');
	$('#projectendtDate'+serial).val(sel_date);

	flatpick_end.setDate(sel_date);

});

$(document).on('click','#projectDuration',function(e){

	$(e.currentTarget).select();
	

});

function togglecalendar_start(serial){
	
	flatpick_start.toggle();

}

function togglecalendar_end(serial){
	flatpick_end.toggle();
	
}



function qtipDueCalendar(element,data){
	var todo_serial=data.projecttaskid;
	var duedate=data.enddate;
	var qt='<div data-serial="'+todo_serial+'" class="dd-parent">'

	+	'<div class="date-title">Add Due Date<span class="close-da-picker" onclick="fun_close_dropdown('+todo_serial+')">X</span></div>'

	+	'<div class="date-alarm-picker">'

	+'<div class="monthpickerDiv col-lg-6 col-sm-6 col-md-6">'
	+'<input style="display:none" class="flatpickr" type="text" placeholder="Select Date..">'
	+'</div>'

	+'<div class="alarmpickerDiv col-lg-6 col-sm-6 col-md-6">'

	+'<div class="col-lg-12 col-sm-12 col-md-12">'
	+'<div class="row">'

	+'<div class="col-lg-10 col-sm-10 col-md-10">'
	+'<label class="pull-left alarmset-text">Set Alarm (15min prior)</label>'
	+'</div>'

	+'<div class="col-lg-2 col-sm-2 col-md-2">'
	+'<input  type="checkbox" class="pull-right chk-alarm">'
	+'</div>'

	+'</div>'

	+'<div class="row" style="margin-top: 100px;">'
	+'<div class="col-lg-12 col-sm-12 col-md-12">'
	+' <select class="form-control sel-repeat-alarm">'
	+'<option value="dontrepeat">Don\'t Repeat</option>'
	+'<option value="repeat">Repeat</option>'
	+'</select>'
	+'</div>'
	+'</div>'


	+'<div class="row" style="margin-top: 20px;">'
	+'<div class="col-lg-6 col-sm-6 col-md-6">'
	+'<button type="button" class="btn btn-picker-remove">Remove</button>'
	+'</div>'
	+'<div class="col-lg-6 col-sm-6 col-md-6">'
	+'<button type="button" class="btn btn-picker-add">Add</button>'

	+'</div>'
	+'</div>'
	+'</div>'

	+'</div>' // end .alarmpickerDiv
	+'</div>' // end .date-alarm-picker

	+'</div>';

	$(element).qtip({

		show: {
			event: 'click',
			effect: function(offset) {
				$(this).slideDown(100); // "this" refers to the tooltip
			}
		},
		hide: 'unfocus click',

		content: {
			text: qt,
		},

		position: {
			at: 'bottom center',  
			my: 'top center', 
			viewport: $(window),
			adjust: {
				mouse: true,
				scroll: true
			}

		},
		style: {
			classes: 'qtip-light qtip-rounded qtip-time',
			width: '510'
		},

		events: {
			render: function(event, api) {

				$('body').on('keydown.qtipDueCalendar', function(event) {
					if(event.keyCode === 27) {
						api.hide(event);
					}
				});

				$(this).find('.flatpickr').flatpickr({
					inline: true, 
					enableTime : true,
					dateFormat: 'M j h:i K',
					defaultDate: duedate,

					onChange: function(selectedDates, dateStr, instance) {
						var sel_date=(moment(selectedDates[0]).format('MMM D hh:mm a'));
						var cal_serial=$(instance.element).closest('.dd-parent').attr('data-serial');

						var request = $.ajax({
							url: base_url+"todo/updateTodoEntry",
							method: 'POST',
							data: {
								"due_date":moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
								"cal_id":cal_serial

							},
							//dataType: 'JSON'
						});

						request.done(function(response){
							$('#dd_duedate_text_'+cal_serial).html("Due: "+sel_date);

						});

					}
				});

				//$(this).find('.flatpickr').next().addClass('dateIsPicked').removeClass('arrowTop');

			},
			
		}
	});
}


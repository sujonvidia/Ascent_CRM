
<script type="text/javascript">
	


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
			url: base_url+"todo/upNewCatHD",
			method: 'POST',
			data: {
				catserial: setid,
				todoserial: todoserial,
			},
			dataType: 'JSON'
		});
		
		request.done(function(response){
			
			//console.log($('.todoRow'+todoserial).find('.fa-category-gray'));
			$(element).closest('.keep-open').find('.li-cat').removeClass('active');
			$(element).closest('.li-cat').addClass('active');
			
			$('.todoRow'+todoserial).find('.fa-category-gray').css('color',response.cat_color);
			$(element).closest('.ul-cat').attr('data-catid',setid);
			$('.todoRow'+todoserial).find('.fa-category-gray').attr('data-catid',setid);
			//$('*').qtip('hide');
			
		});
	}
	function setClient(setid,element){
		//var catserial=$(element).attr('data-serial');
		var todoserial=$(element).closest('.keep-open').attr('data-serial');
		
		var request = $.ajax({
			url: base_url+"todo/upNewClientHD",
			method: 'POST',
			data: {
				setid: setid,
				todoserial: todoserial,
			},
			dataType: 'JSON'
		});
		
		request.done(function(response){
			
			
			$(element).closest('.keep-open').find('.li-client').removeClass('active');
			$(element).closest('.li-client').addClass('active');
			$(element).closest('.ul-client').attr('data-clientid',setid);

			$('#projectCLientT').text($(element).find('.client-text').text());
			
			
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
				//console.log(response);
				$('.todoRow'+todoserial).find('.li-cat').removeClass('active');
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
						//console.log(v);
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

	$(document).on("click", ".add-client", function (e) {
		
		e.stopPropagation();
		var newid=(Date.now());
		var _cthis=this;
		
		var newclient='<li id="newclient_'+newid+'" class="li-client new-mode">'
		+'<div class="row" style="margin:0px">'
		
		
		+'<div class="col-lg-4 div-client-fname">'
		+'<input type="text" class="cls-client-fname">'
		+'</div>'

		+'<div class="col-lg-4 div-client-lname">'
		+'<input type="text" class="cls-client-lname">'
		+'</div>'
		
		// +'<div onclick="doneCat(this)" class="col-lg-2 div-cat-done">'
		// +'<span class="fa fa-check"></span>'
		// +'</div>'
		
		+'<div class="col-lg-2 div-client-close">'
		+'<span onclick="closeClient('+newid+',this,event)" class="fa fa-times"></span>'
		+'</div>'
		
		+'</div>'
		+'</li>';
		
		newclient=$(newclient);
		$(_cthis).before(newclient);
		
		newclient.find('.cls-client-fname').focus();
		//console.log(newclient.find('.cls-client-fname'));
		
		newclient.find('.cls-client-fname').on('keydown', function (e) {
			var _this=this;
			
			if (e.keyCode == 13) {
				
				var fname=newclient.find('.cls-client-fname').val();
				var lname=newclient.find('.cls-client-lname').val();
				
				var request = $.ajax({
					url: base_url+"todo/addNewClient",
					method: 'POST',
					data: {
						fname: fname,
						lname: lname,
					},
					dataType: 'JSON'
				});
				
				request.done(function(v){
					$('#newclient_'+newid).remove();
					
					var newclient='<li id="clientid_'+v.id+'" class="li-client" onclick="setClient('+v.id+',this)" data-serial='+v.id+'>'
					+'<div class="row" style="margin:0px">'
					
					+'<div class="col-lg-4 div-client-fname">'
					+'<span class="cls-client-fname">'+fname+'</span>'
					+'</div>'
					
					+'<div class="col-lg-4 div-client-lname">'
					+'<span class="cls-client-lname">'+lname+'</span>'
					+'</div>'
					
					+'<div class="col-lg-2 div-client-update">'
					+'<span onclick="updateClient('+v.id+','+v.user_id+',this,event)" class="fa fa-pencil-square-o"></span>'
					+'</div>'
					
					+'<div class="col-lg-2 div-client-delete">'
					+'<span onclick="delClient('+v.id+','+v.user_id+',this,event)" class="fa fa-trash"></span>'
					+'</div>'
					
					+'</div>'
					+'</li>';
					
					newclient=$(newclient);
					$('.add-client').before(newclient);
					
				});
				
			}
		});
	});
	
	function updateAssigneeImg(_this,todo_serial){
		var newass=($(_this).find('.select_user_new').val());
		$("#clickIconlist"+todo_serial).removeClass('active-icon');
		$("#SubclickIconlist"+todo_serial).removeClass('active-icon');
		$('.todoRow'+todo_serial).find('.icon-assignto').removeClass('active-icon');

		if(newass !=null){
			$('.todoRow'+todo_serial).find('.dt-assignto').attr('data-assid',newass.join());
			if(newass.length>0){
				$("#clickIconlist"+todo_serial).addClass('active-icon');
				$("#SubclickIconlist"+todo_serial).addClass('active-icon');
				$('.todoRow'+todo_serial).find('.icon-assignto').addClass('active-icon');
			}
			if(newass.length>1){
				$('.dt-assignto[data-serial="'+todo_serial+'"] img').attr('src',base_url+"icons/gi32.png");

				$("#clickIconlist"+todo_serial).attr('src',base_url+"icons/gi32.png");
			}
			else{
				$('.dt-assignto[data-serial="'+todo_serial+'"] img').attr('src',base_url+"icons/Profile.png");

				$("#clickIconlist"+todo_serial).attr('src',base_url+"icons/Profile.png");
			}

		}else{
			$('.todoRow'+todo_serial).find('.dt-assignto').attr('data-assid','');
		}
	}

	function qtipAssignee(element,data,crm_users,viewtype){
		
		if($(element).qtip('api') == undefined){
		var todo_serial = data.Id;
		
		$(element).qtip({
			
			show: {
				//event: 'click',
				ready:true,
				solo: true
			},
			hide: 'unfocus click',
			
			content: {
				text: 'Loading...'
				
			},
			
			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window)
				
			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font assinWidth',
				width: '200',

			},
			
			
			events: {
				hide: function (event, api) {
					$(this).find('.select_user_new').select2('close');

					$(this).qtip('destroy');
					$( 'body').unbind( "keydown.qtipAssignee" );
					
				},
				show: function(event, api) {
					
					var _this=this;
					
					var requestass = $.ajax({
						url: base_url+"todo/getTodoAssigneeHD",
						method: 'POST',
						data: {
							"todo_serial":todo_serial,
							"viewtype":"Todo"
							
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){
						// console.log('getTodoAssignee');
						// console.log(response);
						
						$.each(response.tags_admin, function (key, value) {
							$(_this).find('.select_user_new option[value="' + value.userid + '"]').remove();
						});
						
						var tag_ids=[];
						$.each(response.tags_member,function(i,el){
							tag_ids.push(el.userid);
						});
						
						$(_this).find('.select_user_new').val(tag_ids).trigger('change.select2');
					});
				},
				render: function(event, api) {
					var _this=this;
					$('body').on('keydown.qtipAssignee', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
					
					var qt='<div class="assign-title">Members:</div><select  class="form-control size-family-weight select_user_new" style="width:100%" name="select_user_new[]" multiple="multiple" >';
					
					$.each(alluser, function (key, value) {
						
						qt+='<option value="' + value.ID + '">' + value.display_name + '</option>';
						
					});
					
					qt+='</select>';
					
					api.set('content.text', qt);
					
					$(_this).find('.select_user_new').select2({
						placeholder: "Type user name here to add...",
						templateSelection: template,
						 closeOnSelect: false,
						 //multiple:true,
						// selectOnClose: true
						//allowClear: true
					}).on('select2:unselect', function(e) {
            	  
                $.ajax({
                    url: '<?php echo base_url(); ?>projects/deltagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:todo_serial,
                        type:viewtype,
                        tagList:e.params.data.id,
                        UserStatus:'2'
                    }, // Data to pass along with your request
                    success: function(data, status) {

                    	updateAssigneeImg(_this,todo_serial);
                    	getTagAjaxPro(projectID,'Todo');
                    	

                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            }).on('select2:select', function(e) {

                $.ajax({
                    url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
                    type: 'POST', // POST or GET
                    data: {
                        projectID:todo_serial,
                        type:viewtype,
                        tagList:e.params.data.id,
                        UserStatus:'2'
                    }, // Data to pass along with your request
                    success: function(data, status) {
                       updateAssigneeImg(_this,todo_serial);
                       getTagAjaxPro(projectID,'Todo');
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
                    }
                });

            }).on('select2:closing', function(e) {
            	//console.log(e.preventDefault());
            });
					
					
				},
				
			}
		});
		}
		
	}

	function deleteStatus(element,ele,value){

		var projectID = $("#newTaskInput").attr('data-projectid');
		var request = $.ajax({
            url: '<?php echo site_url(); ?>Todo/deleteStatus',
            method: "POST",
            data:{ ele : projectID, value:value,serial:ele },
            dataType: "json"
        });
        request.done(function(rsp) {
            var liID = $(element).closest('li').attr('id');
			$("#"+liID).slideUp(300, function(){ $(this).remove();});
            thisprojectstatus.splice( $.inArray(value, thisprojectstatus), 1 );
        });
        request.fail(function(rsp) {
            console.log(rsp.status);
        }); 
	}

	function qtipStatus(element,data){

		if($(element).qtip('api') == undefined){
			var todo_serial = data.Id;
			var color;
			

			var qhtml=	'<li class="workspace4" style="display:inline">'
			+'<ul class="keep-open" id="ListstatusInput'+todo_serial+'">';
			qhtml+='<li class="li-status"><div class="clipHead cusClip">SET STATUS:<i class="fa fa-times-circle cCcloeSS qtipCloseDes" ></i></div></li>';
			$.each(allprojectstatus,function(i,v){
				
				if(v.projectstatus == 'canceled'){
		             color ='RED';
		        }

		        if(v.projectstatus == 'none'){
		            color ='RED';
		        }

		        if(v.projectstatus == 'in progress'){
		            color ='BLUE';
		        }

		        if(v.projectstatus == 'completed'){
		            color ='GREEN';
		        }
		        
		        if(v.projectstatus == 'on hold'){
		            color ='RED';
		        }

		        if(v.projectstatus == 'waiting for feedback'){
		            color ='orange';
		        }
				
				qhtml+='<li data-status="'+v.projectstatus+'" onclick="change_projectstatus(\'' + v.projectstatus + '\','+todo_serial+',this)" class="li-status '+(data.Status==v.projectstatus ? 'active' : '')+'"><div class="deleteStatus" style="color:'+color+'"> '+v.projectstatus+'</div></li>';
				
			});
			// 
			if(thisprojectstatus.length > 0){
				$.each(thisprojectstatus,function(i,v){
					var res = v.projectstatus.split(" ");
					
					qhtml+='<li id="StatusList'+res[0]+todo_serial+'" class="li-status '+(data.Status==v.projectstatus ? 'active' : '')+'"><div class="deleteStatus" style="color:#6EA7F2;" data-status="'+v.projectstatus+'" onclick="change_projectstatus(\'' + v.projectstatus + '\','+todo_serial+',this)"> '+v.projectstatus+'</div><i class="fa fa-trash" style="float:right;color:#6d6a69;margin-top: -19px;margin-right: 5px;" onclick="deleteStatus(this,'+todo_serial+',\''+v.projectstatus+'\')"></i></li>';
					
				});
			}
			
			
			qhtml+=     '</ul>';
	        qhtml+='<ul class="statusAdd"><li><div class="addnewstatus" onclick="create_projectstatus('+todo_serial+')"> Add New <img style="cursor: pointer;margin-left: 1%;margin-top: -4%;width: 20px;height: 20px;background: #e7e7e7 !important;" src="http://172.16.0.64/nclive/asset/img/icons/Add Project.png"> </div><input type="text" placeholder="Type Here" class="statusInput" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Type Here\'" id="statusInput'+todo_serial+'"/></li></ul>';
	        qhtml+='</li>';
			
			$(element).qtip({
				
				show: {
					//event: 'click',
					ready:true,
					solo: true,
					 // effect: function(offset) {
      //       $(this).slideDown(100); // "this" refers to the tooltip
      //   }
				},
				hide: 'unfocus click',
				
				content: {
					text: qhtml
				},
				
				position: {
					at: 'bottom center',  
					my: 'top left', 
					viewport: $(window),
					adjust: {
							method: 'none shift'
						},
					
				},
				style: {
					classes: 'qtip-light qtip-rounded qtip-font customStyle flip-qtip',
					width: '200',
					tip: {
                        width: 3,
                        height: 3,
                        //offset: -220
                    }
				},
				
				events: {
					hide: function (event, api) {
						
						$(this).qtip('destroy');
						$( 'body').unbind( "keydown.qtipStatus" );
						
					},
					show: function(event, api) {
						//console.log($(this));console.log(event);console.log(api);
						
						var serial=($(api.elements.target).attr('data-serial'));
						
						if($('.todoRow'+serial).find('.chk-complete').is(':checked')){
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
	}

	function create_projectstatus(sl){
		if($("#statusInput"+sl).is(':visible')){
			$("#statusInput"+sl).hide();
			$(".addnewstatus").show();
			$("#statusInput"+sl).val("");
		}else{
			$(".addnewstatus").hide();
			$("#statusInput"+sl).show();
			$("#statusInput"+sl).focus();
		}
		
	}
	$("body").on("blur",".statusInput",function(e){
		$(".addnewstatus").show();
		var todo_serial= (e.target.id.match(/\d+/)[0]);
		$("#statusInput"+todo_serial).hide();
	})
	
	$("body").on("keydown",".statusInput",function(e){

		var todo_serial= (e.target.id.match(/\d+/)[0]);
		var projectID = $("#newTaskInput").attr('data-projectid');
		
		if (e.keyCode == 13) {
			e.preventDefault();

			var requestass = $.ajax({
				url: base_url+"todo/saveStatus",
				method: 'POST',
				data: {
					"status":$("#"+e.target.id).val(),
					"projectID":projectID
				},
				dataType: 'JSON'
			});
			
			requestass.done(function(response){
				// $("#List"+e.target.id).append('<li data-status="'+$("#"+e.target.id).val()+'" onclick="change_projectstatus(\'' + $("#"+e.target.id).val() + '\','+todo_serial+',this)" class="li-status"><div> '+$("#"+e.target.id).val()+'</div></li>');
				$(".addnewstatus").show();
				$("#List"+e.target.id).append('<li id="StatusList'+todo_serial+'" class="li-status"><div style="color:#6EA7F2;" class="deleteStatus" data-status="'+$("#"+e.target.id).val()+'" onclick="change_projectstatus(\'' + $("#"+e.target.id).val() + '\','+todo_serial+',this)"> '+$("#"+e.target.id).val()+'</div><i class="fa fa-trash deleteStatus" style="float:right;color:#6d6a69;margin-top: -19px;margin-right: 5px;" onclick="deleteStatus(this,'+todo_serial+',\''+$("#"+e.target.id).val()+'\')"></i></li>');

				
				thisprojectstatus.push({'projectstatus':$("#"+e.target.id).val()});
				$("#statusInput"+todo_serial).val("");
				$("#statusInput"+todo_serial).hide();
			});
		}
	});

	function qtipCategory(element,todo_serial){

		//var todo_serial=data.Id;
		
		$(element).qtip({
			
			show: {
				//event: 'click',
				ready:true,
				solo: true
			},
			hide: 'unfocus click',
			
			content: {text: '' },
			
			position: {
				at: 'bottom right',  
				my: 'top right', 
				viewport: $(window),
				adjust: {
						method: 'none shift'
					},
				
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
						data: {
							"todo_serial":todo_serial,
							"viewtype":"Todo"
							
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){

						var qtc='<li class="workspace4" style="display:inline">'
						
						+		'<ul data-serial="'+response.all_todos[0].Id+'" data-catid="'+response.all_todos[0].HasCategoryId+'" class="keep-open ul-cat">'
						+			'<li class="dropdown-menu-header">Category:</li>'
						+			'<li class="dropdown-menu-footer add-category"><i class="fa fa-plus-circle"></i> Add Category</li>'
						+		'</ul>'
						
						+'</li>';
						api.set('content.text', qtc);

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
					$('body').on('keydown.qtipCategory', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				},
				hide: function (event, api) {

						var oEvent = event.originalEvent;
						
						if(oEvent && $(oEvent.target).closest('.flatpickr-calendar').length) {
							event.preventDefault();
							
							
						}else if(oEvent && $(oEvent.target).closest('.swal2-container').length) {
							event.preventDefault();
							
						}else if(oEvent && $(oEvent.target).closest('.qtip-client').length) {
							event.preventDefault();
							
						}else{
							api.destroy(true);
							
							$( 'body').unbind( "keydown.qtipCategory" );
						}
						
					},
				
			}
		});
	}

	function qtipClient(element,data){
		var todo_serial=data.Id;
		var qtc='<li class="workspace4" style="display:inline">'
		
		+		'<ul data-serial="'+data.Id+'" data-clientid="'+data.HasClient+'" class="keep-open ul-client">'
		+			'<li class="dropdown-menu-header">Clients:</li>'
		+			'<li class="dropdown-menu-footer add-client"><i class="fa fa-plus-circle"></i> Add Client</li>'
		+		'</ul>'
		
		+'</li>';
		
		$(element).qtip({
			
			show: {
				event: 'click',
				solo: true
			},
			hide: 'unfocus click',
			
			content: {text: qtc },
			
			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window),
				adjust: {
						method: 'none shift'
					},
				
			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font qtip-client',
				width: '300'
			},
			
			
			events: {
				hide: function (event, api) {
						
						
						// var oEvent = event.originalEvent;
						
						// // If we clicked something inside the date selector... don't hide!
						// if(oEvent && $(oEvent.target).closest('.qtip-content').length) {
						// 	event.preventDefault();
							
						// 	}else{
							
						// }
						
					},
				show: function(event, api) {
					
					var requestass = $.ajax({
						url: base_url+"todo/getAllClient",
						method: 'POST',
						dataType: 'JSON'
					});
					
					requestass.done(function(response){

						$(event.currentTarget).find('.li-client').remove();
						
						$.each(response.allclient, function(k,v){
							
							var loadcat='<li id="clientid_'+v.contactid+'" class="li-client" onclick="setClient('+v.contactid+',this)" data-serial='+v.contactid+'>'
							+'<div class="row" style="margin:0px">'
							
							+'<div class="col-lg-8 div-client-name">'
							+'<span class="client-text">'+v.firstname+' '+v.lastname+'</span>'
							+'</div>'
							
							+'<div class="col-lg-2 div-client-update">'
							+'<span onclick="updateClient('+v.contactid+','+v.creator+',this,event)" class="fa fa-pencil-square-o"></span>'
							+'</div>'
							
							+'<div class="col-lg-2 div-client-delete">'
							+'<span onclick="delClient('+v.contactid+','+v.creator+',this,event)" class="fa fa-trash"></span>'
							+'</div>'
							
							+'</div>'
							+'</li>';
							loadcat=$(loadcat);
							
							$(event.currentTarget).find('.add-client').before(loadcat);
							
							$(event.currentTarget).find('[class="li-client"][data-serial="'+$(event.currentTarget).find('.ul-client').attr('data-clientid')+'"]').addClass('active');
							
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
	
	function qtipPriority(element,todo_serial){
		if($(element).qtip('api') == undefined){
		//var todo_serial=data.Id;
		
		$(element).qtip({
			show: {
				ready:true,
				//event: 'click',
				solo: true
			},
			hide: 'click unfocus',
			content: {
				text: 'Loading...'
				
			},
			events: {
				
				show: function(event, api) {
					
					var _this=this;
					
					var requestass = $.ajax({
						url: base_url+"todo/getMyTodosByID",
						method: 'POST',
						data: {
							"todo_serial":todo_serial,
							"viewtype":"Todo"
							
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){
						var data=response.all_todos[0];
						var qhtml=	'<li class="workspace4" style="display:inline">'
								+'<ul class="keep-open">'
								+		'	<li class="dropdown-menu-header">Priority:</li>'
								+			'<li onclick="changePriority(\'Low\','+todo_serial+',this)" class="li-prio '+(data.Priority=="Low" ? 'active' : '')+'"><div> Low <i class="fa fa-circle fa-category-gray pull-right" style="color:rgb(0, 255, 0)"></i></div></li>'
								+			'<li onclick="changePriority(\'Medium\','+todo_serial+',this)" class="li-prio '+(data.Priority=="Medium" ? 'active' : '')+'"><div> Medium <i class="fa fa-circle fa-category-gray pull-right" style="color: rgb(255, 128, 0);"></i></div></div></li>'
								+			'<li onclick="changePriority(\'High\','+todo_serial+',this)" class="li-prio '+(data.Priority=="High" ? 'active' : '')+'"><div> High <i class="fa fa-circle fa-category-gray pull-right" style="color: rgb(255, 0, 0);"></i></div></li>'
								
								+		'</ul>'
								+ '</li>';

						
						api.set('content.text', qhtml);
						
						
					});
				},
				render: function(event, api) {
					$('body').on('keydown.qtipPriority', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				},
				hide: function (event, api) {

						var oEvent = event.originalEvent;
						
						if(oEvent && $(oEvent.target).closest('.flatpickr-calendar').length) {
							event.preventDefault();
							
							
						}else if(oEvent && $(oEvent.target).closest('.swal2-container').length) {
							event.preventDefault();
							
						}else if(oEvent && $(oEvent.target).closest('.qtip-client').length) {
							event.preventDefault();
							
						}else{
							api.destroy(true);
							
							$( 'body').unbind( "keydown.qtipPriority" );
						}
						
					},
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
	
	
	
	function todoCommentsDesign(data,projectsid){
		var tabDetail ='  <div class="row">';
        tabDetail +='           <div class="col-lg-12 projectfilefDiv" style="padding: 3% 4% 1% 4%;">';
        tabDetail +='               <span class="pull-left col-lg-11 comtag" id="tagBtnDiv'+projectsid+'" style="margin-top: 0px;"></span>';
        tabDetail +='               <div class="col-lg-1 col-sm-1 col-md-1">'
                                        +'<li class="ddm-com-set" style="display:inline">'
                                        +   '<a class="dropdown-toggle dt-com-set" data-toggle="dropdown"><img class="" src="'+base_url+'icons/Settings.png"></a>'
                                        +   '<ul class="dropdown-menu dropdown-com-set">'
                                        +       '<div class="arrow-position-view"></div>'
                                        // +       '<li><a>Archive</a></li>'
                                        +       '<li><a>Clear</a></li>'
                                        // +       '<li><a>Block</a></li>'
                                        +       '<li><a>Starred</a></li>'
                                        // +       '<li><a>Mute</a></li>'
                                        // +       '<li><a>Mark as unread</a></li>'
                                        +       '<li><a>Select</a></li>'
                                        +   '</ul>'
                                        +'</li>'
                                  +'</div>';
        tabDetail +='           </div>';


        tabDetail +='    <div style="border-top: 1px solid #e0dddd;margin-top: 10.5%;width: 96%;margin-left: 2%;">&nbsp;</div>';
        tabDetail +='    <div class="row attachListDiv" id="attachListDivCommnet">';

        var daterow = "";
        $.each(data.allComm,function(k,v){
            var time = data.allComm[k].CreatedDate;
            if(daterow == ""){
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            }else if(daterow != moment(time).format('L')){
                daterow = moment(time).format('L');
                tabDetail += drawCommentGroupTime(time);
            }
            
            tabDetail +='       <div class="panel panel-default proComm ptt'+data.allComm[k].Id+'">';
            tabDetail +='           <div class="panel-body status">';
            tabDetail +='               <div class="who clearfix">';
            tabDetail +='                   <span class="comment_imghover">';
            tabDetail +='                       <img src="'+base_url+'asset/img/avatars/'+data.allComm[k].img+'" alt="img" class="comment-img">';
            tabDetail +='                       <div class="show_user_details">'+data.allComm[k].full_name+'<br>'+moment(data.allComm[k].CreatedDate).format('lll')+'</div>';
            tabDetail +='                   </span>';
            tabDetail +='                   <span class="from">'+data.allComm[k].Description+'</span>';
            tabDetail +='                   <div class="name dropdown"><b></b>'+
												'<a data-toggle="dropdown" class="dropdown-toggle" title="Settings">'+
													'<i class="fa fa-chevron-down pull-right"></i>'+
												'</a>'+
												'<ul class="dropdown-menu pull-right">'+
													'<div class="arrow-top-right"></div>'+
													'<li><a onclick="">Msg Info</a></li>'+
													'<li><a onclick="deletePTTComment(\''+data.allComm[k].Id+'\')">Clear</a></li>'+
													// '<li><a onclick="">Forward</a></li>'+
												'</ul>'+
												'<i class="fa fa-star-o pull-right" onclick=""></i>'+
											'</div>';
            tabDetail +='               </div>';
            tabDetail +='           </div>';
            tabDetail +='       </div>';
        });

        tabDetail +='    <div class="taskComments">';
        tabDetail +='           <div id="commentinput" onfocus="if($(this).html() == \'Type a message...\') $(this).html(\'\');" onblur="if($(this).html() == \'\') $(this).html(\'Type a message...\');" contenteditable data-status="Todo" class="form-control commentinput">Type a message...</div>';
        tabDetail +='           <input type="hidden" id="taskid" data-status="Todo" class="form-control taskid" value="'+projectsid+'"/>';
        tabDetail +='           <img src="'+base_url+'icons/emo.png" onclick="on_off_com_emo_popup()" id="input_img1">';
        tabDetail +='           <a data-title="Attachment" data-toggle="lightbox" title="Attachment" href="'+base_url+'projects/comattach/Todo/'+projectsid+'/TodoFiles">';
        tabDetail +='               <img src="'+base_url+'icons/attach.png" id="input_img2">';
        tabDetail +='           </a>';
        tabDetail +='           <div class="comment_emo_popup">'
                              +'<?php 
                                    $emo_url = base_url("asset/emotion");
                                    $emotionImg = array("smile.png", "smile-big.png", "sad.png", "crying.png", "tongue.png", "shock.png", "angry.png", "confused.png", "wink.png", "embarrassed.png", "disapointed.png", "sick.png", "shut-mouth.png", "sleepy.png", "eyeroll.png", "thinking.png", "lying.png", "glasses-nerdy.png", "teeth.png", "angel.png", "bye.png", "clap.png", "hug-left.png", "hug-right.png", "good.png", "bad.png", "highfive.png", "love.png", "love-over.png", "tv.png", "mail.png", "rain.png", "pizza.png", "coffee.png", "computer.png", "beer.png", "drink.png", "cat.png", "dog.png", "sun.png", "star.png", "clock.png", "present.png", "mobile.png", "musical-note.png", "boy.png", "girl.png", "cake.png", "car.png");
                                    foreach($emotionImg as $v): 
                                        echo '<img onclick="sendComEmo(this)" src="'.$emo_url."/".$v.'">';
                                    endforeach;
                                ?>'
                              +'</div>';
        tabDetail +='    </div>';
        tabDetail +=' </div>';

        return tabDetail;
	}
	
	
	
	function qtipCommentTodo(element,data,event){
		var projectID = data.Id;
        var attr = 'comments';
        $.ajax({
            url: base_url+'todo/getCommentForTodo', // URL to the local file
            type: 'POST', // POST or GET
            data: {projectID:projectID}, // Data to pass along with your request
            success: function(resp, status) {
                var creBy = '';
                $("#tipTT"+data.Id).text("");
                $.each(alluser, function (key, value) {
                    if(value.ID == resp.creator[0].createdBy){
                        creBy = value.full_name;
                        creBy += " On: ";
                        creBy += moment(resp.creator[0].CreatedDate).format('MMM-DD-YYYY HH:mm:ss');
                    }
                });


                var floatingDiv =  ' <div class="backDiv"  data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div id="Pro'+projectID+'" class="floting_box_right">';
                floatingDiv += '    <div class="panel panel-default" style="border: none;">';
                floatingDiv += '        <div class="panel-heading" style="height:60px;">';
                floatingDiv += '            <span class="col-lg-11 proDivname">';
                floatingDiv += '                <span style="width:100%;float: left;line-height: 1.5;text-overflow: ellipsis;margin-top: -18px;" class="project-text-prop" id="comProname'+projectID+'">'+data.Title+'</span>';
                floatingDiv += '                <span style="width:100%;float: left;font-size: 14px;margin-top: 0px;" id="comCrename">Created By: '+creBy+'</span>';
                floatingDiv += '            </span>';
                floatingDiv += '            <a href="javascript:void(0);" onClick="CloseFlotDiv()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
                floatingDiv += '        </div>';
                floatingDiv += '        <div class="panel-body">'+todoCommentsDesign(resp,projectID)+'</div>';
                floatingDiv += '     </div>';
                floatingDiv += ' </div></div>';
            

                $("#projectBody").append(floatingDiv);
                
                $("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
                setProjecttag(resp,projectID);
                updateNotyCommenthd(projectID,'reset');
                $('.comment-badge'+projectID).text('');
                $('.comment-badge'+projectID).next().removeClass('active-icon');
                $(".floting_box_right").css("top", event.pageY - 95);
                $(".floting_box_right").css("left", event.pageX - 666);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Some code to debbug e.g.:               
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
	}
	
	
	function qtipProperties(element,maindata,viewtype){
		
		if($(element).qtip('api') == undefined){
			$('.qtip').qtip('hide');
			
			var projectID = maindata.Id;
			var parentID = maindata.HasParentId;
			
			var attr='properties';
			if(viewtype == 'Task'){
				posmy= 'right center';
				posat= 'left center';
			}else if(viewtype == 'SubTask'){
				posmy= 'right center';
				posat= 'left center';
			}else{
				posat= 'right center';
				posmy= 'left center';
			}
			
			$(element).qtip({
				show: {
					ready: true,
					//event: 'click',
					modal: true,
					//solo:true,
					delay: 100,
					
					
				},
				
				hide: 'click',
				content: {
					text: 'Loading...'
					
				},
				position: {
					
					my: posmy, 
					at: posat,  
					viewport: $(window),
					adjust: {
					    method: 'none shift',
					    //y:70
					},
					effect: false
				},

				style: {
					classes: 'qtip-light qtip-rounded qtip-font',
					width: '700',
					//height: '500',
					tip: {
						corner: true,
						width: 40,
						height: 40,
						//offset: 70
					}
				},

				events: {
					hide: function (event, api) {

						var oEvent = event.originalEvent;
						
						if(oEvent && $(oEvent.target).closest('.flatpickr-calendar').length) {
							event.preventDefault();
							
							
						}else if(oEvent && $(oEvent.target).closest('.swal2-container').length) {
							event.preventDefault();
							
						}else if(oEvent && $(oEvent.target).closest('.qtip-client').length) {
							event.preventDefault();
							
						}else{
							$(this).qtip('destroy');
							$( 'body').unbind( "keydown.qtipProperties" );
						}
						
					},
					render: function(event, api) {

						var _this=this;
						$('body').on('keydown.qtipProperties', function(event) {
							if(event.keyCode === 27) {
								api.hide(event);
							}
						});
						
					},
					show: function(event, api) {
						// console.log('event api');
						// console.log(event);
						
						$('.dd-parent').css('backgroundColor','');
						$('.todoRow'+projectID).css('backgroundColor','lavender');
						var _this=this;
						
						// --- get property info
						var requestass = $.ajax({
							url: base_url+"todo/getPropertyInfoHD",
							method: 'POST',
							data: {
								"todo_serial":projectID,
								"viewtype":viewtype,
								"parentID":parentID
								
							},
							dataType: 'JSON'
						});
						
						requestass.done(function(data){
							var taskdata=data.all_todos[0];
							var floatingDiv =  ' <div data-serial="'+projectID+'" class="backDiv" style="position:relative;background:none" data-attr="'+attr+projectID+'" id="backDiv'+attr+projectID+'"><div class="floting_box_qtip" style="" id="Pro'+projectID+'">';
							floatingDiv += '    <div class="panel panel-default" style="border: none;">';
							floatingDiv += '        <div class="panel-heading" style="height:60px;">';
							floatingDiv += '            <span class="col-lg-11 proDivname" style="margin-top:0px">';
							floatingDiv += '                <span id="todo_name_text'+projectID+'" class="todo-text-prop">'+taskdata.Title+'</span>';
							floatingDiv += '                <span class="todo-createdby">Created By: '+taskdata.creator_name+' On: '+moment(taskdata.CreatedDate).format('MMM-DD-YYYY HH:mm:ss')+'</span>';
							floatingDiv += '            </span>';
							floatingDiv += '            <a onClick="qtipHideAll()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
							floatingDiv += '        </div>';
							floatingDiv += '        <div class="panel-body">'+tabsDesignTodo(projectID,viewtype,parentID,taskdata)+'</div>';
							floatingDiv += '     </div>';
							floatingDiv += ' </div></div>';

							api.set('content.text', floatingDiv);



							// -------------- select2 ADMIN -------------------------------
							var $eventSelect = $("#addAdmin"); 

							$eventSelect.select2({

								templateSelection: template,
								placeholder: "Add project Administrator/Supervisor/Co-ordinator",
								closeOnSelect: false,
								//allowClear: true
							})

							$eventSelect.on('select2:unselect', function(e) {

								$.ajax({
									url: '<?php echo base_url(); ?>projects/deltagUser', // URL to the local file
									type: 'POST', // POST or GET
									data: {
										projectID:projectID,
										type:viewtype,
										tagList:e.params.data.id,
										UserStatus:'1'
									}, // Data to pass along with your request
									success: function(data, status) {
										
										if(data.msg == 'YRNC'){
				                            swal("Oops...", "Contact with project creator", "error");
				                            $('#addAdmin option[value="' + e.params.data.id + '"]').prop("selected", "selected");
				                            $("#addAdmin").trigger("change"); 
				                        }else{
				                            if($('#addMember option').length>0){
				                                $("#addMember").append('<option value="' + e.params.data.id + '" >' + e.params.data.text + '</option>');
				                            } 
				                        }
				                         getTagAjaxPro(projectID,'Todo');
										
									},
									error: function (jqXHR, textStatus, errorThrown) {
										console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
									}
								});

							})

							$eventSelect.on('select2:select', function(e) {

								$.ajax({
									url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
									type: 'POST', // POST or GET
									data: {
										projectID:projectID,
										type:viewtype,
										tagList:e.params.data.id,
										UserStatus:'1'
									}, // Data to pass along with your request
									success: function(data, status) {
										
										if($('#addMember option').length>0){

											$('#addMember option[value="' + e.params.data.id + '"]').remove();
										}
										 getTagAjaxPro(projectID,'Todo');
									},
									error: function (jqXHR, textStatus, errorThrown) {
										console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
									}
								});

							})

							$eventSelect.on("select2:opening",function(e){

								$.each($("#addAdmin").select2('data'), function (key, value) {

									$('#addMember option[value="' + value.id + '"]').remove();
								});
								$.each($("#addMember").select2('data'), function (key, value) {

									$('#addAdmin option[value="' + value.id + '"]').remove();
								});
							})

							// -------------- select2 MEMBER -------------------------------

							$("#addMember").select2({

								templateSelection: template,
								//maximumSelectionLength: 10,
								placeholder: "Add project Member",
								closeOnSelect: false,
								//allowClear: true
							}).on("select2:opening",function(e){

								$.each($("#addAdmin").select2('data'), function (key, value) {

									$('#addMember option[value="' + value.id + '"]').remove();
								});

								$.each($("#addMember").select2('data'), function (key, value) {

									$('#addAdmin option[value="' + value.id + '"]').remove();
								});


							}).on('select2:unselect', function(e) {

								$.ajax({
									url: '<?php echo base_url(); ?>projects/deltagUser', // URL to the local file
									type: 'POST', // POST or GET
									data: {
										projectID:projectID,
										type:viewtype,
										tagList:e.params.data.id,
										UserStatus:'2'
									}, // Data to pass along with your request
									success: function(data, status) {
										
										if(data.msg == 'YRNC'){
				                            swal("Oops...", "Contact with Task creator", "error");

				                            $('#addMember option[value="' + e.params.data.id + '"]').prop("selected", "selected");
				                            $("#addMember").trigger("change"); 
				                            
				                        }
				                         getTagAjaxPro(projectID,'Todo');

				       //                  else{
				       //                      if($('#addAdmin option').length>0){
											// 	$("#addAdmin").append('<option value="' + e.params.data.id + '" >' + e.params.data.text + '</option>');
											// }
				       //                  }
									},
									error: function (jqXHR, textStatus, errorThrown) {
										console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
									}
								});

							}).on('select2:select', function(e) {


								$.ajax({
									url: '<?php echo base_url(); ?>projects/tagUser', // URL to the local file
									type: 'POST', // POST or GET
									data: {
										projectID:projectID,
										type:viewtype,
										tagList:e.params.data.id,
										UserStatus:'2'
									}, // Data to pass along with your request
									success: function(data, status) {
										if($('#addAdmin option').length>0){
											$('#addAdmin option[value="' + e.params.data.id + '"]').remove();
										}
										 getTagAjaxPro(projectID,'Todo');
									},
									error: function (jqXHR, textStatus, errorThrown) {
										console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
									}
								});

							});

							$('#projectDescriptionT').text(data.detail[0].Description);
							$('#projectstartDateT'+projectID).val(moment(data.detail[0].Startdate).format('MMM-DD-YYYY HH:mm:ss'));
							$('#projectendtDateT'+projectID).val(moment(data.detail[0].Enddate).format('MMM-DD-YYYY HH:mm:ss'));
							$('#projectDurationT').val(data.detail[0].Duration);
							$('#todo_name_text'+projectID).text(data.detail[0].Title);
							
							
							$("#addAdmin").html("");
							$("#addMember").html("");
							
							// console.log("Line 1653");
							// console.log(viewtype);
							// console.log(data.tags_admin.length );
							
							if (data.tags_admin.length > 0) {
								
								if(viewtype=='Task'){
									if(data.detail[0].CreatedBy == id){
										$.each(selectArray, function (key, value) {
                            
				                            $("#addAdmin").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
				                        });
									}else{
										$.each(data.users_admin, function (key, value) {
										
											$("#addAdmin").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
										});
									}
									
								}else if(viewtype == 'SubTask'){
										
										// $.each(data.users_admin, function (key, value) {
										
										// 	$("#addAdmin").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
										// });
										if(data.detail[0].CreatedBy == id){
											$.each(selectArray, function (key, value) {
	                            
					                            $("#addAdmin").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
					                        });
										}else{
											$.each(data.users_admin, function (key, value) {
											
												$("#addAdmin").append('<option value="' + value.ID + '" >' + value.full_name + '</option>');
											});
										}
								}else{
									$.each(data.ws_users, function (key, value) {
										
										$("#addAdmin").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
									});
								}
								
								$.each(data.tags_admin, function (key, value) {
									$('#addAdmin option[value="' + value.userid + '"]').prop("selected", "selected");
								});
								$("#addAdmin").trigger("change.select2", [true]); 
							}
							
							

							if (data.tags_member.length > 0) {
								
								if(viewtype=='Task'){
									$.each(data.ws_users, function (key, value) {
										
										if(data.detail[0].CreatedBy != value.ID){
											$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
										}

										//$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
									});
								}else if(viewtype == 'SubTask'){
										
										$.each(data.ws_users, function (key, value) {
											if(data.detail[0].CreatedBy != value.ID){
												$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
											}
										});
								}else{
									$.each(data.ws_users, function (key, value) {
										if(data.detail[0].CreatedBy != value.ID){
											$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
										}
									});
								}
								
								$.each(data.tags_member, function (key, value) {
									$('#addMember option[value="' + value.userid + '"]').prop("selected", "selected");
								});
								
								$("#addMember").trigger("change.select2"); 
							}else{
								$.each(data.ws_users, function (key, value) {
										
									$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
								});
							}
							
							$('#projectGroupT').empty();
							$.each(data.projectGroup, function (key, value) {
								$('#projectGroupT').append('<option value="'+value.ID+'">'+value.type+'</option>');
							});

							$('#projectCLientT').empty();

							$.each(data.client, function (key, value) {
								$('#projectCLientT').append('<option value="'+value.contactid+'">'+value.firstname+' '+value.lastname+'</option>');
							});

							//qtipClient($("#projectCLientT"),taskdata);
							
							$('#projectGroupT option[value="' + data.detail[0].HasGroup + '"]').prop("selected", "selected");

							$('#projectCLientT option[value="' + data.detail[0].HasClient + '"]').prop("selected", "selected");

							if(data.detail[0].Checked=="YES"){
							
								//$('#projectStatusT').val("completed").change();
								$('#projectStatusT option[value="completed"]').prop("selected", "selected");
							}else{
								$('#projectStatusT option[value="' + data.detail[0].Status + '"]').prop("selected", "selected");
							}

							flatpick_start=$("#projectstartDateT"+projectID).flatpickr({
							//inline: true, 
							enableTime : true,
							minDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
							maxDate: moment(taskdata.Enddate).format('MMM-DD-YYYY HH:mm:ss'),
							dateFormat: 'M-d-Y H:i:S',
							defaultDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
							clickOpens: false,
							position:"above",
							
							onChange: function(selectedDates, dateStr, instance) {
								
								var now = moment(flatpick_start.selectedDates[0]); 
								var end = moment(flatpick_end.selectedDates[0]); 
								var duration = moment.duration(end.diff(now));
								var days = duration.asDays();

								if(days < 0){
									
										swal("Oops...", "Your selected start date has exceeded the task end date.", "error");
									$('#saveTodoTask').addClass('disabled');

								}else{
									$('#projectDurationT').val(parseInt(days));
									$('#saveTodoTask').removeClass('disabled');
								}
								flatpick_start.close();

								
							}
							
						});
						
						flatpick_end=$("#projectendtDateT"+projectID).flatpickr({
							//inline: true, 
							enableTime : true,
							minDate: moment(taskdata.Startdate).format('MMM-DD-YYYY HH:mm:ss'),
							dateFormat: 'M-d-Y H:i:S',
							//defaultDate: moment(taskdata.Enddate).format('MMM-DD-YYYY HH:mm:ss'),
							clickOpens: false,
							
							onChange: function(selectedDates, dateStr, instance) {
								
								var now = moment(flatpick_start.selectedDates[0]); 
								var end = moment(flatpick_end.selectedDates[0]); 
								var duration = moment.duration(end.diff(now));
								var days = duration.asDays();

								if(days < 0){
									
										swal("Oops...", "Your selected due date has preceded the task start date.", "error");
									$('#saveTodoTask').addClass('disabled');

								}else{
									$('#projectDurationT').val(parseInt(days));
									$('#saveTodoTask').removeClass('disabled');
								}
								flatpick_end.close();
								
							}
						});
						
						$('.flatpickr-calendar').addClass('dateIsPicked').removeClass('arrowTop');
							
							// $("#projectGroupT").select2({
							// 	maximumSelectionLength: 10,
							// 	placeholder: "project Group",
							// 	//allowClear: true,
							// 	tags: true
							// }).on("change", function(e) {

							// 	var isNew = $(this).find('[data-select2-tag="true"]');

							// 	if(isNew.length){
							// 		addProjectGroup(isNew);

							// 	}
							// });

							

							// $("#projectCLientT").select2({
							// 	maximumSelectionLength: 10,
							// 	placeholder: "project client",
							// 	//allowClear: true,
							// 	tags: true
							// }).on("change", function(e) {

							// 	var isNew = $(this).find('[data-select2-tag="true"]');

							// 	if(isNew.length){
							// 		addNewClient(isNew);

							// 	}
							// });
							
						});
					},
					
					
				},
				
			});
			}
	}
	
	function addProjectGroup(isNew) {

		$.ajax({
				url: ''+base_url+'todo/insertProjectGroup', 
				type: 'POST', 
				data: {newname:isNew.val()}, 
				success: function(data, status) {
					
					//console.log(data);
					// $('#projectGroupT').empty();
					// $.each(data.projectGroup, function (key, value) {
					// 	tabDetail +='<option value="'+value.ID+'">'+value.type+'</option>';
					// });

					isNew.replaceWith('<option value="'+data.ID+'">'+isNew.val()+'</option>');

					$('#projectGroupT option[value="' + data.ID + '"]').prop("selected", "selected");
					
					//$("#addMember option:selected").removeAttr("selected");
					// $("#addMember").html("");
					
					// $.each(data.users, function (key, value) {
						
					// 	$("#addMember").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
					// });
					
					// $("#addMember").select2('open');
					
				}
			});

	}
	
	
	function dMembersNew(viewtype,parentID){
		
		if($('#addMember option').length==0){
			
			
			$.ajax({
				url: ''+base_url+'todo/getUsersForTodoNew', 
				type: 'POST', 
				data: {viewtype:viewtype,parentID:parentID,UserStatus:2}, 
				success: function(data, status) {
					// Process the data
					
					// Set the content manually (required!)
					//console.log(data);
					
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
	
	function dSupervisorNew(viewtype,parentID){
		if($('#addAdmin option').length==0){
			
			$.ajax({
				url: ''+base_url+'todo/getUsersForTodoNew', 
				type: 'POST', 
				data: {viewtype:viewtype,parentID:parentID,UserStatus:1}, 
				success: function(data, status) {
					// console.log('dSupervisor');
					// console.log(data);
					
					$("#addAdmin").html("");
					
					$.each(data.users, function (key, value) {
						
						$("#addAdmin").append('<option value="' + value.ID + '" >' + value.display_name + '</option>');
					});
					
					$("#addAdmin").select2('open');
					
					
				},
				error: function (jqXHR, textStatus, errorThrown) {
					// Some code to debbug e.g.:               
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
			}else{
			
			$("#addAdmin").select2('open');
		}
		
	}
	
	
	//var api = $('#qtip-apiTest').qtip('api');
	
	function addAdmin(userid,username){
		var matches = username.match(/\b(\w)/g);
		var acronym = matches.join(''); 
		//console.log($('#userChk'+userid).is(':checked'));
		if($('#userChk'+userid).is(':checked')){
			$("#tagAddAdmin").append('<a id="philBtn'+userid+'" title="'+username+'" style="margin-right: 2px;" href="javascript:void(0);" class="btn btn-primary btn-circle">'+acronym+'</a>');
			$("#dSupervisor").qtip('reposition');
			}else{
			$("#philBtn"+userid).remove();
			$("#dSupervisor").qtip('reposition');
		}
		
	}
	
	function tabsDesignTodo(projectid,viewtype,parentID,taskdata){
		var tabsDesign='';
		// var tabsDesign =  ' <ul class="nav nav-tabs">';
		// tabsDesign += '     <li class="active"><a data-toggle="tab" href="#home">Properties</a></li>';
		// tabsDesign += '     <li><a data-toggle="tab" href="#menu1">Quotations</a></li>';
		// tabsDesign += '     <li><a data-toggle="tab" href="#menu2">Invoices</a></li>';
		// tabsDesign += ' </ul>';
		tabsDesign += ' <div class="tab-content" style="padding: 10px;">';
		tabsDesign += '     <div id="home" class="tab-pane fade in active">';
		tabsDesign +=           propertiesTodoOne(projectid,viewtype,parentID,taskdata);
		tabsDesign += '     </div>';
		tabsDesign += '     <div id="menu1" class="tab-pane fade">';
		tabsDesign +=           propertiesTodoTwo();
		tabsDesign += '     </div>';
		tabsDesign += '     <div id="menu2" class="tab-pane fade">';
		tabsDesign +=           propertiesTodoTwo();
		tabsDesign += '     </div>';
		tabsDesign += ' </div>';
		
		return tabsDesign;
	}
	
	function togglecalendar_start(){
		
		flatpick_start.toggle();
		
	}
	
	function togglecalendar_end(){
		flatpick_end.toggle();
		
	}
	
	function propertiesTodoOne(projectid,viewtype,parentID,taskdata){
		
		// console.log(projectstatus);
		// console.log(selectArray);
		// console.log(client);
		var superviewtype=viewtype;
		if(viewtype=="Task"){
			viewtype=1;
			typetext="Co-owners :";
			typetext2="Members :";
		}
		if(viewtype=="Todo"){
			viewtype=2;
			typetext="Add To-Do Admin...";
			typetext2="Add To-Do Members...";
		}
		if(viewtype=="SubTask"){
			viewtype=3;
			typetext="Co-owners :";
			typetext2="Members :";
		}


		
		var tabDetail ='  <div class="row">';
		tabDetail +='    <div class="col-lg-12">';
		tabDetail +='    <div class="dropdown">';
		tabDetail +='         <a class="dropdown-toggle" data-toggle="dropdown" style="right: 43px;position: absolute;"><img src="'+base_url+'icons/proCopy.png"></a>';
		tabDetail +='<ul class="dropdown-menu pull-right" style="margin-top: 40px;padding-top:0px">';
		tabDetail +='<li style="background-color: #6d6a69;" class="dropdown-menu-header">Projects:</li>';
		tabDetail +='<div class="arrow-top-right"></div>';
		
		$.each(allprojects, function (key, value) {
			tabDetail+='<li onclick="convert2Task('+projectid+','+value.Id+')"><a href="#">'+value.Title+'</a></li>';
		});
		
		tabDetail +='</ul>';
		tabDetail +='</div>';
		
		tabDetail +='         <a onclick="fun_delTodo('+projectid+','+viewtype+')" style="right: 6px;position: absolute;"><img src="'+base_url+'icons/proDlt.png"></a>';
		tabDetail +='     </div>';
		tabDetail +='     <form action="#" method="POST" name="projectdrawing" id="projectdrawing" class="projectdrawing" style="margin-top: -131px;padding-top: 1px;" >';
		tabDetail +='           <div class="col-lg-12" style="margin-top: 8%;padding: 0% 5%;">';
		tabDetail +='               <div class="form-group">';
		tabDetail +='                   <textarea name="projectDescription" id="projectDescriptionT" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Comments\'" class="col-lg-12 proTaskarea" rows="5" placeholder="Comments"></textarea>';
		tabDetail +='							<div class="col-lg-4" style=" padding: 0px">';    
		tabDetail +='                   <label>Start Date</label>';
		tabDetail +='                   <input type="text" name="projectStartdate" class="col-lg-4 proInputText" onclick="togglecalendar_start()" placeholder="Startdate" id="projectstartDateT' + projectid + '" value="">';
		tabDetail +='</div>';
		tabDetail +='							<div class="col-lg-4">';    
		tabDetail +='                   <label>Duration</label>';
		tabDetail +='                   <input type="number" name="projectDuration" id="projectDurationT" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Duration\'" class="col-lg-4 proInputText" style="" placeholder="Duration">';
		tabDetail +='</div>';
		tabDetail +='							<div class="col-lg-4" style=" padding: 0px">';    
		tabDetail +='                   <label>Due Date</label>';
		tabDetail +='                   <input type="text" name="projectEnddate" onfocus="this.placeholder = \'\'" onblur="this.placeholder = \'Enddate\'" class="col-lg-4 proInputText"  style="" placeholder="Enddate" onclick="togglecalendar_end()" id="projectendtDateT' + projectid + '"  value="">';
		tabDetail +='</div>';
		tabDetail +='                   <input type="hidden" name="parentid" value="'+projectid+'">';
		tabDetail +='                   <input type="hidden" name="thisid" value="'+parentID+'">';
		tabDetail +='               </div>';
		tabDetail +='           </div>';
		tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 47%;width: 90%; margin-left: 5%;">&nbsp;</div>';
		tabDetail +='           <div class="col-lg-12" style="    padding: 0px 22px;margin-bottom: 8px;">';
		tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span> '+typetext+' </span>';
		tabDetail +='               </div>';
		tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
		tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddAdmin" id="tagAddAdmin"><select name="addAdmin" multiple="multiple" id="addAdmin" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dSupervisor" onclick="dSupervisorNew('+viewtype+','+parentID+')" style="margin-right: 2px;margin-left: 3px;margin-top:5px" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="Tagadmin" onclick="Tagadmin()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
		tabDetail +='               </div>';
		tabDetail +='           </div>';
		tabDetail +='           <div class="col-lg-12" style="padding: 0px 22px;margin-bottom: 8px;">';
		tabDetail +='               <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="margin-top:10px;width:27%;"><span>'+typetext2+'</span>';
		tabDetail +='               </div>';
		tabDetail +='               <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">';
		tabDetail +='                   <span style="width: 100%;" class="pull-left" id="tagBtnDiv"><span class="tagAddMember" id="tagAddMember"><select name="addMember" multiple="multiple" id="addMember" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText"></select></span><a id="dMembers" onclick="dMembersNew('+viewtype+','+parentID+')" style="margin-right: 2px;margin-left: 3px;margin-top:5px" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-plus"></i></a><a id="TagMemberBtn" onclick="TagMemberBtn()" style="margin-right: 2px;margin-left: 3px;background-color: #08c31f;display:none;" href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-check"></i></a></span>';
		tabDetail +='               </div>';
		tabDetail +='           </div>';
		tabDetail +='           <div style="border-top: 1px solid #e0dddd;margin-top: 17%;width: 90%; margin-left: 5%;">&nbsp;</div>';
		tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
		//tabDetail +='               <div class="col-lg-4">';
		// if(viewtype == 'Todo'){
		// 	tabDetail +='                   <label>Project Group</label>';
		// 	tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectGroupT" name="projectGroup">';

		// $.each(projectArray, function (key, value) {
		// 	tabDetail +='<option value="'+value.ID+'">'+value.type+'</option>';
		// });

		// 	tabDetail +='                   </select>';
		// }else{
		// 	tabDetail +='                   <label>Task Time Tracking</label>';
  //       	tabDetail += '<table style="width:100%;"><tr><td id="timer'+projectid+'" class="timer">00:00:00</td>';
  //       	tabDetail += '<td style="width:55px;">';
  //       	tabDetail += '<button type="button" onclick="starttimer(\'#timer'+projectid+'\', '+projectid+')" class="btn btn-info btn-flat btn-xs starttimer"><i class="fa fa-play"></i></button>';
  //       	tabDetail += '<button type="button" id="pushtimer'+projectid+'" onclick="pushtimer(0,0)" class="btn btn-danger btn-flat btn-xs pushtimer"><i class="fa fa-pause"></i></button>';
  //       	tabDetail += '</td><tr></table><span style="display:none;" id="hourtimer'+projectid+'"></span>';

		// }
		

		
		// tabDetail +='               </div>';
		tabDetail +='               <div class="col-lg-6">';
		tabDetail +='                   <label >Client</label>';
		//tabDetail +='                   <p id="projectCLientT" style="font-size: 15px;font-weight: bold;">'+taskdata.firstname+' '+taskdata.lastname+'</p>';

		tabDetail +='                   <select style="width: 100%;" class="select2 col-lg-4 proInputText" id="projectCLientT" name="projectCLient">';

			// $.each(client, function (key, value) {
			// 	tabDetail +='<option value="'+value.contactid+'">'+value.firstname+' '+value.lastname+'</option>';
			// });

		tabDetail +='                   </select>';

		tabDetail +='               </div><div class="col-lg-6">';
		tabDetail +='                   <label>Status</label>';
		tabDetail +='                   <select name="projectStatus" id="projectStatusT" style="width: 100%;margin-right: 0%;margin-left: 0px;" class="select2 col-lg-4 proInputText">';
		$.each(projectstatus, function (key, value) {
			tabDetail +='<option value="'+value.projectstatus+'">'+value.projectstatus+'</option>';
		});
		tabDetail +='                   </select>';
		tabDetail +='               </div>';
		tabDetail +='           </div>';
		tabDetail +='           <div style="    border-top: 1px solid #e0dddd;margin-top: 10%;">&nbsp;</div>';
		tabDetail +='           <div class="col-lg-12" style="margin-top: 1%;padding: 0% 5%;">';
		tabDetail +='               <a class="btn btn-default pull-right" href="javascript:void(0);" style="font-size:15px" id="saveTodoTask">Update</a>';
		tabDetail +='               <a onclick="qtipHideAll()" class="btn btn-default pull-right" href="javascript:void(0);" style="margin-right: 2%;font-size:15px">Cancel</a>';
		tabDetail +='           </div>';
		tabDetail +='           <input type="hidden" name="display_type" value="'+superviewtype+'">';
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
	
	// function tab1dataload(projectID){
	// 	$.ajax({
	// 		url : base_url+'projects/getNewProjectdetails',
	// 		type : 'POST',
	// 		data : {projectID:projectID},
	// 		success : function(data) {
	// 			console.log(data);
	
	// 			$("#projectDescription").val(data.detail[0].Description);
	// 			$("#projectStartdate"+projectID).val(data.detail[0].Startdate);
	// 			$("#projectDurationT").val(data.detail[0].Duration);
	// 			$("#projectendtDate"+projectID).val(data.detail[0].Enddate);
	
	// 			$('#projectGroup option[value="' + data.detail[0].HasGroup + '"]').prop("selected", "selected");
	// 			$('#projectCLient option[value="' + data.detail[0].HasClient + '"]').prop("selected", "selected");
	// 			$('#projectStatus option[value="' + data.detail[0].Status + '"]').prop("selected", "selected");
	// 		},
	// 		error: function (jqXHR, textStatus, errorThrown) {
	
	// 			console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
	// 		}
	// 	});
	// }
	
	function qtipAssignHover(element,todo_serial){
		
		//console.log(element);
		
		//var todo_serial=data.Id;
		
		$(element).qtip({
			show: {
				solo: true,
				ready:true
				
			},
			hide: 'click mouseout',
			content: {
				text: '<div class="assign-title">Members:</div><ul style="max-height: 500px;overflow: auto;"></ul>'
				
			},
			
			position: {
				at: 'bottom center',  
				my: 'top center', 
				viewport: $(window)
				
			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-font',
				width: '300',
				//height:'300'
			},
			
			
			events: {
				hide: function (event, api) {
					
					$(this).qtip('destroy');
					$( 'body').unbind( "keydown.qtipAssignHover" );
					
				},
				render: function(event, api) {
					
					$('body').on('keydown.qtipAssignHover', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				},
				show: function(event, api) {
					
					//console.log("This is inside qtip");
					var _this=this;
					
					var requestass = $.ajax({
						url: base_url+"todo/getTodoAssigneeHD",
						method: 'POST',
						data: {
							"todo_serial":todo_serial
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){
						
						//console.log(response);
						$(_this).find('ul').empty();
						
						$.each(response.tags_member,function(i,el){
							$(_this).find('ul').append('<li>'+el.display_name+'</li>');
						});
						
						
					});
				},
				
			}
		});

		//$(element).qtip('show');
		
	}
	
	function qtipPriorityHover(element,todo_serial){
		//var todo_serial=data.Id;
		$(element).qtip({
			show: {
				solo: true,
				ready:true
			},
			hide: 'click mouseout',
			content: {
				text: ''
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
			events: {
				hide: function (event, api) {
					
					$(this).qtip('destroy');
					$( 'body').unbind( "keydown.qtipPriorityHover" );
					
				},
				render: function(event, api) {
					
					$('body').on('keydown.qtipPriorityHover', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				},
				show: function(event, api) {
					
					var _this=this;
					
					var requestass = $.ajax({
						url: base_url+"todo/getMyTodosByID",
						method: 'POST',
						data: {
							"todo_serial":todo_serial,
							"viewtype":"Todo"
							
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){
						//console.log('qtipPriorityHover');console.log(response);

						
						api.set('content.text', '<p><b>Priority: </b><span id="hover_priority'+todo_serial+'">'+response.all_todos[0].Priority +'</span></p>');
						
						
					});
				},
				
			}
			
			
		});
		//$(element).qtip('show');
	}
	
	function qtipDescriptionHover(element,todo_serial){

		$(element).qtip({
			show: {
				//solo: true,
				ready:true
			},
			hide: 'click mouseout',
			content: {
				text: ''
				
			},
			
			position: {
				at: 'bottom left',  
				my: 'top left', 
				viewport: $(window),
				adjust: {
						method: 'none shift'
					},
				
			},
			style: {
				classes: 'qtip-light qtip-rounded todo-desc',
				width: '300'
			},
			events: {
				render: function(event, api) {
					
					$('body').on('keydown.qtipDescriptionHover', function(event) {
						if(event.keyCode === 27) {
							api.hide(event);
						}
					});
				},
				show: function(event, api) {
					
					var _this=this;
					
					var requestass = $.ajax({
						url: base_url+"todo/getMyTodosByID",
						method: 'POST',
						data: {
							"todo_serial":todo_serial,
							"viewtype":"Todo"
							
						},
						dataType: 'JSON'
					});
					
					requestass.done(function(response){
						
						var qtc='<p><b>'+response.all_todos[0].Title +'</b></p>';
		
						if(response.all_todos[0]){
							qtc+='<p class="todo-desc-text"><i>'+response.all_todos[0].Description +'</i></p>';
						}
						api.set('content.text', qtc);
						
						
					});
				},
				hide: function (event, api) {
					
					$(this).qtip('destroy');
					$( 'body').unbind( "keydown.qtipDescriptionHover" );
					
				},
			}
			
		});
		//$(element).qtip('show');
	}
	
	function setProjecttag(data,tagDivID){
		// console.log(data.tag);
		// console.log(tagDivID);
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
		
		//if($('.todoRow'+serial).attr('data-access')=="write"){
		
		$(e.currentTarget).attr('contenteditable','true').addClass('single-line');
		$(".task-properties .fa-pencil").hide();
		$(e.currentTarget).focus();
		$(e.currentTarget).css('text-overflow','initial');
		//}
	});

	

	$(document).on('click','.task-properties',function(e){
		$(".task-properties .fa-pencil").hide();
		$(e.currentTarget).attr('contenteditable','true').addClass('single-line');
		$(e.currentTarget).focus();
		$(e.currentTarget).css('text-overflow','initial');
		$("#chkforStory").val('Project');
	});

	function saveTitleWithStory(serial,e,storyChk){
        var request = $.ajax({
            url: base_url+"todo/updateTodoNameWithStory",
            method: 'POST',
            data: {
                "todoname": $(e.currentTarget).text(),
                "todoserial": serial,
                "storyChk": storyChk,
            },
            dataType: 'JSON'
        });
        
        request.done(function(response){
			
			
		});

		request.fail(function(rsp) {
            console.log(rsp);
          });
    }

	function saveTodoText(serial,e){
		var request = $.ajax({
			url: base_url+"todo/updateTodoNameHD",
			method: 'POST',
			data: {
				"todoname": $(e.currentTarget).text(),
				"todoserial": serial,
			},
			dataType: 'JSON'
		});
		
		request.done(function(response){
			
			$(e.currentTarget).css('text-overflow','ellipsis').removeClass('single-line');
			$(".task-properties .fa-pencil").show();
			$('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');
			$("#taskdestext"+serial).text($(e.currentTarget).text());
			$("#subtasktitle"+serial).text($(e.currentTarget).text());
			
			$('.dropdown-change-view').find('.active').click();
			
		});
	}
	
	$(document).on('blur','.todo-text-prop',function(e){
		console.log("Hello");
		console.log($(e.currentTarget).text());
		console.log($("#chkforStory").val());

		var serial = $(e.currentTarget).closest('.backDiv').attr('data-serial');
		if($(e.currentTarget).text() !=""){
			if($("#chkforStory").val() == 'Task' || $("#chkforStory").val() == 'SubTask'){
                //console.log("Hello");
                saveTitleWithStory(serial,e,$("#chkforStory").val());
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('single-line');
	            $(".task-properties .fa-pencil").show();
	            $('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');
	            $("#taskdestext"+serial).text($(e.currentTarget).text());
	            $("#subtasktitle"+serial).text($(e.currentTarget).text());
            }else{
               saveTodoText(serial,e);
            }
		}
	});
	
	$(document).on('keydown','.todo-text-prop',function(e){
		var serial = $(e.currentTarget).closest('.backDiv').attr('data-serial');
		if (e.keyCode == 13) {
			e.preventDefault();
			$(e.currentTarget).blur();
			saveTodoText(serial,e);
		}
		
	});

	$(document).on('blur','.task-properties',function(e){
		
		var serial= (e.currentTarget.id.match(/\d+/)[0]);
		if($(e.currentTarget).text() !=""){
			if($("#chkforStory").val() == 'Task' || $("#chkforStory").val() == 'SubTask' || $("#chkforStory").val() == 'Project'){
                saveTitleWithStory(serial,e,$("#chkforStory").val());
                $(e.currentTarget).css('text-overflow','ellipsis').removeClass('single-line');
	            $(".task-properties .fa-pencil").show();
	            $('.todoRow'+serial).find('.todo-text').hide().text($(e.currentTarget).text()).show('slow');
	            $("#taskdestext"+serial).text($(e.currentTarget).text());
	            $("#subtasktitle"+serial).text($(e.currentTarget).text());
                
            }else{
               saveTodoText(serial,e);
            }
		}
	});
	
	$(document).on('keydown','.task-properties',function(e){
		if (e.keyCode == 13) {
			e.preventDefault();
			$(e.currentTarget).blur();
			// saveTodoText(serial,e);
		}
		
	});
	
	$(document).on('change keyup mousewheel','#projectDurationT',function(e){
		
		var serial=$(e.currentTarget).closest('.backDiv').attr('data-serial');
		var sel_date=moment($('#projectstartDate'+serial).val()).add($(e.currentTarget).val(), 'days').format('MMM-DD-YYYY HH:mm:ss');
		$('#projectendtDate'+serial).val(sel_date);
		
		flatpick_end.setDate(sel_date);
		
	});
	
	$(document).on('click','#projectDurationT,.duarationClass',function(e){
		if(!$("#hideMSpan"+e.currentTarget.id).hasClass('Onlieline2')){
            $(e.currentTarget).select();
			$("#hideMSpan"+e.currentTarget.id).addClass('Onlieline2');
			$("#hideMSpan"+e.currentTarget.id).css('font-size','16px');
	        $("#hideMSpan"+e.currentTarget.id).css('text-overflow','initial');
	        //$('body').append('<div class="backDivPro"></div>');
	        $(".ass"+e.currentTarget.id).focus(); 
	        // $("#"+e.currentTarget.id).css('border','1px solid #000000'); 
	        // $("#"+e.currentTarget.id).css('padding-left','5px');   
	        // $("#"+e.currentTarget.id).css('width','30%'); 
		} 
	});

	$(document).on('click','.pointer',function(e){
		console.log(e.target.id);
		$("."+e.target.id).focus();  
		$("."+e.target.id).select();  
	});

	// $("body").on("blur",".duarationClass",function(e){
	// 	$("#"+e.currentTarget.id).css('border','0px solid #000000'); 
 //        $("#"+e.currentTarget.id).css('padding-left','0px'); 
 //        $("#"+e.currentTarget.id).css('width','10%');
	// })

	
	
	
	
	
	function qtipDueCalendar(element,data){
		if($(element).qtip('api') == undefined){
		var todo_serial=data.Id;
		var duedate=data.Enddate;
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
		+'<button type="button" onclick="removeAlarmPr15(this)" class="btn btn-picker-remove">Remove</button>'
		+'</div>'
		+'<div class="col-lg-6 col-sm-6 col-md-6">'
		+'<button type="button" onclick="gotoCalendaralarm('+todo_serial+',this)" class="btn btn-picker-add">Add</button>'
		
		+'</div>'
		+'</div>'
		+'</div>'
		
		+'</div>' // end .alarmpickerDiv
		+'</div>' // end .date-alarm-picker
		
		+'</div>';
		
		$(element).qtip({
			
			show: {
				//event: 'click',
				ready:true,
				solo: true
				// effect: function(offset) {
				// 	$(this).slideDown(100); // "this" refers to the tooltip
				// }
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
						method: 'none shift'
					},
				
			},
			style: {
				classes: 'qtip-light qtip-rounded qtip-time',
				width: '510'
			},
			
			events: {
				hide: function (event, api) {
					$(this).qtip('destroy');
					$( 'body').unbind( "keydown.qtipDueCalendar" );
					load_todos(false,$('#DueDateOrder').text());
				},
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
								url: base_url+"todo/updateTodoDueHD",
								method: 'POST',
								data: {
									"due_date":moment(selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'),
									"cal_id":cal_serial
									
								},
								//dataType: 'JSON'
							});
							
							request.done(function(response){
								$('.dd_duedate_text_'+cal_serial).html("Due: "+sel_date);
								
								
							});
							
						}
					});
					
					// $(this).find('.flatpickr').next().addClass('dateIsPicked').removeClass('arrowTop');

					$('.flatpickr-calendar').addClass('dateIsPicked').removeClass('arrowTop');
					
				},

				
			}
		});
	}
	}
	
	$('body').delegate('#saveTodoTask', 'click',function(e) {
		
		var newTaskInput = $("#newTaskInput").attr('data-projectid');
		var serial=$(e.currentTarget).closest('.backDiv').attr('data-serial');
		var formData = new FormData(document.getElementsByName('projectdrawing')[0]);
		
		//console.log(formData);
		
		formData.append('newstartdate', moment(flatpick_start.selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
		formData.append('newenddate', moment(flatpick_end.selectedDates[0]).format('YYYY-MM-DD HH:mm:ss'));
			
			for (var pair of formData.entries())
            {
             //console.log(pair[0]+ ', '+ pair[1]); 
            }

		$.ajax({
			url: base_url+'todo/saveTodoSet',
			type: 'POST',
			data: formData,
			dataType: "JSON",
			processData: false,
			contentType: false,
			beforeSend: function (jqXHR, textStatus, errorThrown) {
				//abortAjax(jqXHR);
			},
			success: function (data_st, textStatus) {
				// console.log(data_st);
				// console.log(newTaskInput);
				if(data_st.newid > 0){
					setCookie('selectedTask',serial,1);
					
					$('.link_status_text'+serial).attr('data-status',$('#projectStatus').val());
					
					var status="NO"; 
					if($('#projectStatus').val()=='completed') 
					status="YES";
					
					//change_completeStatus(serial,status);
					
					$('*').qtip('hide');
					
					swal("Done!!!", "Successfully saved", "success");
					
					var prjID = $("#newTaskInput").attr("data-projectid");
					
					if(prjID != undefined){
						$("#clickDiv"+prjID).trigger('click');
						}else{
						
						load_todos(false,$('#DueDateOrder').text());
					}
					
				}
				
			},
			error: function (jqXHR, textStatus, errorThrown) {
				// Some code to debbug e.g.:               
				console.log(jqXHR);
				console.log(textStatus);
				console.log(errorThrown);
			}
		});
		
	});

	function undorDelete(serial,user_id){
		var request = $.ajax({
				url: base_url+"projects/undoEntry",
				method: 'POST',
				data: {
					user_id: user_id,
					serial:serial
				},
				//dataType: 'JSON'
			});
			request.done(function(response){
				
				if(response.msg == 'Fail'){
                    swal({
                        title: 'Unable to Undo',
                        text: "Please contact with project creator",
                        type: 'info'
                    });
                }else{
                	$("#myProjectDiv").html("");
                    $("#sharedProject").html("");
                    $("#myProjectImported").html("");
                    getAllProject();
				}
			});
			request.fail(function(response){
				console.log(response);
			});
	}

	function fun_project(serial,viewtype){
		var notifationArray = [];
		var countImp = 0;
		
		swal({
			title: 'Are you sure?',
			//text: "This to-do will be deleted permanently!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(function () {
		
			var request = $.ajax({
				url: base_url+"projects/delEntry",
				method: 'POST',
				data: {
					user_id: user_id,
					serial:serial
				},
				//dataType: 'JSON'
			});
			request.done(function(response){
				
				if(response.msg == 'Fail'){
                    swal({
                        title: 'Unable to delete',
                        text: "Please contact with project creator",
                        type: 'info'
                    });
                }else{

					toastr.options.timeOut = 10000; // 1.5s
			        toastr.options.positionClass = 'toast-bottom-left'; // 1.5s
			        toastr['warning']('<div>This '+viewtype+' deleted permanently. <span style="font-weight: bold; cursor: pointer;text-decoration: underline;" onclick="undorDelete('+serial+')">Undo</span></div>');

					if(viewtype == 'Project'){

						$("#leftProjectList"+serial).remove();
						$('.notifation').each(function(k,v){
			                notifationArray.push($(v).context.id);
			            });

			            if(notifationArray.length > 0){
			            	$('#clickDiv'+serial).slideUp(300, function(){ $(this).remove();});
							$("#"+notifationArray[1]).trigger('click');
			            }

			            $('.importCount').each(function(k,v){
			                countImp++;
			            });
			            //alert(countImp);
			            if(countImp == 1){
			            	$("#importedSection").remove();
			            }

					}else{
						$('.ribLi1').trigger('click');
						$('.cusmar').show();
					}
						

					$('#qtip-overlay').remove();
					$('.taskserial'+serial).slideUp(300, function(){ $(this).remove();}); 
					
					$('.qtip').hide();
					
				}
			});
			request.fail(function(response){
				console.log(response);
			});
		});
	}
	
	function fun_delTodo(serial,viewtype){
		var notifationArray = [];
		var countImp = 0;
		
		swal({
			title: 'Are you sure?',
			
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then(function () {
			
			var request = $.ajax({
				url: base_url+"todo/delCalendarEntry",
				method: 'POST',
				data: {
					user_id: user_id,
					serial:serial
				},
			});
			request.done(function(response){
				
				if(response.msg == 'Fail'){
					swal({
						title: 'Unable to delete',
						text: "Please contact with project creator",
						type: 'info'
					});
				}else{

					if(viewtype==2){
						$('.todoRow'+serial).slideUp(300, function(){ $(this).remove();});
						load_todos(false,$('#DueDateOrder').text());
					} 
					else if(viewtype == 3){
						$('#subtaskDetailDive'+serial).slideUp(300, function(){ $(this).remove();});
						$('#qtip-overlay').remove();
						fun_loadfulltable($("#newTaskInput").attr('data-projectid'),'ASC','All');
					}else{

						if(viewtype == 'Project'){

							$("#leftProjectList"+serial).remove();
							$('.notifation').each(function(k,v){
								notifationArray.push($(v).context.id);
							});

							if(notifationArray.length > 0){
								$('#clickDiv'+serial).slideUp(300, function(){ $(this).remove();});
								$("#"+notifationArray[1]).trigger('click');
							}

							$('.importCount').each(function(k,v){
								countImp++;
							});
							//alert(countImp);
							if(countImp == 1){
								$("#importedSection").remove();
							}
						}
						$('#qtip-overlay').remove();
						$('.taskserial'+serial).slideUp(300, function(){ $(this).remove();});
						
					} 
					
					$('.qtip').hide();
				}
			});
			request.fail(function(response){
				console.log(response);
			});
		});
	}
	
	function qtipAttachTodo(element,tododata){
		
		if($(element).qtip('api')==undefined){
			qtipHideAll();
			var projectID=tododata.HasParentId;
			var taskid=tododata.Id;
			var todoname=tododata.Title;
			var creator_name=tododata.creator_name;
			var CreatedDate=tododata.CreatedDate;
			var attr='attach';
			
			$(element).qtip({
				show: {
					ready: true,
					modal: true,
					//delay:100
					//solo: true
				},
				hide: 'click unfocus',
				content: {
					text: 'Loading...'
					
				},
				events: {
					hide: function (event, api) {
						// console.log('event');
						// console.log(event);
						var oEvent = event.originalEvent;
						// console.log('oEvent');
						// console.log(oEvent);
						// console.log($(oEvent.target).closest('.ekko-lightbox'));
						// if(oEvent && $(oEvent.target).closest('.ekko-lightbox').length) {
						// 	event.preventDefault();
						// 	console.log('preventDefault');
							
						// 	}else 
							if(oEvent && $(oEvent.target).closest('.swal2-container').length) {
							event.preventDefault();
							
							}else{
							$(this).qtip('destroy');
							$( 'body').unbind( "keydown.qtipAttachTodo" );

						}

					},
					show: function(event, api) {
						
						$('body').bind('keydown.qtipAttachTodo', function(e) {
							if(e.keyCode === 27) { api.hide(e); }
						});

						var floatingDiv =  ' <div class="" data-attr="'+attr+taskid+'" id="backDiv'+attr+taskid+'"><div id="Pro'+taskid+'" class="">';
						floatingDiv += '    <div class="panel panel-default" style="border: none;">';
						floatingDiv += '        <div class="panel-heading" style="height:60px;background: #eeeeee">';
						floatingDiv += '            <span class="col-lg-11 proDivname" style="margin-top:0px">';
						floatingDiv += '                <span class="todo-text-prop">'+todoname+'</span>';
						floatingDiv += '                <span class="todo-createdby">Created By: '+creator_name+' On: '+moment(tododata.CreatedDate).format('MMM-DD-YYYY HH:mm:ss')+'</span>';
						floatingDiv += '            </span>';
						floatingDiv += '            <a onClick="qtipHideAll()" class="col-lg-1 proClBtn"><i class="fa fa-times"></i></a>';
						floatingDiv += '        </div>';
						floatingDiv += '        <div class="panel-body">'+projectAttachDesign(taskid,"TodoFiles",$(element).attr('data-now'))+'</div>';
						floatingDiv += '     </div>';
						floatingDiv += ' </div></div>';
						floatingDiv += ' <input type="hidden" id="newTaskInput" data-projectid="'+taskid+'" class="form-control border-rad">';
						
						attachdataload('Todo',taskid,0,'TodoFolder','TodoFiles');
						
						api.set('content.text', floatingDiv);
						updateNotyFilehd(taskid,'reset');
						$('.file-badge'+taskid).text('');
						$('.file-badge'+taskid).next().removeClass('active-icon');
						
					},
					
				},
				position: {
					
					my: 'right center', 
					at: 'left center',  
					viewport: $(window),
					adjust: {
						method: 'none shift'
					},
					effect: false
					
					
				},
				style: {
					classes: 'qtip-light qtip-attach',
					width: '800',
					tip: {
						corner: true,
						width: 40,
						height: 40,
						//offset: -220
					}
				},
				
				
			});
		}
			
	}
	
	function sendEmoComment(emoImg){
		var path = base_url+"asset/emotion";
		var fulPathEmoImg = '<img class="emo" alt="' + emoImg + '" src="' + path + "/" + emoImg + '" style="width:22px; height:22px;" />';
		if($("#commentinput-com").html() == "Send message...")
		$("#commentinput-com").html(fulPathEmoImg);
		else
		$("#commentinput-com").html($("#commentinput-com").html() + fulPathEmoImg);
	}
	
	$("body").on("keydown",".commentinput-com",function(e){
		
		if(e.originalEvent.keyCode == 13){
			//var valuee = $("#commentinput-com").val();	
			var valuee = $(".commentinput-com").html();
			$("#hidmsg-com").val(valuee);
			var projectID = $("#newTaskInput").attr('data-projectid');	
			;
			
			$.ajax({
				url : '<?php echo base_url();?>projects/insertCmnt',
				type : 'POST',
				data : {comment:valuee,projectID:projectID,type:'Todo'},
				dataType:'JSON',
				success : function(updated_id) {
					// new
					var projectsid=updated_id.activityid;
					var tabDetail ='';
					var gtlist = $(".commentgt");
					$.each(gtlist, function(k,v){
						if(($(v).text().trim()).indexOf("Today") > -1){
							tabDetail = "alreadytoday";
							return false;
						}
					});
					if(tabDetail == "alreadytoday")
					tabDetail = "";
					else
					tabDetail = drawCommentGroupTime($.now());
					tabDetail +='		<div class="panel panel-default proComm">';
					tabDetail +='			<div class="panel-body status">';
					tabDetail +='				<div class="who clearfix">';
					tabDetail +='					<span class="comment_imghover">';
					tabDetail +='						<img src="'+base_url+'asset/img/avatars/'+user_img+'" alt="img" class="comment-img">';
					tabDetail +='						<div class="show_user_details">'+userName+'<br>'+moment().format('lll')+'</div>';
					tabDetail +='					</span>';
					tabDetail +='					<div class="name dropdown"><b></b><a data-toggle="dropdown" class="dropdown-toggle" title="Settings"><i class="fa fa-chevron-down pull-right"></i></a><ul class="dropdown-menu pull-right"><div class="arrow-top-right"></div><li><a onclick="">Msg Info</a></li><li><a onclick="">Clear</a></li><li><a onclick="">Forward</a></li></ul><i class="fa fa-star-o pull-right" onclick=""></i></div>';
					tabDetail +='					<span  class="from">'+valuee+'</span>';
					tabDetail +='				</div>';
					tabDetail +='			</div>';
					tabDetail +='		</div>';
					
					$("#attachListDivCommnet").append(tabDetail);
					$("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
					$(".commentinput-com").html("");
					updateNotyCommenthd(projectID,'update');
					
				},
				error: function (e) {
					console.log("Line 2580");
					console.log(e.responseText);
				}
			});
			
			
		}
	});
	
	/* clear all messages */
	function clearrecent(projectsid){
		swal({
			title: "Are you sure?",
			text: "All comments will be deleted permanently ???",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Yes, delete it!",
			cancelButtonText: "No, cancel plx!",
			closeOnConfirm: false,
			closeOnCancel: false
			}).then(function(isConfirm){
			if (isConfirm) {
				var listofmsgid = [];
				
				var request = $.ajax({
					url: "<?php echo site_url("todo/deleteMsg"); ?>",
					method: "POST",
					data: { projectsid : projectsid },
					dataType: "json"
				});
				request.done(function(res){
					if(res){
						swal("Deleted!", "All comments delete successfully.", "success");
					}
				});
				request.fail(function(){
					console.log("error in clearrecent");
				});
				// swal("Deleted!", "All messages delete successfully.", "success");
			}
		});
	}
	
	function makeStarCom(docid,status){
		var newStatus='';
		
		if(status == 1){
			newStatus = 0; 
			var src = base_url+'icons/Star.png';    
            }else{
			newStatus = 1;
			src = base_url+'icons/YStar.png';
		}
		
		var request = $.ajax({
			url: '<?php echo site_url('todo/makeStarCom'); ?>',
			method: "POST",
			data: {
				docid:docid,
				status:newStatus
			},
			//async: false,
			dataType: "json"
		});
		request.done(function( data ) {
			
			// console.log(data);
			// console.log(newStatus);
			$("#fileWholeDiv007"+docid).removeClass(status).addClass(newStatus);
			$("#MakeStatus007"+docid).data('status',newStatus);
			$("#MakeStatus007"+docid).attr('src',src);
			
			
			
		});
		
		request.fail(function( jqXHR, textStatus ) {
			console.log('jqXHR');
			console.log(jqXHR);
			console.log(textStatus);
		});
		
		
	}
	
	function updateNotyCommenthd(taskid,status){
		
		var request = $.ajax({
			
			url: base_url+"todo/updateNotyCommenthd",
			method: 'POST',
			
			data: {
				"taskid": taskid,
				"status":status
				
			},
			//dataType: 'JSON'
		});
		
		request.fail(function(response){
			console.log(response);
		});
	}
	
	function updateNotyFilehd(taskid,status){
		
		var request = $.ajax({
			
			url: base_url+"todo/updateNotyFilehd",
			method: 'POST',
			
			data: {
				"taskid": taskid,
				"status":status
				
			},
			//dataType: 'JSON'
		});
		
		
	}
	
	
	function convert2Task(todo_id,pro_id){
		
		var request = $.ajax({
			
			url: base_url+"todo/convert2TaskHD",
			method: 'POST',
			
			data: {
				"taskName": $('#todo_name_text'+todo_id).text(),
				"pid":pro_id,
				"todo_id":todo_id,
				"newType":'Task'
				
			},
			//dataType: 'JSON'
		});
		
		request.done(function( rsp ) {
			
			load_todos(false,$('#DueDateOrder').text());
			$('.dropdown-change-view').find('.active').click();
			$('*').qtip('hide');
			$('.todoRow'+todo_id).remove();
			
			swal({
				title: 'Conversion',
				text: "Selected To-Do has been converted to task!",
				type: 'warning',
				
			});
			
			
		});
		
		
	}
	
	function removeAlarmPr15(element){
		$(element).closest('.dd-parent').find('.chk-alarm').prop('checked',false);
	}
	
	$(document).on('change',"#upload-com", function() {
		
		var formData = new FormData();
		formData.append('fileinput[]', $('#upload-com')[0].files[0]);
		var projectID = $("#newTaskInput").attr('data-projectid');
		formData.append('projectID', projectID);
		
		var request = $.ajax({
			url: "<?php echo site_url("todo/newMsgFile"); ?>",
			method: "POST",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: "json"
		});
		request.done(function( rsp ) {
			updateNotyCommenthd(projectID,'update');
			// if(rsp.length>0){
			// 	var target = $("div[id^=ekkoLightbox]");
			// 	var targetid = $(target).attr("id");
			// 	$("#"+targetid+" .close").trigger("click");
			
			//              $("#msg").val("");
			//              $.each(rsp, function(keyId, keyValue){
			//                  if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
			//                      globalMsgArray.push((keyValue.msgid).toString());
			//                      if(keyValue.type == 'right')
			//                          drawSendMsg(keyValue.time, keyValue.msg,keyValue.msgid, keyValue.msgtype);
			//                  }
			//              });
			//              $('.fixedContent').scrollTop($('#cstream').height());
			//              $('#msenger textarea').val('');
			// 	$('#msenger textarea').focus();
			//          }					
		});
		
		request.fail(function( jqXHR, textStatus ) {
			console.log('jqXHR');
			console.log(jqXHR);
			console.log(textStatus);
		});
		
	});
	
	
	
	function change_completeStatus(serial,status){
		qtipHideAll();
		var requestass = $.ajax({
			url: base_url+"todo/updateCompleteStatusHD",
			method: 'POST',
			data: {
				"serial":serial,
				"status":status
			},
			dataType: 'JSON'
		});
		
		requestass.done(function(response){
			if(response){
				if(status=="YES"){
					$('.link_status_text'+serial).text('completed');
					$('.todoRow'+serial).find('.chk-complete').iCheck('check');
				}
				
				else{
					$('.link_status_text'+serial).text($('.link_status_text'+serial).attr('data-status'));
					$('.todoRow'+serial).find('.chk-complete').iCheck('uncheck');
				}
				
				$('.dropdown-change-view').find('.active').click();
			}
			
			
		});
		
	}
	
	function attachdataload(parentType,projectID,parentID,rootFolder,downloadFolder){
		
		// console.log('attachdataloading...................');
		// console.log(parentType);
		// console.log(projectID);
		// console.log(parentID);
		// console.log(rootFolder);
		// console.log(downloadFolder);

		$.ajax({
			url : '<?php echo base_url(); ?>projects/getAllAttachData',
			type : 'POST',
			data : {
				parentType:parentType,
				parentID:projectID,
				parentFolder:rootFolder,
				rootID:parentID
				
			},
			success : function(data) {
				// console.log('attachdataload');
				console.log(data);
				if (data.allFiles.length > 0) {
					$.each(data.allFiles, function (key, value) {
						
						if(data.allFiles[key].LastUpdate != ''){
							var now  = moment().format('YYYY-MM-DD HH:mm:ss');
							var then = data.allFiles[key].LastUpdate;
							var ms = moment(now).diff(moment(then));
							var min = msToTime(ms);
						}
						
						var res = data.allFiles[key].name.split("_");
						var filter = data.allFiles[key].name.split(".");
						
						
						if(data.allFiles[key].HasStar == 'YES'){
							var icon = base_url+'icons/YStar.png';
							}else{
							icon = base_url+'icons/Star.png';
						}
						
						if(min<120){
							var RM = "RMY"
							}else{
							RM = "RMN"
						}
						
						tabDetail ='       <div data-type="'+filter[1].toUpperCase()+'" class="col-lg-12 div-file SA '+RM+' '+filter[1].toUpperCase()+' '+data.allFiles[key].HasStar+'" id="fileWholeDiv007'+data.allFiles[key].id+'" style="width: 96%;border-bottom: 1px solid #e5e5e5;padding: 0;margin: 2%;padding-bottom: 4px;">';
						tabDetail +='           <div class="col-lg-5"><img class="" src="'+base_url+'icons/attachIcon.png"> <a class="downloadHover" href="<?php echo base_url() ?>'+downloadFolder+'/'+data.parentfolder[0].name+'/'+data.allFiles[key].name+'" download><span style="font-size: 15px;" id="fileoriname007'+data.allFiles[key].id+'">'+data.allFiles[key].original_name+'</span></a></div>';
						tabDetail +='           <div class="col-lg-3 attachMid" style="margin-top: -7px;">';
						tabDetail +='               <img class="icon-todo-menu" id="MakeStatus007'+data.allFiles[key].id+'" onclick="makeStar($(this).data(\'docid\'),$(this).data(\'status\'))" data-docid="'+data.allFiles[key].id+'" data-status="'+data.allFiles[key].HasStar+'" src="'+icon+'">';
						tabDetail +='               <img class="icon-todo-menu" src="'+base_url+'asset/img/icons/share.png" onClick="userListShowOnlick(this,' + projectID + ')" >';
						tabDetail +='               <img class="icon-todo-menu  dropdown-toggle" data-toggle="dropdown" src="'+base_url+'icons/Details_Properties.png">';
						tabDetail += '              <ul class="dropdown-menu attachMidPro" id="taggedUserlist">';
						tabDetail += '                  <div class="arrow-top-right"></div>';
						tabDetail += '                  <li onclick="showDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+data.allFiles[key].original_name+'" data-filesize="'+data.allFiles[key].size+'" data-createby="'+res[0]+'" data-createdate="'+data.allFiles[key].create_date+'"> <i class="fa fa-info"></i> Details</li>';
						tabDetail += '                  <li id="onclkid007'+data.allFiles[key].id+'" onclick="renameDetail($(this).data(\'filename\'),$(this).data(\'filesize\'),$(this).data(\'createby\'),$(this).data(\'createdate\'));" data-filename="'+data.allFiles[key].original_name+'" data-filesize="'+data.allFiles[key].size+'" data-createby="'+res[0]+'" data-createdate="'+data.allFiles[key].id+'"> <i class="fa fa-pencil"></i> Rename</li>';
						tabDetail += '                  <a class="downloadHover" href="<?php echo base_url() ?>'+downloadFolder+'/'+data.parentfolder[0].name+'/'+data.allFiles[key].name+'" download><li> <i class="fa fa-download"></i> Download</li></a>';
						tabDetail += '                  <li onclick="deleteFile($(this).data(\'createdate\'));" data-createdate="'+data.allFiles[key].id+'"> <i class="fa fa-trash-o"></i> Delete</li>';
						tabDetail += '              </ul>';
						tabDetail +='           </div>';
						tabDetail +='           <div class="col-lg-4"><span class="pull-left" style="color: #c5c5c5;font-size: 15px;">'+data.allFiles[key].size+' KB</span><span style="color: #c5c5c5;font-size: 15px;" class="pull-right">'+moment(data.allFiles[key].create_date).toNow(true)+' ago</span></div>';
						tabDetail +='       </div>';
						
						$("#attachListDiv").append(tabDetail);
						$('.FILETYPEDYN').remove();

						$('.div-file').each(function(i,val){
							var filetype = $(val).attr('data-type');
							if($('.MAIN.'+filetype).length == 0){
								$('.filterUpdate').append('<li class="FILETYPEDYN" onclick="filter(\''+filetype+'\')"><a href="javascript:void(0);"><i class="fa fa-circle-o MAIN '+filetype+'" id="'+filetype+'"></i> '+filetype+'</a></li>');
							}
							
						});

					});
				}else{
					
					$(".projectfilefDiv").css('display','none');
					$("#btop").css('display','none');

		            tabDetail = '          <button onclick="$(\'#fileinputAttach\').trigger(\'click\');" class="css3button"> Add Files</button><img src="'+base_url+'icons/nofile.png" id="nofileImg" class="nofileImg">';
		            $("#attachListDiv").append(tabDetail);
		        }
			},
			error: function (jqXHR, textStatus, errorThrown) {
				
				console.log(jqXHR);console.log(textStatus);console.log(errorThrown);
			}
		});
	}
	
	function change_projectstatus(status,serial,el){
		//if($('.link_status_text'+serial).attr('data-type')=="administrative"){
		
		var requestass = $.ajax({
			url: base_url+"todo/updateTodoStatusHD",
			method: 'POST',
			data: {
				"serial":serial,
				"status":status
				
			},
			//dataType: 'JSON'
		});
		
		requestass.done(function(response){
			
			setCookie('selectedTask',serial,1);

			if(status=='completed'){
				$('.todoRow'+serial).find('.chk-complete').iCheck('check');
				$('#iconGray'+serial).css('display','none');
				$('#iconGreen'+serial).css('display','block');

				$('.icon-check[data-serial="'+serial+'"]').attr('data-status','completed');

			
			}else if(status=='canceled'){
				$("#subtasktitle"+serial).html("<del>"+$("#subtasktitle"+serial).text()+"</del>");
				$("#tasktext"+serial).html("<del>"+$("#tasktext"+serial).text()+"</del>");
				$("#tasktext"+serial).css('color','RED');
				$("#subtasktitle"+serial).css('color','RED');
				$('#iconGray'+serial).css('display','block');
				$('#iconGreen'+serial).css('display','none');

				$('.icon-check[data-serial="'+serial+'"]').attr('data-status','canceled');

			}else{
				$("#subtasktitle"+serial).html($("#subtasktitle"+serial).text());
				$("#tasktext"+serial).html($("#tasktext"+serial).text());
				$("#tasktext"+serial).css('color','#0c0404');
				$("#subtasktitle"+serial).css('color','#0c0404');
				$('.todoRow'+serial).find('.chk-complete').iCheck('uncheck');
				$('#iconGray'+serial).css('display','block');
				$('#iconGreen'+serial).css('display','none');

				$('.icon-check[data-serial="'+serial+'"]').attr('data-status',status);


			}

			if(status == 'none'){
                $("#openstatus"+serial).css('color','RED');
                //$("#openstatus"+serial).text('[none]');
                status = '[none]';
            }else if(status == 'in progress'){
                $("#openstatus"+serial).css('color','BLUE');
            }else if(status == 'completed'){
                $("#openstatus"+serial).css('color','GREEN');
            }else if(status == 'on hold'){
                $("#openstatus"+serial).css('color','RED');
            }else if(status == 'waiting for feedback'){
                $("#openstatus"+serial).css('color','ORANGE');
            }else if(status == 'canceled'){
                $("#openstatus"+serial).css('color','RED');
            }else{
            	$("#openstatus"+serial).css('color','#6EA7F2');
            }

			$('.link_status_text'+serial).html(status).attr('data-status',status);
			$("#openstatus"+serial).text(status).attr('data-status',status);
			$(el).closest('.qtip-content').find('.li-status').removeClass('active');
			$(el).addClass('active');
			$('.qtip').qtip('hide');
			
		});
		// }else{
		// 	$('*').qtip('hide');
		// 	swal(
		// 	  'Access Denied !',
		// 	  'You cannot change this...',
		// 	  'error'
		// 	)
		// }
	}

	function changePriority(priority,serial,element){

		var request = $.ajax({
			url: base_url+"todo/updateTodoPriorityHD",
			method: 'POST',
			data:{
				priority:priority,
				serial:serial
			},
			//dataType: 'JSON'
		});
		request.done(function(response){
			// console.log('getUserTodo');
			// console.log(response);

			$(element).closest('.qtip-content').find('.li-prio').removeClass('active');
			$(element).addClass('active');
			$('#hover_priority'+serial).text(priority);

			if(priority=="Low") $('.dt-priority[data-serial="'+serial+'"] img').attr('class','icon-todo-menu active-icon-low');
			if(priority=="Medium") $('.dt-priority[data-serial="'+serial+'"] img').attr('class','icon-todo-menu active-icon-medium');
			if(priority=="High") $('.dt-priority[data-serial="'+serial+'"] img').attr('class','icon-todo-menu active-icon-high');
			//$('*').qtip('hide');


		});
	}

	function qTipSticky(taskdataid) {
      
      $("#stickynote"+taskdataid).qtip({

        show: {
            event: 'click', 
            modal:true

        },  
        hide: {
            event: 'click unfocus', 

        }, 


        content: {
                //text: 'Loading...',
                title: {
                   text: 'Sticky Note',
                 button: 'Close', // Close button
                 background: '#3c8dbc'
             },
             ajax: {
                url: '<?php echo site_url(); ?>Projects/readStickyNote',
                type: 'POST',
                data: {
                 tid:taskdataid
             },
             success: function(data, status) {
                    //console.log('readStickyNote');
                    //console.log(data);
                   

                 // var getstickynote="";var getchecked="";
                 // if(data.note[0].stickynote !=null) getstickynote=data.note[0].stickynote;
                 // if(data.note[0].notepopup ==1) getchecked="checked";
                    
                 var qhtml='<div class="panel panel-default">'
                 // +'<div class="panel-heading">'
                 // +'  <input id="checkbox_id'+taskdataid+'" onclick="saveStickyNote(this,'+taskdataid+')" '+getchecked+' type="checkbox">'
                 // +'  <label for="checkbox_id'+taskdataid+'" class="">Auto Popup</label>'
                 // +  '</div>'

                 +  '<div class="panel-body" style="overflow-y: scroll;height: 300px;font-size:14px;">'
                
                 +  '</div>'

                 +  '<div class="panel-footer">'

                 +     '<div class="row">'

                 +       '<div class="col-md-10">'
                 +           '<textarea id="txtStickyNote'+taskdataid+'" style="width: 95%;" rows="3"></textarea>'
                 +       '</div>'

                 +       '<div class="col-md-2">'
                 +           '<button onclick="addStickyNote(this,'+taskdataid+')" type="button" class="btn btn-primary">Add</button>'
                 +       '</div>'

                 +    '</div>' // end row

                 +  '</div>' // end footer

                 +'</div>'; // end panel

                 qhtml=$(qhtml);

                 $.each(data.notes, function (i, note) {
                     qhtml.find('.panel-body').append(drawStickyNote(note));
                    });

                    this.set('content.text', qhtml);

                }
            }
        },

        position: {
            at: 'left center ',  // Position my top left...
            my: 'right top', // at the bottom right of...
            //target: $("#stickynote"+taskdataid)
            adjust: {
                        method: 'none shift',
                        //y:70
                    },
        },
        style: {
            classes: 'qtip-light qtip-rounded qtip-shadow',
            width:'600px',

        },
        
        events: {
            render: function(event, api) {
                $(window).bind('keydown', function(e) {
                    if(e.keyCode === 27) { api.hide(e); }
                });
            }
        }
    });

}

// 	$(document).keydown(function(event) { 
// 		alert('preventDefault');
// 		if (event.keyCode == 9) { 
// 		//tab pressed 
		
// 		event.preventDefault(); 
// 		// stops its action 
// 	} 
// });
	// $(document).on('click','.tips',function(e){
	// 	$(".TaskListDiv").css('width','50%');
	// });
	
</script>	


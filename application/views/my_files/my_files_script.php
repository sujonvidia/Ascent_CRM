<style type="text/css">
	.qtip{max-width: 500px;}
	.cus-row{margin-top: 5px;}
	#shared_pass, .expiredaterow{display: none;}    
</style>
<script type="text/javascript">
	$(".flatpickr").flatpickr();
</script>
<script src="https://static.filestackapi.com/v3/filestack.js"></script>
<script type="text/javascript">
	function filestack_pick(){
		var policy = "eyJleHBpcnkiOjE1MzE4MDA1NjQsImNhbGwiOiJyZWFkIiwiaGFuZGxlIjoiQVpIWGRFdjVuU2c2Y2ZVTXBtS2RVeiJ9";
		var signature = "3df5e83ce3e3d8a9b86511cd3f3a223e161f211cb92a0f2af27cb73cca589b0f";
		var client = filestack.init('AZHXdEv5nSg6cfUMpmKdUz', { policy: policy, signature: signature });
		client.pick({
		  disableThumbnails: true,
		  fromSources: ['local_file_system','imagesearch','facebook','instagram','googledrive','dropbox',
		  				'url','evernote','flickr','box','github','picasa','onedrive','clouddrive','customsource'],
		  accept: ['image/*'],
		  storeTo: {
		    location: 's3',
		    // path: 'http://27.147.195.222:2241/nc27/filestack/',
		    container: 'user-photos' ,
		    region: 'us-east-1',
		    access: 'public'
		  }
		}).then(function(result) {
			console.log(result.filesUploaded);
		});
	}
</script>
<script type="text/javascript">
	var global_file_select_list = [];
	function scanintodb(dir){
		// console.log(dir);
		$("#fx-body").html("");
		var request = $.ajax({
			url: "<?php echo site_url("myfiles/scanintodb"); ?>",
			method: "POST",
			data: {dir: dir},
			dataType: "json"
		});
		request.done(function(data){
			// console.log(data);
			$.each(data, function(k,v){
				if(v.type == "file"){
					rander_file(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}else{
					rander_folder(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}
			});
			rander_site_map(dir);
			//Object.keys(v).length
		});
		request.fail(function(e){
            console.log("Scanjs error...");
            console.log(e.responseText);
        });
	}

	function scanjs(dir){
		console.log(dir);
		$("#fx-body").html("");
		var request = $.ajax({
			url: "<?php echo site_url("myfiles/scan"); ?>",
			method: "POST",
			data: {dir: dir},
			dataType: "json"
		});
		request.done(function(data){
			// if(data.length == 0)
			// 	location.reload();
			console.log(data);
			$.each(data, function(k,v){
				if(v.type == "file"){
					rander_file(v.name, v.display_name, v.relative_path, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}else{
					rander_folder(v.name, v.display_name, v.relative_path+"/"+v.name, v.size, v.date, v.path, v.favourite, v.has_shared, v.pass);
				}
			});
			rander_site_map(dir);
			//Object.keys(v).length
		});
		request.fail(function(e){
            console.log("Scanjs error...");
            console.log(e.responseText);
        });
	}

	function rander_site_map(dir){
		clean_list();
		$("#site-map").html("");
		var design = '<span><a href="<?php echo site_url("myfiles"); ?>">My Files</a></span>';
		var listofdir = dir.split("/");
		var url = '';
		for(var i = 0; i<listofdir.length; i++){
			url += listofdir[i];

			if(i<listofdir.length-1){
				design += '<span onclick="scanjs(\''+url+'\')">'+get_display_name(listofdir[i])+'</span>';
				url += "/";
			}
			else{
				design += '<span>'+get_display_name(listofdir[i])+'</span>';
			}
		}
		if(url == "ProjectsFiles"){
			$(".createBtn").hide();
		}else{
			$(".createBtn").show();
		}

		if(url.indexOf("ProjectsFiles") > -1){
			$(".hide_in_project").hide();
		}else{
			$(".hide_in_project").show();
		}

		$("#site-map-val").val(url);
		$("#site-map").html(design);
	}

	function rander_file(fn, dn, path, size, date, spath, favourite, has_shared, pass){
		// console.log(fn);//file name
		// console.log(dn);//display name
		// console.log(path);//relative path
		// console.log(spath);//sorce path
		var url = "myfiles/download_file/" + fn + "/" + btoa(path+"/"+fn);
		var shared_url = base_url + "myfiles/shared_file/" + btoa(path+"/"+fn);
		var trid = btoa(path+"/"+fn);
		var design= '<tr id="'+trid+'"><td width="20"><label><input type="checkbox" class="checkbox" value="'+path+"/"+fn+'"><span></span></label></td>'+
						'<td data-title="Attachment" data-toggle="lightbox" title="'+dn+'" href="'+spath+'" width="50">'+fileImg(spath)+'</td>';
						if(checkImgURL(spath) || checkTxtFile(spath))
							design += '<td data-title="Attachment" data-toggle="lightbox" title="'+dn+'" href="'+spath+'">'+dn+'</td>';
						else
							design += '<td><a href="'+spath+'" target="_blank">'+dn+'</td>';
			design += 	'<td class="mftdaction"><ul class="mf-ff-action">'+
						'<li onclick="favourite(\''+fn+'\', \''+path+'/'+fn+'\')">';
							if(favourite == "N")
								design += '<img src="'+base_url+'/asset/img/icons/Star.png"></li>';
							else
								design += '<img src="'+base_url+'/asset/img/icons/Stared2.png"></li>';
			if(has_shared)
			design += 	'<li><img src="'+base_url+'/asset/img/icons/shared.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \''+pass+'\')"></li>';
			else
			design += 	'<li><img src="'+base_url+'/asset/img/icons/share.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \'\')"></li>';
			design +=	'<li class="mf-ff-action-settings">'+
							'<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="" aria-expanded="true">'+
								'<img src="'+base_url+'/asset/img/icons/Details_Properties.png">'+
							'</a>'+
							'<ul class="dropdown-menu">'+
								'<div class="arrow-top-right"></div>'+
								'<li><a href="#" onclick="detailsinfo(\''+spath+'\', \''+fn+'\')"><i class="fa fa-info"></i> Details</a></li>'+
								'<li><a href="#" onclick="renamethis(\''+fn+'\',\''+dn+'\')"><i class="fa fa-pencil"></i> Rename</a></li>'+
								'<li><a href="'+base_url+url+'"><i class="fa fa-cloud-download"></i> Download</a></li>'+
								'<li><a href="#" onclick="deletethis(\''+path+'/'+fn+'\')"><i class="fa fa-trash"></i> Delete</a></li>'+
							'</ul>'+
						'</li>'+
						'</ul></td>'+
						'<td>'+bytesToSize(size)+'</td>'+
						'<td>'+timeConverter(date)+'</td>'+
					'</tr>';
		$("#fx-body").append(design);
		call_checkbox_fun();
	}

	function rander_folder(fn, dn, path, size, date, spath, favourite, has_shared, pass){
		var shared_url = base_url + "myfiles/shared_file/" + btoa(path);
		var url = "myfiles/download_dir/" + fn + "/" + btoa(path);
		var trid = btoa(path);
		var design= '<tr id="'+trid+'"><td width="20"><label class="hide_in_project"><input type="checkbox" class="checkbox" value="'+path+'"><span></span></label></td>'+
						'<td width="50" onclick="scanjs(\''+path+'\')"><i class="fa fa-folder-o"></i></td>'+
						'<td onclick="scanjs(\''+path+'\')">'+dn+'</td>';
			design += 	'<td class="mftdaction"><ul class="mf-ff-action">'+
						'<li onclick="favourite(\''+fn+'\', \''+path+'\')">';
							if(favourite == "N")
								design += '<img src="'+base_url+'/asset/img/icons/Star.png"></li>';
							else
								design += '<img src="'+base_url+'/asset/img/icons/Stared2.png"></li>';
			if(has_shared)
			design += 	'<li><img src="'+base_url+'/asset/img/icons/shared.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \''+pass+'\')"></li>';
			else
			design += 	'<li><img src="'+base_url+'/asset/img/icons/share.png" onclick="qtipSharedBox(this, \''+fn+'\', \''+shared_url+'\', \'\')"></li>';
			design +=	'<li class="mf-ff-action-settings">'+
							'<a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="" aria-expanded="true">'+
								'<img src="'+base_url+'/asset/img/icons/Details_Properties.png">'+
							'</a>'+
							'<ul class="dropdown-menu">'+
								'<div class="arrow-top-right"></div>'+
								'<li><a href="#" onclick="detailsinfo(\''+spath+'\', \''+fn+'\')"><i class="fa fa-info"></i> Details</a></li>'+
								'<li class="hide_in_project"><a href="#" onclick="renamethis(\''+fn+'\',\''+dn+'\')"><i class="fa fa-pencil"></i> Rename</a></li>'+
								'<li><a href="'+base_url+url+'"><i class="fa fa-cloud-download"></i> Download</a></li>'+
								'<li class="hide_in_project"><a href="#" onclick="deletethis(\''+path+'\')"><i class="fa fa-trash"></i> Delete</a></li>'+
							'</ul>'+
						'</li>'+
						'</ul></td>'+
						'<td>'+bytesToSize(size)+'</td>'+
						'<td>'+timeConverter(date)+'</td>'+
					'</tr>';
		$("#fx-body").append(design);
		call_checkbox_fun();		
	}

	
	/* get_display_name is find the original name of the directory from database */
	function get_display_name(key){
		for(var i=0; i<dbFileLists.length; i++){
			if(dbFileLists[i].name == key){
				return dbFileLists[i].original_name;
			}
		}
		return key;
	}

	function fileImg(file){
		/*all of this function are define in "asset>js>itl-chat>itl-chat-manager.js"*/
		if(checkImgURL(file))
			return '<img src="'+file+'" width=30 height=20>';
		else if(checkPdfURL(file))
			return '<img src="'+base_url+'asset/img/pdf.png" width=30 height=20>';
		else if(checkXlsURL(file))
			return '<img src="'+base_url+'asset/img/xls.png" width=30 height=20>';
		else if(checkDocURL(file))
			return '<img src="'+base_url+'asset/img/doc.png" width=30 height=20>';
		else
			return '<i class="fa fa-file-text-o"></i>';

	}

	function bytesToSize(bytes) {
		var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
		if (bytes == 0) return '0 Bytes';
		var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
		return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}

	function timeConverter(UNIX_timestamp){
		if(isNaN(UNIX_timestamp) ){
			return moment(UNIX_timestamp).format("ll");
		}else{
			var a = new Date(UNIX_timestamp * 1000);
			return moment(a).format("ll");
		}
	}

	function deletethis(path){
		if(id == 0){
        	swal("Warning", "Sorry!!! You are unable to do that.", "warning");
        }else{
			if(typeof path != "undefined")
				var thisname = path;
			else 
				var thisname = $("#pathofli").val();
			
			swal({
	                title: "Are you sure?",
	                text: "You want to delete this file permanently ???",
	                type: "warning",
	                showCancelButton: true,
	                confirmButtonColor: "#DD6B55",
	                confirmButtonText: "Yes, delete it!",
	                cancelButtonText: "No, cancel plx!",
	                closeOnConfirm: false,
	                closeOnCancel: false
	        }).then(function(isConfirm){
	            if (isConfirm) {
	                var request = $.ajax({
	                    url: "<?php echo site_url("myfiles/removethis"); ?>",
	                    method: "POST",
	                    data: { dir : thisname },
	                    dataType: "json"
	                });
	                request.done(function(res){
	                    if(res){
	                        scanjs($("#site-map-val").val());
	                    }
	                });
	                request.fail(function(e){
	                    console.log(e.responseText);
	                });
	                // swal("Deleted!", "Message delete successfully.", "success");
	            }
	        });
        }
	}


	function detailsinfo(p_path, file_name){
		var request = $.ajax({
            url: "<?php echo site_url("myfiles/detailsinfo"); ?>",
            method: "POST",
            data: { file_name : file_name },
            dataType: "json"
        });
        request.done(function(res){
        	console.log(res);
            if(res){
            	var user_name = "";
            	if("<?php echo $id; ?>" == res[0].user_id){
            		user_name = "<?php echo $username; ?>";
            	}
                else if(user_name === ""){
            		$.each(contacts, function(k,v){
            			if(v.ID == res[0].user_id){
	            			user_name = v.full_name;
	            			return 0;
	            		}
	            	});
            	}
                swal("Details info", 
                	"<table style='text-align: left;'>"+
                	"<tr><td>Type</td><td>: "+ res[0].type+"</td></tr>"+
                	"<tr><td>Name</td><td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;' title=\'"+ res[0].original_name +"\'>: "+ res[0].original_name+"</td></tr>"+
                	"<tr><td>Physical Path</td><td style='overflow: hidden;white-space: nowrap;text-overflow: ellipsis;max-width: 350px;' title=\'"+p_path+"\'>: "+ p_path+"</td></tr>"+
                	"<tr><td>Created By</td><td>: "+ user_name +"</td></tr>"+
                	"<tr><td>Created Date</td><td>: "+ res[0].create_date+"</td></tr></table>", 
                	"success");
            }
        });
        request.fail(function(e){
            console.log(e.responseText);
        });
	}

	function renamethis(physical_name, display_name){
		if(id == 0){
        	swal("Warning", "Sorry!!! You are unable to do that.", "warning");
        }else{
			swal({ 
				title: 'Update this name !!!',
				input: 'text',
				inputValue: display_name,
				showCancelButton: true,
				confirmButtonText: 'Update',
				showLoaderOnConfirm: true,
				preConfirm: function (e) {
					return new Promise(function (resolve, reject) {
						setTimeout(function() {
							if (e === display_name) {
								reject('You do not make any change!!!');
							} else {
								$.ajax({
									url: "<?php echo site_url("myfiles/rename_file"); ?>",
									type: "POST",
									data: {physical_name: physical_name, display_name: e},
									dataType: "JSON",
									success: function(res){
										resolve();
									}
								});
								resolve();
							}
						}, 1000)
					})
				},
				allowOutsideClick: false
			}).then(function (e) {
				swal({
					type: 'success',
					title: 'Rename Completed'
				});
				// .then(function(r){
					// location.reload();
				// })
			});
		}
	}

	function favourite(file_name, path){
		if(id == 0)
			swal("Warning", "Sorry!!! You are unable to do that.", "warning");
		else{
			var req = $.ajax({
				url: "<?php echo site_url("myfiles/favourite"); ?>",
				method: "POST",
				data: {physical_name: file_name, fileurl: path},
				dataType: "json"
			});
			req.done(function(res){
				if(res.result){
					scanjs($("#site-map-val").val());
				}
			});
			req.fail(function(e){
	            console.log(e.responseText);
	        });
	    }
	}

	/*function addtofavourite(path){
			if(typeof path != "undefined")
				var thisname = path;
			else 
				var thisname = $("#pathofli").val();
			var list = thisname.split("/");
			var physical_name = list[list.length-1];

			var req = $.ajax({
				url: "addtofavourite.php",
				method: "POST",
				data: {physical_name: physical_name, fileurl: thisname},
				dataType: "json"
			});
			req.done(function(res){
				if(res.result){
					// alert(res.feedback);
					location.reload();
				}
			});
		}*/

	// lost focuse 
	// $(document).mouseup(function (e)
	// {
	//     var container = $("#mf-advance-search");

	//     if (!container.is(e.target) // if the target of the click isn't the container...
	//         && container.has(e.target).length === 0) // ... nor a descendant of the container
	//     {
	//         container.hide("slow");
	//     }
	// });

	function qtipSharedBox(element, fn, shared_url, pass){
        if(id == 0){
        	swal("Warning", "Sorry!!! You are unable to do that.", "warning");
        }else{
        	if($(element).qtip('api') == undefined){
	            $(element).qtip({
	                show: {
	                    event: 'click',
	                    ready:true,
	                    solo: true,
	                },
	                hide: {
	                    event: 'click',
	                },
	                content: {text: 'Loading...' },
	                position: {
	                    at: 'left center',  
	                    my: 'right center', 
	                    viewport: $(window),
	                    // adjust: {
	                    //         method: 'none shift'
	                    //     },
	                },
	                style: {
	                    classes: 'qtip-blue qtip-rounded qtip-font',
	                    width: '500'
	                },
	                events: {
	                    hide: function (event, api) {
	                        
	                        $(this).qtip('destroy');
	                        $( 'body').unbind( "keydown.qtipTaskByUser" );
	                    
	                    },
	                    show: function(event, api) {
	                        var html = "";
	                        html+='	<div class="col-lg-12" style="padding:10px">'
	                        html+='		<div class="col-lg-11">';
	                        html+='			<h4>Share with others</h4>';
	                        html+='			<div class="cus-row">';
	                        html+='				<select class="form-control" id="shared_view_type" onchange="sharedType(this.value)">';
	                        html+='					<option value=1>Anyone with the link can view</option>';
	                        if(pass)
	                        	html+='				<option value=2 selected>Anyone with the link can view (Password required)</option>';
	                    	else
	                        	html+='				<option value=2>Anyone with the link can view (Password required)</option>';
	                        html+='				</select>';
	                        html+='			</div>';
	                        html+='			<div class="cus-row">';
	                        html+='				<label>Shared link</label>';
	                        html+='				<input class="form-control" type="text" id="shared_file_link" value="'+shared_url+'/'+fn+'">';
	                        html+='			</div>';
	                        if(pass)
	                        	html+='		<div class="cus-row" id="shared_pass" style="display:block;">';
	                        else
	                        	html+='		<div class="cus-row" id="shared_pass">';
	                        html+='				<label>Password</label>';
	                        html+='				<input class="form-control" type="text" id="shared_file_pass" value="'+pass+'" placeholder="Enter Password">';
	                        html+='			</div>';
	                        html+='			<div class="cus-row">';
	                        html+='				<label>Shared to</label>';
	                        html+='				<input class="form-control" type="email" id="shared_user_email" placeholder="Enter email address">';
	                        html+='			</div>';
	                        html+='			<div class="cus-row">';
	                        html+='				<input type="radio" name="expire" onclick="dateshow(1)"> This link will be expire after <input type="radio" name="expire" checked onclick="dateshow(0)"> Do not expire ';
	                        html+='			</div>';
	                        html+='			<div class="cus-row expiredaterow">';
	                        html+='				<input class="form-control expiredate" type="text">';
	                        html+='			</div>';
	                        html+='			<div class="cus-row">';
	                        html+='				<input class="btn btn-default" type="button" onclick="sharedNow(\''+fn+'\')" value="Done">&nbsp;';
	                        html+='				<input class="btn btn-default" type="button" onclick="cancelSharedNow()" value="Cancel">';
	                        html+='			</div>';
	                        html+='		</div>';
	                        html+='	</div>';
	                    	api.set('content.text', html);
	                    	$(".expiredate").flatpickr();
	                    },
	                    render:function(event,api){
	                        $('body').on('keydown.qtipTaskByUser', function(event) {
	                            if(event.keyCode === 27) {
	                                api.hide(event);
	                            }
	                        });
	                    }
	                    
	                    
	                }
	            });
	        }
        }
    }

	function sharedNow(fn){
		$(".qtip").qtip('destroy');
		$.ajax({
			url: "<?php echo site_url("myfiles/sharednow"); ?>",
			type: "POST",
			data: {fn: fn, type: $("#shared_view_type").val(), url: $("#shared_file_link").val(), pass: $("#shared_file_pass").val(), shared_user_email: $("#shared_user_email").val(), shared_expire: $(".expiredate").val()},
			dataType: "JSON",
			success: function(res){
				console.log(res);
			},
			error: function(e){
				console.log(e.responseText);
			}
		});
	}

	function cancelSharedNow(){
		$(".qtip").qtip('destroy');
	}
	
	function sharedType(v){
		if(v==2){
			$("#shared_pass").show("slow");
		}else{
			$("#shared_pass").hide("slow");
		}
	}

	function dateshow(v){
		if(v ==1 ) $(".expiredaterow").show("slow");
		else $(".expiredaterow").hide("slow");
	}

	function rander_search_file_link(fn, dn, path, size, date, spath){
		var design= '<tr>'+
						'<td data-title="Attachment" data-toggle="lightbox" title="'+dn+'" href="'+spath+'" width="50">'+fileImg(spath)+'</td>';
						if(checkImgURL(spath) || checkTxtFile(spath))
							design += '<td data-title="Attachment" data-toggle="lightbox" title="'+dn+'" href="'+spath+'">'+dn+'</td>';
						else
							design += '<td><a href="'+spath+'" target="_blank">'+dn+'</td>';
			design += 	'<td>&nbsp;</td>'+
						'<td>'+bytesToSize(size)+'</td>'+
						'<td>'+timeConverter(date)+'</td>'+
					'</tr>';
		$("#fx-body").append(design);
	}

	function rander_search_folder_link(fn, dn, path, size, date, spath){
		var design= '<tr>'+
						'<td width="50" onclick="scanjs(\''+path+'\')"><i class="fa fa-folder-o"></i></td>'+
						'<td onclick="scanjs(\''+path+'\')">'+dn+'</td>';
			design += 	'<td>&nbsp;</td>'+
						'<td>'+bytesToSize(size)+'</td>'+
						'<td>'+timeConverter(date)+'</td>'+
					'</tr>';
		$("#fx-body").append(design);

	}

	function searchforfile(element, event){
		// console.log(event.keyCode);
		// console.log(dbFileLists);
		$("#fx-body").html("");
		var str = (($(element).val()).toLowerCase()).trim();		
		$.each(dbFileLists, function(k,v){
			var on = ((v.original_name).toLowerCase()).trim();
			if(on.indexOf(str) != -1){
				if(v.type == "file"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				} else { 
					rander_search_folder_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
			}
		});
	}

	function gotosearch(){
		var search_file_type = $("#search_file_type").val();
		var search_file_modified = $("#search_file_modified").val();
		var search_file_name = $("#search_file_name").val();
		var search_file_owner = $("#search_file_owner").val();
		console.log(search_file_modified);
		$("#fx-body").html("");
		$('#mf-advance-search').hide('slow');
		$.each(dbFileLists, function(k,v){
			var on = ((v.original_name).toLowerCase()).trim();
			if(search_file_name != "" && on.indexOf(search_file_name) != -1){
				if(v.type == "file"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				} else { 
					rander_search_folder_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
			}

			if(v.user_id == search_file_owner){
				if(v.type == "file"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				} else { 
					rander_search_folder_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
			}

			if(moment(v.create_date).format("ll") == moment(search_file_modified).format("ll")){
				if(v.type == "file"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				} else { 
					rander_search_folder_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
			}

			if(search_file_type != "" && v.type == "file"){
				var ext = on.split(".");
				var ln = ext.length;

				if(search_file_type == "all"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
				else if(search_file_type == "jpg" && (ext[ln-1] == "jpg" || ext[ln-1] == "jpeg" || ext[ln-1] == "gif" || ext[ln-1] == "bmp")){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
				else if(search_file_type == "pdf" && ext[ln-1] == "pdf"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
				else if(search_file_type == "xls" && (ext[ln-1] == "xls" || ext[ln-1] == "xlsx")){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
				else if(search_file_type == "doc" && (ext[ln-1] == "doc" || ext[ln-1] == "docx")){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
				else if(search_file_type == "zip" && ext[ln-1] == "zip"){
					rander_search_file_link(v.name, v.original_name, v.path+"/"+v.name, v.size, v.create_date, base_url + v.path+"/"+v.name);
				}
			}
		});
	}

	function clean_list(){
		global_file_select_list = [];
		$(".group-action").hide();
	}

	function call_checkbox_fun(){
		$('input:checkbox').change(function(e) {
			e.stopImmediatePropagation();
			global_file_select_list = [];
			var all_chkbox = $('input:checkbox');
            var count = 0;
            $.each(all_chkbox, function(k,v){
            	if($(v).is(":checked")) {
            		count++;
            		global_file_select_list.push($(this).val());
            	}
            });
            if(count > 1)
            	$(".group-action").show();
            else
            	$(".group-action").hide();
            console.log(global_file_select_list);
	    });
	}

	function delete_selected(){
		$.ajax({
			url: base_url + "myfiles/delete_selected",
			type: "POST",
			data: {fn_list: global_file_select_list},
			dataType:"JSON",
			success: function(res){
				var urlpath = $("#site-map-val").val();
				scanjs(urlpath);
			},
			error: function(e){
				console.log(e);
			}
		});
		global_file_select_list = [];
	}
</script>
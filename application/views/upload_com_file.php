<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<form enctype="multipart/form-data" method="POST" id="AttachFile">
				<input type="hidden" value="<?php echo $type; ?>" name="parentType" id="parentType">
				<input type="hidden" value="<?php echo $ptid; ?>" name="parentID" id="parentID" >
				<input type="hidden" value="<?php echo $title; ?>" name="projectName" id="projectName">
				<input type="hidden" value="<?php echo $dir; ?>" name="dirname" id="dirname" >
				<input type="hidden" value="<?php echo ($crm_modcomments)? $crm_modcomments:0; ?>" name="crm_modcomments" id="crm_modcomments" >
				<div class="row">
			    	<div class="col-md-12">
			    		<div style="float: left;">
			    			<div id="fileInputImg"></div>
			    		</div>
			    		<div style="width: auto;float: left;">
			    			<input id="file" name="fileToUpload[]" type="file" multiple class="file-loading" data-preview-file-type="any" data-min-file-count="1">
			    		</div>
			    	</div>
		    	</div>
				<br>
				<button type="button" class="btn btn-default" style="    margin-left: 3%;font-size: 15px;width: 75px;height: 35px;" onClick="sendAttach()">Upload</button>
			</form>
		</div>

		<script type="text/javascript">

			
			$("#file").fileinput({
				// allowedFileExtensions: filetype,
				maxFileSize:5120,
				maxFilesNum: 10,
				// layoutTemplates: {footer: footerTemplate}
				uploadUrl: "#",
				showBrowse: false,
				showRemove: false,
				showCaption: false,
				showUpload: false,
				browseOnZoneClick: true,
				elPreviewImage : '#fileInputImg'
			});

			function sendAttach(){
				var formData = new FormData($('#AttachFile')[0]);
				console.log(formData);

				var request = $.ajax({
								url: base_url+'Projects/newProjectFile',
								method: "POST",
								data: formData,
								//async: false,
								cache: false,
								contentType: false,
								processData: false,
								dataType: "json"
							});
							
							request.done(function( status ) {
								console.log(status);
							

								if(status.msg == 'Already'){
									swal("Oops...", "File already exist", "error");
									}else{
										var target = $("div[id^=ekkoLightbox]");
										var targetid = $(target).attr("id");
										$("#"+targetid+" .close").trigger("click");

										updateNotyFilehd(status.taskid,'update');
										$('#attachListDiv').empty();
										attachdataload($('#parentType').val(),$('#parentID').val(),0,'TodoFolder','TodoFiles');
										var matches = user_name.match(/\b(\w)/g);
                						var acronym = matches.join('');
										$.each(status.pttmsg, function(k,v){
											var tabDetail ='	<div class="panel panel-default proComm">';
											tabDetail +='			<div class="panel-body status status-left">';
											tabDetail +='				<div class="who clearfix">';
											tabDetail +='					<span class="comment_imghover">';
										
											tabDetail +=' <span style="    margin-right: 2px;margin-top: 1px;float: left;" href="javascript:void(0);" class="btn btn-primary btn-circle customBtnClr">'+acronym+'</span>';
				                			tabDetail +='                   <span class="from" style="    width: 89%;float: left;margin-left: 2%;"><span class="CusUsrNm">'+user_name+'</span><span style="font-size: 14px;font-weight: bold;"><i class="fa fa-paperclip flipFont" aria-hidden="true"></i> attached</span><span class="CusUsrTm"> '+moment().format('MMM D, YYYY [at] h:mm A z')+'</span></span>';
				                			tabDetail +='                   <span class="from" style="width: 87%;float: left;margin-left: 2%;font-size: 14px;margin-top: 10px;    line-height: 1.2em;color: #000000;">'+v+'</span>';


											tabDetail +='					<div class="name dropdown"><b></b><a data-toggle="dropdown" class="dropdown-toggle" title="Settings"><i class="fa fa-chevron-down pull-right"></i></a><ul class="dropdown-menu pull-right"><div class="arrow-top-right"></div><li><a onclick="">Msg Info</a></li><li><a onclick="">Clear</a></li><li><a onclick="">Forward</a></li></ul><i class="fa fa-star-o pull-right" onclick=""></i></div>';
											//tabDetail +='					<span  class="from">'+v+'</span>';
											tabDetail +='				</div>';
											tabDetail +='			</div>';
											tabDetail +='		</div>';

											$("#attachListDivCommnet").append(tabDetail);
										});

										$("#attachListDivCommnet").animate({scrollTop: $('#attachListDivCommnet').prop("scrollHeight")}, 1000);
										$("#commentinput").html("");
								}
								
								
							});
							
							request.fail(function( jqXHR, textStatus ) {
								console.log('jqXHR');
								console.log(jqXHR);
								console.log(textStatus);
								
							});
			}


			
		</script>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<form enctype="multipart/form-data" method="POST" id="AttachFile">
				<input type="hidden" value="<?php echo $Title; ?>" name="projectName" id="projectName">
				<input type="hidden" value="<?php echo $Type; ?>" name="parentType" id="parentType">
				<input type="hidden" value="<?php echo $Typeid; ?>" name="parentID" id="parentID" >
				<input type="hidden" value="<?php echo $Location; ?>" name="dirname" id="dirname" >
				<input type="hidden" value="<?php echo $Nowid; ?>" id="nowid" >
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
				<!-- <button type="button" class="btn btn-primary" onClick="sendAttach()">Ok</button> -->
				<button type="button" class="btn btn-default" style="    margin-left: 3%;font-size: 15px;width: 75px;height: 35px;" onClick="sendAttach()">Upload</button>
			</form>
		</div>

		<script type="text/javascript">

			qtipHideAll();

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
				var taskId = $("#parentID").val();
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
					setCookie('selectedTask',taskId,1);
					if(status.msg == 'Already'){
						
						swal("Oops...", "File already exist", "error");

					}else{

						$("#nofileImg").remove();
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");

						updateNotyFilehd($('#parentID').val(),'update');
						
						console.log( $('#att'+$('#nowid').val()) );
						//$('.qtip-attach'+$('#parentID').val()).click();
						//$('#att'+$('#nowid').val()).click();
						//$('#attachIMG'+$('#parentID').val()).click();
						// $('#attachListDiv').empty();
						// attachdataload($('#parentType').val(),$('#parentID').val(),0,'TodoFolder','TodoFiles');
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
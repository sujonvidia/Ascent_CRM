<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<form enctype="multipart/form-data" method="POST" id="logoFile">
				<div class="row">
			    	<div class="col-md-12">
			    		<div style="float: left;">
			    			<div id="fileInputImg"></div>
			    		</div>
			    		<div style="width: auto;float: left;">
			    			<input id="file" name="fileinput" type="file" class="file-loading" data-preview-file-type="any" data-min-file-count="1">
			    		</div>
			    	</div>
		    	</div>
				<br>
				<button type="button" class="btn btn-primary" onClick="sendFile()">Upload</button>
			</form>
		</div>

		<script type="text/javascript">
			var footerTemplate = '<div class="file-thumbnail-footer">'
									+'<div class="file-actions">'
										+'<div class="file-footer-buttons">'
											+'<button type="button" class="kv-file-remove btn btn-xs btn-default rmvphoto" title="Remove file"><i class="glyphicon glyphicon-trash text-danger"></i></button>'
										+'</div>'
										+'<div class="clearfix"></div>'
									+'</div>'
								+'</div>';


			$("#file").fileinput({
				maxFileSize:5120,
				maxFilesNum: 1,
				uploadUrl: "#",
				showBrowse: false,
				showRemove: false,
				showCaption: false,
				showUpload: false,
				browseOnZoneClick: true,
				elPreviewImage : '#fileInputImg'
			});


			function sendFile(){
				var formData = new FormData($('#logoFile')[0]);
				var request = $.ajax({
					url: "<?php echo site_url("profile/uploadLogo"); ?>",
					method: "POST",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json"
				});
				request.done(function( rsp ) {
					console.log(rsp);
					if(rsp.repmsg != ""){
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");
						
						var nid = $("#notiid").val();
						$(".uReply"+nid).html("<span class='left'>You replied: </span>"+rsp.repmsg);
					}
					location.reload();		
				});
				request.fail(function(s){
					console.log(s);
				});
			}
		</script>
	</body>
</html>
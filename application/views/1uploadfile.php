<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<div>
			<form enctype="multipart/form-data" method="POST" id="msengerFile">
				<input type="hidden" name="mid" value="<?php echo $user_email; ?>">
				<input type="hidden" name="ffid" id="ffid" >
				<input id="file" name="fileinput[]" class="file" type="file" multiple data-preview-file-type="any" data-min-file-count="1">
				<br>
				<button type="button" class="btn btn-primary" onClick="sendFile()">Send Now</button>
			</form>
		</div>

		<script type="text/javascript">

			$("#ffid").val($("#fid").val());
			// var aaa = $("#msengerFile").closest(".modal");
			// var callerTitle = $("#"+$(aaa).attr("id")+" h4").text();
			// var filetype = (callerTitle == "Photos & Videos")?["jpg", "gif", "png", "mp4"]:["docx", "xlsx", "pdf", "txt"];
			var footerTemplate = '<div class="file-thumbnail-footer">'
									+'<div class="file-actions">'
										+'<div class="file-footer-buttons">'
											+'<button type="button" class="kv-file-remove btn btn-xs btn-default rmvphoto" title="Remove file"><i class="glyphicon glyphicon-trash text-danger"></i></button>'
										+'</div>'
										+'<div class="clearfix"></div>'
									+'</div>'
								+'</div>';


			$("#file").fileinput({
				// allowedFileExtensions: filetype,
				maxFileSize:5120,
				maxFilesNum: 10,
				layoutTemplates: {footer: footerTemplate}
			});


			function sendFile(){
				var formData = new FormData($('#msengerFile')[0]);
				console.log(formData);
				var request = $.ajax({
					url: "<?php echo site_url("chat/newMsgFile"); ?>",
					method: "POST",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					dataType: "json"
				});
				request.done(function( rsp ) {
					
					if(rsp.length>0){
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");

		                $("#msg").val("");
		                $.each(rsp, function(keyId, keyValue){
		                    if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
		                        globalMsgArray.push((keyValue.msgid).toString());
		                        if(keyValue.type == 'right')
		                            drawSendMsg(keyValue.time, keyValue.msg,keyValue.msgid, keyValue.msgtype);
		                    }
		                });
		                $('.fixedContent').scrollTop($('#cstream').height());
		                $('#msenger textarea').val('');
						$('#msenger textarea').focus();
		            }					
				});
			}
		</script>
	</body>
</html>
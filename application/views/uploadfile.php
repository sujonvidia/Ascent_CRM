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
				<input type="hidden" name="fuid" id="fuid" >
				<input type="hidden" name="nid" id="notiid" >
				<div class="row">
			    	<div class="col-md-12">
			    		<div style="float: left;">
			    			<div id="fileInputImg"></div>
			    		</div>
			    		<div style="width: auto;float: left;">
			    			<input id="file" name="fileinput[]" type="file" <?php if($numOfFiles>1) echo "multiple"; ?> class="file-loading" data-preview-file-type="any" data-min-file-count="1">
			    		</div>
			    	</div>
		    	</div>
				<br>
				<button type="button" class="btn btn-primary" onClick="sendFile()">Upload</button>
			</form>
		</div>

		<script type="text/javascript">
			<?php if(isset($femail) AND $femail != ""){ ?>
				var url = "<?php echo site_url("chat/qrcNewMsgFile"); ?>";
				$("#ffid").val('<?php echo $femail; ?>');
				$("#fuid").val('<?php echo $fuid; ?>');
				$("#notiid").val('<?php echo $notiid; ?>');
			<?php }else{ ?>
				var url = "<?php echo site_url("chat/newMsgFile"); ?>";
				$("#ffid").val($("#fid").val());
			<?php } ?>
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
				maxFilesNum: <?php echo $numOfFiles; ?>,
				// layoutTemplates: {footer: footerTemplate}
				uploadUrl: "#",
				showBrowse: false,
				showRemove: false,
				showCaption: false,
				showUpload: false,
				browseOnZoneClick: true,
				elPreviewImage : '#fileInputImg'
			});


			function sendFile(){
				console.log(url);
				var formData = new FormData($('#msengerFile')[0]);
				var request = $.ajax({
					url: url,
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
					if(rsp[0].msgid>0){
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");

		                $("#msg").val("");
		                $.each(rsp, function(keyId, keyValue){
		                    if($.inArray(keyValue.msgid, globalMsgArray)<0) { //add to array
		                        globalMsgArray.push((keyValue.msgid).toString());
		                        if(keyValue.type == 'right')
		                            drawSendMsg(keyValue.time, keyValue.msg, keyValue.msgid, keyValue.msgtype, keyValue.msglike);
		                    }
		                });
		                $('.fixedContent').scrollTop($('#cstream').height());
		                $('#msenger textarea').val('');
						$('#msenger textarea').focus();
		            }					
				});
				request.fail(function(s){
					console.log(s);
				});
			}
		</script>
	</body>
</html>
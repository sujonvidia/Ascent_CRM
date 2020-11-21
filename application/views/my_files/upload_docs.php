<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="<?php echo site_url("myfiles/do_upload"); ?>" enctype="multipart/form-data" id="fileupload">
            <input id="file1" name="fileToUpload[]" class="file" type="file" multiple data-min-file-count="1">
            <br>
            <!-- For picup the current url -->
			<input type="hidden" class="cururl" name="cururl">
			<input type="hidden" name="uid" value="<?php echo $id; ?>">
            <button type="button" onclick="postuploadfile()" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-default">Reset</button>
            <p>&nbsp;</p>
        </form>


        <script type="text/javascript">
        	$(".cururl").val($("#site-map-val").val());
        	$("#file1").fileinput({
				showUpload: false,
				// showCaption : false,
				fileType: "any",
				// browseIcon : '',
		        // browseLabel : '',
		        // browseClass : ''
			});


			function postuploadfile(){
				var formData = new FormData($('#fileupload')[0]);
				
				var request = $.ajax({
				url: $("#fileupload").attr("action"),
				method: "POST",
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				dataType: "json"
				});
				request.done(function(rsp) {
					if(rsp){
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");
						scanjs($("#site-map-val").val());
					}
				});
			}
        	
        </script>
	</body>
</html>
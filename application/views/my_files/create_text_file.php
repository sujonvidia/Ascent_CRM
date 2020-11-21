<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="<?php echo site_url("myfiles/createfile"); ?>" id="createfile-form" onsubmit="return false; createfileformsubmit();" method="POST">
            <div class="form-group">
            	<label>File Body</label>
				<textarea class="form-control" name="filebody" rows="3"></textarea>
			</div>
			<div class="form-group">
				<input type="text" name="filename" class="form-control" placeholder="Enter File Name">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit" onclick="createfileformsubmit()">Create!</button>
				<!-- For picup the current url -->
				<input type="hidden" class="cururl" name="cururl">
				<input type="hidden" name="uid" value="<?php echo $id; ?>">
			</div>
        </form>


        <script type="text/javascript">
        	$(".cururl").val($("#site-map-val").val());

        	function createfileformsubmit(){
				var req = $.ajax({
					url: $("#createfile-form").attr("action"),
					method: "POST",
					data: $("#createfile-form").serialize(),
					dataType: "json"
				});
				req.done(function(res){
					if(res.result){
						swal("Confirmation", "File create successfully", "success");
					}
					var target = $("div[id^=ekkoLightbox]");
					var targetid = $(target).attr("id");
					$("#"+targetid+" .close").trigger("click");
					scanjs($("#site-map-val").val());
				});
			}
        	
        </script>
	</body>
</html>
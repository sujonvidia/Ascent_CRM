<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
	</head>
	<body>
		<form action="<?php echo site_url("myfiles/mkdir"); ?>" id="newfolder-form" onsubmit="return false; newfolderformsubmit();" method="POST">
            <input type="text" name="newfolder-name" class="form-control">
			<p>&nbsp;</p>
			<button class="btn btn-primary" type="submit" onclick="newfolderformsubmit()">Create!</button>
			<!-- For picup the current url -->
			<input type="hidden" class="cururl" name="cururl">
			<input type="hidden" name="uid" value="<?php echo $id; ?>">
			<p>&nbsp;</p>
        </form>


        <script type="text/javascript">
        	$(".cururl").val($("#site-map-val").val());

        	function newfolderformsubmit(){
				var request = $.ajax({
				url: $("#newfolder-form").attr("action"),
				method: "POST",
				data: $('#newfolder-form').serialize(),
				dataType: "json"
				});
				request.done(function( rsp ) {
					if(rsp.result){
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");
						scanjs($("#site-map-val").val());
					}else{
						var target = $("div[id^=ekkoLightbox]");
						var targetid = $(target).attr("id");
						$("#"+targetid+" .close").trigger("click");
					}
				});
			}
        	
        </script>
	</body>
</html>
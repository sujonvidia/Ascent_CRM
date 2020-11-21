<!DOCTYPE html>
<html lang="en">
<head>
	
	<title>Navigate</title>
    
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="Navigate Project Management System" />
	<meta name="author" content="ITL-2016" />
	
	

	<?php include 'template/includes_top.php';?>

	<style type="text/css">
		body{background: #152940;}
	</style>
	
</head>
<body class="animated fadeInDown">

		<div role="main">

			<!-- MAIN CONTENT -->
			<div class="col-xs-12 col-sm-12 col-lg-12">&nbsp;</div>
			<div id="content" class="container">
				<div class="alert alert-danger fade <?php echo (isset($error_log))?"in":""; ?>">
					<button class="close" data-dismiss="alert"><i class="fa-fw fa fa-times"></i></button>
					<sapn id="error_msg"><?php echo (isset($error_log))?$error_log:""; ?></sapn>
				</div>
				<div class="row vertical-center" style="min-height: 91.4vh;">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"  style="margin-top: -13%;">
						<div class="well no-padding">
							<form id="login-form" name="dataset" action="<?php echo base_url(); ?>login/post_reset_pass" methos="POST" class="smart-form client-form">
								<header>
									<img src="<?php echo base_url("asset/img/logo.png"); ?>" class="custom-logo-y" />
								</header>

								<fieldset>
									<section>
										<label class="label">New Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="new_password" name="new_password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your new password</b> </label>
									</section>
									<section>
										<label class="label">Confirm Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="con_password" name="con_password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Confirm password</b> </label>
									</section>
								</fieldset>
								<footer>
									<input type="hidden" name="id" value="<?php echo $id; ?>">
									<input type="hidden" name="code" value="<?php echo $code; ?>">
									<button type="submit" class="btn btn-primary">
										Save and Sign in
									</button>
								</footer>
							</form>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!--================================================== -->
	<?php include 'template/includes_bottom.php';?>
<script type="text/javascript">
	$('form[name=dataset]').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: this.action,
            type: 'POST',
            dataType: 'JSON',
            data: $('#login-form').serialize(), 
            success: function(response)
			{
				if(response.status === true){
					var req = $.ajax({
						url: base_url+"login/ajax_login",
						type: "POST",
						dataType: "JSON",
						data: {email:response.email, password:response.password}
					});
					req.done(function(result){
						// Redirect to login page
						var redirect_url = '<?php echo base_url(); ?>';
						if(result.redirect_url && result.redirect_url.length)
						{
							redirect_url = result.redirect_url;
						}

						window.location.href = redirect_url;
					});
				} else {
					var str = (response.status).replace("<p>", "");
					str = str.replace("</p>","");
					$("#error_msg").text(str);
					$(".fade").attr("class", "alert alert-danger fade in");
					setTimeout(function(){
						$(".fade").attr("class", "alert alert-danger fade");
					},5000);
				}
			},
            error: function (e) { console.log(e.responseText); }
        });
    });
</script>    
</body>

</html>
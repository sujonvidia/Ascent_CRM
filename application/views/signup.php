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
				<div class="alert alert-danger fade">
					<button class="close" data-dismiss="alert"></button>
					<i class="fa-fw fa fa-times"></i>
					<sapn id="error_msg">The daily cronjob has failed.</sapn>
				</div>
				<div class="row vertical-center" style="min-height: 91.4vh;">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"  style="margin-top: -13%;">
						<div class="well no-padding">
							<form action="<?php echo site_url("login/signupnewuser"); ?>" methos="POST" id="login-form" name="dataset" class="smart-form client-form">
								<header>
									<img src="<?php echo base_url("asset/img/logoOLD.png"); ?>" class="custom-logo-y" />
								</header>

								<fieldset>
									<input type="hidden" name="ws" id="ws" value="<?php echo $org_id; ?>">
									<section>
										<label class="input"> <i class="icon-append fa fa-envelope"></i>
											<input type="text" value="<?php echo $email; ?>" id="email" name="email" placeholder="Email address" required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-envelope txt-color-teal"></i> Please enter email address</b></label>
									</section>
									<section>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" id="name" name="name" placeholder="Full Name" autofocus required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter your full name</b></label>
									</section>
									<section>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="pass1" name="pass1" placeholder="Password" required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Please enter your preferred password</b></label>
									</section>
									<section>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="pass2" name="pass2" placeholder="Confirm Password" required>
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Please confirm your given password</b></label>
									</section>
									<section>
										<div class="note">
											<a href="<?php echo base_url(); ?>">Back</a>
										</div>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										Sign in
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
    
</body>

</html>
<script type="text/javascript">
	$('form[name=dataset]').submit(function (e) {

        e.preventDefault();
        if($("#pass1").val() == $("#pass2").val()){
        	$.ajax({
	            url: this.action,
	            type: 'POST',
	            dataType: 'JSON',
	            data: {
					email: $("input#email").val(),
					name: $("input#name").val(),
					pass: $("input#pass1").val(),
					ws: $("#ws").val()
				},
	            success: function(response)
				{
					if(response.status === true){
						$("#error_msg").text("A activation link send to your email. Please check...");
						$(".fade").attr("class", "alert alert-success fade in");
						setTimeout(function(){
							$(".fade").attr("class", "alert alert-danger fade");
						},5000);
					}
					else{
						var str = (response.status).replace("<p>", "");
						str = str.replace("</p>","");
						$("#error_msg").text(str);
						$(".fade").attr("class", "alert alert-danger fade in");
						setTimeout(function(){
							$(".fade").attr("class", "alert alert-danger fade");
						},5000);
					}
				},
	            error: function(e){
	                console.log(e);
	            }
	        });
        }else{
        	alert("Password does not metch");
        	$("#pass1").focus();
        }
    });
</script>
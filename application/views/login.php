
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
		body{background: #012;}
	</style>
	
</head>
<body class="animated fadeInDown">

		<div role="main">

			<!-- MAIN CONTENT -->
			<div class="col-xs-12 col-sm-12 col-lg-12">&nbsp;</div>
			<div id="content" class="container">
				<div class="alert alert-danger fade">
					<button class="close" data-dismiss="alert">×</button>
					<i class="fa-fw fa fa-times"></i>
					<strong>Error!</strong> Please enter a valid username and password!!!
				</div>
				<div class="row vertical-center" style="min-height: 91.4vh;">
					<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"  style="margin-top: -13%;">
						<div class="well no-padding">
							<form action="<?php echo base_url(); ?>login/ajax_login" methos="POST" id="login-form" name="dataset" class="smart-form client-form">
								<header>
									<img src="<?php echo base_url("asset/img/logoOLD.png"); ?>" class="custom-logo-y" />
								</header>

								<fieldset>
									
									<section>
										<!-- <label class="label">E-mail</label> -->
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" id="email" name="email">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i> Please enter email address/username</b></label>
									</section>

									<section>
										<!-- <label class="label">Password</label> -->
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" id="password" name="password">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Enter your password</b> </label>
										<div class="note">
											<a href="<?php echo site_url("login/forgot"); ?>">Forgot password?</a>
										</div>
									</section>

									<section>
										<label class="checkbox">
											<input onchange="checkNavInfo()" id="chkNav" value="0" type="checkbox" name="remember">
											<i></i>Stay signed in</label>
									</section>
								</fieldset>
								<footer>
									<button type="submit" class="btn btn-primary">
										Sign in
									</button>
								</footer>
							</form>

						</div>
						
						<!-- <h5 class="text-center txt-color-blueLight"> - Or sign in using -</h5>
															
							<ul class="list-inline text-center">
								<li>
									<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
								</li>
							</ul> -->
						
					</div>
				</div>
			</div>

		</div>
		<!--================================================== -->
	<?php include 'template/includes_bottom.php';?>
    
</body>

</html>
<script type="text/javascript">
	runAllForms();

	$(function() {
		// Validation
		$("#login-form").validate({
			// Rules for form validation
			rules : {
				email : {
					required : true,
					// email : true
				},
				password : {
					required : true,
					minlength : 3,
					maxlength : 20
				}
			},

			// Messages for form validation
			messages : {
				email : {
					required : 'Please enter your username/ email address'
					// email : 'Please enter a VALID email address'
				},
				password : {
					required : 'Please enter your password'
				}
			},

			// Do not change code below
			errorPlacement : function(error, element) {
				error.insertAfter(element.parent());
			}
		});
	});
</script>
<script type="text/javascript">
	$('form[name=dataset]').submit(function (e) {

        e.preventDefault();
        //var formData = new FormData($(this)[0]);
        //console.log($("input#email").val());
        //console.log($("input#password").val());
        $.ajax({
            url: this.action,
            type: 'POST',
            dataType: 'JSON',
            data: {
				email: $("input#email").val(),
				password: $("input#password").val()
			},
            success: function(response)
			{
				// Login status [success|invalid]
				
				var login_status = response.login_status;
				
				// console.log(response);								
				
				
				// We will give some time for the animation to finish, then execute the following procedures	
				setTimeout(function()
				{
					// If login is invalid, we store the 
					//console.log(login_status);
					if(login_status == 'invalid')
					{
						$(".fade").attr("class", "alert alert-danger fade in");
						setTimeout(function(){
							$(".fade").attr("class", "alert alert-danger fade");
						},5000);

					}
					else
					if(login_status == 'success')
					{
						// Redirect to login page
						var redirect_url = '<?php echo base_url(); ?>';
						if(response.redirect_url && response.redirect_url.length)
						{
							redirect_url = response.redirect_url;
						}

						window.location.href = redirect_url;
					}
					
				}, 500);
			},
            error: function (jqXHR, textStatus, errorThrown) {

                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            }
        });
    });

	var gc = getCookie("ncinfo");
	if(gc == ""){
		$("#chkNav").val(0);
		$("#chkNav").removeAttr("checked");
		setCookie("ncinfo","",0);
		setCookie("ncinfoe","",0);
		setCookie("ncinfop","",0);
	}else{
		// console.log(getCookie("ncinfoe"));
		$("#email").val(getCookie("ncinfoe"));
		$("#password").val(getCookie("ncinfop"));
		$("#chkNav").val(1);
		$("#chkNav").prop("checked");
		$("#chkNav").attr("checked","checked");
	}

	function checkNavInfo(){
		if($("#chkNav").val() == 0){
			$("#chkNav").val(1);
			$("#chkNav").attr("checked","checked");
			setCookie("ncinfo",1,365);
			setCookie("ncinfoe",$("#email").val(),365);
			setCookie("ncinfop",$("#password").val(),365);
		}else{
			$("#chkNav").val(0);
			$("#chkNav").removeAttr("checked");
			setCookie("ncinfo","",0);
		}
		// console.log($("#chkNav").val());
	}

</script>

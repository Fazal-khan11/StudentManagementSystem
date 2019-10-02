<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
	<meta name="author" content="Creative Tim">

	<!-- Title -->
	<title>User Login</title>

	<!-- Favicon -->
	<link href="<?php echo base_url();?>assets/img/brand/favicon.png" rel="icon" type="image/png">

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800" rel="stylesheet">

	<!-- Icons -->
	<link href="<?php echo base_url();?>assets/css/icons.css" rel="stylesheet">

	<!--Bootstrap.min css-->
	<link rel="stylesheet" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css">

	<!-- Ansta CSS -->
	<link href="<?php echo base_url();?>assets/css/dashboard.css" rel="stylesheet" type="text/css">

	<!-- Single-page CSS -->
	<link id="pagesstyle" href="<?php echo base_url();?>assets/plugins/single-page/css/main.css" rel="stylesheet" type="text/css">

	<style>
		@media (min-width: 768px) and (max-width: 1024px) {
			p{
				font-size: large;
			}
		}
		@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
			p{
				font-size: medium;
			}
		}
		@media (min-width: 481px) and (max-width: 767px) {
			p{
				font-size: small;
			}
		}
		@media (min-width: 320px) and (max-width: 480px) {
			p{
				font-size: x-small;
			}
		}
	</style>

	<script type="text/javascript">
        function swapStyleSheet(sheet) {
            document.getElementById('pagesstyle').setAttribute('href', sheet);
        }
	</script>
</head>

<body class="bg-gradient-primary">



<?php if(isset($_SESSION['success'])){?>
	<div class="text-success"><?php echo $_SESSION['success']?></div>
	<?php
}?>
<div class="limiter">
	<div class="container-login100">
		<div class="wrap-login100 p-5">

			<form class="login100-form validate-form" action="" method="post" id="form-login">
					<span class="login100-form-title">
						Member Login
					</span>
				<div>

					<div class="wrap-input100 validate-input" data-validate = "User_name is required">


						<?php
						if(form_error('username') == ''){?>
							<input class="input100" type="text"  name="username"  value="<?php echo set_value('username'); ?>" placeholder="User_Name">
						<?php }
						else { ?>
							<input class="input101" type="text"  name="username"  value="<?php echo set_value('username'); ?>" placeholder="User_Name">
						<?php	} ?>

						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user" aria-hidden="true"></i>
						</span>
					</div>
					<?php if(isset($data['username'])){ ?>
						<p  class="text-danger font-weight-bold" style="margin-left: 35px;"><?php echo $data['username']?> </p>
					<?php }?>

				</div>

				<div>
					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<?php
						if(form_error('password') == ''){?>
							<input class="input100" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
						<?php }
						else { ?>
							<input class="input101" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Password">
						<?php	}?>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					<?php echo form_error('password', '<div class="text-danger font-weight-bold" style="margin-left: 35px;"> ', '</div>'); ?>

				</div>

				<div class="container-login100-form-btn">
					<button name="login" type="submit"  class="login100-form-btn btn-primary">
						Login
					</button>
				</div>

				<div class="text-center pt-1">
					<a class="txt2" href="<?php echo base_url(); ?>register">
						Create your Account
						<i class="fa fa-long-arrow-alt-right m-l-5" aria-hidden="true"></i>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>



<script src="<?php echo base_url();?>assets/plugins/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/plugins/dist/jquery.validate.js"></script>
<script src="<?php echo base_url();?>assets/js/popper.js"></script>
<script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>



</body>
</html>


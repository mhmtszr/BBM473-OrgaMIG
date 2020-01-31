<?php
include 'config.php';
session_start();
if(isset($_SESSION['ID'])){
	header('Location:index.php');
}
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>OrgaMIG Sign Up</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="styles/login_util.css">
	<link rel="stylesheet" type="text/css" href="styles/signup.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/background.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Sign Up
				</span>
				<form action="signupprocess.php" method="POST" class="login100-form validate-form p-b-33 p-t-5">

					<div class="wrap-input100 validate-input" data-validate = "Invalid First Name">
						<input class="input100" type="text" name="firstName" placeholder="First Name" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Invalid Last Name">
						<input class="input100" type="text" name="lastName" placeholder="Last Name" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Invalid Mail Address">
						<input class="input100" type="email" name="mailAddress" placeholder="Mail Address" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Invalid Address">
						<input class="input100" type="text" name="address" placeholder="Address" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Invalid Phone Number">
						<input class="input100" type="text" pattern="05[0-9]*" name="phoneNumber" placeholder="Phone Number" maxlength="11" required>
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" placeholder="Password" required>
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn" name="signupButton">
							Sign Up
						</button>
						
						<button class="login100-form-btn" name="loginButton">
							<a href="login.php" class="loginText">Login</a>
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>

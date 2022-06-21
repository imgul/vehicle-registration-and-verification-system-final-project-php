<?php require 'inc/_info.php'; ?>
<?php
require 'inc/_functions.php';
$conn = db_connect();

if (!$conn)
	die("Oh Shoot!! Connection Failed");

if (isset($_POST['register'])) {
	// Form Validation
	function test_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	// Form handle
	$fname = test_input($_POST['fname']);
	$lname = test_input($_POST['lname']);
	$email = test_input($_POST['email']);
	$phone = test_input($_POST['phone']);
	$password = test_input($_POST['password']);
	$cpassword = test_input($_POST['cpassword']);

	// Check if passwords match
	$is_password_same = false;
	$msg_type = "";
	$msg_detail = "";
	if ($password == $cpassword) {
		$is_password_same = true;

		// secure password
		$password = password_hash($password, PASSWORD_DEFAULT);
	}

	// echo "<h1>is_password_same: " . $is_password_same . "</h1>";

	if ($is_password_same) {
		// Check if user already exists
		$sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `phone`, `password`) VALUES ('$fname', '$lname', '$email', '$phone', '$password')";
		$result = mysqli_query($conn, $sql);
		if ($result) {
			header("Location: login.php?msg_type=success&msg_detail=Registration Successful");
			$msg_type = "success";
			$msg_detail = "Success: Your Account has been created";
		} else {
			$msg_type = "danger";
			$msg_detail = "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
	} else {
		$msg_type = "danger";
		$msg_detail = "Error: " . $sql . "<br>" . mysqli_error($conn);
	}
}


// Alert Messages
require 'inc/_alert.php';
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Register | UoS Bus</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
	<!--All Css Here-->

	<!-- Material Design Iconic Font CSS-->
	<link rel="stylesheet" href="css/material-design-iconic-font.min.css">
	<!-- Font Awesome CSS-->
	<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
	<!-- Animate CSS-->
	<link rel="stylesheet" href="css/plugins.css">
	<!-- Bootstrap CSS-->
	<!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->
	<!-- google fonts -->
	<!-- <link rel="preconnect" href="https://fonts.gstatic.com"> -->
	<!-- <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500&display=swap" rel="stylesheet"> -->
	<!-- Font-awesome -->
	<link rel="stylesheet" href="admin/vendor/fontawesome-free/css/all.min.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="admin/css/sb-admin-2.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.html"></script>

	<?php $page = 'register'; ?>

</head>

<body class="bg-gradient-primary">
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<!--Header Area Start-->
	<?php require 'inc/_front-header.php'; ?>
	<!--Header Area Start-->

	<div class="container">

		<div class="card o-hidden border-0 shadow-lg my-5">
			<div class="card-body p-0">
				<!-- Nested Row within Card Body -->
				<div class="row">
					<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
					<div class="col-lg-7">
						<div class="p-5">
							<div class="text-center">
								<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
							</div>
							<form class="user needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input name="fname" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="First Name" required>
									</div>
									<div class="col-sm-6">
										<input name="lname" type="text" class="form-control form-control-user" id="exampleLastName" placeholder="Last Name">
									</div>
								</div>
								<div class="form-group">
									<input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address" required>
								</div>
								<div class="form-group">
									<input name="phone" type="text" class="form-control form-control-user" id="exampleInputPhone" placeholder="Phone Number" required>
								</div>
								<div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
										<input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password (8-20 Characters)" minlength="8" maxlength="20" required>
									</div>
									<div class="col-sm-6">
										<input name="cpassword" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" minlength="8" maxlength="20" required>
									</div>
								</div>
								<button type="submit" name="register" class="btn btn-primary btn-user btn-block">
									Register Account
								</button>
								<!-- <hr>
								<a href="#" class="btn btn-google btn-user btn-block">
									<i class="fab fa-google fa-fw"></i> Register with Google
								</a>
								<a href="#" class="btn btn-facebook btn-user btn-block">
									<i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
								</a> -->
							</form>
							<hr>
							<div class="text-center">
								<a class="small" href="forgot-password.php">Forgot Password?</a>
							</div>
							<div class="text-center">
								<a class="small" href="login.php">Already have an account? Login!</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!--Footer Area Start-->
	<?php require 'inc/_front-footer.php'; ?>
	<!--Footer Area End-->





	<!--All Js Here-->

	<!--Jquery 1.12.4-->
	<script src="js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
	<!--Popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/d8cfbe84b9.js"></script>
	<!--Plugins-->
	<script src="js/plugins.js"></script>
	<!--Ajax Mail-->
	<script src="js/ajax.mail.js"></script>
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!--Main Js-->
	<script src="js/main.js"></script>
</body>

</html>
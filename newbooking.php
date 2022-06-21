<?php require 'inc/_info.php'; ?>
<?php
require 'inc/_check-user-loggedin.php';
require 'inc/_functions.php';
$conn = db_connect();
?>

<?php
if (isset($_POST['book-ticket'])) {
	$route = $_POST['route'];
	$seat = $_POST['seat'];

	$user_id = $_SESSION['user_id'];
	$user_fname = $_SESSION['user_fname'];
	$user_lname = $_SESSION['user_lname'];
	$user_email = $_SESSION['user_email'];
	$user_phone = $_SESSION['user_phone'];

	// Get data from bookings table
	// $sqlBookings = "SELECT * FROM bookings WHERE cust_id = '$user_id'";
	// $resultBookings = mysqli_query($conn, $sqlBookings);

	// Get data from routes table for pricing
	$sqlRoutes = "SELECT * FROM routes WHERE route_id = '$route'";
	$resultRoutes = mysqli_query($conn, $sqlRoutes);
	$rowRoutes = mysqli_fetch_assoc($resultRoutes);
	$route_price = $rowRoutes['route_step_cost'];
	$bookingAmount = $route_price * $seat;

	// Insert data into bookings table
	$sql = "INSERT INTO `bookings` (`cust_id`, `cust_fname`, `cust_lname`, `cust_email`, `cust_phone`, `route`, `seat`, `cost_per_seat`, `booking_amount`) VALUES ('$user_id', '$user_fname', '$user_lname', '$user_email', '$user_phone', '$route', '$seat', '$route_price', '$bookingAmount')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> Your ticket has been booked. View your ticket <a href="bookings.php" class="alert-link">here</a>.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
	} else {
		echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
					<strong>Error!</strong> Your ticket has not been booked.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
					</div>';
	}
}
// $user_id = $_SESSION['user_id'];
// $user_fname = $_SESSION['user_fname'];
// $user_lname = $_SESSION['user_lname'];
// $user_email = $_SESSION['user_email'];
// echo "User id is: $user_id<br>";
// echo "User fname is: $user_fname<br>";
// echo "User lname is: $user_lname<br>";
// echo "User email is: $user_email<br>";
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Book Ticket | UoS Bus</title>
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
	<link rel="stylesheet" href="./assets/vendor/fontawesome-free/css/fontawesome.min.css">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="admin/css/sb-admin-2.min.css">
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.html"></script>

	<?php $page = 'newbooking'; ?>

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
								<h1 class="h4 text-gray-900 mb-4">Book a Ticket!</h1>
							</div>
							<!-- Get the routes information from the database -->
							<?php
							$sqlRoutes = "SELECT * FROM routes";
							$resultRoutes = mysqli_query($conn, $sqlRoutes);
							$routes = mysqli_fetch_all($resultRoutes, MYSQLI_ASSOC);
							$length = mysqli_num_rows($resultRoutes);
							// encode the routes information into a json file
							// $routesJson = json_encode($routes);
							// echo "<pre>";
							// print_r($routesJson);
							// echo "</pre>";
							?>
							<form class="user needs-validation" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
								<div class="form-group">
									<label for="selectRoute">Select Route</label>
									<select class="form-select" name="route" id="selectRoute" aria-label="Select Your Route" required>
										<option disabled>Select Route</option>
										<?php
										for ($i = 0; $i < $length; $i++) {
											echo "<option value='" . $routes[$i]['route_id'] . "'>" . $routes[$i]['route_cities'] . " - " . $routes[$i]['route_dep_time'] . " - Rs. " . $routes[$i]['route_step_cost'] . "</option>";
										}
										?>
										<!-- <option value="1" selected>One</option>
										<option value="2">Two</option>
										<option value="3">Three</option> -->
									</select>
								</div>
								<div class="form-group">
									<label for="selectRoute">Select Seat</label>
									<select class="form-select" name="seat" aria-label="Select Your Seat" required>
										<option disabled>Select Seats</option>
										<option value="1" selected>1</option>
										<?php
										for ($i = 2; $i <= 10; $i++) {
											echo "<option value='" . $i . "'>" . $i . "</option>";
										}
										?>
										<option disabled>For more seats, contact us.</option>
									</select>
								</div>
								<button type="submit" name="book-ticket" class="btn btn-primary btn-user btn-block">
									Book Ticket <i class="fas fa-bookmark ml-2"></i>
								</button>
							</form>
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
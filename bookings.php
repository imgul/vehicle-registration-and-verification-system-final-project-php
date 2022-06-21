<?php require 'inc/_info.php'; ?>
<?php
require 'inc/_check-user-loggedin.php';
require 'inc/_functions.php';
$conn = db_connect();
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Bookings | UoS Bus</title>
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
	<script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="assets/vendor/css/bootstrap-v5.0.2.min.css">
	<!-- Custom styles from Admin Dashboard-->
	<link href="admin/css/sb-admin-2.min.css" rel="stylesheet">
	<!-- Custom styles for this page -->
	<link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.html"></script>

	<?php $page = 'bookings'; ?>

</head>

<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="container-fluid">
		<div class="wrapper">
			<!--Header Area Start-->
			<?php require 'inc/_front-header.php'; ?>
			<!--Header Area Start-->

			<!-- DataTales Start -->
			<div class="card shadow mb-4">
				<div class="card-header py-3">
					<h3 class="m-0 font-weight-bold text-primary">My Bookings</h3>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<?php
						$user_id = $_SESSION['user_id'];
						// Get data from bookings table
						$sqlBookings = "SELECT * FROM bookings WHERE cust_id = '$user_id'";
						$resultBookings = mysqli_query($conn, $sqlBookings);


						// Check if there are any bookings
						if (mysqli_num_rows($resultBookings) > 0) {
							// Display bookings
							echo "<table class='table table-bordered' id='dataTable' width='100%' cellspacing='0'>";
							echo "<thead>";
							echo "<tr>";
							echo "<th>Booking ID</th>";
							echo "<th>Customer ID</th>";
							echo "<th>Customer Name</th>";
							echo "<th>Customer Email</th>";
							echo "<th>Customer Phone</th>";
							echo "<th>Route</th>";
							echo "<th>Cost Per Seat</th>";
							echo "<th>Seats</th>";
							echo "<th>Total Price</th>";
							echo "<th>Booking Time</th>";
							// echo "<th>Actions</th>";
							echo "</tr>";
							echo "</thead>";
							echo "<tbody>";
							while ($rowBookings = mysqli_fetch_assoc($resultBookings)) {
								// Get data from routes table for pricing
								$sqlRoutes = "SELECT * FROM routes WHERE route_id = '$rowBookings[route]'";
								$resultRoutes = mysqli_query($conn, $sqlRoutes);
								$rowRoutes = mysqli_fetch_assoc($resultRoutes);
								echo "<tr>";
								echo "<td>" . $rowBookings['id'] . "</td>";
								echo "<td>" . $rowBookings['cust_id'] . "</td>";
								echo "<td>" . $rowBookings['cust_fname'] . " " . $rowBookings['cust_lname'] . "</td>";
								echo "<td>" . $rowBookings['cust_email'] . "</td>";
								echo "<td>" . $rowBookings['cust_phone'] . "</td>";
								echo "<td>" . $rowRoutes['route_cities'] . "</td>";
								echo "<td>" . $rowRoutes['route_step_cost'] . "</td>";
								echo "<td>" . $rowBookings['seat'] . "</td>";
								echo "<td>" . $rowRoutes['route_step_cost'] * $rowBookings['seat'] . "</td>";
								echo "<td>" . $rowBookings['created_at'] . "</td>";
								// Action to edit and delete bookings
								// echo "<td>";
								// echo "<a href='edit-booking.php?id=" . $rowBookings['id'] . "' class='btn btn-primary btn-sm'><i class='fas fa-edit'></i></a>";
								// echo "<a href='delete-booking.php?id=" . $rowBookings['id'] . "' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i></a>";
								// echo "</td>";
								echo "</tr>";
							}
							echo "</tbody>";
							echo "</table>";
						} else {
							echo "<p>You have no bookings.</p>";
						}

						?>
					</div>
				</div>
			</div>
			<!-- Data tables End -->
		</div>

		<!--Footer Area Start-->
		<?php require 'inc/_front-footer.php'; ?>
		<!--Footer Area End-->
	</div>





	<!--All Js Here-->

	<!--Jquery 1.12.4-->
	<script src="js/vendor/modernizr-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-3.6.0.min.js"></script>
	<script src="js/vendor/jquery-migrate-3.3.2.min.js"></script>
	<!--Popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap-->
	<script src="js/bootstrap.min.js"></script>
	<!--Plugins-->
	<script src="js/plugins.js"></script>
	<!--Ajax Mail-->
	<script src="js/ajax.mail.js"></script>
	<!-- Sweet Alert -->
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<!-- Core plugin JavaScript-->
	<!-- <script src="vendor/jquery-easing/jquery.easing.min.js"></script> -->
	<!-- Custom scripts from Admin Dashboard-->
	<!-- <script src="admin/js/sb-admin-2.js"></script> -->
	<!-- Page level plugins -->
	<script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

	<!-- Page level custom scripts -->
	<script src="assets/js/dataTables.js"></script>
	<!--Main Js-->
	<script src="js/main.js"></script>
	<script>

	</script>
</body>

</html>
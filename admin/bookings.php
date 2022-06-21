<!-- Show these admin pages only when the admin is logged in -->
<?php require '../inc/_admin-check.php'; ?>

<?php
require '../inc/_functions.php';
$conn = db_connect();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Customers | UoS Bus</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/css/bootstrap-v5.0.2.min.css" rel="stylesheet" type="text/css">
    <!-- Custom styles for this page -->
    <link href="../assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php $page = "bookings"; ?>

</head>

<body id="page-top">

    <!-- Requiring the admin header files -->
    <?php require '../inc/_admin-header.php'; ?>
    <!-- Add, Edit and Delete Buses -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Bookings</h1>
        </div>

        <!-- DataTales Start -->
        <div class="card shadow mb-4 mt-3">
            <div class="card-header py-3">
                <h3 class="m-0 font-weight-bold text-primary">Bookings</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php
                    $user_id = $_SESSION['user_id'];
                    // Get data from bookings table
                    $sqlBookings = "SELECT * FROM bookings";
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
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

    </div>



    <!-- Footer -->
    <!-- <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Uos Bus Ticket Reservation System 2022-23</span>
            </div>
        </div>
    </footer> -->
    <!-- End of Footer -->



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugins -->
    <script src="../assets/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="../assets/js/dataTables.js"></script>

    <!-- Admin Bus -->
    <script src="js/admin_routes.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
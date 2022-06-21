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

    <title>Buses | UoS Bus</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/css/bootstrap-v5.0.2.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php $page = "bus"; ?>

</head>

<body id="page-top">

    <!-- Requiring the admin header files -->
    <?php require '../inc/_admin-header.php'; ?>
    <!-- Add, Edit and Delete Buses -->
    <?php
    /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
    if ($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["add_bus"])) {
            // Should be validated client-side
            $busno = strtoupper($_POST["busno"]);
            $buscapacity = $_POST["buscapacity"];

            $bus_exists = exist_buses($conn, $busno);
            $bus_added = false;

            if (!$bus_exists) {
                // Route is unique, proceed
                $sql = "INSERT INTO `buses` (`bus_no`, `bus_capacity`) VALUES ('$busno', '$buscapacity')";

                $result = mysqli_query($conn, $sql);

                if ($result)
                    $bus_added = true;
            }

            if ($bus_added) {
                // Show success alert
                echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successful!</strong> Bus Information Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                // Add the bus to seats table
                $seatSql = "INSERT INTO `seats` (`bus_no`) VALUES ('$busno');";
                $result = mysqli_query($conn, $seatSql);
            } else {

                // Show error alert
                echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Bus Already Exists.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        if (isset($_POST["edit"])) {
            // EDIT ROUTES
            $busno = strtoupper($_POST["busno"]);
            $id = $_POST["id"];
            $id_if_bus_exists = exist_buses($conn, $busno);

            if (!$id_if_bus_exists || $id == $id_if_bus_exists) {
                $updateSql = "UPDATE `buses` SET `bus_no` = '$busno' WHERE `buses`.`id` = $id;";
                // $updateSql1 = "UPDATE `buses` SET `bus_no` = '$busno' WHERE `buses`.`id` = $id;";
                // $updateSql1 .= "UPDATE `seats` SET `bus_no` = '$busno' WHERE `seats`.`bus_no` = '$busno';";

                $updateResult = mysqli_query($conn, $updateSql);
                $rowsAffected = mysqli_affected_rows($conn);

                $messageStatus = "danger";
                $messageInfo = "";
                $messageHeading = "Error!";

                if (!$rowsAffected) {
                    $messageInfo = "No Edits Administered!";
                } elseif ($updateResult) {
                    // Show success alert
                    $messageStatus = "success";
                    $messageHeading = "Successfull!";
                    $messageInfo = "Bus details Edited";

                    // Update the seats table
                    $seatSql = "UPDATE `seats` SET `bus_no` = '$busno' WHERE `seats`.`bus_no` = '$busno';";
                    mysqli_query($conn, $seatSql);
                } else {
                    // Show error alert
                    $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                }

                // MESSAGE
                echo '<div class="my-0 alert alert-' . $messageStatus . ' alert-dismissible fade show" role="alert">
                        <strong>' . $messageHeading . '</strong> ' . $messageInfo . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                // If bus details already exists
                echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Bus details already exists
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        if (isset($_POST["delete"])) {
            // DELETE BUS
            $id = $_POST["id"];
            $selectId = "SELECT `bus_no` FROM `buses` WHERE `id` = $id";
            $result = mysqli_query($conn, $selectId);
            $bus_no = mysqli_fetch_assoc($result)["bus_no"];

            // $bus_no = get_from_table($conn, "buses", "id", $id, "bus_no");
            // Delete the bus with id => id
            $deleteSql = "DELETE FROM `buses` WHERE `buses`.`id` = $id";

            $deleteResult = mysqli_query($conn, $deleteSql);
            $rowsAffected = mysqli_affected_rows($conn);
            $messageStatus = "danger";
            $messageInfo = "";
            $messageHeading = "Error!";

            if (!$rowsAffected) {
                $messageInfo = "Record Doesnt Exist";
            } elseif ($deleteResult) {
                // echo $num;
                // Show success alert
                $messageStatus = "success";
                $messageInfo = "Bus Details deleted";
                $messageHeading = "Successfull!";

                // Delete Bus from Seat table
                $sql = "DELETE from seats WHERE bus_no='$bus_no'";
                mysqli_query($conn, $sql);
            } else {
                // Show error alert
                $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
            }
            // Message
            echo '<div class="my-0 alert alert-' . $messageStatus . ' alert-dismissible fade show" role="alert">
                    <strong>' . $messageHeading . '</strong> ' . $messageInfo . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
        }
    }
    ?>

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Buses</h1>
        </div>

        <!-- bootstrap modal button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus mr-1"></i> Add New Bus
        </button>

        <!-- Show Bookings -->
        <?php
        $resultSql = "SELECT * FROM `buses` ORDER BY bus_created DESC";

        $resultSqlResult = mysqli_query($conn, $resultSql);

        if (!mysqli_num_rows($resultSqlResult)) { ?>
            <!-- Buses are not present -->
            <div class="container mt-4">
                <div id="noCustomers" class="alert alert-dark " role="alert">
                    <h1 class="alert-heading">No Buses Found!!</h1>
                    <p class="fw-light">Be the first person to add one!</p>
                </div>
            </div>
        <?php } else { ?>
            <!-- If Buses are present -->
            <table class="table table-bordered table-hover mt-5">
                <thead>
                    <th>#</th>
                    <th>Bus Number</th>
                    <th>Actions</th>
                </thead>
                <?php
                $ser_no = 0;
                while ($row = mysqli_fetch_assoc($resultSqlResult)) {
                    $ser_no++;
                    // echo "<pre>";
                    // var_export($row);
                    // echo "</pre>";

                    $id = $row["id"];
                    $busno = $row["bus_no"];
                ?>
                    <tr>
                        <td>
                            <?php
                            echo $ser_no;
                            ?>
                        </td>
                        <td>
                            <?php
                            echo $busno;
                            ?>
                        </td>
                        <td>
                            <button class="btn btn-primary btn-sm edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php echo $id; ?>" data-busno="<?php echo $busno; ?>">Edit</button>
                            <button class="btn btn-danger btn-sm delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo $id; ?>">Delete</button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        <?php } ?>


    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- All Modals Here -->
    <!-- Add Buses Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add A Bus</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addBusForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="busno" class="form-label">Bus Number</label><br>
                            <input type="text" class="form-control" id="busno" name="busno" required placeholder="e.g. LHR000"><br>
                            <label for="buscapacity" class="form-label">Bus Capacity</label><br>
                            <input type="text" class="form-control" id="buscapacity" name="buscapacity" required placeholder="e.g. 45">
                            <span id="error" class="error"></span>
                        </div>
                        <button type="submit" class="btn btn-success" name="add_bus">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <!-- Add Anything -->
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-circle"></i></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2 class="text-center pb-4">
                        Are you sure?
                    </h2>
                    <p>
                        Do you really want to delete this bus? <strong>This process cannot be undone.</strong>
                    </p>
                    <!-- Needed to pass id -->
                    <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="delete-form" method="POST">
                        <input id="delete-id" type="hidden" name="id">
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" form="delete-form" name="delete" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; UoS Bus <?php echo date('Y'); ?></span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

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

    <!-- Admin Bus -->
    <script src="js/admin-bus.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
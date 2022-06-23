<!-- Show these admin pages only when the admin is logged in -->
<?php require '../inc/_admin-check.php'; ?>

<?php
require '../inc/_info.php';
require '../inc/_functions.php';
$conn = db_connect();
require '../inc/_getJSON.php';
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

    <title>Add Vehicle | <?= $website_name ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/css/bootstrap-v5.0.2.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php $page = "add-vehicle"; ?>

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
        if (isset($_POST["add_vehicle"])) {
            // Should be validated client-side
            $number = test_input(strtoupper($_POST["number"]));
            $company = test_input($_POST["company"]);
            $type = test_input($_POST["type"]);
            $color = test_input($_POST["color"]);
            $date = test_input($_POST["date"]);
            $owner_name = test_input($_POST["owner-name"]);
            $owner_phone = test_input($_POST["owner-phone"]);
            $owner_address = test_input($_POST["owner-address"]);
            $other_specs = test_input($_POST["other-specs"]);

            $vehicle_exists = exist_vehicle($conn, $number);
            $vehicle_added = false;

            if (!$vehicle_exists) {
                // Route is unique, proceed
                $sql = "INSERT INTO `vehicles` (`number`, `company`, `type`, `color`, `owner_name`, `owner_phone`, `owner_address`, `other_specs`, `date_purchase`) VALUES ('$number', '$company', '$type', '$color', '$owner_name', '$owner_phone', '$owner_address', '$other_specs', '$date')";

                $result = mysqli_query($conn, $sql);

                if ($result)
                    $vehicle_added = true;
            }

            if ($vehicle_added) {
                // Show success alert
                echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successful!</strong> Vehicle Information Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                // Show error alert
                echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Vehicle Number Already Exists.
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
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add New Vehicle</h1>
                            </div>
                            <form id="vehicleTable" class="user needs-validation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="vehicleNumber">Vehicle Number</label>
                                        <input name="number" type="text" class="form-control" id="vehicleNumber" placeholder="Vehicle Number" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php
                                        $compSql = "SELECT * FROM `companies`";
                                        $compResult = mysqli_query($conn, $compSql);
                                        $compRow = mysqli_fetch_all($compResult, MYSQLI_ASSOC);
                                        $compLength = count($compRow);
                                        ?>
                                        <label for="vehicleCompany">Vehicle Company</label>
                                        <select name="company" id="vehicleCompany" class="form-select" aria-label="Select Vehicle Company">
                                            <option value="" disabled selected>Select Vehicle Company</option>
                                            <?php
                                            for ($i = 0; $i < $compLength; $i++) {
                                                echo "<option value='" . $compRow[$i]['name'] . "'>" . strtoupper($compRow[$i]['name'])  . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <label for="vehicleType">Vehicle Type</label>
                                        <select name="type" id="vehicleType" class="form-select" aria-label="Select Vehicle Type">
                                            <option value="" disabled selected>Select Vehicle Type</option>
                                            <option value="bike">Bike</option>
                                            <option value="car">Car</option>
                                            <option value="heavy-vehicle">Heavy Vehicle</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="vehicleColor">Vehicle Color</label>
                                        <select name="color" id="vehicleColor" class="form-select" aria-label="Select Vehicle Color">
                                            <option value="" disabled selected>Select Vehicle Color</option>
                                            <option value="black">Black</option>
                                            <option value="white">White</option>
                                            <option value="red">Red</option>
                                            <option value="blue">Blue</option>
                                            <option value="green">Green</option>
                                            <option value="purple">Purple</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="vehiclePurchase">Purchase Date</label>
                                        <input class="form-control date" type="date" name="date" id="vehiclePurchase">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="InputOwnerName">Owner Name</label>
                                        <input name="owner-name" type="text" class="form-control" id="InputOwnerName" placeholder="Owner Name" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="InputPhone">Owner Phone</label>
                                        <input name="owner-phone" type="text" class="form-control" id="InputPhone" placeholder="Phone Number" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="InputAddress">Owner Address</label>
                                    <input name="owner-address" type="text" class="form-control" id="InputAddress" placeholder="Owner Address" required>
                                </div>
                                <div class="form-group">
                                    <label for="InputOtherSpec">Other Specifications (optional)</label>
                                    <textarea name="other-specs" class="form-control" id="InputOtherSpec" placeholder="Other Specifications"></textarea>
                                </div>
                                <button type="submit" name="add_vehicle" id="addVehicleFormButton" class="btn btn-success btn-user btn-block">
                                    Add Vehicle <i class="fas fa-fw fa-plus"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                    <h5 class="modal-title" id="exampleModalLabel">Add A Vehicle</h5>
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
                <span>Copyright &copy; <?= $website_short_name; ?> <?php echo date('Y'); ?></span>
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

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Admin Bus -->
    <script src="js/admin-add-vehicle.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
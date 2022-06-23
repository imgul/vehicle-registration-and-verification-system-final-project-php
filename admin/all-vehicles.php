<!-- Show these admin pages only when the admin is logged in -->
<?php require '../inc/_admin-check.php'; ?>

<?php
require '../inc/_functions.php';
require '../inc/_info.php';
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

    <title>All Vehicles | <?= $website_name; ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/css/bootstrap-v5.0.2.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Datatables -->
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <?php $page = "all-vehicles"; ?>

</head>

<body id="page-top">

    <!-- Requiring the admin header files -->
    <?php require '../inc/_admin-header.php'; ?>
    <!-- Add, Edit and Delete Buses -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Vehicles</h1>
        </div>

        <!-- Show Routes -->
        <?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
        if ($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["edit"])) {
                // EDIT VEHICLE
                $id = $_POST["id"];
                $owner_name = $_POST["owner-name"];
                $owner_phone = $_POST["owner-phone"];
                $owner_address = $_POST["owner-address"];
                $other_specs = $_POST["other-specs"];


                $updateSql = "UPDATE `vehicles` SET
                    `owner_name` = '$owner_name',
                    `owner_phone`='$owner_phone',
                    `owner_address` = '$owner_address',
                    `other_specs` = '$other_specs' WHERE `vehicles`.`id` = '$id';";

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
                    $messageInfo = "Vehicle details Edited";
                } else {
                    // Show error alert
                    $messageInfo = "Your request could not be processed due to technical Issues from our part. We regret the inconvenience caused";
                }

                // MESSAGE
                echo '<div class="my-0 alert alert-' . $messageStatus . ' alert-dismissible fade show" role="alert">
                    <strong>' . $messageHeading . '</strong> ' . $messageInfo . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
            if (isset($_POST["delete"])) {
                // DELETE ROUTES
                $id = $_POST["id"];
                // Get the bus_no from route_id
                // $busno_toFree = number_from_vehicle_id($conn, $id);
                // Delete the route with id => id
                $deleteSql = "DELETE FROM `vehicles` WHERE `vehicles`.`id` = $id";
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
                    $messageInfo = "Vehicle Details deleted";
                    $messageHeading = "Successfull!";
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
        <?php
        $resultSql = "SELECT * FROM `vehicles` ORDER BY created_at DESC";

        $resultSqlResult = mysqli_query($conn, $resultSql);
        if (!mysqli_num_rows($resultSqlResult)) { ?>
            <!-- Routes are not present -->
            <div class="container mt-4">
                <div id="noRoutes" class="alert alert-dark " role="alert">
                    <h1 class="alert-heading">No Routes Found!!</h1>
                    <p class="fw-light">Be the first person to add one!</p>
                    <button class="btn btn-success"><a href="add-vehicle.php" class="text-white">Add Vehicle</a></button>
                </div>
            </div>
        <?php } else { ?>
            <!-- Routes Are present -->
            <section id="route">
                <div id="head">
                </div>
                <div id="route-results">
                    <table id="vehicleTable" class="table table-hover table-bordered mt-5 overflow-scroll">
                        <thead>
                            <th>ID</th>
                            <th>Number</th>
                            <th>Company</th>
                            <th>Type</th>
                            <th>Color</th>
                            <th>Owner Name</th>
                            <th>Owner Phone</th>
                            <th>Owner Address</th>
                            <th>Date of Purchase</th>
                            <th>Registered At</th>
                            <th>Actions</th>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultSqlResult)) {
                            // echo "<pre>";
                            // var_export($row);
                            // echo "</pre>";
                            $id = $row["id"];
                            $number = $row["number"];
                            $company = $row["company"];
                            $type = $row["type"];
                            $color = $row["color"];
                            $owner_name = $row["owner_name"];
                            $owner_phone = $row["owner_phone"];
                            $owner_address = $row["owner_address"];
                            $date_purchase = $row["date_purchase"];
                            $created_at = $row["created_at"];
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $id;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $number;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $company;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $type;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $color;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $owner_name; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $owner_phone; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $owner_address; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $date_purchase; ?>
                                </td>
                                <td>
                                    <?php
                                    echo $created_at; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php
                                                                                                                                                    echo $id; ?>" data-owner_name="<?php
                                                                                                                                                                                    echo $owner_name; ?>" data-owner_phone="<?php
                                                                                                                                                                                                                            echo $owner_phone; ?>" data-owner_address="<?php
                                                                                                                                                                                                                                                                        echo $owner_address;
                                                                                                                                                                                                                                                                        ?>" data-other_specs="<?php
                                                                                                                                                                                                                                                                                                echo $other_specs;
                                                                                                                                                                                                                                                                                                ?>">Edit</button>
                                    <button class="btn btn-danger btn-sm delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php
                                                                                                                                                        echo $id; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </section>
        <?php  } ?>



    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    </div>
    <!-- End of Content Wrapper -->

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
                        Do you really want to delete this route? <strong>This process cannot be undone.</strong>
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



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Data tables -->

    <!-- Admin Scripts -->
    <!-- <script src="js/admin-add-vehicle.js"></script> -->
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#vehicleTable').DataTable();
        });
    </script>

</body>

</html>
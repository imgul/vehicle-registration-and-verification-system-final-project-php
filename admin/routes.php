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
    <?php $page = "routes"; ?>

</head>

<body id="page-top">

    <!-- Requiring the admin header files -->
    <?php require '../inc/_admin-header.php'; ?>
    <!-- Add, Edit and Delete Buses -->


    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">All Routes</h1>
        </div>

        <!-- bootstrap modal button -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
            <i class="fas fa-plus mr-1"></i> Add New Route
        </button>

        <!-- Show Routes -->
        <?php
        /*
            1. Check if an admin is logged in
            2. Check if the request method is POST
        */
        if ($loggedIn && $_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["submit"])) {
                /*
                    ADDING ROUTES
                 Check if the $_POST key 'submit' exists
                */
                // Should be validated client-side
                $viaCities = strtoupper($_POST["viaCities"]);
                $cost = $_POST["stepCost"];
                $deptime = $_POST["dep_time"];
                $depdate = $_POST["dep_date"];
                $busno = $_POST["busno"];
                $route_exists = exist_routes($conn, $viaCities, $depdate, $deptime);
                $route_added = false;

                if (!$route_exists) {
                    // Route is unique, proceed
                    $sql = "INSERT INTO `routes` (`route_cities`,
                     `bus_no`, 
                     `route_dep_date`,
                     `route_dep_time`, `route_step_cost`, `route_created`) VALUES ('$viaCities','$busno', '$depdate','$deptime', '$cost', current_timestamp());";
                    $result = mysqli_query($conn, $sql);

                    // Gives back the Auto Increment id
                    $autoInc_id = mysqli_insert_id($conn);
                    // If the id exists then, 
                    if ($autoInc_id) {
                        $code = rand(1, 99999);
                        // Generates the unique userid
                        $route_id = "RT-" . $code . $autoInc_id;

                        $query = "UPDATE `routes` SET `route_id` = '$route_id' WHERE `routes`.`id` = $autoInc_id;";
                        $queryResult = mysqli_query($conn, $query);
                        if (!$queryResult)
                            echo "Not Working";
                    }

                    if ($result) {
                        $route_added = true;
                        // The bus is now assigned, updating uses table
                        bus_assign($conn, $busno);
                    }
                }

                if ($route_added) {
                    // Show success alert
                    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Successful!</strong> Route Added
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                } else {

                    // Show error alert
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Route already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            if (isset($_POST["edit"])) {
                // EDIT ROUTES
                $viaCities = strtoupper($_POST["viaCities"]);
                $cost = $_POST["stepCost"];
                $id = $_POST["id"];
                $deptime = $_POST["dep_time"];
                $depdate = $_POST["dep_date"];
                $busno = $_POST["busno"];
                $oldBusNo = $_POST["old-busno"];

                $id_if_route_exists = exist_routes($conn, $viaCities, $depdate, $deptime);

                if (!$id_if_route_exists || $id == $id_if_route_exists) {
                    $updateSql = "UPDATE `routes` SET
                    `route_cities` = '$viaCities',
                    `bus_no`='$busno',
                    `route_dep_date` = '$depdate',
                    `route_dep_time` = '$deptime',
                    `route_step_cost` = '$cost' WHERE `routes`.`id` = '$id';";

                    $updateResult = mysqli_query($conn, $updateSql);
                    $rowsAffected = mysqli_affected_rows($conn);

                    $messageStatus = "danger";
                    $messageInfo = "";
                    $messageHeading = "Error!";

                    if (!$rowsAffected) {
                        $messageInfo = "No Edits Administered!";
                    } elseif ($updateResult) {
                        // To assign the new bus, and free the old one - this should only reun when the bus no is edited.
                        if ($oldBusNo != $busno) {
                            bus_assign($conn, $busno);
                            bus_free($conn, $oldBusNo);
                        }
                        // Show success alert
                        $messageStatus = "success";
                        $messageHeading = "Successfull!";
                        $messageInfo = "Route details Edited";
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
                    // If route details already exists
                    echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> Route details already exists
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
                }
            }
            if (isset($_POST["delete"])) {
                // DELETE ROUTES
                $id = $_POST["id"];
                // Get the bus_no from route_id
                $busno_toFree = busno_from_routeid($conn, $id);
                // Delete the route with id => id
                $deleteSql = "DELETE FROM `routes` WHERE `routes`.`id` = $id";
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
                    $messageInfo = "Route Details deleted";
                    $messageHeading = "Successfull!";
                    // Free the bus assigned
                    bus_free($conn, $busno_toFree);
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
        $resultSql = "SELECT * FROM `routes` ORDER BY route_created DESC";

        $resultSqlResult = mysqli_query($conn, $resultSql);
        if (!mysqli_num_rows($resultSqlResult)) { ?>
            <!-- Routes are not present -->
            <div class="container mt-4">
                <div id="noRoutes" class="alert alert-dark " role="alert">
                    <h1 class="alert-heading">No Routes Found!!</h1>
                    <p class="fw-light">Be the first person to add one!</p>
                </div>
            </div>
        <?php } else { ?>
            <!-- Routes Are present -->
            <section id="route">
                <div id="head">
                </div>
                <div id="route-results">
                    <table class="table table-hover table-bordered mt-5">
                        <thead>
                            <th>ID</th>
                            <th>Via Cities</th>
                            <th>Bus</th>
                            <th>Departure Date</th>
                            <th>Departure Time</th>
                            <th>Cost</th>
                            <th>Actions</th>
                        </thead>
                        <?php
                        while ($row = mysqli_fetch_assoc($resultSqlResult)) {
                            // echo "<pre>";
                            // var_export($row);
                            // echo "</pre>";
                            $id = $row["id"];
                            $route_id = $row["route_id"];
                            $route_cities = $row["route_cities"];
                            $route_dep_time = $row["route_dep_time"];
                            $route_dep_date = $row["route_dep_date"];
                            $route_step_cost = $row["route_step_cost"];
                            $bus_no = $row["bus_no"];
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $route_id;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $route_cities;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $bus_no;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $route_dep_date;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $route_dep_time;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo 'Rs. ' . $route_step_cost; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php
                                                                                                                                                    echo $id; ?>" data-cities="<?php
                                                                                                                                                                                echo $route_cities; ?>" data-cost="<?php
                                                                                                                                                                                                                    echo $route_step_cost; ?>" data-date="<?php
                                                                                                                                                                                                                                                            echo $route_dep_date;
                                                                                                                                                                                                                                                            ?>" data-time="<?php
                                                                                                                                                                                                                                                                            echo $route_dep_time;
                                                                                                                                                                                                                                                                            ?>" data-busno="<?php
                                                                                                                                                                                                                                                                                            echo $bus_no;
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


    <?php
    $busSql = "Select * from buses where bus_assigned=0";
    $resultBusSql = mysqli_query($conn, $busSql);
    $arr = array();
    while ($row = mysqli_fetch_assoc($resultBusSql))
        $arr[] = $row;
    $busJson = json_encode($arr);
    ?>

    </div>
    <!-- Add Route Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add A Route</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addRouteForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                        <div class="mb-3">
                            <label for="viaCities" class="form-label">Via Cities</label>
                            <input type="text" class="form-control" id="viaCities" name="viaCities" placeholder="Comma Separated List" required>
                            <span id="error">

                            </span>
                        </div>
                        <input type="hidden" id="busJson" name="busJson" value='<?php echo $busJson; ?>'>
                        <div class="mb-3">
                            <label for="busno" class="form-label">Bus Number</label>
                            <!-- Search Functionality -->
                            <div class="searchBus">
                                <input type="text" class="form-control  busnoInput" id="busno" name="busno" required>
                                <div class="sugg">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="stepCost" class="form-label">Cost</label>
                            <input type="number" class="form-control" id="stepCost" name="stepCost" required>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Departure Date</label>
                            <input type="date" name="dep_date" id="date" min="<?php
                                                                                date_default_timezone_set("Asia/Kolkata");
                                                                                echo date("Y-m-d"); ?>" value="
                                <?php
                                echo date("Y-m-d");
                                ?>
                                " required>
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Departure Time</label>
                            <input type="time" name="dep_time" id="time" min="
                                <?php
                                echo date("H:i");
                                ?>
                                " required>
                        </div>
                        <button type="submit" class="btn btn-success" name="submit">Submit</button>
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

    <!-- Admin Bus -->
    <script src="js/admin_routes.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
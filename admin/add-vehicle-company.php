<!-- Show these admin pages only when the admin is logged in -->
<?php require '../inc/_admin-check.php'; ?>

<?php
require '../inc/_info.php';
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

    <title>Add Vehicle | <?= $website_name ?></title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link href="../assets/vendor/css/bootstrap-v5.0.2.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <?php $page = "add-vehicle-company"; ?>

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
        if (isset($_POST["add-company"])) {
            // Should be validated client-side
            $company = test_input(strtolower($_POST["company"]));

            $company_exists = exist_company($conn, $company);
            $company_added = false;

            if (!$company_exists) {
                // Route is unique, proceed
                $sql = "INSERT INTO `companies` (`name`) VALUES ('$company')";

                $result = mysqli_query($conn, $sql);

                if ($result)
                    $company_added = true;
            }

            if ($company_added) {
                // Show success alert
                echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Successful!</strong> Company Added.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            } else {
                // Show error alert
                echo '<div class="my-0 alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Company Already Exists.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        if (isset($_POST["edit"])) {
            // EDIT Company
            $company = strtolower($_POST["company-name"]);
            $id = $_POST["id"];
            $company_exists = exist_company($conn, $company);

            if (!$company_exists) {
                $updateSql = "UPDATE `companies` SET `name` = '$company' WHERE `companies`.`id` = $id;";

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
                    $messageInfo = "Company Name Edited";

                    // Get vehicle name
                    $vehicleNameSql = "SELECT `company` FROM `vehicles` WHERE `vehicles`.`id` = $id;";
                    $vehicleNameResult = mysqli_query($conn, $vehicleNameSql);
                    $vehicleNameRow = mysqli_fetch_assoc($vehicleNameResult);
                    $vehicleName = $vehicleNameRow['company'];
                    // Update the comapany name in the vehicles table
                    $updateVehicleSql = "UPDATE `vehicles` SET `company` = '$company' WHERE `vehicles`.`company` = '$vehicleName';";
                    $updateVehicleResult = mysqli_query($conn, $updateVehicleSql);
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
                        <strong>Error!</strong> Company already exists
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
            }
        }
        if (isset($_POST["delete"])) {
            // DELETE BUS
            $id = $_POST["id"];
            $deleteSql = "DELETE FROM `companies` WHERE `companies`.`id` = $id";

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
                $messageInfo = "Company details deleted";
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

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="card o-hidden border-0 shadow-lg my-5 mw-50">
            <div class="card-body p-5">
                <!-- Nested Row within Card Body -->
                <form action="./add-vehicle-company.php" method="POST">
                    <div class="mb-3">
                        <label for="companyName" class="form-label">Company Name</label>
                        <input type="text" name="company" class="form-control" id="companyName" minlength="2" required>
                    </div>
                    <button type="submit" name="add-company" class="btn btn-success">Add Company <i class="fa fa-plus ml-2"></i></button>
                </form>
            </div>
        </div>

        <?php
        $resultSql = "SELECT * FROM `companies` ORDER BY created_at DESC";

        $resultSqlResult = mysqli_query($conn, $resultSql);
        if (!mysqli_num_rows($resultSqlResult)) { ?>
            <!-- Routes are not present -->
            <div class="container mt-4">
                <div id="noRoutes" class="alert alert-dark " role="alert">
                    <h1 class="alert-heading">No Company Found!!</h1>
                    <p class="fw-light">Be the first person to add one!</p>
                    <button class="btn btn-success"><a href="add-vehicle-company.php" class="text-white">Add New Company</a></button>
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
                            <th>S No.</th>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </thead>
                        <?php
                        $sno = 0;
                        while ($row = mysqli_fetch_assoc($resultSqlResult)) {
                            $sno++;
                            $id = $row["id"];
                            $company = $row["name"];
                            $created_at = $row["created_at"];
                        ?>
                            <tr>
                                <td>
                                    <?php
                                    echo $sno;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $id;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $company;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $created_at; ?>
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-sm edit-button " data-link="<?php echo $_SERVER['REQUEST_URI']; ?>" data-id="<?php
                                                                                                                                                    echo $id; ?>" data-company="<?php
                                                                                                                                                                                echo $company; ?>">Edit</button>
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

    <!-- All Modals Here -->
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
    <script src="js/admin-add-vehicle-company.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
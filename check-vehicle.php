<?php
session_start();

// Alert Messages
require 'inc/_alert.php';
require 'inc/_info.php';
?>
<?php
require 'inc/_functions.php';
$conn = db_connect();

if (!$conn)
    die("Oh Shoot!! Connection Failed");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form handle
    $email = $_POST['email'];
    $password = $_POST['password'];


    // Check if passwords match
    $msg_type = "";
    $msg_detail = "";

    // Check if user exists
    $exist_user = exist_user($conn, $email);

    if ($exist_user) {
        // echo "<h1>email: " . $email . "</h1>";
        // echo "<h1>password: " . $password . "</h1>";
        // Check if password is correct
        $sql = "SELECT * FROM `users` WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $user_password = $row["password"];
        $user_id = $row["id"];
        $user_fname = $row["fname"];
        $user_lname = $row["lname"];
        $user_email = $row["email"];
        $user_phone = $row["phone"];
        $user_type = $row["is_admin"];

        if (password_verify($password, $user_password)) {
            // Set session variables
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_fname"] = $user_fname;
            $_SESSION["user_lname"] = $user_lname;
            $_SESSION["user_email"] = $user_email;
            $_SESSION["user_phone"] = $user_phone;
            $_SESSION["user_role"] = $user_type;
            $_SESSION["loggedIn"] = true;
            if ($user_type == 1) {
                header("location: admin/index.php?msg_type=success&msg_detail=Login Successful");
            } else {
                header("location: index.php?msg_type=success&msg_detail=Login Successful");
            }
            $msg_type = "success";
            $msg_detail = "Success: You are logged in " . $user_type;
            echo "<h1>email: " . $email . "</h1>";
            echo "<h1>password: " . $password . "</h1>";
        } else {
            $msg_type = "danger";
            $msg_detail = "Error: Password is incorrect";
        }
    } else {
        $msg_type = "danger";
        $msg_detail = "Error: User does not exist";
    }
}

// handle alert messages
require 'inc/_alert.php';
?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | UoS Bus</title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <!-- Style CSS -->
    <link rel="stylesheet" href="admin/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Modernizr Js -->
    <script src="js/vendor/modernizr-2.8.3.min.html"></script>

    <?php $page = 'login'; ?>

</head>

<body class="bg-gradient-primary">
    <!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

    <!--Header Area Start-->
    <?php require 'inc/_front-header.php'; ?>
    <!--Header Area Start-->

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Check Vehicle</h1>
                                    </div>
                                    <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="form-group">
                                            <input name="vehicle-number" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter Vehicle Number">
                                        </div>
                                        <button name="search-vehicle" type="submit" class="btn btn-primary btn-user btn-block">
                                            Search Vehicle
                                        </button>
                                    </form>
                                </div>
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
    <script src="js/bootstrap.min.js"></script>
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
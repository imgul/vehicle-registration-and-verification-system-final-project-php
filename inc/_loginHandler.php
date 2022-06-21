<?php
require './_functions.php';
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
        $user_type = $row["is_admin"];

        if (password_verify($password, $user_password)) {
            // Set session variables
            session_start();
            $_SESSION["user_id"] = $user_id;
            $_SESSION["user_fname"] = $user_fname;
            $_SESSION["user_lname"] = $user_lname;
            $_SESSION["user_email"] = $user_email;
            $_SESSION["user_type"] = $user_type;
            $_SESSION["loggedIn"] = true;
            header("Location: ../index.php?msg_type=success&msg_detail=Login Successful");
            $msg_type = "success";
            $msg_detail = "Success: You are logged in";
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

// handle error alerts
if (isset($msg_type)) {
    echo '<div class="alert alert-' . $msg_type . ' alert-dismissible fade show" role="alert">
  	' . $msg_detail . '
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

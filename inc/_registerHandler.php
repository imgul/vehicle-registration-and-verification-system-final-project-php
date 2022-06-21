<?php
require './_functions.php';
$conn = db_connect();

if (!$conn)
    die("Oh Shoot!! Connection Failed");

if (isset($_POST['register'])) {

    // Form handle
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    // Check if passwords match
    $is_password_same = false;
    $msg_type = "";
    $msg_detail = "";
    if ($password == $cpassword) {
        $is_password_same = true;

        // secure password
        $password = password_hash($password, PASSWORD_DEFAULT);
    }

    // echo "<h1>is_password_same: " . $is_password_same . "</h1>";

    if ($is_password_same) {
        // Check if user already exists
        $sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `password`) VALUES ('$fname', '$lname', '$email', '$password')";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: ../login.php?msg_type=success&msg_detail=Registration Successful");
            $msg_type = "success";
            $msg_detail = "Success: Your Account has been created";
        } else {
            $msg_type = "danger";
            $msg_detail = "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    } else {
        $msg_type = "danger";
        $msg_detail = "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

<?php
session_start();

if (!isset($_SESSION["loggedIn"]) || !$_SESSION["loggedIn"] || $_SESSION["user_role"] != 1) {
    header("location: ../index.php");
}

$loggedIn = true;

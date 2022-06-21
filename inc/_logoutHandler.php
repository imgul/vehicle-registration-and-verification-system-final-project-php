<?php
// Logout Handler
session_start();
session_unset();
session_destroy();
header("Location: login.php?msg_type=success&msg_detail=Logout Successful");

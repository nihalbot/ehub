<?php
include '../config/database.php';
include '../includes/logout_message.php';
$logout = 1;
session_unset();
session_destroy(); 
header("Location: ./signin.php");
exit(); 
?>

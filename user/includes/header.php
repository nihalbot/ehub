<?php include '../config/database.php'; 


if(!isset($_SESSION['user_name'])){
    echo "<script>window.location.href='../pages/signin.php';</script>";
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    
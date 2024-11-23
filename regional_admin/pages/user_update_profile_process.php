<?php
include '../config/database.php';
$userId = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['username'];
    $userEmail = $_POST['email'];
    $userPhone = $_POST['phone'];
    $userRole = $_POST['role'];
    $userRegion = $_POST['region'];

    $sql = "UPDATE users SET full_name = '$userName', email = '$userEmail', role = '$userRole', phone_number = '$userPhone', region = '$userRegion' where id = $userId";

    $result = mysqli_query($con, $sql);

    if ($result) {
        $_SESSION['status'] = "User data updated";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./see_users.php';</script>";
    } else {
        echo "Error";
    }
}
?>
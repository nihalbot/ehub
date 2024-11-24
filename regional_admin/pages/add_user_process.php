<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $userEmail = mysqli_real_escape_string($con, $_POST['email']);
    $userPassword = mysqli_real_escape_string($con, $_POST['password']);
    $userPhone = mysqli_real_escape_string($con, $_POST['phone']);
    $userRole = mysqli_real_escape_string($con, $_POST['role']);
    $region = mysqli_real_escape_string($con, $_POST['region']);

    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userRole) || empty($userPhone) || empty($region)) {
        $_SESSION['fill_all_field'] = "All fields are required. Please fill in all the fields.";
        $_SESSION['status'] = "All fields are required. Please fill in all the fields.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./see_users.php';</script>";
        exit();
    }


    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users(full_name, email, password_hash, role, phone_number, region) VALUES('$userName', '$userEmail', '$hashedPassword', '$userRole', '$userPhone', '$region')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "User created successfuly.";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./see_users.php';</script>";
    } else {
        $_SESSION['status'] = "Failed to create user. Please try again.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./see_users.php';</script>";
    }
}

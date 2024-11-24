<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $userEmail = mysqli_real_escape_string($con, $_POST['email']);
    $userPassword = mysqli_real_escape_string($con, $_POST['password']);
    $userPhone = mysqli_real_escape_string($con, $_POST['phone']);
    $userRole = mysqli_real_escape_string($con, $_POST['role']);
    $region = mysqli_real_escape_string($con, $_POST['region']);

    // Check if the email already exists
    $checkEmailSql = "SELECT * FROM users WHERE email = '$userEmail'";
    $result = mysqli_query($con, $checkEmailSql);

    if (mysqli_num_rows($result) > 0) {
        // Email already exists, show toast error message
        $_SESSION['status'] = "Email already exists!";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./add_user.php';</script>";
        exit();
    }

    // If email doesn't exist, continue with adding the user
    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userRole) || empty($userPhone) || empty($region)) {
        $_SESSION['status'] = "All fields are required. Please fill in all the fields.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./add_user.php';</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

    // Insert the new user
    $sql = "INSERT INTO users(full_name, email, password_hash, role, phone_number, region) 
            VALUES('$userName', '$userEmail', '$hashedPassword', '$userRole', '$userPhone', '$region')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "User added successfully";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./see_users.php';</script>";
    } else {
        $_SESSION['status'] = "User not created. Try again";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./see_users.php';</script>";
    }
}

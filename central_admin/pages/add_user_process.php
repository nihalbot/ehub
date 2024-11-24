<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = mysqli_real_escape_string($con, $_POST['username']);
    $userEmail = mysqli_real_escape_string($con, $_POST['email']);
    $userPassword = mysqli_real_escape_string($con, $_POST['password']);
    $userPhone = mysqli_real_escape_string($con, $_POST['phone']);
    $userRole = mysqli_real_escape_string($con, $_POST['role']);
    $region = mysqli_real_escape_string($con, $_POST['region']);

    // Check if all fields are filled
    if (empty($userName) || empty($userEmail) || empty($userPassword) || empty($userRole) || empty($userPhone) || empty($region)) {
        $_SESSION['fill_all_field'] = "All fields are required. Please fill in all the fields.";
        $_SESSION['status'] = "All fields are required. Please fill in all the fields.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./add_user.php';</script>";
        exit();
    }

    // Check if the user already exists by email
    $emailCheckSql = "SELECT id FROM users WHERE email = '$userEmail'";
    $emailCheckResult = mysqli_query($con, $emailCheckSql);

    if (mysqli_num_rows($emailCheckResult) > 0) {
        // User with the same email already exists
        $_SESSION['status'] = "This email is already registered. Please use a different email.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./add_user.php';</script>";
        exit();
    }

    // Hash the password
    $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);

    // Insert the new user into the database
    $sql = "INSERT INTO users (full_name, email, password_hash, role, phone_number, region) 
            VALUES ('$userName', '$userEmail', '$hashedPassword', '$userRole', '$userPhone', '$region')";

    if (mysqli_query($con, $sql)) {
        $_SESSION['status'] = "User added successfully";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./see_users.php';</script>";
    } else {
        $_SESSION['status'] = "User not created. Try again.";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./see_users.php';</script>";
    }
}

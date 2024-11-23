<?php
// Connecting to the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/database.php';

    if (
        isset($_POST['full_name']) &&
        isset($_POST['dob']) &&
        isset($_POST['email']) &&
        isset($_POST['password']) &&
        isset($_POST['region']) // Added region
    ) {
        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $region = mysqli_real_escape_string($con, $_POST['region']); // Capture region
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Checking if the user already exists
        $check_sql = "SELECT * FROM `users` WHERE email = '$email'";
        $check_result = mysqli_query($con, $check_sql);

        if ($check_result) {
            $num = mysqli_num_rows($check_result);
            if ($num > 0) {
                $_SESSION['status'] = "User already registered with this email";
                $_SESSION['status_code'] = 'warning';
                echo "<script>window.location.href='./signup.php';</script>";
            } else {
                // Insert user into the database with the region
                $insert_sql = "INSERT INTO `users` (full_name, date_of_birth, email, password_hash, role, region)
                               VALUES ('$full_name', '$dob', '$email', '$hashed_password', 'Normal User', '$region')";

                $insert_result = mysqli_query($con, $insert_sql);

                if ($insert_result) {
                    $_SESSION['status'] = "Registered Successfully";
                    $_SESSION['status_code'] = "success";

                    echo "<script>window.location.href='./signup.php';</script>";
                    exit();
                } else {
                    $_SESSION['status'] = "Registration Unsuccessful";
                    $_SESSION['status_code'] = "error";
                }
            }
        } else {
            echo "Error checking email existence";
        }
    } else {
        $_SESSION['status'] = "Please fill all fields";
        $_SESSION['status_code'] = "warning";
        echo "<script>window.location.href='./signup.php';</script>";
    }
}

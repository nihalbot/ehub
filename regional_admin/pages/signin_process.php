<?php
session_start();
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $email = mysqli_real_escape_string($con, trim($_POST['email']));
        $password = trim($_POST['password']);

        // Fetch user by email
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);

                // Verify password
                if (password_verify($password, $row['password_hash'])) {
                    // Set session variables
                    $_SESSION['user_name'] = $row['full_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['region'] = $row['region'];
                    $_SESSION['status'] = "Signed in successfully";
                    $_SESSION['status_code'] = "success";

                    if ($row['role'] === "Regional Admin") {
                        echo "<script>window.location.href='./dashboard.php';</script>";
                    } else {
                        $_SESSION['status'] = "Login unsuccessful: Invalid role.";
                        $_SESSION['status_code'] = "error";
                        echo "<script>window.location.href='./signin.php';</script>";
                    }
                } else {
                    $_SESSION['status'] = "Incorrect password.";
                    $_SESSION['status_code'] = "error";
                    echo "<script>window.location.href='./signin.php';</script>";
                }
            } else {
                $_SESSION['status'] = "Email not found!";
                $_SESSION['status_code'] = "error";
                echo "<script>window.location.href='./signin.php';</script>";
            }
        } else {
            die("Query failed: " . mysqli_error($con));
        }
    } else {
        $_SESSION['status'] = "Please provide both email and password!";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./signin.php';</script>";
    }
}

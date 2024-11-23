<?php
include '../config/database.php';

// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Escape email to prevent SQL injection
        $email = mysqli_real_escape_string($con, $email);

        // Query to check for user with the provided email
        $sql = "SELECT * FROM `users` WHERE email = '$email'";
        $result = mysqli_query($con, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                $row = mysqli_fetch_assoc($result);

                // Verify password hash
                if (password_verify($password, $row['password_hash'])) {
                    // Set session variables
                    $_SESSION['user_name'] = $row['full_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['region'] = $row['region'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['status'] = "Signed in successfully";
                    $_SESSION['status_code'] = "success";

                    // Redirect based on role
                    if ($row['role'] == "Regional Admin") {
                        $_SESSION['status'] = "Login successfuly";
                        $_SESSION['status_code'] = "success";
                        echo "<script>window.location.href='./dashboard.php';</script>";
                    } else {
                        $_SESSION['status'] = "Access denied for this role";
                        $_SESSION['status_code'] = "error";
                        echo "<script>window.location.href='./signin.php';</script>";
                    }
                } else {
                    $_SESSION['status'] = "Invalid password";
                    $_SESSION['status_code'] = "error";
                    echo "<script>window.location.href='./signin.php';</script>";
                }
            } else {
                $_SESSION['status'] = "Please provide both email and password";
                $_SESSION['status_code'] = "warning";
                echo "<script>window.location.href='./signin.php';</script>";
            }
        } else {
            die("Query failed: " . mysqli_error($con));
        }
    } else {
        $_SESSION['status'] = "Please provide both email and password";
        $_SESSION['status_code'] = "warning";
        echo "<script>window.location.href='./signin.php';</script>";
    }
}

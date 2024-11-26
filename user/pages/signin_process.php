<?php
include '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = mysqli_real_escape_string($con, $email);

        $sql = "SELECT * FROM `users` WHERE email = '$email'";

        $result = mysqli_query($con, $sql);

        if ($result) {
            $num = mysqli_num_rows($result);

            if ($num > 0) {
                $row = mysqli_fetch_assoc($result);

                if (password_verify($password, $row['password_hash'])) {
                    $_SESSION['user_name'] = $row['full_name'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['user_id'] = $row['id'];
                    $_SESSION['region'] = $row['region'];
                    $_SESSION['status'] = "Signed in successfully";
                    $_SESSION['status_code'] = "success";
                    echo "<script>window.location.href='./dashboard.php';</script>";
                } else {
                    $_SESSION['status'] = "Login Unsuccessfull";
                    $_SESSION['status_code'] = "error";
                    echo "<script>window.location.href='./signin.php';</script>";
                }
            } else {
                $_SESSION['status'] = "Login Unsuccessfull";
                $_SESSION['status_code'] = "error";
                echo "<script>window.location.href='./signin.php';</script>";            }
        } else {
            die("Query failed: " . mysqli_error($con));
        }
    } else {
        $_SESSION['status'] = "Login Unsuccessfull";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./signin.php';</script>";
    }
}

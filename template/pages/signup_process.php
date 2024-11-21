<?php
//connecting to db
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../config/database.php'; 

    if (
        isset($_POST['full_name']) &&
        isset($_POST['dob']) &&
        isset($_POST['email']) &&
        isset($_POST['password'])
    ) {

        $full_name = mysqli_real_escape_string($con, $_POST['full_name']);
        $dob = mysqli_real_escape_string($con, $_POST['dob']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);  

        //cheeking sql is user alrady exist?
        $check_sql = "SELECT * FROM `users` WHERE email = '$email'";
        $check_result = mysqli_query($con, $check_sql);

    //cheeking  is user alrady exist?
        if ($check_result) {
            $num = mysqli_num_rows($check_result);
            if ($num > 0) {
                $_SESSION['status'] = "User alrady registread with this email";
                $_SESSION['status_code'] = 'warning';
                echo "<script>window.location.href='./signup.php';</script>";
            } else {
                    //insert user to db
                $insert_sql = "INSERT INTO `users` (full_name, date_of_birth, email, password_hash)
                               VALUES ('$full_name', '$dob', '$email', '$hashed_password')";

                $insert_result = mysqli_query($con, $insert_sql);

                if ($insert_result) {
                    $_SESSION['status'] = "Register Successfuly";
                    $_SESSION['status_code'] = "success";

                    echo "<script>window.location.href='./signup.php';</script>"; 
                    exit();
                } else {
                    $_SESSION['status'] = "Register Unsuccessful";
                    $_SESSION['status_code'] = "error";
                }
            }
        } else {
            echo "Error checking email existence";
        }
    } else {
        $fill_all_field = 1;  
    }
}
?>
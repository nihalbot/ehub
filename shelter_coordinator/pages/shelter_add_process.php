<?php

include '../config/database.php'; // Database connection

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $shelterId = (int)$_POST['shelter_id'];
    $userId = (int)$_POST['user_id'];

    // Validate the data (ensure both shelter_id and user_id are set)
    if ($shelterId > 0 && $userId > 0) {
        // Check if the user is already assigned to the shelter
        $check_sql = "SELECT * FROM shelter_users WHERE shelter_id = $shelterId AND user_id = $userId";
        $check_result = mysqli_query($con, $check_sql);

        if (mysqli_num_rows($check_result) > 0) {
            $_SESSION['status'] = "User alrady in shelter";
            $_SESSION['status_code'] = "warning";
            echo "<script>window.location.href='./add_user_shelter.php';</script>";
        } else {
            // Assign user to shelter (insert into shelter_users table)
            $assign_sql = "INSERT INTO shelter_users (shelter_id, user_id) VALUES ($shelterId, $userId)";
            if (mysqli_query($con, $assign_sql)) {
                $_SESSION['status'] = "User add in shelter";
                $_SESSION['status_code'] = "success";
                echo "<script>window.location.href='./add_user_shelter.php';</script>";
            } else {
                $_SESSION['status'] = "User not add in shelter";
                $_SESSION['status_code'] = "error";
                echo "<script>window.location.href='./add_user_shelter.php';</script>";
            }
        }
    } else {
        // Error if invalid data
        $error = "Invalid data provided.";
    }
}



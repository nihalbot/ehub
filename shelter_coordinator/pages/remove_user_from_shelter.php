<?php
include '../includes/header.php';

// Ensure the user is a Shelter Coordinator
if ($_SESSION['role'] !== 'Shelter Coordinator') {
    header('Location: signin.php');
    exit;
}

// Validate input parameters
if (isset($_GET['shelter_id']) && isset($_GET['user_id'])) {
    $shelterId = (int)$_GET['shelter_id'];
    $userId = (int)$_GET['user_id'];

    // Remove the user from the shelter
    $deleteUserQuery = "DELETE FROM shelter_users WHERE shelter_id = $shelterId AND user_id = $userId";
    if (mysqli_query($con, $deleteUserQuery)) {
        $_SESSION['status'] = "User removed from shelter successfully.";
        $_SESSION['status_code'] = "success";
    } else {
        $_SESSION['status'] = "Failed to remove user from shelter.";
        $_SESSION['status_code'] = "error";
    }
    header("Location: manage_shelters.php");
    exit;
} else {
    echo "Invalid request: Shelter ID or User ID not provided.";
    exit;
}

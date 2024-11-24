<?php
include '../config/database.php';
$regionalAdminId = $_SESSION['user_id'];
$adminRegion = $_SESSION['region'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shelterName = $_POST['shelter_name'];
    $location = $_POST['shelter_location'];
    $capacity = $_POST['capacity'];

   
    $checkQuery = "SELECT * FROM shelters WHERE name = '" . mysqli_real_escape_string($con, $shelterName) . "' AND region = '" . mysqli_real_escape_string($con, $adminRegion) . "'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
      
        $_SESSION['status'] = "Shelter already exists in this region.";
        $_SESSION['status_code'] = "error";
        echo "<script>
            window.location.href = './shelter.php';
            </script>";
    } else {
        
        $insertQuery = "INSERT INTO shelters (name, location, capacity, region, regional_admin_id)
                        VALUES ('" . mysqli_real_escape_string($con, $shelterName) . "',
                                '" . mysqli_real_escape_string($con, $location) . "',
                                " . mysqli_real_escape_string($con, $capacity) . ",
                                '" . mysqli_real_escape_string($con, $adminRegion) . "',
                                " . mysqli_real_escape_string($con, $regionalAdminId) . ")";

        if (mysqli_query($con, $insertQuery)) {
            $_SESSION['status'] = "Shelter added.";
            $_SESSION['status_code'] = "success";
            echo "<script>
            window.location.href = './manage_shelters.php';
            </script>";
        } else {
            $_SESSION['status'] = "Error adding shelter!";
            $_SESSION['status_code'] = "error";
            echo "<script>
            window.location.href = './shelter.php';
            </script>";
        }
    }
}

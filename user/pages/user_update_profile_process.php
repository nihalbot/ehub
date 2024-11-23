<?php
include '../config/database.php';

$userId = $_GET['id'] ?? null;

if($userId){
    if(isset($_POST['update'])){
        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $dob = $_POST['dob'];


        $sql = "UPDATE users SET full_name = '$userName', date_of_birth = '$dob', email = '$userEmail' WHERE id = '$userId'";

        $result = mysqli_query($con ,$sql);

        if($result){
            $_SESSION['update_status'] = 'success';
            $_SESSION['status'] = "Profile Updated";
            $_SESSION['status_code'] = 'success';
           
            echo "<script>window.location.href='./user_profile_update.php';</script>";
        }else{
            echo "Not updated";
        }
    }
}

?>
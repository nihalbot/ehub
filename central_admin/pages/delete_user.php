<?php
include '../config/database.php';

if(isset($_GET['id'])){
    $userId = $_GET['id'];

    $sql = "DELETE from `users` where id = $userId";
    $result = mysqli_query($con, $sql);

    if($result){
        $_SESSION['status'] = "User deleted successfuly";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./see_users.php';</script>";
    }
    else{
        $_SESSION['status'] = "User deleted successfuly";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./see_users.php';</script>";
    }
}

?>
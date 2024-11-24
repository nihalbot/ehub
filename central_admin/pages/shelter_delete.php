
<?php
include '../config/database.php';

if(isset($_GET['id'])){
    $shelterId = $_GET['id'];

    $sql = "DELETE from `shelters` where id = $shelterId";
    $result = mysqli_query($con, $sql);

    if($result){
        $_SESSION['status'] = "User deleted";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./manage_shelters.php';</script>";
    }
    else{
        echo "error";
    }
}

?>

?>
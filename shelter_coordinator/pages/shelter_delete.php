
<?php
include '../config/database.php';

if(isset($_GET['id'])){
    $shelterId = $_GET['id'];

    $sql = "DELETE from `shelters` where id = $shelterId";
    $result = mysqli_query($con, $sql);

    if($result){
        $_SESSION['status'] = "Shelter added";
        $_SESSION['status_code'] = "success";
        echo "<script>window.location.href='./manage_shelters.php';</script>";
    }
    else{
        $_SESSION['status'] = "Shelter not added";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./manage_shelters.php';</script>";
    }
}

?>

?>
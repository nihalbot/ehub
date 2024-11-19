<?php
include '../includes/header.php';
echo '<title>Dashboard</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';
?>
<?php
$email = $_SESSION['email'];

$sql = "SELECT * FROM `users` WHERE email = '$email'";

$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['full_name'];
    $userEmail = $row['email'];
    $dob = $row['date_of_birth'];
    $userId = $row['user_id'];
}

?>
<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">

    <!-- form start -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- pofile picture start -->
            <div class="form-profile mt-2">
                <img src="./assest/img/model2.jpg" alt="">
            </div>
            <!-- pofile picture end -->

            <!-- main form start -->
           
            <!-- main form end -->

        </div>
    </div>
    <!-- form end -->

</div>
<!-- main content end  -->


<?php include '../includes/footer.php'; ?>
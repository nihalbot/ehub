<?php
include '../includes/header.php';
echo '<title>Profile</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';
?>
<?php
$userId = $_SESSION['user_id'];

$sql = "SELECT * FROM `users` WHERE id = '$userId'";

$result = mysqli_query($con, $sql);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $userName = $row['full_name'];
    $userEmail = $row['email'];
    $dob = $row['date_of_birth'];
    $userId = $row['id'];
    $userPhone = $row['phone_number'];
    $userRegion = $row['region'];
}

?>
<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">
    <h3 class="ps-2">Profile</h3>
    <!-- form start -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- pofile picture start -->
            <div class="form-profile mt-2">
                <img src="../assets/img/profile_pic.jpg" alt="">
            </div>
            <!-- pofile picture end -->

            <!-- main form start -->
            <form class="row g-3">

                <!-- first name -->


                <div class="col-lg-6 col-md-12 mt-1 mt-lg-5 mt-md-3">
                    <label for="inputEmail4" class="form-label">Full Name</label>
                    <input type="email" class="form-control" id="inputEmail4" value="<?php echo $userName; ?>" disabled>
                </div>

                <!-- last name -->
                <div class="col-md-6 mt-1 mt-lg-5 mt-md-2">
                    <label for="inputPassword4" class="form-label">Email</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $userEmail; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Date of Birth</label>
                    <input type="text" class="form-control" id="inputEmail4" value="<?php echo $dob; ?>" disabled>
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Region</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $userRegion; ?>" disabled>
                </div>

                

                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">User Id</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $userId; ?>" disabled>
                </div>

            </form>
            <!-- main form end -->

        </div>
    </div>
    <!-- form end -->

</div>
<!-- main content end  -->


<?php include '../includes/footer.php'; ?>
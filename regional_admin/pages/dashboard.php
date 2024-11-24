<?php
include '../includes/header.php';
echo '<title>Dashboard - Regional Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';




$admin_region = mysqli_real_escape_string($con, $_SESSION['region']); // Sanitize the region variable

// Get total users in the region excluding Central Admin
$sql_users = "SELECT COUNT(*) AS total FROM users WHERE region = '$admin_region' AND role != 'Central Admin'";
$result_users = mysqli_query($con, $sql_users);
$total_users = 0;
if ($result_users) {
    $row = mysqli_fetch_assoc($result_users);
    $total_users = $row['total'];
} else {
    echo "Error: " . mysqli_error($con); // Check for errors
}

// Get total shelters in the region
$sql_shelters = "SELECT COUNT(*) AS total FROM shelters WHERE region = '$admin_region'";
$result_shelters = mysqli_query($con, $sql_shelters);
$total_shelters = 0;
if ($result_shelters) {
    $row = mysqli_fetch_assoc($result_shelters);
    $total_shelters = $row['total'];
} else {
    echo "Error: " . mysqli_error($con); // Check for errors
}
?>

<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">
    <h3 class="">Dashboard</h3>

    <div class="row">
        <!-- Card for total users in the region -->
        <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0 dashboard-card">
            <div class="card">
                <div class="card-body">
                    <div class="row custom-card d-flex align-items-start">
                        <div class="col-lg-7 col-md-7 col-8">
                            <p class="card-title">Total Users in Your Region</p>
                            <p class="card-details"><?php echo $total_users; ?></p>
                            <a href="./see_users.php" class="card-navigation">
                                <span><i class="fa-solid fa-angles-right"></i></span> See all
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-4 d-flex justify-content-end p-0">
                            <div class="card-icon-container d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Card for total shelters in the region -->
        <div class="col-lg-4 col-sm-6 dashboard-card">
            <div class="card">
                <div class="card-body">
                    <div class="row custom-card d-flex align-items-start">
                        <div class="col-lg-7 col-md-7 col-8">
                            <p class="card-title">Total Shelters in Your Region</p>
                            <p class="card-details"><?php echo $total_shelters; ?></p>
                            <a href="./manage_shelters.php" class="card-navigation">
                                <span><i class="fa-solid fa-location-dot me-2"></i></span> See all
                            </a>
                        </div>
                        <div class="col-lg-5 col-md-5 col-4 d-flex justify-content-end p-0">
                            <div class="card-icon-container d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-person-shelter"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- main content end -->

<?php include '../includes/footer.php'; ?>
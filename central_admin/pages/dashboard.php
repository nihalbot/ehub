<?php
$total_users = 0;
$total_shelters = 0;  // Initialize total shelters variable
include '../includes/header.php';
echo '<title>Dashboard - Central Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

// Count total normal users
$sql_users = "SELECT COUNT(*) AS total FROM users WHERE role != 'Central Admin'";
$result_users = mysqli_query($con, $sql_users);

if ($result_users) {
    $row = mysqli_fetch_assoc($result_users);
    $total_users = $row['total'];
}

// Count total shelters (assuming 'shelters' is your table name)
$sql_shelters = "SELECT COUNT(*) AS total FROM shelters";
$result_shelters = mysqli_query($con, $sql_shelters);

if ($result_shelters) {
    $row = mysqli_fetch_assoc($result_shelters);
    $total_shelters = $row['total'];
}
?>

<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">
    <h3 class="">Dashboard</h3>

    <div class="row">
        <!-- First Card: Total Users -->
        <div class="col-lg-4 col-sm-6 mb-3 mb-sm-0 dashboard-card">
            <div class="card">
                <div class="card-body">
                    <div class="row custom-card d-flex align-items-start">
                        <div class="col-lg-7 col-md-7 col-8">
                            <p class="card-title">Total Users</p>
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

        <!-- Second Card: Total Shelters -->
        <div class="col-lg-4 col-sm-6 dashboard-card">
            <div class="card">
                <div class="card-body">
                    <div class="row custom-card d-flex align-items-start">
                        <div class="col-lg-7 col-md-7 col-8">
                            <p class="card-title">Total Shelters</p>
                            <p class="card-details"><?php echo $total_shelters; ?></p>
                            <a href="./manage_shelters.php"   class="card-navigation">
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
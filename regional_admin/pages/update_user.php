<?php
include '../includes/header.php';
echo '<title>Create User</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

$userId = $_GET['id'];

$sql = "SELECT * FROM users where id = $userId";
$result = mysqli_query($con, $sql);

if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];
        $userName = $row['full_name'];
        $userEmail = $row['email'];
        $userPhone = $row['phone_number'];
        $userRole = $row['role'];
        $userRegion = $row['region'];
        $userPassword = $row['password_hash'];

        

        // echo "<script>window.location.href='./see_users.php';</script>";

    }
} else {
    echo "error data fatch";
}
?>

<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">
    <h3 class="ps-2">Update User</h3>
    <!-- form start -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- profile picture start -->
            <div class="form-profile mt-2">
                <img src="../assets/img/model2.jpg" alt="Profile Picture">
            </div>
            <!-- profile picture end -->

            <!-- main form start -->
            <form id="updateForm" action="./user_update_profile_process.php?id=<?php echo $userId; ?>" class="row g-3" method="post">

                <!-- Full Name -->
                <div class="col-lg-6 col-md-12 mt-1 mt-lg-5 mt-md-3 custom-form-style">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="username" value="<?php echo $userName; ?>" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mt-1 mt-lg-5 mt-md-2 custom-form-style">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $userEmail; ?>" required>
                </div>

            

                <!-- Phone -->
                <div class="col-md-6 custom-form-style">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $userPhone; ?>" required>
                </div>


                <!-- Role -->
                <div class="col-md-6 custom-form-style">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="form-select" name="role" required>
                        <option selected disabled>Choose...</option>
                        <option value="Normal User" <?php echo ($userRole == 'Normal User') ? 'selected' : ''; ?>>Normal User</option>
                        <option value="Regional Admin" <?php echo ($userRole == 'Regional Admin') ? 'selected' : ''; ?>>Regional Admin</option>
                        <option value="Shelter Coordinator" <?php echo ($userRole == 'Shelter Coordinator') ? 'selected' : ''; ?>>Shelter Coordinator</option>
                        <option value="Relief Distributor" <?php echo ($userRole == 'Relief Distributor') ? 'selected' : ''; ?>>Relief Distributor</option>
                    </select>
                </div>


                <!-- Region -->
                <div class="col-md-6 custom-form-style">
                    <label for="region" class="form-label">Region</label>
                    <select id="region" class="form-select" name="region">
                        <option selected disabled>Choose...</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Kurigram">Kurigram</option>
                        <option value="Feni">Feni</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <div class="col-12 btn-add mt-1 mt-lg-4 mt-md-4">
                    <button type="submit" class="btn btn-primary" id="submit" >Update</button>
                </div>

            </form>
            <!-- main form end -->

        </div>
    </div>
    <!-- form end -->
</div>
<!-- main content end -->

<?php include '../includes/footer.php'; ?>
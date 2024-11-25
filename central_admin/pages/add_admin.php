<?php
include '../includes/header.php';
echo '<title>Add User - Central Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';
?>

<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">
    <h3 class="ps-2">Create an Admin</h3>
    <!-- form start -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- profile picture start -->
            <div class="form-profile mt-2">
                <img src="../assets/img/profile_pic.jpg">
            </div>
            <!-- profile picture end -->

            <!-- main form start -->
            <form action="./add_admin_process.php" class="row g-3" method="post">

                <!-- Full Name -->
                <div class="col-lg-6 col-md-12 mt-1 mt-lg-5 mt-md-3 custom-form-style">
                    <label for="fullName" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="fullName" name="username" required>
                </div>

                <!-- Email -->
                <div class="col-md-6 mt-1 mt-lg-5 mt-md-2 custom-form-style">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>

                <!-- Password -->
                <div class="col-md-6 custom-form-style">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <!-- Phone -->
                <div class="col-md-6 custom-form-style">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>


                <!-- Role -->
                <div class="col-md-6 custom-form-style">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="form-select" name="role" required>
                        <option selected disabled>Choose...</option>
                        <option value="Regional Admin">Regional Admin</option>
                        <option value="Shelter Coordinator">Shelter Coordinator</option>
                        <option value="Relief Distributor">Relief Distributor</option>
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
                    <button type="submit" class="btn btn-primary" name="add_admin">Create Admin</button>
                </div>

            </form>
            <!-- main form end -->

        </div>
    </div>
    <!-- form end -->
</div>
<!-- main content end -->

<?php include '../includes/footer.php'; ?>
<?php
include '../includes/header.php';
echo '<title>Add User to Shelter - Shelter Coordinator</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

// Ensure the user is a Shelter Coordinator
if ($_SESSION['role'] !== 'Shelter Coordinator') {
    header('Location: signin.php');
    exit;
}



// Fetch shelters that this coordinator manages
$region = $_SESSION['region']; // Based on logged-in user's region
$sql_shelters = "SELECT * FROM shelters WHERE region = '" . mysqli_real_escape_string($con, $region) . "'";
$result_shelters = mysqli_query($con, $sql_shelters);


?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Add User to Shelter</h3>

    <!-- Shelter Add Form -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- main form start -->
            <form action="./shelter_add_process.php" class="row g-3" method="post">

                <!-- first name -->

                <div class="col-lg-6 col-md-12 mt-1 mt-lg-5 mt-md-1">
                    <label for="shelter_id" class="form-label">Select Shelter</label>
                    <select name="shelter_id" id="shelter_id" class="form-control" required>
                        <option value="">Select Shelter</option>
                        <?php
                        if ($result_shelters && mysqli_num_rows($result_shelters) > 0) {
                            while ($shelter = mysqli_fetch_assoc($result_shelters)) {
                                echo '<option value="' . $shelter['id'] . '">' . $shelter['name'] . '</option>';
                            }
                        }
                        ?>
                    </select>
                </div>

                <!-- last name -->
                <div class="col-md-6 mt-1 mt-lg-5 mt-md-2">
                    <label for="user_id" class="form-label">Select User</label>
                    <select name="user_id" id="user_id" class="form-control" required>
                        <option value="">Select User</option>
                        <?php
                        
                        $sql_users = "SELECT * FROM users WHERE region = '" . mysqli_real_escape_string($con, $region) . "'";
                        $result_users = mysqli_query($con, $sql_users);

                        if ($result_users && mysqli_num_rows($result_users) > 0) {
                            while ($user = mysqli_fetch_assoc($result_users)) {
                                echo '<option value="' . $user['id'] . '">' . $user['full_name'] . '</option>';
                            }
                        }
                        ?>
                    </select>

                </div>



                <div class="col-12 btn-add mt-3 mt-lg-4 mt-md-5">
                    <button type="submit" class="btn btn-primary">Add to Shelter</button>
                </div>
            </form>
            <!-- main form end -->

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
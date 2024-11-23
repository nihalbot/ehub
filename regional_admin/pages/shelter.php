<?php
include '../includes/header.php';
echo '<title>Add Shelter - Regional Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';


if ($_SESSION['role'] !== 'Regional Admin') {
    header('Location: signin.php');
    exit;
}

$regionalAdminId = $_SESSION['user_id'];
$adminRegion = $_SESSION['region'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $shelterName = $_POST['shelter_name'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];

    // Insert shelter into the database
    $insertQuery = "INSERT INTO shelters (name, location, capacity, region, regional_admin_id) 
                    VALUES ('" . mysqli_real_escape_string($con, $shelterName) . "', 
                            '" . mysqli_real_escape_string($con, $location) . "', 
                            " . mysqli_real_escape_string($con, $capacity) . ", 
                            '" . mysqli_real_escape_string($con, $adminRegion) . "', 
                            " . mysqli_real_escape_string($con, $regionalAdminId) . ")";

    if (mysqli_query($con, $insertQuery)) {
        $_SESSION['status'] = "Shelter added successfully!";
        $_SESSION['status_code'] = "success";
         echo "<script>window.location.href='./manage_shelters.php';</script>";
    } else {
        $_SESSION['status'] = "Error adding shelter!";
        $_SESSION['status_code'] = "error";
    }
}
?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Add Shelter</h3>

    <!-- Shelter Add Form -->
    <form method="POST" class="mb-3">
        <div class="row">
            <div class="col-md-4">
                <label for="shelter_name">Shelter Name</label>
                <input type="text" name="shelter_name" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" required>
            </div>
            <div class="col-md-4">
                <label for="capacity">Capacity</label>
                <input type="number" name="capacity" class="form-control" required>
            </div>
            <input type="hidden" name="region" value="<?php echo $adminRegion; ?>">

            <div class="col-md-12 mt-3">
                <button type="submit" class="btn btn-primary">Add Shelter</button>
            </div>
        </div>
    </form>
</div>

<?php include '../includes/footer.php'; ?>
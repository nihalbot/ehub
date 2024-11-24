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


$regionaladminId = $_SESSION['user_id'];
$adminRegion = $_SESSION['region'];
$sherterId = $_GET['id'];
$sql = "SELECT * FROM shelters WHERE id = $sherterId";
$result = mysqli_query($con, $sql);

if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $shelterId = $row['id'];
            $shelterName = $row['name'];
            $shelterLocation = $row['location'];
            $shelterCapacity = $row['capacity'];
            $shelterRegion = $row['region'];
            $shelterAdded = $_SESSION['user_name'];
        }
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $shelter_name = $_POST['shelter_name'];
    $shelter_Location = $_POST['shelter_location'];
    $shelter_Capacity = $_POST['capacity'];

    $sql = "UPDATE shelters SET name = '$shelter_name', location = '$shelter_Location', capacity = '$shelter_Capacity' WHERE id = '$shelterId'";

    $result = mysqli_query($con, $sql);

    if($result){
        $_SESSION['status'] = "Shelter data updated";
        $_SESSION['status_code'] = "success";

        echo "<script>window.location.href='./manage_shelters.php;</script>";
    }else{
        $_SESSION['status'] = "Shelter not updated";
        $_SESSION['status_code'] = "error";
        echo "<script>window.location.href='./manage_shelters.php';</script>";
    }

}
?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Add Shelter</h3>

    <!-- Shelter Add Form -->
    <div class="row form-container">
        <div class="col col-lg-12 col-md-12 form-section">

            <!-- main form start -->
            <form class="row g-3" method="post">

                <!-- first name -->

                <div class="col-lg-6 col-md-12 mt-1 mt-lg-5 mt-md-1">
                    <label for="inputEmail4" class="form-label">Shelter Name</label>
                    <input type="text" class="form-control" id="inputEmail4" name="shelter_name" value="<?php echo $shelterName ?>" required>
                </div>

                <!-- last name -->
                <div class="col-md-6 mt-1 mt-lg-5 mt-md-2">
                    <label for="inputPassword4" class="form-label">Shelter Localtion</label>
                    <input type="text" class="form-control" id="inputPassword4" name="shelter_location" value="<?php echo $shelterLocation ?>" required>
                </div>
                <div class="col-md-6">
                    <label for="inputEmail4" class="form-label">Capacity</label>
                    <input type="number" class="form-control" id="inputEmail4" name="capacity" min="1" value="<?php echo $shelterCapacity ?>" required>

                </div>


                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Region</label>
                    <input type="text" class="form-control" id="inputPassword4" value="<?php echo $adminRegion ?>" disabled>
                </div>


                <div class="col-md-6">
                    <label for="inputCity" class="form-label">Regional Admin ID</label>
                    <input type="text" class="form-control" id="inputCity" value="<?php echo $regionaladminId; ?>" disabled>
                </div>



                <div class="col-12 btn-add mt-1 mt-lg-4 mt-md-4">
                    <button type="submit" class="btn btn-primary">Update Shelter</button>
                </div>
            </form>
            <!-- main form end -->

        </div>
    </div>
</div>

<?php include '../includes/footer.php'; ?>
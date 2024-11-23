<?php
include '../includes/header.php';
echo '<title>Manage Shelters - Regional Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

// Ensure the user is a Regional Admin

if ($_SESSION['role'] !== 'Regional Admin') {
    header('Location: signin.php');
    exit;
}

$regionalAdminId = $_SESSION['user_id'];
$adminRegion = $_SESSION['region']; // Assume the region is stored in session

// Fetch shelters belonging to the regional admin's region
$sql = "SELECT * FROM shelters WHERE region = '" . mysqli_real_escape_string($con, $adminRegion) . "' ORDER BY created_at DESC";
$result = mysqli_query($con, $sql);
?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Manage Shelters</h3>

    <!-- Display Shelter Table -->
    <table class="table">
        <thead>
            <tr>
                <th class="custom-table-header" scope="col">ID</th>
                <th scope="col">Name</th>
                <th class="custom-table-header" scope="col">Location</th>
                <th class="custom-table-header" scope="col">Capacity</th>
                <th class="custom-table-header" scope="col">Region</th>
                <th class="custom-table-header" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $shelterId = $row['id'];
                    $shelterName = $row['name'];
                    $shelterLocation = $row['location'];
                    $shelterCapacity = $row['capacity'];
                    $shelterRegion = $row['region'];

                    echo '
                    <tr>
                        <th scope="row">' . $shelterId . '</th>
                        <td>' . $shelterName . '</td>
                        <td>' . $shelterLocation . '</td>
                        <td>' . $shelterCapacity . '</td>
                        <td>' . $shelterRegion . '</td>
                        <td>
                            <a href="update_shelter.php?id=' . $shelterId . '"><i class="fa-solid fa-pen-to-square"></i></a>
                            <a href="javascript:void(0);" onclick="confirmDelete(' . $shelterId . ')"><i class="fa-solid fa-trash delete-icon"></i></a>
                        </td>
                    </tr>';
                }
            } else {
                echo '
                <tr>
                    <td colspan="6" class="text-center">No shelters found in your region.</td>
                </tr>';
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../includes/footer.php'; ?>
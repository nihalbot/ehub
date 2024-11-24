<?php
include '../includes/header.php';
echo '<title>Manage Shelters - Regional Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';



$regionaladminId = $_SESSION['user_id'];
$adminRegion = $_SESSION['region'];

// Pagination setup
$limit = 5; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1); // Ensure page is at least 1
$offset = ($page - 1) * $limit;

// Fetch total number of shelters for pagination
$total_sql = "SELECT COUNT(*) AS total FROM shelters WHERE region = '" . mysqli_real_escape_string($con, $adminRegion) . "'";
$total_result = mysqli_query($con, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);
$total_records = $total_row['total'];
$total_pages = ceil($total_records / $limit);

// Fetch shelters for the current page
$sql = "SELECT * FROM shelters WHERE region = '" . mysqli_real_escape_string($con, $adminRegion) . "' 
        ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);
?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Manage Shelters</h3>

    <!-- Display Shelter Table -->
    <div class="tabel-data">
        <table class="table">
            <thead>
                <tr>
                    <th class="custom-tabel-header" scope="col">Shelter Id</th>
                    <th scope="col">Shelter Name</th>
                    <th class="custom-tabel-header" scope="col">Location</th>
                    <th class="custom-tabel-header" scope="col">Capacity</th>
                    <th class="custom-tabel-header" scope="col">Region</th>
                    <th class="custom-tabel-header" scope="col">Added by</th>
                    <th class="custom-tabel-header" scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="tabel-body">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $shelterId = $row['id'];
                        $shelterName = $row['name'];
                        $shelterLocation = $row['location'];
                        $shelterCapacity = $row['capacity'];
                        $shelterRegion = $row['region'];
                        $shelterAdded = $_SESSION['user_name'];

                        echo '
                        <tr class="custom-tabel-row">
                            <th scope="row">' . $shelterId . '</th>
                            <td>' . $shelterName . '</td>
                            <td>' . $shelterLocation . '</td>
                            <td>' . $shelterCapacity . '</td>
                            <td>' . $shelterRegion . '</td>
                            <td>' . $shelterAdded . '</td>
                            <td class="action-container">
                                <span>
                                    <a href="../pages/update_shelter.php?id=' . $shelterId . '">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                     <a href="javascript:void(0);" onclick="confirmDeleteshelter(' . $shelterId . ')">
                                        <i class="fa-solid fa-trash delete-icon"></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                        ';
                    }
                } else {
                    echo '<tr><td colspan="7" class="text-center">No shelters found for this region.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination Links -->
    <nav>
        <ul class="pagination justify-content-center align-items-center">
            <?php if ($page > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php echo $i === $page ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>

<?php include '../includes/footer.php'; ?>
<?php
include '../includes/header.php';
echo '<title>Users - Regional Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

// Pagination variables
$limit = 5; // Records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1; // Current page
$offset = ($page - 1) * $limit; // Calculate offset

// Get filter inputs
$filterName = isset($_GET['filter_name']) ? $_GET['filter_name'] : '';
$filterRole = isset($_GET['filter_role']) ? $_GET['filter_role'] : '';
$filterRegion = isset($_GET['filter_region']) ? $_GET['filter_region'] : '';

// Build WHERE clause dynamically
$whereClauses = [];
if (!empty($filterName)) {
    $whereClauses[] = "full_name LIKE '%" . mysqli_real_escape_string($con, $filterName) . "%'";
}
if (!empty($filterRole)) {
    $whereClauses[] = "role = '" . mysqli_real_escape_string($con, $filterRole) . "'";
}
if (!empty($filterRegion)) {
    $whereClauses[] = "region = '" . mysqli_real_escape_string($con, $filterRegion) . "'";
}
$whereSql = count($whereClauses) > 0 ? 'WHERE ' . implode(' AND ', $whereClauses) : '';

// Get total number of filtered users
$totalQuery = "SELECT COUNT(*) as total FROM users $whereSql";
$totalResult = mysqli_query($con, $totalQuery);
$totalRow = mysqli_fetch_assoc($totalResult);
$totalUsers = $totalRow['total'];

// Calculate total pages
$totalPages = ceil($totalUsers / $limit);

// Fetch users for current page, sorted by timestamp in descending order
$sql = "SELECT * FROM users $whereSql ORDER BY created_at DESC LIMIT $limit OFFSET $offset";
$result = mysqli_query($con, $sql);
?>

<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Users</h3>

    <!-- Filter form -->
    <form method="GET" class="mb-3">
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="filter_name" class="form-control" placeholder="Filter by Name" value="<?php echo htmlspecialchars($filterName); ?>">
            </div>
            <div class="col-md-3">
                <select name="filter_role" class="form-control">
                    <option value="">Filter by Role</option>
                    <option value="Normal User" <?php echo $filterRole === 'Normal User' ? 'selected' : ''; ?>>Normal User</option>

                    <option value="Regional Admin" <?php echo $filterRole === 'Regional Admin' ? 'selected' : ''; ?>>Regional Admin</option>

                    <option value="Shelter Coordinator" <?php echo $filterRole === 'Shelter Coordinator' ? 'selected' : ''; ?>>Shelter Coordinator</option>

                    <option value="Relief Distributor" <?php echo $filterRole === 'Relief Distributor' ? 'selected' : ''; ?>>Relief Distributor</option>
                    <!-- Add other roles as needed -->
                </select>
            </div>
            <div class="col-md-3">
                <select name="filter_region" class="form-control">
                    <option value="">Filter by Region</option>
                    <option value="Rangpur" <?php echo $filterRegion === 'Rangpur' ? 'selected' : ''; ?>>Rangpur</option>

                    <option value="Kurigram" <?php echo $filterRegion === 'Kurigram' ? 'selected' : ''; ?>>Kurigram</option>

                    <option value="Feni" <?php echo $filterRegion === 'Feni' ? 'selected' : ''; ?>>Feni</option>
                    <!-- Add other regions as needed -->
                </select>
            </div>
            <div class="col-md-3">
                <button type="submit" class="btn btn-primary">Apply Filters</button>
            </div>
        </div>
    </form>

    <!-- table start -->
    <div class="table-data">
        <table class="table">
            <thead>
                <tr>
                    <th class="custom-table-header" scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th class="custom-table-header" scope="col">Email</th>
                    <th class="custom-table-header" scope="col">Phone</th>
                    <th class="custom-table-header" scope="col">Role</th>
                    <th class="custom-table-header" scope="col">Region</th>
              
                </tr>
            </thead>
            <tbody class="table-body">
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $userId = $row['id'];
                        $userName = $row['full_name'];
                        $userEmail = $row['email'];
                        $userPhone = $row['phone_number'];
                        $userRole = $row['role'];
                        $userRegion = $row['region'];

                        echo '
                        <tr class="custom-table-row">
                            <th scope="row">' . $userId . '</th>
                            <td>' . $userName . '</td>
                            <td>' . $userEmail . '</td>
                            <td>' . $userPhone . '</td>
                            <td>' . $userRole . '</td>
                            <td>' . $userRegion . '</td>
                            
                        </tr>';
                    }
                } else {
                    echo '
                    <tr>
                        <td colspan="7" class="text-center">No users found in the database.</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php
            if ($page > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page - 1) . '&filter_name=' . urlencode($filterName) . '&filter_role=' . urlencode($filterRole) . '&filter_region=' . urlencode($filterRegion) . '">Previous</a></li>';
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = $i == $page ? 'active' : '';
                echo '<li class="page-item ' . $active . '"><a class="page-link" href="?page=' . $i . '&filter_name=' . urlencode($filterName) . '&filter_role=' . urlencode($filterRole) . '&filter_region=' . urlencode($filterRegion) . '">' . $i . '</a></li>';
            }
            if ($page < $totalPages) {
                echo '<li class="page-item"><a class="page-link" href="?page=' . ($page + 1) . '&filter_name=' . urlencode($filterName) . '&filter_role=' . urlencode($filterRole) . '&filter_region=' . urlencode($filterRegion) . '">Next</a></li>';
            }
            ?>
        </ul>
    </nav>
</div>
<!-- main content end -->

<?php include '../includes/footer.php'; ?>
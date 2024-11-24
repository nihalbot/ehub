<?php
include '../includes/header.php';
echo '<title>Manage Shelters - Central Admin</title>';
include '../includes/header2.php';
include '../includes/sidebar.php';
include '../includes/nav.php';

// Ensure the user is a Central Admin
if ($_SESSION['role'] !== 'Central Admin') {
    header('Location: signin.php');
    exit;
}

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 4;
$offset = ($page - 1) * $limit;

// Query to fetch all shelters with assigned users
$sql = "
    SELECT shelters.*, users.id AS user_id, users.full_name AS assigned_user
    FROM shelters
    LEFT JOIN shelter_users ON shelters.id = shelter_users.shelter_id
    LEFT JOIN users ON shelter_users.user_id = users.id
    LIMIT $offset, $limit
";
$result = mysqli_query($con, $sql);

// Count total shelters for pagination
$total_sql = "
    SELECT COUNT(*) AS total 
    FROM shelters
";
$total_result = mysqli_query($con, $total_sql);
$total_rows = mysqli_fetch_assoc($total_result)['total'];
$total_pages = ceil($total_rows / $limit);
?>

<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-container">
    <h3>Manage Shelters</h3>

    <div class="table-data">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Shelter Name</th>
                    <th scope="col">Capacity</th>
                    <th scope="col">Region</th>
                    <th scope="col">Added by</th>
                    <th scope="col">Assigned User</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['name']}</td>";
                        echo "<td>{$row['capacity']}</td>";
                        echo "<td>{$row['region']}</td>";
                        echo "<td>" . getUserNameById($row['regional_admin_id']) . "</td>";
                        echo "<td>" . ($row['assigned_user'] ?? 'None') . "</td>";


                        echo "</tr>";
                    }
                } else {
                    echo '<tr><td colspan="6" class="text-center">No shelters found.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
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

<?php
// Helper function to get user name by user ID
function getUserNameById($user_id)
{
    global $con;
    $user_sql = "SELECT full_name FROM users WHERE id = " . (int)$user_id;
    $user_result = mysqli_query($con, $user_sql);
    if ($user_result && mysqli_num_rows($user_result) > 0) {
        $user = mysqli_fetch_assoc($user_result);
        return $user['full_name'];
    }
    return 'None';
}
?>

<?php include '../includes/footer.php'; ?>
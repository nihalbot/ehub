<main class="container-fluid p-0">
    <div class="row m-0">
        <!-- sidebar start -->
        <div class="col col-lg-3 p-0 d-none d-md-block">
            <div class="d-flex flex-column flex-shrink-0 p-3 min-vh-100 sidebar">
                <a href="../pages/dashboard.php"
                    class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none justify-content-center w-100">
                    <span class="fs-4 logo"><span class="logo-first">E-</span>Hub</span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="../pages/dashboard.php" class="nav-link active" aria-current="page" data-link="dashboard">
                            <i class="fa-solid fa-house me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="../pages/add_admin.php" class="nav-link link-dark" data-link="shelter">
                            <i class="fa-solid fa-user-pen"></i>
                            Add admin
                        </a>
                    </li>
                    <li>
                        <a href="../pages/add_user.php" class="nav-link link-dark" data-link="relief">
                            <i class="fa-solid fa-user-large"></i>
                            Add User
                        </a>
                    </li>
                    <li>
                        <a href="../pages/see_users.php" class="nav-link link-dark" data-link="profile">
                            <i class="fa-solid fa-users"></i>

                            Users
                        </a>
                    </li>
                    
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32"
                            class="rounded-circle me-2">
                        <strong>
                            <?php echo $_SESSION['user_name']; ?>
                        </strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="../pages/user_profile.php">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../pages/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- sidebar end -->
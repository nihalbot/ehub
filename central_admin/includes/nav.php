<div class="col col-lg-9 p-0 d-flex flex-column">
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <a class="navbar-brand ps-3" href="#">
                <?php echo 'Welcome ' . $_SESSION['user_name']; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-lg-none">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../pages/dashboard.php">
                            <i class="fa-solid fa-house me-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/add_user.php">
                            <i class="fa-solid fa-user-pen"></i>
                            Add Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/add_user.php">
                            <i class="fa-solid fa-user-large"></i>
                            Add User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/see_users.php"> <i class="fa-solid fa-users"></i>
                            See users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/shelter.php"><i class="fa-solid fa-person-shelter"></i>

                            Shelter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/users_at_shelter.php"> <i class="fa-solid fa-people-roof"></i>
                            User at Shelter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/logout.php"><i class="fa-solid fa-right-from-bracket"></i>
                        Logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
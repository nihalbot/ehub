<div class="col col-lg-9 p-0 d-flex flex-column">
    <!-- navbar start -->
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid ">
            <a class="navbar-brand ps-3" href="#">
                <?php
                if (isset($_SESSION['user_name'])) {
                    echo 'Welcome ' . $_SESSION['user_name'];
                } else {
                    echo '';
                }
                ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav d-lg-none">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../pages/dashboard.php">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Shelter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Relief</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/user_profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pages/user_profile_update.php">Update Profile</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- navbar end -->
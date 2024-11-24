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
                        <a href="../pages/shelter.php" class="nav-link link-dark" data-link="shelter">
                            <i class="fa-solid fa-person-shelter me-2"></i>
                            Shelter
                        </a>
                    </li>
                    
                    <li>
                        <a href="../pages/user_profile.php" class="nav-link link-dark" data-link="profile">
                            <i class="fa-solid fa-user me-2"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="../pages/user_profile_update.php" class="nav-link link-dark" data-link="update profile">
                            <i class="fa-solid fa-id-card me-2"></i>
                            Update Profile
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle"
                        id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../assets/img/profile_pic.jpg" alt="" width="32" height="32"
                            class="rounded-circle me-2">
                        <strong><?php
                                echo $_SESSION['user_name']
                                ?></strong>
                    </a>
                    <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                        
                        <li><a class="dropdown-item" href="../pages/logout.php">Sign out</a></li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- sidebar end -->
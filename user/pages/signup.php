<?php
include '../includes/auth_start.php';
?>
<title>Sign up - To stay informed and access disaster aid and resources</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/signup.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-5 col-md-12 left-section">
                <div class="logo p-1 ps-md-5 ps-lg-5 mt-4">
                    <h2>E-<span style="color: blue;">HUB</span></h2>
                </div>

                <div class="form p-3 p-md-1 ps-lg-5 justify-content-start">
                    <form action="./signup_process.php" method="POST">
                        <h2>Sign up</h2>
                        <p>Sign up to stay informed and access disaster aid and resources</p>

                        <!-- Full Name -->
                        <div class="form-floating custom-form-style">
                            <input type="text" class="form-control" id="fullName" name="full_name" placeholder="Full Name" required>
                            <label for="fullName">Full Name</label>
                        </div>

                        <!-- Date of Birth -->
                        <div class="custom-div d-flex justify-content-between">
                            <div class="form-floating custom-form-style mt-3 col-lg-5">
                                <input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" required>
                                <label for="dob">Date Of Birth</label>
                            </div>
                            <div class="col-lg-6 custom-form-style mt-2">
                                <label for="region" class="form-label m-0">Region</label>
                                <select id="region" class="form-select" name="region">
                                    <option selected disabled>Choose...</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Kurigram">Kurigram</option>
                                    <option value="Feni">Feni</option>
                                </select>
                            </div>
                        </div>


                        <!-- Email -->
                        <div class="form-floating custom-form-style mt-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" required>
                            <label for="email">Email</label>
                        </div>

                        <!-- Password -->
                        <div class="form-floating custom-form-style mt-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary mt-4">Sign up</button>

                        <div class="boder-section mt-4">
                            <div class="left-border"></div>
                            <p>or</p>
                            <div class="left-border"></div>
                        </div>
                        <div class="create-account mt-3 d-flex justify-content-center">
                            <p>Already have an account? <a href="./signin.php"><span>Sign in</span></a></p>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col col-lg-7 d-none d-md-block right-section">
                <!-- You can add any image or content here -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php

    if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
    ?>
        <?php
        if ($_SESSION['status_code'] == 'success') {

        ?>
            <script>
                Swal.fire({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>",
                    footer: '<a href="./signin.php">Login</a>'

                });
            </script>
        <?php
        } else {
        ?>
            <script>
                Swal.fire({
                    title: "<?php echo $_SESSION['status']; ?>",
                    icon: "<?php echo $_SESSION['status_code']; ?>"

                });
            </script>
        <?php
        } ?>
    <?php
        unset($_SESSION['status']);
    }
    ?>



</body>

</html>
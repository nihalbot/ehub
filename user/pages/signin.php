<?php
include '../includes/auth_start.php';
?>
<title>Signin - We Provides a realtime help</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="../assets/css/signin.css">
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-5 col-md-12 left-section">
                <div class="logo p-1 ps-md-5 ps-lg-5">

                    <h2>E-<span style="color: blue;">HUB</span></h2>
                </div>

                <div class="form p-3 p-md-1 p-lg-5">
                    <form action="signin_process.php" method="post">
                        <h2>Sign in</h2>
                        <p>Please login to continue to your account.</p>
                        <div class="form-floating mb-3 custom-form-style">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
                            <label for="floatingInput">Email address</label>
                        </div>
                        <div class="form-floating custom-form-style">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
                            <label for="floatingPassword">Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4">Login</button>

                        <div class="boder-section mt-4">
                            <div class="left-border"></div>
                            <p>or</p>
                            <div class="left-border"></div>
                        </div>
                        <div class="create-account mt-3 d-flex justify-content-center">
                            <p>Need an account? <span>Create one</span></p>
                        </div>
                    </form>

                </div>

            </div>
            <div class="col col-lg-7 d-none d-md-block right-section">

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
        <script>
            Swal.fire({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                text: "Email or Password is wrong!"

            });
        </script>

    <?php
        unset($_SESSION['status']);
    }
    ?>


   
</body>

</html>
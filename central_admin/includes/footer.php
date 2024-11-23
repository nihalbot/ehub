</div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-link');

        // Set the active link based on localStorage
        const activeLink = localStorage.getItem('activeLink');
        if (activeLink) {
            navLinks.forEach(link => link.classList.remove('active'));
            const linkToActivate = document.querySelector(`[data-link="${activeLink}"]`);
            if (linkToActivate) {
                linkToActivate.classList.add('active');
            }
        }

        // Add click event listeners to each link
        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                // Remove 'active' class from all links
                navLinks.forEach(link => link.classList.remove('active'));

                // Add 'active' class to the clicked link
                this.classList.add('active');

                // Save the clicked link's identifier in localStorage
                const linkId = this.getAttribute('data-link');
                localStorage.setItem('activeLink', linkId);
            });
        });
    });
</script>

<!-- update toast -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        Swal.fire({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}

?>

<!-- delete toast -->
<?php
if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
?>
    <script>
        Swal.fire({
            title: "<?php echo $_SESSION['status']; ?>",
            icon: "<?php echo $_SESSION['status_code']; ?>",
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer);
                toast.addEventListener('mouseleave', Swal.resumeTimer);
            }
        });
    </script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}

?>




<!-- create admin toast fill all fied message -->
<?php
if (isset($_SESSION['fill_all_field']) && isset($_SESSION['fill_all_field']) != '') {
?>
    <?php
    if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
    ?>
        <script>
            Swal.fire({
                title: "<?php echo $_SESSION['status']; ?>",
                icon: "<?php echo $_SESSION['status_code']; ?>",
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });
        </script>
<?php
        unset($_SESSION['status']);
        unset($_SESSION['status_code']);
        unset($_SESSION['fill_all_field']);
    }
}
?>


<?php
include '../includes/script.php';
?>

</body>

</html>
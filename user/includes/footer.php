</div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
    
<!-- sweet aleart cdn -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- update profile success toast -->
<?php
if (isset($_SESSION['update_status']) && isset($_SESSION['update_status']) != '') {
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
        unset($_SESSION['update_status']);
    }
}
?>

<!-- login succesfull toast -->
<?php
if (isset($_SESSION['status']) && isset($_SESSION['status']) != '') {
?>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
        Toast.fire({
            icon: "<?php echo $_SESSION['status_code']; ?>",
            title: "<?php echo $_SESSION['status']; ?>"
        });
    </script>
<?php
    unset($_SESSION['status']);
    unset($_SESSION['status_code']);
}
?>

<!-- script for sidebar toggle -->
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


</body>

</html>
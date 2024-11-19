<?php
include './includes/header.php';
include './includes/sidebar.php';
include './includes/nav.php';
?>
<!-- main content start -->
<div class="container-fluid main-content flex-grow-1 pt-3 ps-3 tabel-cotainer">

    <!-- tabel start -->
    <div class="tabel-data">
        <table class="table">
            <thead>
                <tr>
                    <th class="custom-tabel-header" scope="col">#</th>
                    <th scope="col">First</th>
                    <th class="custom-tabel-header" scope="col">Last</th>
                    <th class="custom-tabel-header" scope="col">Handle</th>
                    <th class="custom-tabel-header" scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="tabel-body">
                <tr class="custom-tabel-row">
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td class="action-container">
                        <span>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-trash delete-icon"></i>
                            </a>
                        </span>

                    </td>
                </tr>
                <tr class="custom-tabel-row">
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                    <td class="action-container">
                        <span>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-trash delete-icon"></i>
                            </a>
                        </span>

                    </td>
                </tr>
                <tr class="custom-tabel-row">
                    <th scope="row">3</th>
                    <td>Larry the Bird</td>
                    <td>@twitter</td>
                    <td>@twitter</td>
                    <td class="action-container">
                        <span>
                            <a href="">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="">
                                <i class="fa-solid fa-trash delete-icon"></i>
                            </a>
                        </span>

                    </td>
                </tr>

            </tbody>
        </table>
    </div>
    <!-- form end -->
</div>
<!-- main content end  -->
</div>
</div>

<?php
include './includes/footer.php';

?>

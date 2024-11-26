<?php
include("protected_page.php")
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perl Travels - Admin Panel</title>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>

<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">

        <?php include('import/header.php'); ?>
        <?php include('import/sideNav.php'); ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Apps</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Blog Details</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-3">
                                    <h4>Blog Details</h4>
                                    <button onclick="window.location.href='create_blog.php'" class="btn btn-primary">Create New Blog</button>
                                </div>
                                <div class="table-responsive">
                                <style>
    #zero_config {
        width: 100%;
        table-layout: auto;
    }
    #zero_config th, #zero_config td {
        text-align: center;
        vertical-align: middle;
        padding: 12px;
    }
    #zero_config th {
        background-color: #f2f2f2;
        color: #333;
    }
    #zero_config tbody tr:hover {
        background-color: #f9f9f9;
    }
    .delete-button {
        color: red;
        border: none;
        background: none;
        cursor: pointer;
        font-weight: bold;
    }
    .delete-button:hover {
        text-decoration: underline;
    }
</style>

<table id="zero_config" class="table table-striped table-bordered no-wrap">
    <thead>
        <tr>
            <th>ID</th>
            <th>Full Name</th>
            <th>Email Address</th>
            <th>Mobile Number</th>
            <th>Home Address</th>
            <th>Postal Code</th>
            <th>Country</th>
            <th>Passport/NIC</th>
            <th>Purpose</th>
            <th>Special Request</th>
            <th>Created Date</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require('config/db.php');

        if (isset($_POST['deleteVisaDetails'])) {
            $visa_delete = $_POST['visa_delete'];
            try {
                $sql = "DELETE FROM visa_package WHERE v_id = :v_id";
                $stmt = $pdo->prepare($sql);
                $stmt->execute(['v_id' => $visa_delete]);
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            position: "center",
                            icon: "success",
                            text: "Your record Deleted Successfully",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                </script>';
            } catch (Exception $e) {
                echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
            }
        }

        try {
            $sql = "SELECT * FROM visa_package";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $visa_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
        }
        ?>

        <?php foreach ($visa_details as $visa) : ?>
            <tr>
                <td><?= htmlspecialchars($visa['v_id']) ?></td>
                <td><?= htmlspecialchars($visa['fullName']) ?></td>
                <td><?= htmlspecialchars($visa['emailAddress']) ?></td>
                <td><?= htmlspecialchars($visa['mobileNumber']) ?></td>
                <td><?= htmlspecialchars($visa['homeAddress']) ?></td>
                <td><?= htmlspecialchars($visa['postalCode']) ?></td>
                <td><?= htmlspecialchars($visa['country']) ?></td>
                <td><?= htmlspecialchars($visa['passport_nice']) ?></td>
                <td><?= htmlspecialchars($visa['purpose']) ?></td>
                <td><?= htmlspecialchars($visa['special_request']) ?></td>
                <td><?= htmlspecialchars($visa['created_date']) ?></td>
                <td>
                    <form method="POST" action="">
                        <input type="hidden" name="visa_delete" value="<?= htmlspecialchars($visa['v_id']) ?>">
                        <button type="submit" name="deleteVisaDetails" class="delete-button">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center text-muted">
                All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#zero_config').DataTable({
                "paging": true,
                "searching": true,
                "ordering": true
            });
        });
    </script>
</body>

</html>  
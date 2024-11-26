
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
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Package Details</li>
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
                                    <h4>Package Details</h4>
                                    <button onclick="window.location.href='create_new_package.php'" class="btn btn-primary">Create New Package</button>
                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Package Title</th>
                                                <th>Description</th>
                                                <th>Price</th>
                                                <th>Total Persons</th>
                                                <th>Tour Type</th>
                                                <th>Place</th>
                                                <th>Agent</th>
                                                <th>Nationality</th>
                                                <th>Group Name</th>
                                                <th>Hotel</th>

                                                <th>Departure</th>
                                                <th>Arrived</th>
                                                <th>Offer</th>
                                           

                                                <th>Total Duration</th>
                                                <th>Package Start Date</th>
                                                <th>Package Expiry Date</th>
                                                <th>Place Image</th>
                                                <th>Created date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            require('config/db.php');

                                            if (isset($_POST['deletepackageDetails'])) {
                                                $package_delete = $_POST['package_delete'];
                                                try {
                                                    $sql = "DELETE FROM tour_package WHERE p_id = :p_id";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute(['p_id' => $package_delete]);
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

                                            // Fetch Query
                                            try {
                                                $sql = "SELECT * FROM tour_package";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $package_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            } catch (Exception $e) {
                                                echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
                                            }
                                            ?>

                                            <?php foreach ($package_details as $package) : ?>
                                                <tr>
                                                    <td><?= $package['p_id'] ?></td>
                                                    <td><?= $package['packageTitle'] ?></td>
                                                    <td>
                                                        <?php

                                                        $description = $package['packageDescription'];
                                                        $words = explode(' ', $description);

                                                        $limitedDescription = implode(' ', array_slice($words, 0, 30)) . (count($words) > 30 ? '...' : '');

                                                        echo $limitedDescription;
                                                        ?>
                                                    </td>
                                                    <td><?= $package['packagePrice'] ?></td>
                                                    <td><?= $package['packageTotalPersons'] ?></td>
                                                    <td><?= $package['packageTourType'] ?></td>
                                                    <td><?= $package['packagePlace'] ?></td>

                                                    <td><?= $package['agent'] ?></td>
                                                    <td><?= $package['nationality'] ?></td>
                                                    <td><?= $package['groupName'] ?></td>
                                                    <td><?= $package['hotelPlace'] ?></td>

                                                    <td><?= $package['departure'] ?></td>
                                               
                                                    <td><?= $package['arrived'] ?></td>
                                                    <td><?= $package['offer'] ?></td>


                                                    <td><?= $package['packageDuration'] ?></td>
                                                    <td><?= $package['packageFrom'] ?></td>
                                                    <td><?= $package['packageTo'] ?></td>
                                                    <td>
                                                        <?php if (!empty($package['packageImage'])): ?>
                                                            <?php
                                                            $imageData = base64_encode($package['packageImage']);
                                                            $src = 'data:image/jpeg;base64,' . $imageData;
                                                            ?>
                                                            <img src="<?= $src ?>" alt="Blog Image" style="width: 100px; height: auto;">
                                                        <?php else: ?>
                                                            No Image
                                                        <?php endif; ?>
                                                    </td>


                                                    <td><?= $package['created_date'] ?></td>
                                                    <td>
                                                        <a href="package_edit_details.php?id=<?= $package['p_id'] ?>" class="btn btn-primary">Edit</a>
                                                    </td>
                                                    <td>
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="package_delete" value="<?= $package['p_id'] ?>">
                                                            <button type="submit" name="deletepackageDetails" style="color:red; border:none; background:none; cursor:pointer;"><b>Delete</b></button>
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

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
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Blog Comments Details</li>
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
                                    <h4>Newsletter Details</h4>

                                </div>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>ID</th>

                                                <th>Name</th>
                                                <th>Email Address</th>
                                                <th>Comment</th>
                                                <th>Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            // Database connection
                                            require('config/db.php');

                                            //Delete Query
                                            if (isset($_POST['deleteCommentDetails'])) {
                                                $comment_delete = $_POST['comment_delete'];
                                                try {
                                                    $sql = "DELETE FROM comment WHERE c_id   = :c_id ";
                                                    $stmt = $pdo->prepare(query: $sql);
                                                    $stmt->execute(['c_id' => $comment_delete]);
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
                                            //fetch Query

                                            try {
                                                $sql = "SELECT * FROM comment";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $comments = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            } catch (Exception $e) {
                                                echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
                                            }
                                            ?>
                                            <?php foreach ($comments as $comment) : ?>
                                                <tr>
                                                    <td><?= $comment['c_id'] ?></td>
                                                    <td><?= $comment['commenterName'] ?></td>
                                                    <td><?= $comment['commenterEmailAddress'] ?></td>
                                                    <td><?= $comment['fullComment'] ?></td>

                                                    <td>
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="comment_delete" value="<?= $comment['c_id'] ?>">

                                                            <button type="submit" name="deleteCommentDetails" style="color:red; border:none; background:none; cursor:pointer;"><b>Delete</b></button>
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
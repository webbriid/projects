<?php
include ("protected_page.php")
  ?>




<?php
require('config/db.php');
if (isset($_POST['updateUserDetails'])) {
    $user_id = $_POST['user_id'];
    $login_user = $_POST['login_user'];
    $login_Email = $_POST['login_Email'];
    $mobile_number = $_POST['mobile_number'];
    $dateOfBirth = $_POST['dateOfBirth'];
    $userCountry = $_POST['userCountry'];
    $user_type = $_POST['user_type'];

    try {
        $sql = "UPDATE user_details SET login_user = ?, login_Email = ?, mobile_number = ?, dateOfBirth = ?, userCountry = ?, user_type = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login_user, $login_Email, $mobile_number, $dateOfBirth, $userCountry, $user_type, $user_id]);

        echo '<script>
            Swal.fire({
                position: "center",
                icon: "success",
                text: "User details updated successfully",
                showConfirmButton: false,
                timer: 1500
            }).then(() => {
                location.reload();
            });
        </script>';
    } catch (Exception $e) {
        echo '<script>alert("Error: ' . $e->getMessage() . '");</script>';
    }
}
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Perl Travels - Admin Panel</title>
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
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
                                    <li class="breadcrumb-item text-muted active" aria-current="page">User Details</li>
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
                                <h4>User Details</h4>
                                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createUserModal">Create User</button>
                                <div class="table-responsive">
                                    <table id="userTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>user ID</th>
                                                <th>Profile Image</th>
                                                <th>Full Name</th>
                                                <th>Email Address</th>
                                                <th>Mobile Number</th>
                                                <th>Date of Birth</th>
                                                <th>Country</th>
                                                <th>User Type</th>
                                                <th>Created Date</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            require('config/db.php');


                                            if (isset($_POST['deleteuserDetails'])) {
                                                $user_delete = $_POST['user_delete'];
                                                try {
                                                    $sql = "DELETE FROM user_details WHERE id = :id";
                                                    $stmt = $pdo->prepare($sql);
                                                    $stmt->execute(['id' => $user_delete]);
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
                                                $sql = "SELECT * FROM user_details";
                                                $stmt = $pdo->prepare($sql);
                                                $stmt->execute();
                                                $user_details = $stmt->fetchAll(PDO::FETCH_ASSOC);
                                            } catch (Exception $e) {
                                                echo "<script>alert ('Error: " . $e->getMessage() . "');</script>";
                                            }
                                            ?>

                                            <?php foreach ($user_details as $user) : ?>
                                                <tr>
                                                    <td><?= $user['id'] ?></td>

                                                    <td>
                                                        <?php if (!empty($user['user_profileImage'])): ?>
                                                            <?php
                                                            $imageData = base64_encode($user['blogImage']);
                                                            $src = 'data:image/jpeg;base64,' . $imageData;
                                                            ?>
                                                            <img src="<?= $src ?>" alt="User Image" style="width: 100px; height: auto;">
                                                        <?php else: ?>
                                                            No Image
                                                        <?php endif; ?>
                                                    </td>
                                                    <td><?= $user['login_user'] ?></td>

                                                    <td><?= $user['login_Email'] ?></td>
                                                    <td><?= $user['mobile_number'] ?></td>
                                                    <td><?= $user['dateOfBirth'] ?></td>
                                                    <td><?= $user['userCountry'] ?></td>
                                                    <td>
                                                        <span class="badge <?= $user['user_type'] === 'super Admin' ? 'badge-danger' : 'badge-success' ?>">
                                                            <?= $user['user_type'] ?>
                                                        </span>
                                                    </td>


                                                    <td><?= $user['created_date'] ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editUserModal<?= $user['id'] ?>">
                                                            Edit
                                                        </button>
                                                    </td>

                                                    <td>
                                                        <form method="POST" action="">
                                                            <input type="hidden" name="user_delete" value="<?= $user['id'] ?>">
                                                            <button type="submit" name="deleteuserDetails" style="color:red; border:none; background:none; cursor:pointer;"><b>Delete</b></button>
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





    <!--edit modal-->
    <?php foreach ($user_details as $user) : ?>
        <div class="modal fade" id="editUserModal<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel<?= $user['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editUserModalLabel<?= $user['id'] ?>">Edit User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="">
                            <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                            <div class="form-group">
                                <label for="userName<?= $user['id'] ?>">Full Name</label>
                                <input type="text" class="form-control" id="userName<?= $user['id'] ?>" name="login_user" value="<?= $user['login_user'] ?>" >
                            </div>
                            <div class="form-group">
                                <label for="userEmail<?= $user['id'] ?>">Email</label>
                                <input type="email" class="form-control" id="userEmail<?= $user['id'] ?>" name="login_Email" value="<?= $user['login_Email'] ?>" >
                            </div>

                            <div class="form-group">
                                <label for="userPassword<?= $user['id'] ?>">Password</label>
                                <input type="text" class="form-control" id="userPassword<?= $user['id'] ?>" name="userPassword" value="<?= htmlspecialchars($user['userPassword']) ?>" >
                            </div>

                            <div class="form-group">
                                <label for="mobileNumber<?= $user['id'] ?>">Mobile Number</label>
                                <input type="text" class="form-control" id="mobileNumber<?= $user['id'] ?>" name="mobile_number" value="<?= $user['mobile_number'] ?>" >
                            </div>
                            <div class="form-group">
                                <label for="dateOfBirth<?= $user['id'] ?>">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirth<?= $user['id'] ?>" name="dateOfBirth" value="<?= $user['dateOfBirth'] ?>" >
                            </div>
                            <div class="form-group">
                                <label for="userCountry<?= $user['id'] ?>">Country</label>
                                <input type="text" class="form-control" id="userCountry<?= $user['id'] ?>" name="userCountry" value="<?= $user['userCountry'] ?>" >
                            </div>


                            <div class="form-group">
                                <label for="userRole<?= $user['id'] ?>">Role</label>
                                <select class="form-control" id="userRole<?= $user['id'] ?>" name="user_type" required>
                                    <option value="super Admin" <?= $user['user_type'] == 'super Admin' ? 'selected' : '' ?>>Super Admin</option>
                                    <option value="user" <?= $user['user_type'] == 'user' ? 'selected' : '' ?>>User</option>
                                </select>
                            </div>
                            <button type="submit" name="updateUserDetails" class="btn btn-success">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>




    <!-- Create User Modal -->
    <div class="modal fade" id="createUserModal" tabindex="-1" role="dialog" aria-labelledby="createUserModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createUserModalLabel">Create New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="createUserForm" method="POST">
                        <div class="form-group">
                            <label for="userName">Full Name</label>
                            <input type="text" class="form-control" id="userName" placeholder="Enter user name" name="login_user" required>
                        </div>
                        <div class="form-group">
                            <label for="userEmail">Email</label>
                            <input type="email" class="form-control" id="userEmail" placeholder="Enter email" name="login_Email" required>
                        </div>

                        <div class="form-group">
                            <label for="userPassword">Password</label>
                            <input type="text" class="form-control" id="userPassword" name="userPassword" required>
                        </div>

                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number</label>
                            <input type="text" class="form-control" id="mobileNumber" placeholder="Enter Mobile Number" name="mobile_number" required>
                        </div>
                        <div class="form-group">
                            <label for="dateOfBirth">Date of Birth</label>
                            <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" required>
                        </div>
                        <div class="form-group">
                            <label for="userCountry">Country</label>
                            <input type="text" class="form-control" id="userCountry" placeholder="Enter Your Country" name="userCountry" required>
                        </div>

                        <div class="form-group">
                            <label for="userRole">Role</label>
                            <select class="form-control" id="userRole" name="user_type" required>
                                <option value="super Admin">Super Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#createUserForm').submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'create_user.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    success: function(response) {
                        if (response === 'success') {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                text: "User Created Successfully",
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                location.reload();
                            });
                        } else if (response === 'email_exists') {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                text: "Email already exists. Please use a different email.",
                                showConfirmButton: true
                            });
                        } else {
                            Swal.fire({
                                position: "center",
                                icon: "error",
                                text: "Failed to Create User",
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            position: "center",
                            icon: "error",
                            text: "An error occurred",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    }
                });

            });
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
            feather.replace();
        });
    </script>

</body>

</html>
<?php
include("protected_page.php")
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
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <?php include('import/header.php') ?>
        <?php include('import/sideNav.php') ?>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">MY Profile</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">My Profile</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Personal Details</h4>

                                <?php
                                require("config/db.php");

                                $user_id = $decoded->data->id;


                                if ($user_id) {
                                    $stmt = $pdo->prepare("SELECT * FROM user_details WHERE id = ?");
                                    $stmt->execute([$user_id]);
                                    $user = $stmt->fetch();

                                    if (!$user) {
                                        echo "<script>alert('User not found');</script>";
                                        exit;
                                    }
                                }


                                if (isset($_POST['update_user_details'])) {
                                    try {

                                        $login_user = $_POST['login_user'];
                                        $login_Email = $_POST['login_Email'];
                                        $mobile_number = $_POST['mobile_number'];
                                        $dateOfBirth = $_POST['dateOfBirth'];
                                        $userCountry = $_POST['userCountry'];
                                        $user_type = $_POST['user_type'];


                                        $sql = "UPDATE user_details SET login_user = ?, login_Email = ?, mobile_number = ?, dateOfBirth = ?, userCountry = ?, user_type = ? WHERE user_id = ?";
                                        $stmt = $pdo->prepare($sql);


                                        if ($stmt->execute([$login_user, $login_Email, $mobile_number, $dateOfBirth, $userCountry, $user_type, $user_id])) {
                                            echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "success",
                    text: "User Updated Successfully",
                    showConfirmButton: false,
                    timer: 1500
                });
                window.location.href = "user_list.php"; // Redirect to user list page after update
            </script>';
                                        } else {
                                            echo '<script>
                Swal.fire({
                    position: "center",
                    icon: "error",
                    text: "Failed to Update User",
                    showConfirmButton: false,
                    timer: 1500
                });
            </script>';
                                        }
                                    } catch (Exception $e) {
                                        echo "<script>alert('Error: " . $e->getMessage() . "');</script>";
                                    }
                                }
                                ?>

                                <!-- HTML Form -->
                                <form method="POST">
                                    <div class="form-group">
                                        <label for="userName">Full Name</label>
                                        <input type="text" class="form-control" id="userName" placeholder="Enter user name" name="login_user" value="<?php echo htmlspecialchars($user['login_user'] ?? ''); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userEmail">Email</label>
                                        <input type="email" class="form-control" id="userEmail" placeholder="Enter email" name="login_Email" value="<?php echo htmlspecialchars($user['login_Email'] ?? ''); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="mobileNumber">Mobile Number</label>
                                        <input type="text" class="form-control" id="mobileNumber" placeholder="Enter Mobile Number" name="mobile_number" value="<?php echo htmlspecialchars($user['mobile_number'] ?? ''); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dateOfBirth">Date of Birth</label>
                                        <input type="date" class="form-control" id="dateOfBirth" name="dateOfBirth" value="<?php echo htmlspecialchars($user['dateOfBirth'] ?? ''); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userCountry">Country</label>
                                        <input type="text" class="form-control" id="userCountry" placeholder="Enter Your Country" name="userCountry" value="<?php echo htmlspecialchars($user['userCountry'] ?? ''); ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="userRole">Role</label>
                                        <select class="form-control" id="userRole" name="user_type" required>
                                            <option value="super Admin" <?php echo (isset($user['user_type']) && $user['user_type'] == 'super Admin') ? 'selected' : ''; ?>>Super Admin</option>
                                            <option value="user" <?php echo (isset($user['user_type']) && $user['user_type'] == 'user') ? 'selected' : ''; ?>>User</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="update_user_details">Update User</button>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <?php
                                require('config/db.php');

                                $id = $decoded->data->id;
                              

                                if ($id) {

                                    $sql = "SELECT * FROM user_details WHERE id  = :id";
                              
                                    $stmt = $pdo->prepare($sql);
                                    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                                    $stmt->execute();
                                    $login_user = $stmt->fetch(PDO::FETCH_ASSOC);
                               

                                    if ($login_user) {

                                        if (isset($_POST['change_password'])) {

                                            $old_passsword = $_POST['old_passsword'];
                                            $new_password = $_POST['new_password'];


                                            if (password_verify($old_passsword, $login_user['userPassword'])) {
                                                $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                                                $updateSql = "UPDATE user_details SET userPassword = :userPassword WHERE id = :id";
                                                $updateStmt = $pdo->prepare($updateSql);
                                                $updateStmt->bindParam(':userPassword', $hashedPassword, PDO::PARAM_STR);
                                                $updateStmt->bindParam(':id', $id, PDO::PARAM_INT);

                                                if ($updateStmt->execute()) {

                                                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                Swal.fire({
                                    position: "center",
                                    icon: "success",
                                    text: "Password updated successfully",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            });
                        </script>';
                                                } else {

                                                    echo '<script>
                            document.addEventListener("DOMContentLoaded", function() {
                                Swal.fire({
                                    position: "center",
                                    icon: "error",
                                    text: "Failed to update password",
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                            });
                        </script>';
                                                }
                                            } else {
                                                echo '<script>
                          document.addEventListener("DOMContentLoaded", function() {
                              Swal.fire({
                                  position: "center",
                                  icon: "error",
                                  text: "Please Fill Out the Form",
                                  showConfirmButton: false,
                                  timer: 1500
                              });
                          });
                      </script>';
                                            }
                                        }
                                    } else {
                                        echo '<script>
                      document.addEventListener("DOMContentLoaded", function() {
                          Swal.fire({
                              position: "center",
                              icon: "warning",
                              text: "User not found",
                              showConfirmButton: false,
                              timer: 1500
                          });
                      });
                  </script>';
                                    }
                                } else {

                                    echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        Swal.fire({
                            position: "center",
                            icon: "info",
                            text: "No user ID provided",
                            showConfirmButton: false,
                            timer: 1500
                        });
                    });
                </script>';
                                }
                                ?>

                                <form class="mt-4 pt-3" method="POST">

                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input type="text" class="form-control" name="old_passsword">
                                        <a href="change_password.php" style="font-size:10px">Foget Password?</a>
                                    </div>


                                    <div class="form-group pb-2 pt-2">
                                        <label>New Password</label>
                                        <input type="text" class="form-control" name="new_password">
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="change_password">Change Password</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer text-center">
                All Rights Reserved by Adminmart. Designed and Developed by <a href="https://wrappixel.com">WrapPixel</a>.
            </footer>
        </div>
    </div>
    <div class="chat-windows"></div>
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="dist/js/app.min.js"></script>
    <script src="dist/js/app.init-menusidebar.js"></script>
    <script src="dist/js/app-style-switcher.js"></script>
    <script src="dist/js/feather.min.js"></script>
    <script src="assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/extra-libs/sparkline/sparkline.js"></script>
    <script src="dist/js/sidebarmenu.js"></script>
    <script src="dist/js/custom.min.js"></script>
</body>

</html>
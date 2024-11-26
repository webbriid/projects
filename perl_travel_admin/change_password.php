<?php
include("protected_page.php")
?>



<?php
// Include database configuration
include("config/db.php");

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/phpmailer/phpmailer/src/Exception.php';
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';


function generateRandomPassword()
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $password = '';
    $length = 8;

    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

if (isset($_POST["change_password"])) {
    $emailAddress = $_POST['emailAddress'];

    try {
     
        $stmt = $pdo->prepare("SELECT * FROM user_details WHERE login_Email = ?");
        $stmt->execute([$emailAddress]);
        $user = $stmt->fetch();

        if ($user) {
            $demo_password = generateRandomPassword();
            $hashed_demo_password = password_hash($demo_password, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE user_details SET userPassword = ? WHERE login_Email = ?");
            $update_result = $stmt->execute([$hashed_demo_password, $emailAddress]);

            if ($update_result) {

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'kishatharmalingam@gmail.com';
                $mail->Password = 'wgzomxibiigqjrvt';
                $mail->SMTPSecure = 'ssl';
                $mail->Port = 465;

           
                $mail->setFrom('kishatharmalingam@gmail.com', 'kishanthini Tharmalingam');
                $mail->addAddress($emailAddress);
                $mail->isHTML(true);
                $mail->Subject = 'New Password';
                $mail->Body = '
                    <html>
                    <head>
                        <style>
                            body { font-family: Arial, sans-serif; font-size: 14px; }
                            .header { background-color: black; color: #ffffff; padding: 10px; text-align: center; }
                            .content { padding: 20px; }
                            .highlight { font-weight: bold; color: #007bff; }
                        </style>
                    </head>
                    <body>
                        <div class="content">
                            <p>Hello,</p>
                            <p>We wanted to let you know that your login password has been updated. Please find your new demo password below:</p>
                            <p class="highlight"><strong>' . $demo_password . '</strong></p>
                            <p>Use this demo password to access your account. For security purposes, we highly recommend changing it to a personalized password immediately after logging in.</p>
                            <p>If you have any questions or need assistance, feel free to contact our support team.</p>
                            <br>
                            <p>Thank you,</p>
                        </div>
                    </body>
                    </html>';

                // Send email
                if ($mail->send()) {
                    echo '<script>
                        document.addEventListener("DOMContentLoaded", function() {
                            Swal.fire({
                                position: "center",
                                icon: "success",
                                text: "Your password has been changed. Please check your email.",
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
                                text: "Email sending failed! Please enter your email address.",
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
                            text: "Failed to update password in the database.",
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
                        text: "Email not found! You are not a registered user.",
                        showConfirmButton: false,
                        timer: 1500
                    });
                });
            </script>';
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
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
                        <!-- <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Change Password</h4> -->
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Change Password</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Change Password</h4>
                                <form class="mt-4 pt-3" method="POST">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="emailAddress" class="form-control" name="emailAddress">
                                    </div>

                                    <button type="submit" class="btn btn-primary" name="change_password">Send Mail</button>
                                  
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


     <!--sweet alert script-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
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
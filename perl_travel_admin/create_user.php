<?php
require("config/db.php");

if (isset($_POST['login_user'])) {
    try {
        $login_user = $_POST['login_user'];
        $login_Email = $_POST['login_Email'];
        $mobile_number = $_POST['mobile_number'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $userCountry = $_POST['userCountry'];
        $user_type = $_POST['user_type'];
        $userPassword = $_POST['userPassword'];
        $removeHash = $_POST['userPassword'];

        $checkEmailSql = "SELECT COUNT(*) FROM user_details WHERE login_Email = ?";
        $checkEmailStmt = $pdo->prepare($checkEmailSql);
        $checkEmailStmt->execute([$login_Email]);
        $emailExists = $checkEmailStmt->fetchColumn();

        if ($emailExists > 0) {
            echo 'email_exists';
        } else {

            $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT);
            $sql = "INSERT INTO user_details (login_user, login_Email, mobile_number, dateOfBirth, userCountry, user_type, userPassword,removeHash) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            if ($stmt->execute([$login_user, $login_Email, $mobile_number, $dateOfBirth, $userCountry, $user_type, $hashedPassword, $removeHash])) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    } catch (Exception $e) {
        echo 'error';
    }
}

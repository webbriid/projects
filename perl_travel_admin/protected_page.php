<?php
require 'vendor/autoload.php';

$config = require('config.php');

use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

session_start();

$secretKey = $config['secretKey'];
$issuer = $config['issuer'];
$audience = $config['audience'];

$sessionTimeout = 3600;

if (isset($_SESSION['last_activity'])) {
    if (time() - $_SESSION['last_activity'] > $sessionTimeout) {
        session_unset();
        session_destroy();
        header('Location: logout.php');
        exit();
    }
}

if (isset($_SESSION['jwt'])) {
    $jwt = $_SESSION['jwt'];

    try {
        $decoded = JWT::decode($jwt, new Key($secretKey, 'HS256'));

        if ($decoded->iss === $issuer && $decoded->aud === $audience && $decoded->exp > time()) {
            $login_Email = $decoded->data->login_Email;
            $id = $decoded->data->id;
            $login_user = $decoded->data->login_user;
            $mobile_number = $decoded->data->mobile_number;
            $user_profileImage = $decoded->data->user_profileImage;
            $user_type = $decoded->data->user_type;
            $_SESSION['last_activity'] = time();
        } else {
            throw new Exception('Invalid token');
        }
    } catch (Exception $e) {
        header('Location: ../perl_travel/login.php');
        echo 'Access denied: ' . $e->getMessage();
        exit();
    }
} else {
    header('Location: ../perl_travel/login.php');
    exit();
}
?>

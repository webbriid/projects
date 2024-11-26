<?php

// $dsn = 'mysql:host=localhost;dbname=perl_travel';
// $username = 'root';
// $password = '';

// try {
//     $pdo = new PDO($dsn, $username, $password);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

$dsn = 'mysql:host=localhost;dbname=seeha_perltravels';
$username = 'seeha_perltravels';
$password = 'T9xhgJNr88LSjGW6tkAW';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
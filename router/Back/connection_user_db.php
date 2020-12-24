<?php
session_start();
$loginBD = "root";
$passwordBD = "root";
$dbname = "users-bd";
$servername = "localhost";
$dsn = "mysql:host=$servername;dbname=$dbname";

try {
    $userConnect = new PDO($dsn, $loginBD, $passwordBD);
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}
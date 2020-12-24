<?php
session_start();
$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

$log = $inputArray['login'];
$pass = $inputArray['pass'];

$login = "root";
$pas = "root";
$dbname = "items-bd";
$servername = "localhost";
$dsn = "mysql:host=$servername;dbname=$dbname";

try {
    $pdo = new PDO($dsn, $login, $pas);
} catch (PDOException $e) {
    print $e->getMessage();
    die();
}


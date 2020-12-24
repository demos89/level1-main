<?php
include('connection.php');

$loginBD = "root";
$passwordBD = "root";
$dbname = "users-bd";
$servername = "localhost";
$dsn = "mysql:host=$servername;dbname=$dbname";

include 'connection_user_db.php';

$result = $userConnect->prepare("SELECT * FROM `users` WHERE `login` = '$log'");
$result->execute();

$userArray = $result->fetchAll();

if (count($userArray) > 0) {
    echo json_encode(array("login exist" => false));
    die();
} else {
    $res = $userConnect->prepare("INSERT INTO `users` (`login`, `password`) VALUES ('$log', '$pass')");
    $res->execute();
}

$user = $pdo->prepare("CREATE TABLE $log (
        id INT(11) UNSIGNED PRIMARY KEY,
        text VARCHAR(32) NOT NULL,
        checked VARCHAR(10) NOT NULL)");
$user->execute();

echo json_encode(array("ok" => true));



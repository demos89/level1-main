<?php
include_once("headers.php");
include('connection.php');

$mysqli = new mysqli("localhost", "root", "root", "users-bd");

$log = $inputArray['login'];
$pass = $inputArray['pass'];

$result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$log'");
$user = $result->fetch_assoc();

if (count($user) > 0) {
    echo json_encode(array("login exist" => false));
} else {
    $mysqli->query("INSERT INTO `users` (`login`, `password`) VALUES ('$log', '$pass')");

    echo json_encode(array("ok" => true));
}

$user = new mysqli("localhost", "root", "root", "items-bd");

$user->query("CREATE TABLE $log (
        id INT(11) UNSIGNED PRIMARY KEY,
        text VARCHAR(30) NOT NULL,
        checked VARCHAR(30) NOT NULL)");

$mysqli->close();


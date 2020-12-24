<?php
include_once("headers.php");
$mysqli = new mysqli("localhost", "root", "root", "users-bd");

session_start();

$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

$log = $inputArray['login'];
$pass = $inputArray['pass'];

$result = $mysqli->query("SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$pass'");
$user = $result->fetch_assoc();

if (count($user) == 0) {
    echo json_encode(array("incorrect login or password" => false));
    exit;
}

$_SESSION["login"] = $log;
setcookie('user', $log, time() + 360, "/");

echo json_encode(array("ok" => true));

$mysqli->close();


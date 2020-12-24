<?php
include ('connection.php');
include 'connection_user_db.php';
//$mysqli = new mysqli("localhost", "root", "root", "users-bd");

$result = $userConnect->prepare("SELECT * FROM `users` WHERE `login` = '$log' AND `password` = '$pass'");
$result->execute();
$user = $result->fetchAll();

if (count($user) == 0) {
    echo json_encode(array("incorrect login or password" => false));
    exit;
}

$_SESSION["login"] = $log;
setcookie('user', $log, time() + 360, "/");

echo json_encode(array("ok" => true));


<?php
include('connection.php');

if (session_status() == 2 and $_SESSION["login"] != null) {
    $user = $_SESSION["login"];
} else {
    $user = "items";
}

$deleteId = intval($inputArray['id']);
$query = $pdo->prepare("DELETE FROM `$user` WHERE `$user`.`id` = '$deleteId'");
$query->execute();

echo json_encode(array("ok" => true));

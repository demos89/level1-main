<?php
session_start();
include('connection.php');

if (session_status() == 2 and $_SESSION["login"] != null) {
    $user = $_SESSION["login"];
} else {
    $user = "items";
}

$index = intval($inputArray['id']);
$text = $inputArray['text'];
$checked = $inputArray['checked'];

$result = $pdo->query("UPDATE `$user` SET `text` = '$text', `checked` = '$checked' WHERE `$user`.`id` = '$index'");
$result->execute();

echo json_encode(array("ok" => true));
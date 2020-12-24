<?php
session_start();
require('connection.php');

if (session_status() == 2 and $_SESSION["login"] != null) {
    $user = $_SESSION["login"];
} else {
    $user = "items";
}

$query = $pdo->prepare("SELECT MAX(id) FROM `$user`");
$query->execute();
$maxId = $query->fetch(PDO::FETCH_ASSOC);

$id = intval(++$maxId['MAX(id)']);
$text = $inputArray['text'];

$queryStr = "INSERT INTO `$user` (`id`, `text`, `checked`) VALUES ('$id', '$text', '')";
$insertToDB = $pdo->prepare($queryStr);
$insertToDB->execute();

echo json_encode(array("id" => $maxId['MAX(id)']));
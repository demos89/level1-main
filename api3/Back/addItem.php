<?php
session_start();
require('connection.php');

$user = $_SESSION["login"];

$lastId = $mysqli->query("SELECT MAX(id) FROM `items`");
$maxId = $lastId->fetch_assoc();

file_put_contents('log.txt', $maxId['MAX(id)'] . " max id");

$id = intval(++$maxId['MAX(id)']);
$text = $inputArray['text'];

$queryStr = "INSERT INTO `items` (`id`, `text`, `checked`) VALUES ('$id', '$text', '')";

$mysqli->query($queryStr);
$mysqli->close();

echo json_encode(array("id" => $maxId['MAX(id)']));
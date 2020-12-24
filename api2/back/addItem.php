<?php
session_start();
include_once("headers.php");
require('connection.php');

$lastId = $mysqli->query("SELECT MAX(id) FROM `items`");
$maxId = $lastId->fetch_assoc();

file_put_contents('log.txt', $maxId['MAX(id)'] . " max id");

$id = intval(++$maxId['MAX(id)']);
$text = $inputArray['text'];

$queryStr = "INSERT INTO `items` (`id`, `text`, `checked`) VALUES ('$id', '$text', '')";

$tempArray = array("id" => $maxId['MAX(id)'], "text" => $inputArray['text'], "checked" => '');
$mysqli->query($queryStr);

$mysqli->close();
echo json_encode(array("id" => $maxId['MAX(id)']));
<?php
session_start();
include('connection.php');

$user = $_SESSION["login"];
$index = intval($inputArray['id']);
$text = $inputArray['text'];
$checked = $inputArray['checked'];

$result = $mysqli->query("UPDATE `items` SET `text` = '$text', `checked` = '$checked' WHERE `items`.`id` = '$index'");

//$itemsArray['items'][--$index] = array("id" => ++$index, "text" => $inputArray['text'], "checked" => $inputArray['checked']);

$mysqli->close();

echo json_encode(array("ok" => true));
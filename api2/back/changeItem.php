<?php
session_start();
include_once("headers.php");
include('connection.php');

$index = intval($inputArray['id']);
$text = $inputArray['text'];
$checked = $inputArray['checked'];

$mysqli = new mysqli("localhost", "root", "root", "items-bd");

$result = $mysqli->query("UPDATE `items` SET `text` = '$text', `checked` = '$checked' WHERE `items`.`id` = '$index'");

$itemsArray['items'][--$index] = array("id" => ++$index, "text" => $inputArray['text'], "checked" => $inputArray['checked']);

$mysqli->close();

echo json_encode(array("ok" => true));
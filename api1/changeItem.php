<?php
include_once("headers.php");

$jsonStr = file_get_contents("items.json");
$itemsArray = json_decode($jsonStr, true);

$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

$index = $inputArray['id'];

$itemsArray['items'][--$index] = array("id" => ++$index, "text" => $inputArray['text'], "checked" => $inputArray['checked']);

file_put_contents('items.json', json_encode($itemsArray));
echo json_encode(array("ok" => true));
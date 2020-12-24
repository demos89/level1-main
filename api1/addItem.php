<?php
include_once("headers.php");
$jsonStr = file_get_contents("items.json");
$itemsArray = json_decode($jsonStr, true);

$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

$id = file_get_contents('lastId.txt');
file_put_contents('lastId.txt', ++$id);

$tempArray = array("id" => $id, "text" => $inputArray['text'], "checked" => false);
array_push($itemsArray['items'], $tempArray);

file_put_contents('items.json', json_encode($itemsArray));

echo json_encode(array("id" => $id));

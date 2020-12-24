<?php
include_once("headers.php");
$jsonStr = file_get_contents("items.json");
$itemsArray = json_decode($jsonStr, true);

$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

$index = $inputArray['id'];

$array;

for($i = 0; $i < count($itemsArray['items']);$i++) {
	if($i == ($index - 1)) {
		continue;
	}else if($i < ($index - 1)) {
		$array['items'][] = array("id" => $itemsArray['items'][$i]['id'], "text" => $itemsArray['items'][$i]['text'], "checked" => $itemsArray['items'][$i]['checked']);
	} else if($i > ($index - 1)) {
		$array['items'][] = array("id" => --$itemsArray['items'][$i]['id'], "text" => $itemsArray['items'][$i]['text'], "checked" => $itemsArray['items'][$i]['checked']);
	}
}

$id = file_get_contents('lastId.txt');
file_put_contents('lastId.txt', --$id);

file_put_contents('items.json', json_encode($array));
echo json_encode(array("ok" => true));

<?php
session_start();
include_once("headers.php");    //connecting to headers
include('connection.php');

$result = $mysqli->query("SELECT * FROM `items`");

$itemsArray = array('items' => array());

while ($row = mysqli_fetch_assoc($result)) {
    $tempArray = array('id' => intval($row['id']), 'text' => $row['text'], 'checked' => boolval($row['checked']));
    array_push($itemsArray['items'], $tempArray);
}

if(count($itemsArray) == 0) {
    file_put_contents('log.txt', "no items");
} else {
    file_put_contents('log.txt', "get items success \n");
    echo json_encode($itemsArray, JSON_NUMERIC_CHECK);
}

//JSON_NUMERIC_CHECK (int)
//Кодирование строк, содержащих числа, как числа. Доступно с PHP 5.3.3.
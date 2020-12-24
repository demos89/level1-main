<?php
session_start();
include("connection.php");

//$user = $_SESSION["login"];

$result = $mysqli->query("SELECT * FROM `items`");

$itemsArray = array('items' => array());

while ($row = mysqli_fetch_assoc($result)) {
    $tempArray = array('id' => intval($row['id']), 'text' => $row['text'], 'checked' => boolval($row['checked']));
    array_push($itemsArray['items'], $tempArray);
}

if(count($itemsArray) == 0) {
    file_put_contents('log.txt', "no items!");
} else {
    echo json_encode($itemsArray, JSON_NUMERIC_CHECK);
}

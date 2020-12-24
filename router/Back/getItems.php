<?php
session_start();
include("connection.php");
$itemsArray = array('items' => array());

if (session_status() == 2 and $_SESSION["login"] != null) {
    $user = $_SESSION["login"];
} else {
    $user = "items";
}

$query = $pdo->prepare("SELECT * FROM `$user`");
$query->execute();

while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $tempArray = array('id' => intval($row['id']), 'text' => $row['text'], 'checked' => boolval($row['checked']));
    array_push($itemsArray['items'], $tempArray);
}

if(count($itemsArray) == 0) {
    echo json_encode(array("getItems" => false));
} else {
    echo json_encode($itemsArray, JSON_NUMERIC_CHECK);
}

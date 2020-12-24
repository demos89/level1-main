<?php
include_once("headers.php");
include('connection.php');

$deleteId = intval($inputArray['id']);

$mysqli = new mysqli("localhost", "root", "root", "items-bd");

$result = $mysqli->query("DELETE FROM `items` WHERE `items`.`id` = '$deleteId'");

file_put_contents('log.txt', $deleteId);

echo json_encode(array("ok" => true));

//todo зміна інших індексів при видаленні
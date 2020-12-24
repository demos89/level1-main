<?php
include_once("headers.php");
include('connection.php');

$deleteId = intval($inputArray['id']);
$user = $_SESSION["login"];

$mysqli = new mysqli("localhost", "root", "root", "items-bd");

$result = $mysqli->query("DELETE FROM `items` WHERE `items`.`id` = '$deleteId'");

echo json_encode(array("ok" => true));

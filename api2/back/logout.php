<?php
session_start();
include_once("headers.php");

unset($_SESSION['login']);

session_destroy();

echo json_encode(array("ok" => true));
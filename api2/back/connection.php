<?php
$mysqli = new mysqli("localhost", "root", "root", "items-bd");
$inputData = file_get_contents('php://input');
$inputArray = json_decode($inputData, true);

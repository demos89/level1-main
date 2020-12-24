<?php
session_start();
unset($_SESSION['login']);
session_destroy();

echo json_encode(array("ok" => true));
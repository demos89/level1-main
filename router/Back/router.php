<?php
include("headers.php");

switch ($_GET['action']) {
    case "getItems":
        include_once("getItems.php");
        break;
    case "addItem":
        include_once("addItem.php");
        break;
    case "changeItem":
        include_once("changeItem.php");
        break;
    case "deleteItem":
        include_once("deleteItem.php");
        break;
    case "login":
        include_once("login.php");
        break;
    case "register":
        include_once("register.php");
        break;
    case "logout":
        include_once("logout.php");
        break;
    default:
        echo json_encode(array("Error" => "404"));
}


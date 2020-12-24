<?php
	include_once("headers.php");	//підключення необхідних хедерів
	$items = file_get_contents("items.json");
	
	echo $items;
	
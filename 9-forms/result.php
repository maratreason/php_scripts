<?php
    echo $_GET["name"] . " " . $_GET["salary"] . "<br>";
    echo "<pre>";
	var_dump($_GET);     // массив с ключами test1 и test2
	var_dump($_POST);    // пустой массив
	var_dump($_REQUEST); // массив с ключами test1 и test2
    echo "</pre>";
?>
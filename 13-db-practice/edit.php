<?php
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'test';      // имя базы данных
	
	$link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    $root = $_SERVER['DOCUMENT_ROOT'];
?>

<?
    $id = $_GET['edit'];
    $query = "SELECT * FROM users WHERE id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    // Получим данные юзера в переменную:
    $user = mysqli_fetch_assoc($result);
?>

<form action="/13-db-practice/save.php?id=<?=$id ?>" method="POST">
	<input name="name" value="<?=$user['name'] ?>">
	<input type="submit">
</form>
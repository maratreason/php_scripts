<?php
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'test';      // имя базы данных
	
	$link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");
?>

<?
    $id = isset($_GET['id']) ? $_GET['id'] : $_SESSION['user']['id'];
    $query = "SELECT * FROM auth_users WHERE id='$id'";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Profile</h3>
    <? if (!empty($_SESSION['auth'])) { ?>
        <?if ($_SESSION['user']) {?>
            <div>Имя пользователя: <?=$user['login']?></div>
        <?}?>
        <a href="/14-auth/logout.php">Выйти</a>
    <?} else {?>
        <div>Пожалуйста авторизуйтесь</div>
        <a href="login.php">На страницу логина</a>
    <?}?>
</body>
</html>
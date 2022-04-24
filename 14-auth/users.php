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
    $query = "SELECT *, statuses.name as status FROM auth_users
        LEFT JOIN auth_statuses as statuses ON auth_users.status_id=statuses.id";
    $result = mysqli_query($link, $query) or die(mysqli_error($link));
    for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
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
    <h3>Список пользователей</h3>
    <table border="1">
        <? foreach($data as $userData) {?>
            <tr>
                <td><?=$userData['login']?></td>
                <td><?=$userData['status']?></td>
                <td><a href="/14-auth/profile.php?id=<?=$userData['id']?>">Посмотреть</a></td>
            </tr>
        <?}?>
    </table>
</body>
</html>
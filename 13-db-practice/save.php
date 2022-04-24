<?php
	session_start();
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'test';      // имя базы данных
	
	$link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");
?>

<?php
	$id = $_GET['id'];
	$name = $_POST['name'];

    $query = "UPDATE users SET name='$name' WHERE id='$id'";

    mysqli_query($link, $query) or die(mysqli_error($link));
    $_SESSION['flash'] = "Запись успешно сохранена!";
    header("Location: /13-db-practice/");
?>
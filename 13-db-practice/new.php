<?php
    session_start();
	$host = 'localhost'; // имя хоста
	$user = 'root';      // имя пользователя
	$pass = '';          // пароль
	$name = 'test';      // имя базы данных
	
	$link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");

    $root = $_SERVER['DOCUMENT_ROOT'];
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
    <h3>Добавление пользователя</h3>

    <form action="" method="POST">
        <input name="name">
        <input type="submit">
    </form>

    <?php
        if (!empty($_POST)) {
            $name = $_POST['name'];
            $query = "INSERT INTO users SET name='$name'";
            mysqli_query($link, $query) or die(mysqli_error($link));
            
            $_SESSION['flash'] = "Запись успешно добавлена!";
            header("Location: /13-db-practice/");
        }
    ?>
</body>
</html>
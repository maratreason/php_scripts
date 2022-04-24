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

<?php
	$id = $_SESSION['id'];
	$query = "SELECT * FROM auth_users WHERE id='$id'";
	
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
    var_dump($id);
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
    <h3>Аккаунт</h3>

    <form action="" method="POST">
        <input name="login" value="<?= $user['login'] ?>">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
	if (!empty($_POST['submit'])) {
		$login = $_POST['login'];
        $query = "UPDATE auth_users SET login='$login' WHERE id='$id'";
        mysqli_query($link, $query);
        header("Location: /14-auth/account.php");
	}
?>
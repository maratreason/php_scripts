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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Удаление аккаунта</h3>

    <?
        if (isset($_SESSION['flash'])) {
            if (isset($_SESSION['flash']['success'])) {
                echo '<div style="padding: 20px; background-color:aquamarine; color:darkgreen; border-radius: 3px;">';
                echo $_SESSION['flash']['success'];
                echo '</div>';
            } else if (isset($_SESSION['flash']['error'])) {
                echo '<div style="padding: 20px; background-color:salmon; color:darkred; border-radius: 3px;">';
                echo $_SESSION['flash']['error'];
                echo '</div>';
            }
            unset($_SESSION['flash']);
        }
    ?>

    <form action="" method="POST">
        <input type="password" name="password">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
	$id = $_SESSION['id'];
	$query = "SELECT * FROM auth_users WHERE id='$id'";
	
	$result = mysqli_query($link, $query);
	$user = mysqli_fetch_assoc($result);
	
	$hash = $user['password']; // соленый пароль из БД
    if (!empty($_POST['submit'])) {
        // Проверяем соответствие хеша из базы введенному старому паролю
        if (password_verify($_POST['password'], $hash)) {
            $query = "DELETE FROM auth_users WHERE id='$id'";
            mysqli_query($link, $query);
            $_SESSION['flash']['success'] = "Аккаунт успешно удален";
            header("Location: /14-auth/register.php");
        } else {
            //  пароль введен неверно, выведем сообщение
            $_SESSION['flash']['error'] = "Пароль введен неверно";
            header("Location: /14-auth/delete-account.php");
        }
        
    }
	
?>
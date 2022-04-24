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
    function generateSalt() {
		$salt = '';
		$saltLength = 8; // длина соли
		
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
		}
		
		return $salt;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container {
            width: 600px;
            padding: 70px;
            margin: 0 auto;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .form {
            width: 700px;
            padding: 70px;
            border-radius: 3px;
            margin: 0 auto;
            text-align: center;
            box-shadow: 3px 0px 40px rgba(0, 0, 0, 0.2);
            margin-top: 100px;
            margin-bottom: 30px;
        }
        .input {
            padding: 10px;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        .button {
            padding: 10px;
            border: none;
            background: cornflowerblue;
            color: #fff;
            font-size: 14px;
            border-radius: 3px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h3>Регистрация</h3>

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

    <form class="form" action="" method="POST">
        <input class="input" name="login" placeholder="login" value="<?=isset($_POST['login']) ? $_POST['login'] : ""?>">
        <input class="input" name="password" type="password" placeholder="password" value="<?=isset($_POST['password']) ? $_POST['password'] : ""?>">
        <input class="input" name="confirm" type="password" placeholder="confirm" value="<?=isset($_POST['confirm']) ? $_POST['confirm'] : ""?>">
        <input class="button" type="submit">
    </form>
</body>
</html>

<?
    if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['confirm'])) {
        $salt = generateSalt();

        $login = $_POST['login'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = "SELECT * FROM auth_users WHERE login='$login'";
        $user = mysqli_fetch_assoc(mysqli_query($link, $query));

        $loginLength = count(str_split($login));
        $passwordLength = count(str_split($password));
        if ($loginLength < 4) {
            $_SESSION['flash']['error'] = "Логин должен быть больше 4 символов. Сейчас $loginLength.";
            header("Location: /14-auth/register.php");
        } else if ($passwordLength < 4 || $passwordLength > 60) {
            $_SESSION['flash']['error'] = "Пароль должен быть больше 4 символов и меньше 10 символов. Сейчас $passwordLength.";
            header("Location: /14-auth/register.php");
        } else {
            if ($_POST['password'] == $_POST['confirm']) {
                if (empty($user)) {
                    $query = "INSERT INTO auth_users SET login='$login', password='$password', status_id='1'";
                    mysqli_query($link, $query);
                    
                    $_SESSION['auth'] = true;
                    $_SESSION['user'] = $login;
    
                    $id = mysqli_insert_id($link);
                    $_SESSION['id'] = $id; // пишем id в сессию
                    $_SESSION['flash']['success'] = "Пользователь успешно зарегистрирован";
    
                    header("Location: /14-auth/profile.php");
                } else {
                    $_SESSION['flash']['error'] = "Этот логин занят, попробуйте другой";
                    header("Location: /14-auth/register.php");
                }
                
            } else {
                // Пароли не совпадают
                $_SESSION['flash']['error'] = "Пароли не совпадают";
                header("Location: /14-auth/register.php");
            }
        }
	}
?>

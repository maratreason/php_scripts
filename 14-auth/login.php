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
    <style>
        .container {
            width: 600px;
            padding: 70px;
            margin: 0 auto;
            border-radius: 3px;
            border: 1px solid #ccc;
        }
        .form {
            width: 600px;
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
    <h3>Авторизация</h3>

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
        <input class="input" name="login">
        <input class="input" name="password" type="password">
        <input class="button" type="submit">
    </form>

    <div class="container">
        <?
            if (isset($user['login'])) {
                echo $user['login'];
            }
        ?>
    </div>
</body>
</html>

<?php
	if (!empty($_POST['password']) and !empty($_POST['login'])) {
		$login = $_POST['login'];
		$password = $_POST['password'];
		
		// $query = "SELECT * FROM auth_users WHERE login='$login'";
        $query = "SELECT *, statuses.name as status FROM auth_users
            LEFT JOIN auth_statuses as statuses
            ON auth_users.status_id=statuses.id WHERE login='$login'";
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);


		if (!empty($user)) {
            // прошел авторизацию
            $hash = $user['password'];

            // Проверяем соответствие хеша из базы введенному паролю
            if (password_verify($_POST['password'], $hash)) {
            // все ок, авторизуем...
                $_SESSION['auth'] = true;
                $_SESSION['status'] = $user['status']; // статус
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user['id'];
                $_SESSION['flash']['success'] = "Пользователь успешно авторизован";

                header("Location: /14-auth/profile.php");
            } else {
                // пароль не подошел, выведем сообщение
                $_SESSION['flash']['error'] = "логин или пароль введены неверно";
                header("Location: /14-auth/login.php");
            }
		} else {
			// неверно ввел логин или пароль
            $_SESSION['flash']['error'] = "логин или пароль введены неверно";
            header("Location: /14-auth/login.php");
		}
	}
?>

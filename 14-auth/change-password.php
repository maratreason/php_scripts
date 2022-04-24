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
    <h3>Смена пароля</h3>

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
        <input name="old_password">
        <input type="password" name="new_password">
        <input type="password" name="new_password_confirm">
        <input type="submit" name="submit">
    </form>
</body>
</html>

<?php
    if (!empty($_POST['submit'])) {
        $id = $_SESSION['id']; // id юзера из сессии
        $query = "SELECT * FROM auth_users WHERE id='$id'";
        
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);
        
        $hash = $user['password']; // соленый пароль из БД
        $oldPassword = $_POST['old_password'];
        $newPassword = $_POST['new_password'];

        if ($_POST['new_password'] == $_POST['new_password_confirm']) {
            // Проверяем соответствие хеша из базы введенному старому паролю
            if (password_verify($oldPassword, $hash)) {
                $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                
                $query = "UPDATE auth_users SET password='$newPasswordHash' WHERE id='$id'";
                mysqli_query($link, $query);
                $_SESSION['flash']['success'] = "Пароль успешно изменен";
            } else {
                // старый пароль введен неверно, выведем сообщение
                $_SESSION['flash']['error'] = "Пароли не совпадают";
            }
        } else {
            $_SESSION['flash']['error'] = "Новый пароль и подтверждение не совпадают";
        }
        
        header("Location: /14-auth/change-password.php");
    }
?>

<?
    session_start();
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

    <? if (!empty($_SESSION['auth'])) { ?>
        <?if ($_SESSION['user']) {?>
            <div>Имя пользователя: <?=$_SESSION['user']?></div>
        <?}?>
        <div>Страница 1</div>
        <a href="/14-auth/logout.php">Выйти</a>
    <?} else {?>
        <div>Пожалуйста авторизуйтесь</div>
        <a href="login.php">На страницу логина</a>
    <?}?>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Сессии</h3>
    <?php
        // session_start();

        // setcookie('test', 'abcde', time() + 60 * 60 * 24);

        // В PHP нет встроенного механизма для удаления кук. Поэтому удаляют куки хитрым способом - устанавливая время 'смерти' куки на текущий момент:
        // setcookie('test', '', time());
        // Удаление куки приведет к изменению $_COOKIE только после перезагрузки страницы:
        // Для того, чтобы при удалении куки сразу менялся $_COOKIE можно использовать уже известный нам хитрый прием:
        // setcookie('test', '', time());
	    // unset($_COOKIE['test']);
        
        // if (!isset($_COOKIE['counter'])) { // первый заход на страницу
        //     setcookie('counter', 1);
        //     $_COOKIE['counter'] = 1;
        // } else {
        //     setcookie('counter', $_COOKIE['counter'] + 1);
        //     $_COOKIE['counter'] = $_COOKIE['counter'] + 1;
        // }
        
        // echo $_COOKIE['counter'];
	
        // if (!isset($_SESSION['counter'])) {
        //     $_SESSION['counter'] = 1; // первый заход на страницу
        // } else {
        //     if ($_SESSION['counter'] == 10) {
        //         unset($_SESSION['counter']);
        //     } else {
        //         $_SESSION['counter']++;   // последующие заходы
        //     }
        // }
        
        // echo $_SESSION['counter'];
        // echo $_COOKIE['str'];
    ?>
    <a href="/10-sessions/logout.php">Logout</a>
</body>
</html>
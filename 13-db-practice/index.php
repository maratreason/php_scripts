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

    <?
        // Удаление
        if (isset($_GET['del'])) {
            $del = $_GET['del'];
            $query = "DELETE FROM users WHERE id=$del";
            mysqli_query($link, $query) or die(mysqli_error($link));
            $_SESSION['flash'] = "Запись успешно удалена!";
        }
    ?>

    <?
        // pagination
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        // количество записей на страницу
        $notesOnPage = 3;
        $from = ($page - 1) * $notesOnPage;
        
        $query = "SELECT * FROM users LIMIT $from, $notesOnPage";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?>

    <?
        $query = "SELECT COUNT(*) as count FROM users";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $count = mysqli_fetch_assoc($result)['count'];

        // Количество страниц
        $countPages = ceil($count / $notesOnPage);

        $prev = $page > 1 ? $page - 1 : $page;
        $next = $page < $countPages ? $page + 1 : $page;
    ?>

    <?
        if (isset($_SESSION['flash'])) {
            echo '<div style="padding: 20px; background-color:aquamarine; color:darkgreen; border-radius: 3px;">';
            echo $_SESSION['flash'];
            echo '</div>';
            unset($_SESSION['flash']);
        }
    ?>

    <a href="new.php">Добавить нового пользователя</a>

    <table border="1">
        <? foreach ($data as $elem) {?>
            <tr>
                <td><?= $elem['id'] ?></td>
                <td><?= $elem['name'] ?></td>
                <td><a href="/13-db-practice/edit.php?edit=<?=$elem['id']?>">edit</a></td>
                <td><a href="?del=<?=$elem['id']?>">Удалить</td>
            </tr>
        <?}?>
    </table>

    <div class="pagination" style="margin-top:2rem;">
        <?if ($page > 1) {?>
            <a href="?page=<?=$prev?>" style="padding: 10px; border: 1px solid #ccc; margin-right: 1rem; text-decoration: none;"><<</a>
        <?}?>
        <?for ($i = 1; $i <= $countPages; $i++) {?>
            <a
            href="?page=<?=$i?>"
            style="padding: 10px; border: 1px solid #ccc; margin-right: 1rem; text-decoration: none; color: <?= $i == $page ? "black": "#ccc";?>;"
            ><?=$i?></a>
        <?}?>
        <?if ($page < $countPages) {?>
            <a href="?page=<?=$next?>" style="padding: 10px; border: 1px solid #ccc; margin-right: 1rem; text-decoration: none;">>></a>
        <?}?>
    </div>

</body>
</html>

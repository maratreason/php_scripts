<?php
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
    
    <?
        $query = "
            SELECT
                products.name as product_name, categories.name as category_name
            FROM
                products
            LEFT JOIN products_categories ON products_categories.product_id=products.id
            LEFT JOIN categories ON products_categories.category_id=categories.id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $res = [];

        /* далее переделаем в такой вид
        $res = [
            ['Категория1' => ['продукт1', 'продукт2', 'продукт3']],
            ['Категория2' => ['продукт1', 'продукт2', 'продукт3']],
            ['Категория3' => ['продукт1', 'продукт2']]
        ];
        */
        foreach ($data as $elem) {
            echo "Категория: " . $elem['category_name'] . ". Продукт: " . $elem['product_name'] . "<br>";
            $res[$elem['category_name']][] = $elem['product_name'];
        }

        // echo "<pre>";
        // print_r($res);
        // echo "</pre>";
    ?><br>

    <?
        $query = "
            SELECT
                categories.name as category_name, parent_categories.name as parent_category_name
            FROM
                categories
            LEFT JOIN categories as parent_categories ON parent_categories.id=categories.parent_id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $res = [];

        /* далее переделаем в такой вид
        $res = [
            ['Категория1' => ['продукт1', 'продукт2', 'продукт3']],
            ['Категория2' => ['продукт1', 'продукт2', 'продукт3']],
            ['Категория3' => ['продукт1', 'продукт2']]
        ];
        */
        // foreach ($data as $elem) {
        //     echo "Категория: " . $elem['category_name'] . ". Продукт: " . $elem['product_name'] . "<br>";
        //     $res[$elem['category_name']][] = $elem['product_name'];
        // }

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    ?>

    <p>Пользователь, обмен сообщениями между пользователями. Составьте структуру таблиц.</p>
    <?
        $query = "
            SELECT
                from_user.name as from_user_name,
                to_user.name as to_user_name,
                text as message
            FROM
                messages
            LEFT JOIN users as from_user
                ON from_user.id=messages.from_user_id
            LEFT JOIN users as to_user
                ON to_user.id=messages.to_user_id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        echo "<pre>";
        print_r($data);
        echo "</pre>";
    ?>

    <p>Сайт с датами футбольных игр. Каждая игра содержит дату игры, первую команду и вторую команду.
        Есть игроки, каждый из которых принадлежит одной команде. Составьте структуру таблиц.</p>
    <?
    /*
        SELECT
            products.name as product_name, categories.name as category_name
        FROM
            products
        LEFT JOIN products_categories ON products_categories.product_id=products.id
        LEFT JOIN categories ON products_categories.category_id=categories.id
    */
        $query = "
            SELECT
                players.name as player_name,
                commands.name as command_name
            FROM
                football_commands as commands
            LEFT JOIN football_players as players ON players.command_id=commands.id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $playerOfCommands = [];
        foreach ($data as $elem) {
            $playerOfCommands[$elem['command_name']][] = $elem['player_name'];
        }

        echo "<pre>";
        print_r($playerOfCommands);
        echo "</pre>";

        $query2 = "
            SELECT
                date as game_date,
                command1.name as command_name1,
                command2.name as command_name2
            FROM
                football_games
            LEFT JOIN football_commands as command1
                ON football_games.command_one_id=command1.id
            LEFT JOIN football_commands as command2
                ON football_games.command_two_id=command2.id
        ";

        $result2 = mysqli_query($link, $query2) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result2); $data[] = $row);

        $games = [];
        foreach ($data as $elem) {
            $games[$elem['game_date']][] = $elem['command_name1'];
            $games[$elem['game_date']][] = $elem['command_name2'];
            $games[$elem['game_date']][] = $elem['game_date'];
        }

        // echo "<pre>";
        // print_r($games);
        // echo "</pre>";

        foreach ($games as $elem) {
            echo "<div style=\"padding: 10px 20px; background-color:#ccc; border-bottom:1px solid #fff;\">";
            echo  $elem[2] . "<br>";
            echo $elem[0]. " - " .$elem[1]. "<br>";
            echo "</div>";
        }

    ?><hr>

    <p>
        Форум, в нем категории, в них темы (тема принадлежит только одной категории), 
        в темах посты. У темы есть автор. Пользователи могут обмениваться личными сообщениями. Составьте структуру таблиц.
    </p>
    <?
        $query = "
            SELECT
                players.name as player_name,
                commands.name as command_name
            FROM
                football_commands as commands
            LEFT JOIN football_players as players ON players.command_id=commands.id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
    ?><hr>

    <p>
        Социальная сеть, в ней пользователи, их друзья, стена, комментарии к записям на стене. 
        Пользователи могут обмениваться личными сообщениями. Составьте структуру таблиц.
    </p>
    <?
        
    ?>

    <p>
        Генеологическое дерево. Пользователь, его бабушки, дедушки, мама, папа, братья, сестры, дети. 
        Можно найти любого родственника в любом колене (например, пра-пра-пра-дедушку). 
        Нужно хранить и получать родственные связи. Составьте структуру таблиц.
    </p>
</body>
</html>
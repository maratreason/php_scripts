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
        $query = 'SELECT * FROM users';
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        foreach($data as $user) {
            echo $user["name"] . "<br>";
        }
    ?>

    <p>Вставить нового пользователя</p>
    <?
        // $query = "INSERT INTO users (name, age, salary) VALUES ('user', 30, 1000)";
        // mysqli_query($link, $query) or die(mysqli_error($link));
    ?>

    <p>Обновление записей через SQL запрос в PHP</p>
    <?
        // $query = "UPDATE users SET age=20, salary=800 WHERE id=1";
        // mysqli_query($link, $query) or die(mysqli_error($link));
    ?>

    <p>Удаление записей через SQL запрос в PHP</p>
    <?
        // $query = "DELETE FROM таблица WHERE условие";
    ?>

    <p>Сортировка записей через SQL запрос в PHP</p>
    <?
        // Выберем из нашей таблицы users всех юзеров и отсортируем их по возрасту от меньшего к большему:
        // $query = "SELECT * FROM users ORDER BY age";

        // Поменяем порядок сортировки с помощью команды DESC:
        // $query = "SELECT * FROM users ORDER BY age DESC";

        // Выберем всех юзеров с зарплатой 500 и отсортируем их по возрасту от меньшего к большему:
        // $query = "SELECT * FROM users WHERE salary=500 ORDER BY age";

        // Можно сортировать не по одному полю, а по нескольким. 
        // Давайте для примера выберем всех юзеров и отсортируем их сначала по возрастанию возраста, 
        // а юзеров с одинаковыми возрастами отсортируем по возрастанию зарплаты:
        // $query = "SELECT * FROM users ORDER BY age, salary";
    ?>

    <p>Ограничение количества записей в SQL в PHP</p>
    <?
        // С помощью команды LIMIT мы можем ограничить количество строк в результате.
        // $query = "SELECT * FROM users LIMIT 2";

        // Выберем всех юзеров с зарплатой 500, а затем с помощью LIMIT возьмем только первых двух из выбранных:
        // $query = "SELECT * FROM users WHERE salary=500 LIMIT 2";

        // С помощью LIMIT можно выбрать несколько строк из середины результата. 
        // В примере ниже мы выберем со второй строки (нумерация строк с нуля), 5 штук:
        // $query = "SELECT * FROM users LIMIT 1,5";

        // Команду LIMIT можно комбинировать с ORDER BY. При этом сначала нужно писать команду сортировки, а потом - лимит. 
        // В следующем примере мы сначала отсортируем записи по возрастанию возраста, а потом возьмем первые 3 штуки:
        // $query = "SELECT * FROM users ORDER BY age LIMIT 3";
    ?>

    <p>Подсчет количества через SQL запрос в PHP</p>
    <?
        // Давайте, например, подсчитаем всех юзеров в таблице:
        // $query = "SELECT COUNT(*) FROM users";

        // А теперь подсчитаем всех, у кого зарплата равна 900:
        // $query = "SELECT COUNT(*) FROM users WHERE salary=900";

        // Давайте посмотрим, как получить подсчитанное количество в нашем PHP скрипте, так как тут не все так просто.
        // Напишем код, подчитывающий количество юзеров:

        $query = "SELECT COUNT(*) as count FROM users";
        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        $data = mysqli_fetch_assoc($result);

        echo "<pre>";
        var_dump($data);
        echo "</pre>";
    ?>

    <h3>Организация БД</h3>
    <?
        // $query = "SELECT 
        //               users.name, cities.name as city_name
        //           FROM 
        //               users
        //           LEFT JOIN cities ON cities.id=users.city_id";

        // Для того, чтобы достать юзеров вместе с их городами и странами, нам придется сделать два джоина: 
        // первый присоединит города к юзерам, а второй - страны к городам:

        // $query = "
        //     SELECT 
        //         users.name,
        //         cities.name as city_name,
        //         countries.name as country_name
        //     FROM 
        //         users
        //     LEFT JOIN cities ON cities.id=users.city_id
        //     LEFT JOIN countries ON countries.id=cities.country_id
        // ";

        // $result = mysqli_query($link, $query) or die(mysqli_error($link));
        // for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
        // // $data = mysqli_fetch_assoc($result);

        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
    ?><br>

    <?
        // Давайте сделаем запрос, с помощью которого вытащим юзеров вместе с их городами. 
        // Для этого нам понадобится сделать два джоина: первый джоин присоединит к юзерам таблицу связи, 
        // а второй джоин по связям присоединит города:
        $query = "
            SELECT
                users.name as user_name, cities.name as city_name
            FROM
                users
            LEFT JOIN users_cities ON users_cities.user_id=users.id
            LEFT JOIN cities ON users_cities.city_id=cities.id
        ";

        $result = mysqli_query($link, $query) or die(mysqli_error($link));
        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);

        $res = [];
	
        foreach ($data as $elem) {
            $res[$elem['user_name']][] = $elem['city_name'];
        }

        echo "<pre>";
        print_r($res);
        echo "</pre>";
    ?>
    
</body>
</html>
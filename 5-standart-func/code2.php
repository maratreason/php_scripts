<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Функции для времени-даты в PHP</h3>
    <?
        $seconds = time() - mktime(23, 0, 0, 12, 31, 2003);
        echo floor($seconds / 60 / 60 / 24) . " дня прошло со дня первого поцелуя с Альбинкой Анциферовой";
    ?><br>

    <?
        $now = time() - mktime(7, 0, 0, 2, 17, 2022);
        echo floor($now / 60 / 60);
    ?><br>

    <?
        echo date('Y') . "<br>";
        echo date('H:i:s d.m.Y') . "<br>";
        echo date('d-m-Y', mktime(0, 0, 0, 12, 17, 21)) . "<br>"; // выведет '29-12-2013'

        // Узнаем какой день недели был 29-12-2013:
	    echo date('w', mktime(0, 0, 0, 12, 31, 03)); // выведет '3' - среда
    ?><br>

    <?
        echo date("d-m-Y", strtotime('2025-12-31')) . "<br>";

        $date = date_create('2025-12-31');
	
        date_modify($date, '1 day');
        echo date_format($date, 'd.m.Y');
    ?><br>

    <?
        // Узнайте сколько дней осталось до Нового Года. Скрипт должен работать в любом году
        $count = date("z", time()) + 1; 
        echo "До Нового года осталось " . (365 - $count) . " дней.";
    ?><br>

    <?
        // Пусть в переменной содержится некоторый год. Найдите все пятницы 13-е в этом году. Результат выведите в виде массива дат.
        $year = 2022;
        $fridays = [];
        $weekDay = ["Sun", "Mon", "teu", "Wen", "Thu", "Fri", "Sat"];
        $months = ["Jan", "Feb", "Mart", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        for($month = 0; $month < count($months); $month++) {
            $monthDay = date("w", mktime(0, 0, 0, $month + 1, 13, $year));
            $fridays[$months[$month]] = $weekDay[$monthDay] . " " . 13;
        }

        echo "<pre>";
        print_r($fridays);
        echo "</pre>";
    ?><br>

    <?
        // Узнайте какой день недели был 100 дней назад.
        $date = date_create('2022-02-17');
        date_modify($date, '-100 days');

        echo date_format($date, 'd.m.Y');
    ?>

    <h3>Практика на использования изученных функций PHP</h3>

    <?
        // Найдите сумму чисел от 1 до 100.
        echo array_sum(range(1, 100)) . "<br>";
        
        // Заполните массив 10-ю иксами.
        echo str_repeat('x', 10) . "<br>";

        // Заполните массив 10-ю случайными числами от 1 до 10 так, чтобы они не повторялись.
        $nums = [];
        $result = [];
        for ($i = 0; $i < 10; $i++) {
            $randomNum = mt_rand(1, 10);
            $nums[] = $randomNum;
            $result = array_unique($nums);
        }
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?><br>

    <?
        $num = 12345;
        echo array_sum(str_split($num, 1));
    ?><br>

    <?
        // Заполните массив числами от 1 до 26 так, чтобы ключами этих чисел были буквы английского алфавита:
        $keys = range("a", "z");
        $values = range(1, 26);
        $result = array_combine($keys, $values);

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?><br>

    <?
        $str = '1234567890';
        $arr = str_split($str, 2);
        // Найдите сумму пар чисел: 12 + 34 + 56 + 78 + 90
        echo array_sum($arr); // 270
    ?><br>

    <?
        // Используя комбинацию функций заполните массив следующим образом:
        // [[1, 2, 3], [4, 5, 6], [7, 8, 9]]
        $result = [];
        $k = 1;
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $result[$i][$j] = $k++; // заполняем подмассив числами
            }
        }
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?>
</body>
</html>
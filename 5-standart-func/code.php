<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Стандартные функции PHP</h3>

    <?
        // Дана строка. Проверьте, что она начинается на 'http://'.
        $string = "http://google.com";

        
        function checkString($str) {
            $result = substr($str, 0, 7);
            if ($result === "http://") {
                echo "Валидация прошла успешно";
            } else {
                echo "Строка начинается не с http://";
            }
        }

        checkString($string);
        echo "<br>";

        function strLen2($str) {
            $result = "";
            if (strlen($str) > 5) {
                $result = substr($str, 0, 5) . "...";
            } else {
                $result = $str;
            }
            return $result;
        }

        echo strLen2("How d");
        echo strLen2("How do my firend");
        
    ?><br>

    <p>Работа с str_replace</p>
    <?
        $str = "31.12.2013";
        $result = str_replace(".", "-", $str);
        echo $result . "<br>";

        $str2 = "How do my friend";
        $result2 = str_replace(["o", "y", "e"], [1, 2, 3], $str2);
        echo $result2 . "<br>";

        $str3 = "1a2b3c4b5d6e7f8g9h0";
        $result3 = str_replace([1, 2, 3, 4, 5, 6, 7, 8, 9, 0], ["", "", "", "", "", "", "", "", "", ""], $str3);
        echo $result3 . "<br>";
    ?><br>

    <p>Работа с strtr</p>
    <?
        echo strtr('111222', ['1'=>'a', '2'=>'b']); // aaabbb
        echo "<br>";
        echo strtr('11122234567', '12', 'ab'); // aaabbb34567
    ?><br>

    <p>Работа с substr_replace</p>
    <?
        echo substr_replace('abcde', '!!!', 1, 3) . "<br>"; // a!!!e
        echo substr_replace('abcde', '!!!', 1); // a!!!
    ?><br>

    <p>Работа с strpos, strrpos</p>
    <?
        echo strpos('abcde abcde', 'c') . "<br>"; // 2
        echo strpos('abcde abcde', 'c', 3) . "<br>"; // 8

        // Проверим, что строка начинается на 'http://' (обратите внимание на сравнение по ===, а не по ==):
        if(strpos('http://site.ru', 'http://') === 0) {
            echo 'да';
        } else {
            echo 'нет';
        } // да
        echo "<br>";

        // В данном примере функция вернет позицию последнего вхождения символа 'а':
        echo strrpos('abcde abcde', 'a'); // 6
    ?>

    <p>Работа с explode, implode</p>
    <?
        $date = '2025-12-31';
        $arr = explode('-', $date);
        echo "<pre>";
        print_r($arr);
        echo "</pre>";

        $arr2 = ['a', 'b', 'c', 'd', 'e'];
	    echo implode('-', $arr2);
    ?><br>

    <p>Работа с str_split</p>
    <?
        $str = "1234567890";
        $arr3 = str_split($str, 2);
        echo "<pre>";
        print_r($arr3);
        echo "</pre>";

        echo implode("-", $arr3) . "<br>";

        $num = 12345;
	    echo array_sum(str_split($num, 1)); // сумма чисел в массиве 15
    ?><br>

    <p>Работа с trim, ltrim, rtrim</p>
    <?
        echo trim('/abcde.', '/.') . "<br>"; // abcde
        // Функция удаляет любое количество указанных символов, если они стоят с краю:
        echo trim('../../abcde...', '/.') . "<br>"; // abcde
        // Можно указать диапазон символов с помощью двух точек '..'. К примеру, укажем, что мы хотим удалить символы от 'a' до 'd':
        echo trim('abcdefghijk', 'a..d') . "<br>"; // e
    ?><br>

    <p>Работа с strrev</p>
    <?
        echo strrev('12345') . "<br>"; // '54321'
    ?>

    <p>Работа с number_format</p>
    <?
        $str = "12345678";
        echo number_format($str, 0, " ", " ");
    ?>

    <p>Работа с str_repeat</p>
    <?
        echo str_repeat('x', 5) . "<br>"; // 'xxxxx'
        // Давайте повторим строку '123' три раза:
        echo str_repeat('123', 3) . "<br>"; // '123123123'
    ?><br>

    <?
        for($i = 1; $i <=10; $i++) {
            echo str_repeat('x', $i) . "<br>";
        }
    ?><br>

    <p>Работа с strip_tags и htmlspecialchars</p>
    <?
        $str4 = 'html, <b><i>php</i></b>, js';
        echo strip_tags($str4, "<b><i>") . "<br>";
        echo htmlspecialchars($str4) . "<br>";
    ?><br>

    <h3>Функции для массивов в PHP</h3>
    <p>Функция in_array</p>
    <?
        $arr = ['a', 'b', 'c', 'd', 'e'];
	
        $result = in_array('c', $arr);
        var_dump($result);
    ?>

    <p>Функция array_sum</p>
    <?php
        $arr = [1, 2, 3, 4, 5];
        echo array_sum($arr) . "<br>";

        $num = 12345;
	    echo array_sum(str_split($num, 1));
    ?>

    <p>Функция array_product (умножение)</p>
    <?
        $arr = [1, 2, 3, 4, 5];
        echo array_product($arr);
    ?><br>

    <p>Функция range</p>
    <?
        var_dump(range(1, 5));
        echo "<br>";
        var_dump(range(5, 1));
        echo "<br>";
        var_dump(range(0, 10, 2));
        echo "<br>";
        var_dump(range('a', 'z'));
        echo "<br>";
    ?><br>

    <?
        $str6 = implode("-", range(1, 9));
        echo $str6 . "<br>";

        echo array_sum(range(1, 100)) . "<br>";
    ?>

    <p>Работа с array_merge</p>
    <?
        $arr1 = ['a', 'b', 'c', 'd', 'e'];
        $arr2 = [1, 2, 3, 4, 5];
        
        $result = array_merge($arr1, $arr2);
        var_dump($result);
    ?><br>

    <p>Функция array_slice</p>
    <?
        $arr = ['a', 'b', 'c', 'd', 'e'];
	
        $result = array_slice($arr, 0, 3);
        var_dump($result);
        echo "<br>";

        $arr = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5];
        // Сохраняем ключи в массиве
        $result = array_slice($arr, 0, 3, true);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?>

    <p>shuffle</p>
    <?
        $arr = range(1, 10);
        shuffle($arr);
        
        echo '<ul>';
        foreach ($arr as $elem) {
            echo '<li>'.$elem.'</li>';
        }
        echo '</ul>';
    ?><br>

    <?
        $arr = array_fill(0, 3, array_fill(0, 3, 'x'));
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    ?><br>

    <?
        $arr = ['a', 'b', 'c', 'd'];
	
        $result = array_chunk($arr, 2);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?><br>

    <?
        $arr = ['a', 'a', 'a', 'b', 'b', 'c'];
        $result = array_count_values($arr);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?><br>

    <?
        $arr = [1, 4, 9];
	
        $result = array_map('sqrt', $arr);
        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?>
</body>
</html>
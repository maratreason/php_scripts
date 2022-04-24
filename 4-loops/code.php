<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Loops</title>
	</head>
	<body>
        <p>Цикл while</p>
        <?
            $i = 1; // задаем какую-нибудь переменную
	
            while ($i <= 5) {
                echo $i; // выводим содержимое $i в консоль
                $i++;    // увеличиваем $i на единицу при каждом проходе цикла
            }
        ?>

        <p>Цикл for</p>
        <?
            for ($i = 0; $i <= 9; $i++) {
                echo $i; // выведет 1, 2... 9
            }
        ?><br>

        <?php
            $result = 0;
            
            for ($i = 1; $i <= 100; $i++) {
                $result = $result + $i;
            }
            
            echo $result; // искомая сумма
        ?><br>

        <p>Foreach</p>
        <?php
            $arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            $result = 0;
            
            foreach ($arr as $elem) {
                $result += $elem;
            }
            echo count($arr) . "<br>";
            echo $result;
        ?>

        <p>Получение ключей в цикле foreach в PHP</p>
        <?
            $arr = ['user1' => 30, 'user2' => 32, 'user3' => 33];
	
            foreach ($arr as $key => $elem) {
                echo $key.'- возраст '.$elem . " лет<br>"; // выведет: 'a-1', 'b-2', 'c-3' и так далее...
            }
        ?><br>

        <?php
            $arr2 = [1, 2, 3, 4, 5];
            
            foreach ($arr2 as $elem) {
                if ($elem % 2 != 0) {
                    echo $elem . "<br>";
                }
            }
        ?><br>

        <?
            $arr3 = [10, 20, 30, 50, 235, 3000];

            foreach ($arr3 as $el) {
                $elem = (string) $el;
                if ($elem[0] == 1 || $elem[0] == 2 || $elem[0] == 5) {
                    echo $elem . "<br>";
                }
            }
        ?><br>

        <?
            $arr4 = ["Пн", "Вт", "Ср", "Чт", "Пт", "Сб", "Вс"];

            foreach ($arr4 as $elem) {
                if ($elem == "Сб" || $elem == "Вс") {
                    echo "<b style='color: red;'>$elem</b><br>";
                } else {
                    echo $elem . "<br>";
                }
            }
        ?><br>

        <?php
            for ($i = 0, $j = 0; $i <= 9; $i++, $j += 2) {
                echo $i . ' ' . $j . '<br>';
            }
        ?><br>

        <p>Определите, сколько целых чисел, начиная с числа 1, нужно сложить, чтобы сумма получилась больше 100.</p>

        <?php
            $arr5 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20];
            $count = 0;
            $result = 0;

            for ($i = 0; $i < count($arr5); $i++) {
                $result += $i;
                $count++;
                if ($result >= 100) {
                    echo "$result : Количество итераций - $count";
                    break;
                }
            }
        ?><br>

        <?php
            $arr6 = [1, 2, 3, 4, 5, 6, 7, 8, 9];
            
            foreach ($arr6 as $elem) {
                if ($elem % 2 === 0) {
                    $result = $elem ** 2;
                    echo $elem . ":" . $result . "<br>";
                } elseif ($elem % 3 === 0) {
                    $result = $elem ** 3;
                    echo $elem . ":" . $result . "<br>";
                }
            }
        ?>

        <p>Находим простые числа</p>
        <?php
            $num = 31;
            
            $flag = true;
            for ($i = 2; $i <= $num; $i++) {
                if ($num % $i === 0) {
                    echo $num . "<br>";
                    $flag = false;
                    break; // выйдем из цикла
                }
            }
            
            // var_dump($flag);
        ?><br>

        <?php
            for ($num = 1, $i = 1; $num < 1000; $num *= $i, $i++);
            echo $num . ' ' . $i;
        ?><br>

        <p>Строка с цифрами</p>
        <?php
            $str = '';
            
            for ($i = 1; $i <= 9; $i++) {
                $str .= "-$i";
                if ($i == 9) $str .= "-";
            }
            
            echo $str; // выведет '12345'
        ?><br>

        <p>Вложенные циклы в PHP</p>
        <?php
            // 11 12 13 21 22 23 31 32 33
            for ($i = 1; $i <= 3; $i++) {
                for ($j = 1; $j <= 3; $j++) {
                    $result = $i . "" . $j . " ";
                    echo $result;
                }
            }
        ?><br>

        <p>Заполнение массива в цикле</p>
        <?php
            $arr = [];
            
            for ($i = 1; $i <= 100; $i++) {
                $arr[] = $i;
            }
            
            print_r($arr);
        ?>

        <p>С помощью цикла for выведите на экран первую половину элементов этого массива.</p>

        <?
            $arr6 = [1, 2, 3, 4, 5, 6, 7, 8];
            $length = count($arr6) / 2;
            for ($i = 0; $i < $length; $i++) {
                echo $arr6[$i] . "<br>";
            }
        ?><br>

        <?php
            $arr7 = [
                'employee1' => 100,
                'employee2' => 200,
                'employee3' => 300,
                'employee4' => 400,
                'employee5' => 500,
                'employee6' => 600,
                'employee7' => 700,
            ];
            $length2 = count($arr7);
            foreach($arr7 as $key => $value) {
                // echo $value;
                if ($arr7[$key] <= 400) {
                    $arr7[$key] += ($value / 100 * 10);
                }
            }

            print_r($arr7);
        ?><br>

        <?
            $arr8 = [1 => 6, 2 => 7, 3 => 8, 4 => 9, 5 => 10];
            $keys = 0;
            $values = 0;
            foreach($arr8 as $key => $value) {
                $keys += $key;
                $values += $value;
            }
            echo $keys / $values;
        ?><br>

        <?php
            $arr9 = [1, 2, 3, 4, 5];
            $length = count($arr9);
            
            for ($i = 1; $i < $length; $i++) {
                echo $arr9[$i - 1];
            }
        ?><br>

        <p>Получение чисел Фибоначчи в PHP</p>
        <?
            function fib($num) {
                $one = 0;
                $two = 1;
                
                for ($i = 1; $i <= $num; $i++) {
                    $current = $one + $two;
                    
                    $one = $two;
                    $two = $current;
                    
                    echo $current . '<br>';
                }
            }
            fib(10);
        ?>

        <p>Вывод пирамидок на PHP</p>
        <?
            $str = '';
            for ($i = 0; $i < 5; $i++) {
                $str .= 'x';
                echo $str . '<br>';
            }
        ?><br>

        <p>Пирамидка с цифрами</p>
        <?php
            for ($i = 1; $i <= 9; $i++) {
                for ($j = 1; $j <= $i; $j++) {
                    echo $i;
                }
                
                echo '<br>';
            }
        ?><br>

        <p>Перевернутые пирамидки</p>
        <?php
            for ($i = 5; $i >= 1; $i--) {
                $str = '';
                
                for ($j = 0; $j < $i; $j++) {
                    $str .= 'x';
                }
                
                echo $str . '<br>';
            }
        ?>

        <p>Заполнение массивов с накоплением строки в PHP</p>
        <?php
            $arr9 = [];
            $str = '';
            
            for ($i = 0; $i < 5; $i++) {
                $str .= 'x';
                $arr9[] = $str;
            }
            
            var_dump($arr9); // выведет ['x', 'xx', 'xxx', 'xxxx', 'xxxxx']
        ?><br>

        <?php
            $arr = [];
            
            for ($i = 1; $i < 10; $i++) {
                $str = '';
                
                for ($j = 0; $j < $i; $j++) {
                    $str .= $i;
                }
                
                $arr[] = $str;
            }
            
            var_dump($arr);
        ?><br>

        <h3>Урок 61</h3>

	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Урок 61</p>

    <?
        $arr = [15, 7, 3, 14, 25];
        $length = count($arr);
        $result = 0;
        for($i = 0; $i < $length; $i++) {
            $result += $arr[$i];
        }
        echo $result / $length . "<br>";

        function factorial($n) {
            return ($n != 1) ? $n * factorial($n - 1) : 1;
        }

        echo factorial(5);
    ?>

    <h3>Многомерные массивы</h3>

    <?
        $arr2 = [
            ['a', 'b', 'c'],
            ['d', 'e', 'f'],
            ['g', 'h', 'i'],
            ['j', 'k', 'l'],
        ];

        // echo $arr2[3][2] . $arr2[1][1] . $arr2[2][0] . $arr2[0][0];
    ?>

    <?
        $arr3 = [
            'boys'  => [1 => 'Коля', 2 => 'Вася', 3 => 'Петя'],
            'girls' => [1 => 'Даша', 2 => 'Маша', 3 => 'Лена'],
        ];

        echo $arr3["boys"][1] . ", " . $arr3["girls"][2] . "<br>";

        $arr4 = [
            [
                'name'   => 'user1',
                'age'    => 30,
                'salary' => 1000,
            ],
            [
                'name'   => 'user2',
                'age'    => 31,
                'salary' => 2000,
            ],
            [
                'name'   => 'user3',
                'age'    => 32,
                'salary' => 3000,
            ],
        ];

        // echo "<pre>";
        // print_r($arr4);
        // echo "</pre>";
        // echo $arr4[0]["salary"] + $arr4[2]["salary"] . "<br>";
    ?>

    <?
        $arr5 = [[1, 2, 3, [4, 5, [6, 7]]], [8, [9, 10]]];

        // Функция выполняющая рекурсивный спуск по массиву
        function recursion($arr) {
            $result = 0;
            if (is_array($arr)) {
                for ($i = 0; $i < count($arr); $i++) {
                    if (is_array($arr[$i])) {
                        $result += recursion($arr[$i]);
                    } else {
                        $result += $arr[$i];
                    }
                }
            }
            return $result;
        }

        // Вывод на монитор
        print_r(recursion($arr5));
    ?>

    <p>Перебор многомерных массивов</p>
    <?
        $arr6 = [
            'user1' => [
                'name' => 'name1',
                'age'  => 31,
            ],
            'user2' => [
                'name' => 'name2',
                'age'  => 32,
            ],
        ];

        foreach ($arr6 as $key1 => $sub) {
            foreach ($sub as $key2 => $elem) {
                echo $key1 . ' ' . $key2 . ' ' . $elem . '<br>';
            }
        }
    ?><br>

    <?
        $arr7 = [
            [
                'name'   => 'user1',
                'age'    => 30,
                'salary' => 1000,
            ],
            [
                'name'   => 'user2',
                'age'    => 31,
                'salary' => 2000,
            ],
            [
                'name'   => 'user3',
                'age'    => 32,
                'salary' => 3000,
            ],
        ];

        foreach ($arr7 as $k => $sub) {
            foreach ($sub as $key => $value) {
                echo "$key: $value<br>";
            }
        }
    ?><br>

    <?
        $arr8 = [
            'group1'  => ['user11', 'user12', 'user13', 'user43'],
            'group2'  => ['user21', 'user22', 'user23'],
            'group3'  => ['user31', 'user32', 'user33'],
            'group4'  => ['user41', 'user42', 'user43'],
            'group5'  => ['user51', 'user52'],
        ];

        foreach ($arr8 as $k => $sub) {
            foreach ($sub as $key => $value) {
                echo 'Имя группы: ' . $k . ', Имя пользователя: ' . $value . '<br>';
            }
        }
    ?>

    <p>Заполнение многомерных массивов PHP</p>
    <?
        $arr9 = [];
	
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 5; $j++) {
                // $arr9[$i][$j] = "x"; // заполняем подмассив x
                $arr9[$i][$j] = $j + 1; // заполняем подмассив числами
            }
        }
        echo "<pre>";
        print_r($arr9);
        echo "</pre>";
    ?><br>

    <?
        $arr10 = [];
	
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 2; $j++) {
                for ($k = 0; $k < 5; $k++) {
                    $arr10[$i][$j][$k] = $k + 1; // заполняем подмассив числами
                }
            }
        }
        echo "<pre>";
        print_r($arr10);
        echo "</pre>";
    ?>

    <p>Заполнение числами по порядку</p>
    <?
        $arr11 = [];
        $k = 1; // счетчик
        
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $arr11[$i][$j] = $k; // записываем счетчик
                $k++; // увеличиваем счетчик
            }
        }

        echo "<pre>";
        print_r($arr11);
        echo "</pre>";
    ?><br>

    <?
        $arr12 = [];
        $k = 1; // счетчик
        
        for ($i = 0; $i < 4; $i++) {
            for ($j = 0; $j < 2; $j++) {
                $arr12[$i][$j] = $k; // записываем счетчик
                $k++; // увеличиваем счетчик
            }
        }

        echo "<pre>";
        print_r($arr12);
        echo "</pre>";
    ?><br>

    <?
        $arr14 = [];
        $k = 2; // счетчик
        
        for ($i = 0; $i < 8; $i++) {
            if ($i % 2 == 0) {
                for ($j = 0; $j < 3; $j++) {
                    $arr14[$i][$j] = $k; // записываем счетчик
                    $k+=2; // увеличиваем счетчик
                }
            }
        }

        echo "<pre>";
        print_r($arr14);
        echo "</pre>";
    ?><br>

    <?
        $arr15 = [];
        $num = 1; // счетчик
        
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < 2; $j++) {
                for ($k = 0; $k < 2; $k++) {
                    $arr15[$i][$j][$k] = $num; // заполняем подмассив числами
                    $num++;
                }
            }
        }

        echo "<pre>";
        print_r($arr15);
        echo "</pre>";
    ?><br>

    <p>Массив ассоциативных массивов в PHP</p>
    <?php
        $users = [
            [
                'name'   => 'user1',
                'age'    => 31,
                'salary' => 1000,
            ],
            [
                'name'   => 'user2',
                'age'    => 32,
                'salary' => 2000,
            ],
            [
                'name'   => 'user3',
                'age'    => 33,
                'salary' => 3000,
            ],
        ];

        $users[] = [
            'name'   => 'name4',
            'age'    => 34,
            'salary' => 4000,
        ];

        foreach ($users as $user) {
            echo $user['name'] . ': ' . $user['salary'] . '$, ' . $user['age'] . '<br>';
        }
    ?><br>

    <p>Конвертация многомерных массивов в PHP</p>

    <?
        $users2 = [
            [
                'id' => 11,
                'name' => 'name11',
                'surname' => 'surname11',
            ],
            [
                'id' => 14,
                'name' => 'name14',
                'surname' => 'surname14',
            ],
            [
                'id' => 17,
                'name' => 'name17',
                'surname' => 'surname17',
            ],
        ];

        $result = [];
	
        foreach ($users2 as $user) {
            $result[$user['id']] = $user;
        }

        echo "<pre>";
        print_r($result);
        echo "</pre>";
    ?><br>

    <?
        $countries = [
            [
                'country' => 'Россия',
                'city' =>    'Москва',
            ],
            [
                'country' => 'Беларусь',
                'city' =>    'Минск',
            ],
            [
                'country' => 'Россия',
                'city' =>    'Питер',
            ],
            [
                'country' => 'Россия',
                'city' =>    'Владивосток',
            ],
            [
                'country' => 'Украина',
                'city' =>    'Львов',
            ],
            [
                'country' => 'Беларусь',
                'city' =>    'Могилев',
            ],
            [
                'country' => 'Украина',
                'city' =>    'Киев',
            ],
        ];

        $resultCountries = [];
        foreach($countries as $country) {
            $resultCountries[$country["country"]][] = $country["city"];
        }

        echo "<pre>";
        print_r($resultCountries);
        echo "</pre>";
    ?><br>

    <?
        $dates = [
            [
                'date'  => '2019-12-29',
                'event' => 'name1'
            ],
            [
                'date'  => '2019-12-31',
                'event' => 'name2'
            ],
            [
                'date'  => '2019-12-29',
                'event' => 'name3'
            ],
            [
                'date'  => '2019-12-30',
                'event' => 'name4'
            ],
            [
                'date'  => '2019-12-29',
                'event' => 'name5'
            ],
            [
                'date'  => '2019-12-31',
                'event' => 'name6'
            ],
            [
                'date'  => '2019-12-29',
                'event' => 'name7'
            ],
            [
                'date'  => '2019-12-30',
                'event' => 'name8'
            ],
            [
                'date'  => '2019-12-30',
                'event' => 'name9'
            ],
        ];

        $resultDates = [];
        foreach($dates as $date) {
            $resultDates[$date["date"]][] = $date["event"];
        }

        echo "<pre>";
        print_r($resultDates);
        echo "</pre>";
    ?><br>

    <?
        $resultReverseDates = [];
        $reverseDates = [
            '2019-12-29'=> ['name1', 'name2', 'name3', 'name4'],
            '2019-12-30'=> ['name5', 'name6', 'name7'],
            '2019-12-31'=> ['name8', 'name9'],
        ];

        foreach($reverseDates as $key => $value) {
            $res = [];
            foreach($value as $val) {
                $res["date"] = $key;
                $res["event"] = $val;
                $resultReverseDates[] = $res;
            }
        }

        echo "<pre>";
        print_r($resultReverseDates);
        echo "</pre>";
    ?>

</body>
</html>
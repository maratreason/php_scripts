<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Пользовательские функции</h3>

    <?
        $result = [];
        $arr = ['1524', '1321', '4563', '7144', '2879'];
        
        foreach ($arr as $elem) {
            if (checkDigitsPairsSum($elem)) { // используем нашу функцию
                $result[] = $elem;
            }
        }
        
        echo "<pre>";
        print_r($result);
        echo "</pre>";

        function checkDigitsPairsSum($num) {
            return $num[0] + $num[1] === $num[2] + $num[3];
        }
    ?><br>

    <?
        // Пусть у нас дана функция getDigits, возвращающая цифры переданного числа:
        function getDigits($num) {
            return str_split($num, 1);
        }
        // Пусть также дана функция getAvg, возвращающая среднее элементов переданного массива:
        function getAvg($arr) {
            if (!empty($arr)) {
                return array_sum($arr) / count($arr);
            } else {
                return 0;
            }
        }

        // Давайте найдем сумму цифр какого-нибудь числа, используя комбинацию приведенных выше функций:
        echo getAvg(getDigits(12345));
    ?><br>

    <p>Вспомогательные функции внутри других функций в PHP</p>
    <?
        // Пусть у нас дано число. Давайте получим все собственные делители этого числа, являющиеся простыми числами.
        // function getPrimeDivisors($num) {
        //     $result = [];
        //     $divs = getOwnDivisors($num);
            
        //     foreach ($divs as $div) {
        //         if (isPrime($div)) {
        //             $result[] = $div;
        //         }
        //     }
            
        //     return $result;
        // }

        // function getOwnDivisors($num) {

        // }

        // function isPrime($div) {

        // }
    ?>

    <p>Работа с рекурсией в PHP</p>
    <?
        $i = 1;
	
        function func($i) {
            echo $i;
            $i++;
            
            if ($i <= 10){
                func($i); // здесь функция вызывает сама себя
            }
        }
        func($i);
    ?><br>

    <?
        function func2($arr) {
            var_dump(array_shift($arr));
            var_dump($arr);
            
            if (count($arr) !== 0) {
                func2($arr);
            }
        }
        
        func2([1, 2, 3]);
    ?>

    <p>Рекурсия и многомерные структуры в PHP</p>

    <?
        $arr = [
            1,
            [
                2, 7, 8
            ],
            [
                3, 4, [5, [6, 7]],
            ]
        ];

        function func3($arr) {
            foreach ($arr as $elem) {
                if (is_array($elem)) {
                    func3($elem);
                } else {
                    echo $elem;
                }
            }
        }

        func3($arr);
    ?>

    <p>Сумма элементов массива</p>

    <?
        function func4($arr) {
            $sum = 0;
            
            foreach ($arr as $elem) {
                if (is_array($elem)) {
                    $sum += func4($elem);
                } else {
                    $sum += $elem;
                }
            }
            
            return $sum;
        }
        echo "<pre>";
        print_r(func4([1, [2, 7, 8], [3, 4, [5, [6, 7]]]]));
        echo "</pre>";
    ?><br>

    <?
        $arr = ['a', ['b', 'c', 'd'], ['e', 'f', ['g', ['j', 'k']]]];

        function func5($arr) {
            $sum = "";
            
            foreach ($arr as $elem) {
                if (is_array($elem)) {
                    $sum .= func5($elem);
                } else {
                    $sum .= $elem;
                }
            }
            
            return $sum;
        }
        echo "<pre>";
        print_r(func5($arr));
        echo "</pre>";
    ?>

    <p>Сделайте функцию, которая будет принимать строку на русском языке, а возвращать ее транслит.</p>
    <?
        function translit($str) {
            $symbols = [
                "а" => "a", "б" => "b", "в" => "v", "г" => "g", "д" => "d", "е" => "e", "ж" => "zh", "з" => "z", "и" => "i", "й" => "y",
                "к" => "k", "л" => "l", "м" => "m", "н" => "n", "о" => "o", "п" => "p", "р" => "r", "с" => "s", "т" => "t", "у" => "u",
                "ф" => "f", "х" => "h", "ц" => "ts", "ч" => "ch", "ш" => "sh", "щ" => "sh", "ъ" => "", "ы" => "y", "ь" => "'", "э" => "e",
                "ю" => "yu", "я" => "ya", " " => " ", "?" => "?", "!" => "!", "." => "."
            ];
            $str = mb_strtolower($str);
            echo $str;
            $rusSymbols = mb_str_split($str);

            $result = [];

            foreach($rusSymbols as $key) {
                $result[] = $symbols[$key];
            }

            return implode($result);

        }

        function mb_str_split($str) {
            preg_match_all('#.{1}#uis', $str, $out);
            return $out[0];
        }

        echo translit("как дела дружище?");
        echo translit("Я люблю Альбинку. Ну ничего с этим не поделать.");
    ?><br>

    <p>Сделайте функцию, которая будет принимать число, а возвращать это число прописью. Пусть функция работает с числами до 999. Смотрите пример:</p>
    <?
        // func(123); // выведет 'сто двадцать три'
    ?>

</body>
</html>
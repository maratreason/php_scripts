<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Формирование строк</h3>

    <?
        $arr = ['a'=>1, 'b'=>2, 'c'=>3];
        echo "xxx {$arr['a']} yyy";
    ?><br>

    <?
        // for ($i = 1; $i <= 10; $i++) {
        //     for ($j = 1; $j <= 10; $j++) {
        //         echo "nums: $i $j<br>";
        //     }
        // }
    ?>

    <p>Генерация тегов в PHP</p>
    <?
        $text = 'aaa';
        echo "<p>$text</p>";
    ?>

    <p>С атрибутами</p>
    <?
        $text = 'link';
        $href = 'index.html';
        echo "<a href=\"$href\">$text</a>";
    ?><br>

    <?
        $src1 = '1.png';
        $src2 = '2.png';
        $src3 = '3.png';
        echo "<img src=\"$src1\"/>";
        echo "<img src=\"$src2\"/>";
        echo "<img src=\"$src3\"/>";
    ?><br>

    <p>Цикл и генерация тегов в PHP</p>
    <?
        echo "<ul>";
        for ($i = 1; $i <= 5; $i++) {
            echo "<li>$i</li>";
        }
        echo "</ul>";
    ?><br>

    <?
        $arr = ['text1', 'text2', 'text3'];
        echo "<select>";
        foreach($arr as $elem) {
            echo "<option value=\"$elem\">$elem</option>";
        }
        echo "</select>";
    ?>

    <p>Цикл и генерация тегов и атрибутов в PHP</p>
    <?
        $arr = [
            ['href'=>'1.html', 'text'=>'link1'],
            ['href'=>'2.html', 'text'=>'link2'],
            ['href'=>'3.html', 'text'=>'link3'],
        ];

        foreach ($arr as $elem) {
            echo "<a href=\"{$elem['href']}\">{$elem['text']}</a><br>";
        }
    ?><br>

    <?
        $arr = [
            ['href'=>'page1.html', 'text'=>'text1'],
            ['href'=>'page2.html', 'text'=>'text2'],
            ['href'=>'page3.html', 'text'=>'text3'],
        ];

        echo "<ul>";
        foreach ($arr as $elem) {
            echo "<li><a href=\"{$elem['href']}\">{$elem['text']}</a></li><br>";
        }
        echo "</ul>";
    ?><br>

    <p>Цикл и генерация HTML таблиц на PHP</p>
    <?
        $arr = [
            ['name' => 'user1', 'age' => 30, 'salary' => 500],
            ['name' => 'user2', 'age' => 31, 'salary' => 600],
            ['name' => 'user3', 'age' => 32, 'salary' => 700],
        ];

        echo '<table border="1">';
        foreach ($arr as $user) {
            echo '<tr>';
            
            echo "<td>{$user['name']}</td>";
            echo "<td>{$user['age']} years</td>";
            echo "<td>{$user['salary']} dollars</td>";
            
            echo '</tr>';
        }
        echo '</table>';
    ?>

</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Моя первая программа</title>
	</head>
	<body>
        <p>Строки</p>
        <?= "<b>Длина строки (strlen('abcde')):</b> " . strlen('abcde'); // выведет 5 ?><br>
        <?= "<b>Длина строки кириллицы (mb_strlen('абвгд')):</b> " . mb_strlen('абвгд'); // выведет 5 ?><br>

        <?
            $href = 'index.php';
            $text = 'ссылка';
            echo '<a href="' . $href . '">' . $text . '</a>';
        ?><br>

        <?
            $src = "https://klike.net/uploads/posts/2021-01/1611131113_2.jpg";
            echo "<img src='$src' alt='Картинка' width='200' />";
        ?><br>

        <?
            $value = "Какой-то текст";
            echo "<input value='$value' />";
        ?><br>

        <?php
            $test = null;
            var_dump($test); // выведет null
        ?><br>

        <p>количество секунд в году.</p>
        <?= 60 * 60 * 24 * 365?>
        <p>количество минут в году.</p>
        <?= 60 * 24 * 365?>
        <p>количество минут в сутках.</p>
        <?= 60 * 24?>

        <p>Преобразование типов</p>
        <?
            $test = (int) '12345';
            var_dump($test);

            $test = (float) '12.345';
            var_dump($test);

            $test = (string) 123;
	        var_dump($test); // выведет '123'
        ?><br>

        <?
            $str = 'abcde';
            $last = strlen($str) - 1; // номер последнего символа
            echo $str[$last]; // выведет 'e'
        ?><br>
        <?
            $num1 = 3;
            $num2 = $num1++;
            echo $num1;
            echo $num2;
        ?><br>
        <?
            $num1 = 3;
            $num1++;
            $num2 = $num1--;
            echo $num1++;
            echo --$num2;
        ?><br>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Регулярные выражения</h3>

    <?
        // В следующем примере мы с помощью регулярного выражения заменим букву 'a' на '!':
        echo preg_replace('#a#', '!', 'bab') . "<br>"; // вернет 'b!b'

        // А вот точка является специальным символом и обозначает любой символ.
        // В следующем примере мы найдем строку по такому шаблону: буква 'x', затем любой символ, затем опять буква 'x':
        echo preg_replace('#x.x#', '!', 'xax eee') . "<br>"; // вернет '! eee'
    ?><br>

    <?
        // Напишите регулярку, которая найдет строки 'ahb', 'acb', 'aeb' по шаблону: буква 'a', любой символ, буква 'b'.
        $str = 'ahb acb aeb aeeb adcb axeb';
        echo preg_replace('#a.b#', '!', $str) . "<br>";

        // Напишите регулярку, которая найдет строки 'abba', 'adca', 'abea' по шаблону: буква 'a', два любых символа, буква 'b'.
        $str = 'ahb acb aeb aeeb adcb axeb';
        echo preg_replace('#a..b#', '!', $str) . "<br>";
    ?>

    <p>Операторы повторения символов в регулярках</p>

    <?php
        // Найдем все подстроки по шаблону буква 'x', буква 'a' один или более раз, буква 'x':
        $str = 'xx xax xaax xaaax xbx';
        $res = preg_replace('#xa+x#', '!', $str);
        echo $res; // xx ! ! ! xbx
    ?><br>

    <?
        // Найдем все подстроки по шаблону буква 'x', буква 'a' ноль или более раз, буква 'x':
        $str = 'xx xax xaax xaaax xbx';
	    $res = preg_replace('#xa*x#', '!', $str);
        echo $res; // '! ! ! ! xbx'
    ?><br>

    <?
        // Найдем все подстроки по шаблону буква 'x', буква 'a' ноль или один раз, буква 'x':
        $str = 'xx xax xaax xbx';
	    $res = preg_replace('#xa?x#', '!', $str);
        echo $res; // '! ! xaax xbx'
    ?><br>

    <?
        // Напишите регулярку, которая найдет строки 'aa', 'aba', 'abba', 'abbba', не захватив 'abca' и 'abea'.
        $str = 'aa aba abba abbba abca abea';
        $res = preg_replace('#ab*a#', '!', $str);
        echo $res;
    ?>

    <p>Группирующие скобки в регулярках PHP</p>
    <?
        // В следующем примере шаблон поиска выглядит так: буква 'x', далее строка 'ab' один или более раз, потом буква 'x':
        $str = 'xabx xababx xaabbx';
	    $res = preg_replace('#x(ab)+x#', '!', $str);
        echo $res; // '! ! xaabbx'
    ?>
</body>
</html>
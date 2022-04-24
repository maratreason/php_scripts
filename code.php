<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Моя первая программа</title>
	</head>
	<body>
        <?= "Привет мир" ?>
        <?=2 * (2 + 4 * (3 + 1))?>
        <?
            $a = 3 * 2 ** 3;
            echo $a;
        ?>
        <?
            $b = (3 * 2) ** 3;
            echo $b;
        ?>
	</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Формы</h3>
    <!-- <form action="" method="GET">
        <input name="test" value="<?//=$_GET['test'] ?? 'default'; ?>">
        <textarea name="text" id="" cols="30" rows="10"><?//=$_GET['text'] ?? ''; ?></textarea>
        <input type="submit">
    </form> -->

    <!-- <form action="" method="GET">
        <input type="hidden" name="flag" value="0">
        <input
            type="checkbox"
            name="flag"
            value="1"
            <? // if (!empty($_GET['flag'])) echo "checked"?>
        >
        <input name="text">
        <input type="submit">
    </form> -->

    <?php
        // if (!empty($_GET)) { // если форма была отправлена
        //     echo $_GET["flag"] . "<br>";
        //     if ($_GET['flag'] === '1') { // если флажок отмечен
        //         echo 'отмечен';
        //     } else {
        //         echo 'не отмечен';
        //     }
        // }
    ?>

    <hr>

    <form action="" method="GET">
        <input type="radio" name="radio" value="1" <?php if (!empty($_GET['radio']) && $_GET['radio'] == "1") echo "checked";?> >
        <input type="radio" name="radio" value="2" <?php if (!empty($_GET['radio']) && $_GET['radio'] == "2") echo "checked";?> >
        <input type="radio" name="radio" value="3" <?php if (!empty($_GET['radio']) && $_GET['radio'] == "3") echo "checked";?> >
        <input type="submit">
    </form>

    <?
        if (!empty($_GET['radio'])) {
            var_dump($_GET['radio']);
        }
    ?>

    <hr>

    <form action="" method="GET">
        <select name="test">
            <option value="1" <?php
                if (!empty($_GET['test']) and $_GET['test'] === '1') {
                    echo 'selected';
                }
            ?>>item1</option>
            <option value="2" <?php
                if (!empty($_GET['test']) and $_GET['test'] === '2') {
                    echo 'selected';
                }
            ?>>item2</option>
            <option value="3" <?php
                if (!empty($_GET['test']) and $_GET['test'] === '3') {
                    echo 'selected';
                }
            ?>>item3</option>
        </select>

        <a href="?par1=1&par2=2">ссылка</a>

        <input type="submit">
    </form>

    <?php
        var_dump($_GET['test']); // 'item1', 'item2' или 'item3'
        if (!empty($_GET['par1']) && !empty($_GET['par1'])) {
            echo "<br>" . ($_GET['par1'] + $_GET['par2']) . "<br>";
        }
    ?>
    <hr>

    <?
        for($i = 0; $i < 10; $i++) {
            echo "<a href=\"?count=$i\">ссылка $i</a><br>";
        }

        if (!empty($_GET["count"])) {
            echo $_GET["count"];
        }
    ?>

</body>
</html>
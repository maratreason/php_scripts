<?php
session_start();

function checkbox($key) {
    if (empty($_SESSION[$key])) return "";
    else return "checked='checked'";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("input[type=checkbox]").on("click", function() {
                $.post("check.php", {
                    id: $(this).prop("id"),
                    status: $(this).prop("checked")
                });
            });
        });
    </script>
</head>
<body>
    <div>
        <p>
            <input type="checkbox" id="id1" <?=checkbox("id1")?> />
            <label for="id1">Присылать уведомления об ответе</label>
        </p>
        <p>
            <input type="checkbox" id="id2" <?=checkbox("id2")?> />
            <label for="id2">Информационные панели свернуты</label>
        </p>
        <p>
            <input type="checkbox" id="id3" <?=checkbox("id3")?> />
            <label for="id3">Выделять новые сообщения</label>
        </p>
        <p>
            <input type="checkbox" id="id4" <?=checkbox("id4")?> />
            <label for="id4">Автоматически запускать видеоролики</label>
        </p>
    </div>
</body>
</html>
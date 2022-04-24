<?php
    if (!empty($_FILES)) {
        echo '<pre>';
        print_r($_FILES);
        echo '</pre>';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Форма для загрузки произвольного количества файлов</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <form enctype="multipart/form-data" method="POST">
        <p>
            <input type="file" name="filename[]" />
            <input type="button" value="+" />
            <input type="button" value="-" />
        </p>
        <div>
            <input type="submit" value="Загрузить" />
        </div>
    </form>
    <script>
        $(function() {
            $(document).on("click", "input[type='button'][value!='+']", remove_field);
            $(document).on("click", "input[type='button'][value!='-']", add_field);
        });

        function add_field() {
            $("p:last").clone().insertAfter("p:last");
        }

        function remove_field() {
            console.log($(this));
            $("p:last").remove();
        }
    </script>
</body>
</html>
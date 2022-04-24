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
            $("#id").on("click", function(e) {
                e.preventDefault();
                $("#info").load("time.php");
                console.log(1);
            });
        });
    </script>
</head>
<body>
    <div><a href="" id="id">Получить время</a></div>
    <div id="info"></div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .hidden {
            display: "none";
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $(".jumbotron > div > a").on("click", function() {
                let url = "user.php?id=" + $(this).data('id');

                $.ajax({
                    url: encodeURI(url)
                }).done(function(data) {
                    $("#info").html(data).removeClass("hidden");
                });
            });
        });
    </script>
</head>
<body>
    <div id="list">
        <?php
            $host = 'localhost';
            $dbname = 'eplex_db';
            $user = 'root';
            $password = '';
            $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

            $query = "SELECT * FROM users ORDER BY name";
            $usr = $db->query($query);

            try {
                echo "<div class='jumbotron'>";
                while ($user = $usr->fetch()) {
                    echo "<div><a data-id='" . $user['id'] ."'>".htmlspecialchars($user['name'])."</a></div>";
                }
                echo "</div>";
            } catch(PDOException $e) {
                echo "Ошибка выполнения запроса: " . $e->getMessage();
            }
        ?>
    </div>
    <div id="info" class="hidden"></div>
</body>
</html>
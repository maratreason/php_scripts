<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Двойной выпадающий список</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function() {
            $("#fst").on("change", function() {
                $.ajax({
                    url: "select.php?id=" + $('#fst').val()
                }).done(function(data) {
                    $('#snd').html(data);
                    $('#snd').prop("disabled", false);
                });
            });
        });
    </script>
</head>
<body>
    <?
        $host = 'localhost';
        $dbname = 'eplex_db';
        $user = 'root';
        $password = '';
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    
        $catalogs = [];
    
        try {
            $query = "SELECT * FROM catalogs WHERE parent_id = 0 ORDER BY pos";
    
            $usr = $db->prepare($query);
            $usr->execute();
            $catalogs = $usr->fetchAll(PDO::FETCH_ASSOC);
    
            echo "<select id='fst'>";
            echo "<option value='0'>Выберите раздел</option>";
            foreach($catalogs as $catalog) {
                echo "<option value='{$catalog['id']}'>{$catalog['name']}</option>";
            }
            echo "</select>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    ?>
    <select id='snd' disabled='disabled'>
        <option value="0">Выберите подраздел</option>
    </select>
</body>
</html>
<?php

$host = 'localhost';
$dbname = 'eplex_db';
$user = 'root';
$password = '';
$db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$query = "SELECT * FROM catalogs WHERE parent_id = :id ORDER BY pos";
$usr = $db->prepare($query);
$usr->execute(['id' => $_GET['id']]);
$sub_catalogs = $usr->fetchAll(PDO::FETCH_ASSOC);

echo "<option value='0'>Выберите подраздел</option>";
foreach($sub_catalogs as $catalog) {
    echo "<option value='{$catalog['id']}'>{$catalog['name']}</option>";
}

<?php
    $host = 'localhost';
    $dbname = 'eplex_db';
    $user = 'root';
    $password = '';
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    $users = [];

    try {
        $query = "SELECT * FROM users";

        $usr = $db->prepare($query);
        $usr->execute(['id' => $_GET['id']]);
        $users = $usr->fetchAll(PDO::FETCH_ASSOC);

        
    } catch (PDOException $e) {
        $e->getMessage();
    }

    if ($users) {
        foreach($users as $user) {
            echo "<p>".
                 "<span class='p'>Name: </span>".
                 "<span class='r'>".$user['name']." </span>".
                 "</p>";
        }
    }
?>

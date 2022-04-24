<?php
    $host = 'localhost';
    $dbname = 'eplex_db';
    $user = 'root';
    $password = '';
    $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

    try {
        if (!empty($_POST)) {
            $query = "INSERT INTO comments VALUES(NULL, :nickname, :content, NOW())";
            $usr = $db->prepare($query);

            $usr->execute([
                'nickname' => $_POST['nickname'],
                'content' => $_POST['content']
            ]);
        }

        $query = "SELECT * FROM comments ORDER BY created_at DESC";
            $com = $db->prepare($query);
            $com->execute();
            $comments = $com->fetchAll(PDO::FETCH_ASSOC);

            foreach ($comments as $comment) {
                echo "<div>
                    <span>{$comment['nickname']}</span>
                    <span>{$comment['content']}</span>
                    <span>{$comment['created_at']}</span>
                </div>";
            }
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
 
    
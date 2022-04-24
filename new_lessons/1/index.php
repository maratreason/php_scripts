<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start();

function vardump($var) {
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

if (isset($_REQUEST['submit'])) {
    $_SESSION['email'] = $_REQUEST['email'];
}

?>
<form action="profile.php" method="POST">
    <input type="text" name="email">
    <input type="submit" name="submit">
</form>
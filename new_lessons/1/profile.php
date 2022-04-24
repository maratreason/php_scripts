<?php

session_start();

?>
<form action="">
    <input type="text" name="email" value="<?= isset($_SESSION['email']) ? $_SESSION['email'] : null;?>">
    <input type="text" name="name">
    <input type="text" name="surname">
</form>

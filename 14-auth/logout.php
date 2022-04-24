<?php
	session_start();
	$_SESSION['auth'] = null;
	$_SESSION['flash']['success'] = "Вы успешно вышли из системы";

    header("Location: /14-auth/login.php");
?>
<?php
	include 'config.php';
	setcookie("login", md5($username.$password), time()-3600);
	header("Location: ../index.php");
?>
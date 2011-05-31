<?php
	include '../config.php'; 
	$file2w = "../../content/sidebar.txt";
	$file = fopen($file2w, "w");
	$post = $_POST["sidebar"];
	$content = $post;
	fwrite($file, stripslashes($content));
	fclose($file);
	header("Location: ../../");
?>

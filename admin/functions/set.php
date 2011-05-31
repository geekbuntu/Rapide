<?php 
	include '../config.php';
	$your_data = '<?php
	global $username; $username = "'.$_POST["user"].'";
	global $password; $password = "'.$_POST["pass"].'"; 
	global $title; $title = "'.$_POST["blogname"].'"; 
	global $description; $description = "'.$_POST["blogdesc"].'";
	global $url; $url = "'.$_POST["blogurl"].'";
	global $theme; $theme="'.$GLOBALS['theme'].'";
	global $timezone; $timezone = "'.$GLOBALS["timezone"].'";
	global $defaultpost; $defaultpost = "'.$_POST['default'].'";
	global $version; $version = "<b>Rapide 2.0</b>";
	global $credits; $credits = " - Created by the Rapide community. ";
	global $v; $v = "2.0";
	error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	?>';
	$fp = fopen("../config.php", "r+"); 
	fwrite($fp, $your_data); 
	fclose($fp);
	header("Location: ../../");
?>

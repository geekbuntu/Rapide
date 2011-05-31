<?php 
$url = $_POST["blogurl"];
if($url[strlen($url)-1] == "/"){
	$url = substr($url,0,-1);
}
$your_data = '<?php
global $username; $username = "'.$_POST["user"].'";
global $password; $password = "'.md5($_POST["pass"]).'"; 
global $title; $title = "'.$_POST["blogname"].'"; 
global $description; $description = "'.$_POST["blogdesc"].'"; 
global $url; $url = "'.$url.'"; 
global $theme; $theme="default"; 
$timezone = "'.$_POST["timezone"].'";
global $version; $version = "<b>Rapide 2.0</b>";
global $credits; $credits = " - Created by the Rapide community.";
global $v; $v = "2.0";
?>'; 
$file2w = "admin/config.php";
$file = fopen($file2w, "w");
fwrite($file, $your_data);
fclose($file);
//unlink("install.php");
//unlink("boot.php");
//unlink("admin/config-example.php");
header("Location: index.php");
?>

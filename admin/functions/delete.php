<?php
	include '../config.php';
	if(isset($_GET["post"])){
		$length = strlen($_GET["post"]);
		if ($length == "1"){
			$p = "0000".$_GET["post"];
		}
		else if ($length == "2"){
			$p = "000".$_GET["post"];
		} 
		else if ($length = "3"){
			$p = "00".$_GET["post"];
		}
		else if ($length == "4"){
			$p = "0".$_GET["post"];
		}
		else if ($length == "5"){
			$p = $_GET["post"];
		}
		$file = "../../content/posts/".$p.".json";
		if(file_exists($file)){
			unlink($file);
		}
	}
	header("Location: ".$GLOBALS['url']."/admin/?fn=edit");
?>

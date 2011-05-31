<?php
	include '../config.php'; 
	include '../functions.php'; 
	$directory = "../../content/posts/";
	$htaccess = "../../.htaccess";
	if (file_exists($htaccess)) {
		$link = $GLOBALS['url'].'/p/'.$_POST['number'];
	} else {
		 $link = $GLOBALS['url'].'/?post='.$_POST['number'];
	}
	$length = strlen($_POST['number']);
	if ($length == "1"){
		$p = "0000".$_POST['number'];
	}
	else if ($length == "2"){
		$p = "000".$_POST['number'];
	} 
	else if ($length = "3"){
		$p = "00".$_POST['number'];
	}
	else if ($length == "4"){
		$p = "0".$_POST['number'];
	}
	else if ($length == "5"){
		$p = $_POST['number'];
	}
	$json = json_decode(file_get_contents($directory.$p.".json"));
	$file2w = $directory.$p.".json";
	$file = fopen($file2w, "w");
	$tags = str_replace(", ", "¬", $_POST['tags']);
	$tags = explode("¬", $tags);
	$post = array("title"=>$_POST['title'], "date"=>$_POST['date'], "content"=>commentise($_POST['post']), "number"=>$json->number, "tags"=>$tags, "type"=>$_POST['type']);
	$content = json_encode($post);
	fwrite($file, $content);
	fclose($file);
	header("Location: ".$link);
?>

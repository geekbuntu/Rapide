<?php
	include '../config.php'; 
	date_default_timezone_set($timezone);
	include '../functions.php'; 
	$directory = "../../content/posts/";
	$htaccess = "../../.htaccess";
	$filecount = count(glob("" . $directory . "*.json"));
	$filecount++;
	$length = strlen($filecount);
	if ($length == "1"){
		    $newpostnum = "0000".$filecount;
	}
	else if ($length == "2"){
		    $newpostnum = "000".$filecount;
	} 
	else if ($length == "3"){
		    $newpostnum = "00".$filecount;
	}
	else if ($length == "4"){
		    $newpostnum = "0".$filecount;
	}
	else if ($length == "5"){
		    $newpostnum = $filecount;
	}
	if (file_exists($htaccess)) {
		$link = $GLOBALS['url'].'/p/'.$filecount;
	} else {
		 $link = $GLOBALS['url'].'/?post='.$filecount;
	}
	$file2w = $directory.$newpostnum.".json";
	$file = fopen($file2w, "w");
	$tags = str_replace(", ", "¬", $_POST['tags']);
	$tags = explode("¬", $tags);
	$post = array("title"=>$_POST['title'], "date"=>date('d/m/y \- h:ia'), "content"=>commentise($_POST['post']), "number"=>$filecount, "tags"=>$tags, "type"=>$_POST['type'], "category"=>$_POST['category']);
	$content = json_encode($post);
	fwrite($file, $content);
	fclose($file);
	header("Location: ".$link);
?>

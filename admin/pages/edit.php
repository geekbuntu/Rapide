<style type="text/css" media="screen" id="test">
	#edit {
		color: white;
		text-shadow: 0 0 5px white;
	}
	select {
		font-size:22px;
		height: 30px;
	}
	textarea {
		font-family: Helvetica, Arial, sans-serif;
	}
</style>
<?php
	if(isset($_GET['id'])){
		$directory = $GLOBALS['url']."/content/posts/";
		$length = strlen($_GET["id"]);
		if ($length == "1"){
			$p = "0000".$_GET["id"];
		}
		else if ($length == "2"){
			$p = "000".$_GET["id"];
		} 
		else if ($length = "3"){
			$p = "00".$_GET["id"];
		}
		else if ($length == "4"){
			$p = "0".$_GET["id"];
		}
		else if ($length == "5"){
			$p = $_GET["id"];
		}
		$json = json_decode(file_get_contents($directory.$p.".json"));
		$tags = json_encode($json->tags);
		$tags = json_decode($tags);
?>
<form action="functions/edit.php" method="post" style="text-align: center;">
	<p id="title"><input name="title" style="font-size:22px;margin-bottom: -20px;" value="<?php echo $json->title; ?>" /></p>
	<p id="tags"><input name="tags" placeholder="Tags (comma seperated)" value="<?php $tags = implode(",", $tags);$tags = str_replace(",", ", ", $tags);echo ($tags); ?>"/></p>
	<p id="type"><select name="type"><option value="text">Text</option><option value="image">Image</option><option value="video">Video</option><option value="audio">Audio</option><option value="link">Link</option><option value="chat">Chat</option></select></p>
	<p id="date"><input contenteditable="false" name="time" style="font-size: 10pt;" value="<?php echo date('d/m/y \- h:ia'); ?>" /></p>
	<p style="margin-top: 48px;"><textarea style="height:200px;color: black;" name="post" id="post"><?php echo $json->content; ?></textarea></p>
	<p style="margin-top: -20px;padding: 20px;"><input style="display: none" value="<?php echo $_GET['id']; ?>"  name="number" /><input id="btn" type="submit" value="Publish"/></p>
</form>
<?php
	}
	else {
		echo '<div id="posts">';
		$path = "../content/posts/";
		$files = glob("" . $path . "*.json");
		if ($files) {
			rsort($files);
			foreach ($files as $file) {
				$content = json_decode(file_get_contents($file));
				echo "<p><a href='?fn=edit&id=".$content->number."'>".stripslashes($content->title)."</a>";
				echo '<span id="small">'.$content->date.' <a href="functions/delete.php?post='.$content->number.'">(x)</a></span></p>';
			}
		}
		echo '</div>';
	}
?>
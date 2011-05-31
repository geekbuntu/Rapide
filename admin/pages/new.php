<?php
	if(isset($_GET['type'])){
		if($_GET['type'] == "text"){
			$types = array('<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
		}
		else if($_GET['type'] == "image"){
			$types = array('<option value="image">Image</option>','<option value="text">Text</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
		}
		else if($_GET['type'] == "video"){
			$types = array('<option value="video">Video</option>','<option value="text">Text</option>','<option value="image">Image</option>','<option value="audio">Audio</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
		}
		else if($_GET['type'] == "chat"){
			$types = array('<option value="chat">Chat</option>','<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="link">Link</option>');
		}
		else if($_GET['type'] == "audio"){
			$types = array('<option value="audio">Audio</option>','<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
		}
		else if($_GET['type'] == "link"){
			$types = array('<option value="link">Link</option>','<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="chat">Chat</option>');
		}
		else {
			$types = array('<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
		}
	}
	else {
		$types = array('<option value="text">Text</option>','<option value="image">Image</option>','<option value="video">Video</option>','<option value="audio">Audio</option>','<option value="link">Link</option>','<option value="chat">Chat</option>');
	}
?>
<style type="text/css" media="screen" id="test">
	#new {
		color: white;
		text-shadow: 0 0 5px white;
	}
	select {
		font-size:22px;
		height: 60px;
	}
	textarea {
		font-family: Helvetica, Arial, sans-serif;
	}
</style>
<form action="functions/posts.php" method="post" style="text-align: center;">
	<p id="title"><input name="title" style="font-size:22px;margin-bottom: -20px;" placeholder="Post Title" /></p>
	<p id="tags"><input name="tags" placeholder="Tags (comma seperated)" /></p>
	<p id="type"><select name="type"><?php foreach($types as $type){print($type);} ?></select></p>
	<p style="margin-top: 48px;"><textarea style="height:200px;color: black;" name="post" id="post"></textarea></p>
	<p style="margin-top: -20px;padding: 20px;"><input id="btn" type="submit" value="Publish"/></p>
</form>

<style type="text/css" media="screen" id="test">
	input, select{
		width: 50%;
		float: right;
	}
	select {
		width: 51%;
		margin-left: 1%;
	}
	form {
		margin-left: 25%;
		margin-right: 25%;
	}
	#btn {
		margin-left: 25%;
	}
	#settings {
		color: white;
		text-shadow: 0 0 5px white;
	}
</style>
<form name="form" action="functions/set.php" method="post">
	<p>Username: <input name="user" value="<?php echo $GLOBALS['username']; ?>"></p>
	<p>Password: <input name="pass" type="password" value="<?php echo $GLOBALS['password']; ?>"></p>
	<p>Blog Name: <input name="blogname" value="<?php echo $GLOBALS['title']; ?>"</p>
	<p>Blog Description: <input name="blogdesc" value="<?php echo $GLOBALS['description']; ?>"></p>
	<p>Your Blog's URL: <input name="blogurl" value="<?php echo $GLOBALS['url']; ?>"</p>
	<p>Default Post Type: <select name="default">
		<option value="text">Text</option>
		<option value="image">Image</option>
		<option value="video">Video</option>
		<option value="audio">Audio</option>
		<option value="chat">Chat</option>
		<option value="link">Link</option>
	</select></p>
	<input style="float: none" type="submit" id="btn" value="Submit">
	</select>
</form>

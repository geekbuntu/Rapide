<?php
	require_once 'config.php';
	if(!isset($_COOKIE['login'])){
		header("Location: login.php");
	}
	/*$contents = json_decode(file_get_contents('http://jgmcelwain.com/dot/version.json'));
	$newver = $contents->v;*/
	$newver = 0.2;
?>
<!DOCTYPE html>
<html>
<head>
<title>Dot Admin</title>
<link href="style.css" rel="stylesheet" />
</head>
<body>
<div id="container">
	<div id="navbar">
		<ul>
			<li id="first"><a id="new" href="?fn=new">New Post</a></li>
			<li><a id="edit" href="?fn=edit">Edit Posts</a></li>
			<li><a id="themes" href="?fn=theme">Themes</a></li>
			<li><a id="sidebar" href="?fn=side">Sidebar</a></li>
			<li><a id="settings" href="?fn=settings">Settings</a></li>
			<li id="logout"><a href="?fn=logout">Logout</a></li>
		</ul>
	</div>
		<?php 
			if(isset($_GET['fn'])){
				if($_GET["fn"] == "new") {
					include 'pages/new.php';
				} 
				else if($_GET["fn"] == "theme") {
					include 'pages/themes.php';
				}
				else if($_GET["fn"] == "side") {
					include 'pages/side.php';
				}
				else if($_GET["fn"] == "settings") {
					include 'pages/settings.php';
				}
				else if($_GET["fn"] == "edit") {
					include 'pages/edit.php';
				}
				else if($_GET["fn"] == "logout") {
					header("location: logout.php");
				}
			}
			else { 
				include 'pages/new.php';
			}
		?>
</div>
</body>
</html>

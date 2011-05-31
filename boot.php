<!DOCTYPE html>
<html>
<head>
<title>Rapide - Install</title>
 <link rel="stylesheet" media="screen" href="admin/style.css" />
 <style type="text/css">
 	body {
		background-color: white;
	}
	#container {
		padding: 5px;
		text-align: center;
	}
	form {
		width: 500px;
		margin: 0 auto;
	}
	label {
		clear: both;
		float: left;
	}
	input, select {
		width: 72%;
		float: right;
	}
	select {
		width: 73%;
	}
	#btn {
		float: none;
		margin-top: 10px;
	}
 </style>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body>
<div id="container">
	<h2>Rapide 2.0 Installer</h2>
	<?php if(isset($_GET['step'])){
		if($_GET['step'] == 2){ ?>
	<form name="form" action="install.php" method="post">
	<label>Username:</label> <input name="user">
	<label>Password:</label> <input name="pass" type="password">
	<label>Blog Name:</label> <input name="blogname">
	<label>Blog Description:</label> <input name="blogdesc">
	<label>Your Blog's URL:</label> <input name="blogurl">
	<label>Timezone:</label> <select name="timezone">
	  <option value="Pacific/Midway">GMT -11:00</option>
	  <option value="Etc/GMT+10">GMT -10:00</option>
	  <option value="Pacific/Gambier">GMT -09:00</option>
	  <option value="America/Ensenada">GMT -08:00</option>
	  <option value="America/Denver">GM T-07:00</option>
	  <option value="America/Belize">GMT -06:00</option>
	  <option value="America/New_York">GMT -05:00</option>
	  <option value="America/Santiago">GMT -04:00</option>
	  <option value="America/Araguaina">GMT -03:00</option>
	  <option value="America/Noronha">GMT -02:00</option>
	  <option value="Atlantic/Azores">GMT -01:00</option>
	  <option value="Europe/London">GMT</option>
	  <option value="Europe/Brussels">GMT +01:00</option>
	  <option value="Asia/Beirut">GMT +02:00</option>
	  <option value="Europe/Moscow">GMT +03:00</option>
	  <option value="Asia/Dubai">GMT +04:00</option>
	  <option value="Asia/Yekaterinburg">GMT +05:00</option>
	  <option value="Asia/Dhaka">GMT +06:00</option>
	  <option value="Asia/Bangkok">GMT +07:00</option>
	  <option value="Asia/Hong_Kong">GMT +08:00</option>
	  <option value="Asia/Tokyo">GMT +09:00</option>
	  <option value="Australia/Brisbane">GMT +10:00</option>
	  <option value="Etc/GMT-11">GMT +11:00</option>
	  <option value="Etc/GMT-12">GMT +12:00</option>
	  <option value="Pacific/Tongatapu">GMT +13:00</option>
	  <option value="Pacific/Kiritimati">GMT +14:00</option>
	</select>
	<input type="submit" id="btn" value="Install" />
</select>
</form>
<?php
	}
}
	else {
?>
	<h3>0-Blog in under 60 seconds. If you can type fast.</h3>
	<p>Rapide is now easier to install than ever before. We've rewritten the install engine, so it's now faster and much, much easier to install.</p>
	<a href="?step=2" style="text-align: center;margin-top: 20px;">Install Rapide</a>
<?php } ?>
</div>
</body>
</html>

<div id="title">Rapide <span style="text-shadow: #ffff00 0px 0px 5px;"> - Edit Sidebar</span> <span style="font-size: 50%;"><a href="<?php echo($GLOBALS['url']); ?>">(View Site)</a></span></div>
	<form action="functions/sidebar.php" method="post">
		<textarea name="sidebar" style="padding:10px;width:420px; margin-top: 30px;margin-left: 40px;height: 250px;"><?php include '../content/sidebar.txt'; ?></textarea>
		<p style="margin-top: -20px;margin-left: 20px;"><input id="btn" type="submit" value="Edit"/></p>
	</form>
</div>

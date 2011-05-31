<div id="title">Rapide <span style="text-shadow: #DBB8B8 0px 0px 5px;"> - Themes</span> <span style="font-size: 50%;"><a href="<?php echo($GLOBALS['url']); ?>">(View Site)</a></span></div>
<div style="font-size: 10pt; margin-top: 30px;">
<?php
	if (isset($_GET['set'])) {
		$config = file_get_contents("config.php");
		$replacement = str_replace('global $theme; $theme="'.$GLOBALS['theme'].'";', 'global $theme; $theme="'.$_GET['set'].'";', $config);
		$file = fopen("config.php", "w");
		fwrite($file, $replacement) or die('Whoops!');
		fclose($file);
		echo("<p style='width: 100%;height: 20px; line-height: 15px; position: fixed; top: -20px; left: 0px; margin-bottom: -20px;color: #f5f5f5; background-color: #404040; padding: 7px;'>Set ".$_GET['set']." as your theme</p>");
	}
	if ($handle = opendir('../themes')) {
		while (false !== ($file = readdir($handle))) {
			if ($file != "." && $file != "..") {
				$config = json_decode(file_get_contents('../themes/'.$file.'/theme.json'));
?>
<div style="margin-left: 155px;text-align: left;">
	<p style="font-weight: bold; margin-bottom: -15px;">Theme Name: <?php echo($config->name); ?></p>
	<p>Description: <?php echo($config->description); ?></p>
	<p style="font-weight: bold; margin-top: -15px; margin-bottom: -15px;">Version: <?php echo($config->version); ?></p>
	<p>Author: <?php echo($config->author); ?></p>
</div>
<a style="font-weight: bold;color: #404040; background-color: #f5f5f5; padding: 7px;margin-left: -100px; margin-top: -60px;float: right; width: 15%;"href="?fn=theme&set=<?php echo($config->dir); ?>">Set as Theme</a>
<?php
		}
	}
	closedir($handle);
}
?>
</div>

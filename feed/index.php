<?php include '../admin/config.php'; ?>
<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<rss version="2.0">
	<channel>
		<title><?php echo $GLOBALS['title']; ?></title>
		<description><?php echo $GLOBALS['description']; ?></description>
		<link><?php echo $GLOBALS['url']; ?></link>
		<?php
			$path = "../content/posts/";
			$files = glob("" . $path . "*.json");
			rsort($files);
			$files = array_slice($files, $start, $num_posts);
			foreach ($files as $file) {
				print("<item>\n");
				$content = json_decode(file_get_contents($file));
				echo '<title>'.$content->title."</title>\n";
				echo '<pubDate>'.$content->date."</pubDate>\n";
				echo '<description>'.stripslashes($content->content).'</description>';
				print("\n");
				echo '<link>'.$GLOBALS['url'].'/p/'.$content->number.'</link>';
				print("\n</item>\n");
			}
		?>
	</channel>
</rss>
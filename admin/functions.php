<?php
$start_time = microtime(true); 
if (isset($_GET["p"])) {
		$page = $_GET["p"];
	} else {
		$page = 1;
	}
function commentise($input) {
	$search = array(
		'^^',
		'**',
		'~~',
		'{}',
		'++',
		'||',
		'__'
	);
	$replace = array(
		'&#94;&#94;',
		'&#42;&#42;',
		'&#126;&#126;',
		'&#123;&#125;',
		'&#43;&#43;',
		'&#124;&#124;',
		'&#95;&#95;'
	);
	$result = str_replace($search, $replace, $input);
	$patterns = array(
		'/\*(.+)\*/',
		'/~(.+)~/',
		'/_(.+)_/',
		'/\^(.+)\^/',
		'/\{(.+)\}/',
		'/\+(.+)\+/',
		'/\|(.+)\|/', 
		'/\[(.+)\]\((.+)\)/' 
	);
	$replacements = array(
		'<strong>$1</strong>',
		'<em>$1</em>',
		'<span style="text-decoration: underline">$1</span>',
		'<blockquote>$1</blockquote>',
		'<code>$1</code>',
		'<span style="vertical-align:super;font-size: 75%;">$1</span>',
		'<span style="vertical-align:sub;font-size: 75%;">$1</span>',
		'<a href="$1" title="$1">$2</a>'
	);
	return preg_replace($patterns, $replacements, $result);
}
function dotCore(){ 
	print("<!DOCTYPE html>
	<html>
	<head>
	<title>");
	dotTitle();
	print("</title>
	<!--[if IE]>
	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->");
	dotStyle();
	print("\n</head>
	<body>");
	dotHeader();
	dotSidebar();
	dotContent($page);
	dotFooter();
	print("\n</body>
	</html>");
}
function dotPage(){
	if (isset($_GET["page"])) {
		$page = $_GET["page"];
	} else {
		echo("Oops!");
	}
	print("<!DOCTYPE html>
	<html>
	<head>
	<title>");
	dotTitle();
	print("</title>
	<!--[if IE]>
	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
	<![endif]-->");
	dotStyle();
	print("\n</head>
	<body>");
	dotHeader();
	dotSidebar();
	dotPages($page);
	dotFooter();
	print("\n</body>
	</html>");
}

function dotTime() {
	global $start_time; 
	echo "<p style='text-align: right; margin-top: 10px;font-style: italic; color: #969696; font-size: 12px;'>Page loaded in ".(round((microtime(true) - $start_time), 5))." seconds.</p>";
}

function dotTitle(){
	if (isset($_GET['post'])){
		$length = strlen($_GET["post"]);
		if ($length == "1"){
			$p = "0000".$_GET["post"];
		}
		else if ($length == "2"){
			$p = "000".$_GET["post"];
		} 
		else if ($length = "3"){
			$p = "00".$_GET["post"];
		}
		else if ($length == "4"){
			$p = "0".$_GET["post"];
		}
		else if ($length == "5"){
			$p = $_GET["post"];
		}
		$thecontent = "content/posts/".$p.".json";
		if (file_exists($thecontent)){
			$content = json_decode(file_get_contents($thecontent));
			echo $GLOBALS['title']." - ".$content->title;
		}
		else {
			echo $GLOBALS['title']." - Non-existent Post!";
		}
	}
	else if (isset($_GET['q'])){
		echo $GLOBALS['title'].' - Search for "'.$_GET['q'].'"';
	}
	else {
		echo $GLOBALS['title'].' - Home';
	}
}

function dotDescription(){
	print ($GLOBALS['description']);
}

function dotStyle(){
	print("<link rel='stylesheet' media='screen' href='".$GLOBALS['url']."/themes/".$GLOBALS['theme']."/style.css' />");
}

function dotHeader(){
	print("\n<header><p><h1><a href='".$GLOBALS['url']."'>".$GLOBALS['title']."</a></h1><h2>".$GLOBALS['description']."</h2></p></header>\n");
}


function dotSidebar(){
	print("\n<nav><h3>Navigation</h3><ul><li><a href='index.php'>Homepage</a></li><li><a href='admin'>Admin</a></li></ul>");
	include("content/sidebar.txt"); 
	dotTime();
	print ("</nav>\n");
}
function post($file){
	$content = json_decode(file_get_contents($file));
	if(isset($content->type)){
		$type = $content->type;
	}
	else {
		$type = "text";
	}
	print("\n<article id='".$type."'>");
	if (file_exists(".htaccess")){
		$posturl = $GLOBALS['url'].'/p/'.$content->number;
	}
	else {
		$posturl = $GLOBALS['url'].'/?post='.$content->number;
	}
	echo '<h1><a href="'.$posturl.'">'.stripslashes($content->title)."</a></h1>";
	$datetime = explode(" - ",$content->date, 2);
	$datetime = json_encode($datetime);
	$datetime = json_decode($datetime);
	echo '<p id="timestamp">This '.$type.' post was created on '.$datetime[0].' at '.$datetime[1].'</p>';
	if ($content->tags){
		echo '<p id="meta"><a style="font-weight:bold;color: black;">Tags:</a> ';
		$tags = json_encode($content->tags);
		$tags = json_decode($tags);
		foreach ($tags as $tag){
			echo '<a href="'.$GLOBALS['url'].'/?q='.$tag.'">#'.$tag.'</a> ';
		}
		echo "</p>";
	}
	echo stripslashes($content->content);
	print("</article>");
}
function dotContent($page = 1, $num_posts = 5) {
	if(!isset($_GET['random'])){
		$start = (($page - 1) * $num_posts); 	
		$path = "content/posts/";
		$dfiles = glob("" . $path . "*.json");
		if ($dfiles) {
			rsort($dfiles);
			$files = array_slice($dfiles, $start, $num_posts);
			foreach ($files as $file) {
				post($file);
			}
		}
		else {
			echo "Somthing's Missing? Maybe you need to <a href='install.php'>Install?</a>";
		}
		$previous = ($page)-1;
		$next = ($page)+1;
		$posts = count($dfiles);
		if($posts > 5){
			if (isset($_GET["p"])) {
				if((!$_GET['p'] == "1") && (!$_GET['p'] == "0")){
					print("\n<article id='pag'><a href='".$GLOBALS['url']."/?p=".$previous."'>Previous Page</a> | <a href='".$GLOBALS['url']."/?p=".$next."'>Next Page</a></article>");
				}
			}
			else {
				print("\n<article id='pag'><a href='".$GLOBALS['url']."/?p=".$next."'>Next Page</a></article>");
			}
		}
	}
}
function dotSearch($q){
	if(!$q == null){
		$files = glob("content/posts/*.json");
		$check = 1;
		echo '<h1>Search results for "'.$q.'"</h1>';
		foreach ($files as $file){
			$file = file_get_contents($file);
			if (strpos($file, $q)){
				$file = json_decode($file);
				echo "<a href='".$GLOBALS['url']."/?post=".$file->number."'><h2>".stripslashes($file->title)."</h2></a> <p style='margin-top: -43px;' id='timestamp'>".$file->date."</p>";
				$check++;
			}
		}
		if ($check == 1){
			echo '<p>No results were found for your query "'.$q.'". Try again?</p>';
			echo '<form action="index.php" method="get">
					<input name="q" />
					<input type="submit" value="Search" />
				</form>';
		}
	}
	else {
		echo '<h1>You cannot perform a blank search. Try again?</p>';
			echo '<form action="index.php" method="get">
					<input name="q" />
					<input type="submit" value="Search" />
				</form>';
	}
}

function dotSingle($postnum){
	$file = "content/posts/".$postnum.".json";
	if(file_exists($file)){
		post($file);
	}
	else {
		echo '<p>We couldn\'t find that post. Why don\'t you try a search?</p>
			<form action="index.php" method="get">
				<input name="q" />
				<input type="submit" value="Search" />
			</form>';
	}
}

function dotFooter(){
	print("\n<footer><div id='credits'>");
	print($GLOBALS['version'].' '.$GLOBALS['credits']);
	print("</div></footer>\n");
}
?>
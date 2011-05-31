<!DOCTYPE html> 
<html> 
<head> 
<title><?php dotTitle(); ?></title>
<?php dotStyle(); ?> 
<!--[if IE]>
	<script src='http://html5shim.googlecode.com/svn/trunk/html5.js'></script>
<![endif]-->
<style type="text/css" media="screen">
.twitter-share-button {
	display: none;
}
</style>
<link href='<?php echo $GLOBALS['url']."/feed"; ?>' rel="alternate" title="RSS" type="application/rss+xml" /> 
</head> 
<body> 
<div id='wrapper'> 
<?php dotHeader(); ?>
<div id='container'> 
<?php dotSidebar(); ?> 
<div id="content">
<?php dotSearch($_GET['q']); ?>
</div>
</div>
<?php dotFooter();?>
</div>
</body> 
</html>
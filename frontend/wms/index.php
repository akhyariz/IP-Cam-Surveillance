<?php session_start(); include('snews.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php title(); ?>	
	<meta name="Robots" content="index,follow" />
	<meta name="Generator" content="sNews 1.6" />
	<link rel="stylesheet" type="text/css" href="style.css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss-articles/" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss-pages/" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="rss-comments/" />
</head>
<body>
	<div class="wrap">
		<div id="logo">
			<h1><?php echo s('website_title'); ?></h1>
		</div>
		
		<div id="subheader">
			<div id="breadcrumbs">
				<?php breadcrumbs(); ?>
			</div>
			
			<div id="search">
				<?php searchform(); ?>
			</div>	
		</div>
		
		<div id="left">
		
			<ul>
			<?php pages(); ?>
			</ul>	
			
			<?php extra(); ?>
		</div>
				
		<div id="right" height=250px;>
			<?php webcam(); ?>
		</div>

		<div id="footer">
			<?php center(); ?>
		</div>

		<div id="footer">
			<ul id="rss">
				
			</ul>
			<p align="right">&copy; copyleft Akhyari Zudhi</p>
		</div>
	</div>
</body>
</html>
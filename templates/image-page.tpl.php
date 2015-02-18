<?php require_once('functions.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'html-head.php';?>
</head>
<body>
	<div id="container">
		<div id="header">
			<?php include 'header.php';?>
		</div>
		<div id="ss-controls">
			<a href="">&lt;prev</a>
			<a href="">pause slideshow</a>
			<a href="">next&gt;</a>
		</div>
		<div id="img-parent">
			<?php render_first_img($this->category);?>
		</div>
		<div id="thumb-nav">
			<?php render_thumbnav($this->category);?>
		</div>
		<div id="footer">
			<?php include 'footer.php';?>
		</div>
	</div>
</body>
</html>
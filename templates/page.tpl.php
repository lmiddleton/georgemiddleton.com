<?php require_once('functions.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'html-head.php';?>
</head>
<body>
	<div id="container">
		<div style="float: left; width: 90%;">
			<div id="header">
				<?php include 'header.php';?>
			</div>
			<div>
				<?php include $this->file;?>
			</div>
			<div id="footer">
				<?php include 'footer.php';?>
			</div>
		</div>
		<div style="float: right;">
			<div id="thumb-nav">
				<?php render_thumbnav($this->image, $this->category);?>
			</div>
		</div>
	</div>
</body>
</html>
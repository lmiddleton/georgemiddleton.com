<?php require_once('functions.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'html-head.php';?>
</head>
<body>
	<div id="header">
		<div id="header-guts">
			<?php include 'header.php';?>
		</div>
	</div>
	<div id="container">
			<?php include $this->file;?>
		<div id="footer">
			<?php include 'footer.php';?>
		</div>
	</div>
</body>
</html>
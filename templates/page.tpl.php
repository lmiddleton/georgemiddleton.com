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
			<?php include $this->file;?>
		<div id="footer">
			<?php include 'footer.php';?>
		</div>
	</div>
</body>
</html>
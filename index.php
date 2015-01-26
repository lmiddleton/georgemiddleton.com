<!DOCTYPE html>
<html lang="en">
<head>
	<title>George Middleton - paintings inspired by visions of nature and spirit</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<style>
		#container {
			background-color: pink;
			font-family: "Lucida Grande", "Lucida Sans Unicode", sans-serif;
			height: 685px;	/* MCA height */
			margin: auto;	/* center MCA horizontally */
			position: relative;
			width: 1028px;	/* MCA width */
		}

		h1 {
			color: #555555;
			display: inline;
			font-size: 2em;
			margin-right: 2em;
		}

		#header {
			background-color: yellow;
			text-align: center;
		}

		#nav {
			color: #828992;
			display: inline;
			font-size: .9em;
		}

		#nav a {
			margin-left: .5em;
			margin-right: .5em;
		}

		#ss-controls {
			background-color: green;
			text-align: center;
		}

		#img-parent {
			background-color: yellow;
			float: left;
		}

		#thumb-nav {
			background-color: yellow;
			float: right;
			vertical-align: top;
		}

		#caption {
			background-color: white;
			font-size: 0.8em;
			text-align: center;
		}

		#footer {
			background-color: orange;
			bottom: 0;
			font-size: 0.7em;
			clear: both;
			position: absolute;
			text-align: center;
			width: 100%;
		}

		a:link {
			color: #828992;
			text-decoration: none;
		}

		a:visited {
			color: #828992;
			text-decoration: none;
		}

		a:hover {
			color: #828992;
			text-decoration: underline;
		}

		a:active {
			color: #828992;
			text-decoration: none;
		}
	</style>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1>GEORGE MIDDLETON</h1>
			<div id="nav">
				<a href="">Current Work</a>
				|
				<a href="">Past Work</a>
				|
				<a href="">Prints</a>
				|
				<a href="">About</a>
				|
				<a href="">Contact</a>
				|
				<a href="">Newsletter</a>
			</div>
		</div>
		<div id="ss-controls">
			<a href="">&lt;prev</a>
			<a href="">pause slideshow</a>
			<a href="">next&gt;</a>
		</div>
		<div id="img-parent">
			<img src="images/full/Arc-of-the-Divers-by-George-Middleton.jpg" alt="Arc of the Divers" />
			<div id="caption">
				Arc of the Divers   acrylic on cradled hardwood panel   27" x 48.5" x 2"   2014   $4000
			</div>
		</div>
		<div id="thumb-nav">
			<?php include 'thumb-nav.php';?>
		</div>
		<div id="footer">
			<?php include 'footer.php';?>
		</div>
	</div>
</body>
</html>
<?php

require_once 'functions.php';

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// specify the file containing the page guts to show
$file = "templates/image-page-guts.tpl.php";

// specify the image category
$category = "past";

// check for specific image in URL
$image = "";
if($_GET) {
	$image = $_GET["image"];
}

// build the thumb nav
$thumbnav = build_thumbnav($image, $category);

// Assign values to the Savant instance.
$tpl->file = $file;
$tpl->category = $category;
$tpl->image = $image;
$tpl->thumbnav = $thumbnav;

// Display a template using the assigned values.
$tpl->display('templates/page.tpl.php');

?>
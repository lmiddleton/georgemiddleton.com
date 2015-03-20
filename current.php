<?php

require_once 'functions.php';

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// specify the file containing the page guts to show
$file = "templates/image-page-guts.tpl.php";

// specify the image category
$category = "current";

// check for specific image in URL
/*
$image = "";
if($_GET) {
	$image = $_GET["image"];
}
*/

// find the current image that should be displayed
// we will check for a specific image URL in this function (above)
// we will then pass the current image to the build_thumbnav function below
$image = get_current_image($category); //this might be useless and no more info than the original check of GET above if we can't somehow use the looping we are doing to also figure out the next image with it..
//echo $image;

$next_image = get_next_image($image, $category);
echo $next_image;

// build the thumb nav
$thumbnav = build_thumbnav($image, $category);

// Assign values to the Savant instance.
$tpl->file = $file;
$tpl->category = $category;
$tpl->image = $image;
$tpl->next_image = $next_image;
$tpl->thumbnav = $thumbnav;

// Display a template using the assigned values.
$tpl->display('templates/page.tpl.php');

?>
<?php

require_once 'functions.php';

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// specify the file containing the page guts to show
$file = "templates/image-page-guts.tpl.php";

// specify the image category
$category = "current";

// get and store the paintings
$paintings = get_paintings();

// find the current image that should be displayed
$image = get_current_image($paintings, $category);

// find the next image in the category
$next_image = get_next_image($paintings, $image, $category);

// build the full image
$full_image = build_full_img($paintings, $image, $next_image, $category);

// build the thumb nav
$thumbnav = build_thumbnav($paintings, $image, $category);

// Assign values to the Savant instance.
$tpl->file = $file;
$tpl->category = $category;
$tpl->image = $image;
$tpl->next_image = $next_image;
$tpl->full_image = $full_image;
$tpl->thumbnav = $thumbnav;

// Display a template using the assigned values.
$tpl->display('templates/page.tpl.php');

?>
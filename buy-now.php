<?php

require_once 'functions.php';

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// store the painting
// get it from the data sent from client
$paintingIndex = $_GET['paintingIndex'];

// get and store the paintings
$paintings = get_paintings();

// get the painting's full image filename
$full_filename = $paintings[$paintingIndex]["full-filename"];

// get the painting's title
$title = $paintings[$paintingIndex]["title"];

// build the caption
$caption = build_caption_guts($paintings, $paintingIndex);

// build file name
$filename = "buy-now-code/" . $paintings[$paintingIndex]["buy-now-code-filename"];
// read in paypal code from file
$paypalCode = file_get_contents($filename);

// specify the file containing the page guts to show
$file = "buy-now-guts.php";

// specify page category
$category = "prints";

// Assign values to the Savant instance.
$tpl->file = $file;
$tpl->category = $category;
$tpl->full_filename = $full_filename;
$tpl->title = $title;
$tpl->caption = $caption;
$tpl->paypalCode = $paypalCode;

// Display a template using the assigned values.
$tpl->display('templates/page.tpl.php');

?>
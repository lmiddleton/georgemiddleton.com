<?php

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// specify the file containing the page guts to show
$file = "templates/image-page-guts.tpl.php";

// specify the image category
$test = "current";

// Assign values to the Savant instance.
$tpl->file = $file;
$tpl->category = $test;

// Display a template using the assigned values.
$tpl->display('templates/page.tpl.php');

?>
<?php

require_once 'functions.php';

// Load the Savant3 class file and create an instance.
require_once 'Savant3-3.0.1/Savant3-3.0.1/Savant3.php';
$tpl = new Savant3();

// specify the image category
$category = "illustrations";

load_image_page($category, $tpl);

?>
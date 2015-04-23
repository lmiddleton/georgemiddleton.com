<?php

require_once 'functions.php';

// need to somehow call the function that generates the next image based on the current one (sent by client)
// build the full image

// store the category
// get it from the data sent from client
$category = $_POST['category'];
//echo $category;

// get and store the paintings
$paintings = get_paintings();

// find the current image that should be displayed (next image in the slideshow)
// get it from the data sent from client
$image = $_POST['image'];

// find the next image in the category (to build link)
$next_image = get_next_image($paintings, $image, $category);

// build the full image
$full_image = build_full_img($paintings, $image, $next_image, $category);

// build the thumb nav
$thumbnav = build_thumbnav($paintings, $image, $category);

// build the data object to be returned
$return_data = [];
$return_data['full_image'] = $full_image;
$return_data['thumbnav'] = $thumbnav;

echo json_encode($return_data);	// whatever is echoed will be returned to ajax function as success data

?>
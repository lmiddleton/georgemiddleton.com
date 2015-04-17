<?php
	
	// returns php array of paintings JSON object
    function get_paintings()
    {
    	// read in the contents of the json file as a string - should do this once in the beginning in some controller file?
		$json = file_get_contents("paintings.json");
		// parse the json string into php array and return
		return json_decode($json, true);
    }

    // renders the slideshow navigation
    function render_ss_controls()
    {

    }

    // finds the returns the image that should be displayed
    function get_current_image($paintings, $category) {
    	// we will store the image to be displayed in this var
    	$image = "";

    	// first, check for specific image in URL
		if($_GET) {
			$image = $_GET["image"];
			return $image;
		}

		// otherwise, loop through the images to find the first in the category
		else {
			// get the paintings
			//$paintings = get_paintings();

			// count number of painting arrays
			$len = count($paintings);

			// iterate over painting arrays
			for($i = 0; $i < $len; ++$i) {
				// set image to first painting that belongs in the category
				if($paintings[$i]["category"] == $category) {
					$image = $paintings[$i]["title"];
					return; // stop looking
				}
			}

			return $image;
		}
    }

    // finds the "next" image after the specified image in the category
    function get_next_image($paintings, $current_image, $category) {
    	// we will store the next image in this var
    	$next_image = "";

    	// get the paintings
		//$paintings = get_paintings();

		// count number of painting arrays
		$len = count($paintings);

		// iterate over painting arrays
		for($i = 0; $i < $len; ++$i) {
			// check that painting belongs in current page
			if($paintings[$i]["category"] == $category) {
				// if no image specified...
				if($current_image == "") {
					// we can start looking for the next image in that category
					// figure out how many more we need to look through
					$to_go = $len - $i;
					// loop through the remaining paintings
					// start counting at 1 to skip the current painting
					for($j = 1; $j < $to_go; $j++) {
						// as soon as we find one in the same category
						if($paintings[$i + $j]["category"] == $category) {
							// store it's position in next image var
							$next_image = $i + $j;
							return $next_image;
						}
					}
				}
				// else when we find the current image...
				else if($paintings[$i]["title"] == $current_image) {
					// we can start looking for the next image in that category
					// figure out how many more we need to look through
					$to_go = $len - $i;
					// loop through the remaining paintings
					// start counting at 1 to skip the current painting
					for($j = 1; $j < $to_go; $j++) {
						// as soon as we find one in the same category
						if($paintings[$i + $j]["category"] == $category) {
							// store it's position in next image var
							$next_image = $i + $j;
							return $next_image;
						}
					}
				}
			}
		}
    }

    // builds and returns the html markup for the thumbnav
    function build_thumbnav($paintings, $image, $category) {
    	// we will build the thumbnav markup in this variable
    	$thumbnav = "";

    	// get the paintings
		//$paintings = get_paintings();

		// count number of painting arrays
		$len = count($paintings);

		// keep a count of how many thumbs printed
		$count = 0;

		// iterate over painting arrays
		for($i = 0; $i < $len; ++$i) {
			// check that painting belongs in current page
			if($paintings[$i]["category"] == $category) {
				// if no image specified and we haven't printed the first thumb yet...
				if($image == "" && $count == 0) {
					// give it a border
					$class = "class='thumb active-thumb'";
					// build the thumbnail image
					$thumbnav .= build_thumb($category, $paintings, $i, $class);
					$count++;
				}
				// else...
				else {
					// if the painting is the current fullsize, give it a border
					$class = "class='thumb";
					if($paintings[$i]["title"] == $image) {
						$class .= " active-thumb'";
					}
					else {
						// close the attribute
						$class .="'";
					}

					// build the thumbnail image
					$thumbnav .= build_thumb($category, $paintings, $i, $class);
					$count++;

					// if count is evenly divisible by 0, we need a break tag
					if($count % 2 == 0) {
						$thumbnav .= "<br />";
					}
				}
			}	
		}

		return $thumbnav;
    }

    // renders the current thumbnail navigation
    /*
    function render_thumbnav($image, $category)
    {
      	// get the paintings
		$paintings = get_paintings();

		// count number of painting arrays
		$len = count($paintings);

		// keep a count of how many thumbs printed
		$count = 0;

		// iterate over painting arrays
		for($i = 0; $i < $len; ++$i) {
			// check that painting belongs in current page
			if($paintings[$i]["category"] == $category) {
				// if no image specified and we haven't printed the first thumb yet...
				if($image == "" && $count == 0) {
					// give it a border
					$class = "class='thumb active-thumb'";
					// render the thumbnail image
					print_thumb($category, $paintings, $i, $class);
					$count++;
				}
				// else...
				else {
					// if the painting is the current fullsize, give it a border
					$class = "class='thumb";
					if($paintings[$i]["title"] == $image) {
						$class .= " active-thumb'";
					}
					else {
						// close the attribute
						$class .="'";
					}

					// render the thumbnail image
					print_thumb($category, $paintings, $i, $class);
					$count++;

					// if count is evenly divisible by 0, we need a break tag
					if($count % 2 == 0) {
						echo "<br />";
					}
				}
			}	
		}
    }
    */

    // renders the current full size image
    function render_full_img($image, $next_image, $category)
    {
    	// get the paintings
		$paintings = get_paintings();

		// count number of painting arrays
		$len = count($paintings);

		// if no image specified...
		if($image == "") {
			// iterate over painting arrays to find and render first match in category
			for($i = 0; $i < $len; ++$i) {
				// check that painting belongs in current page
				if($paintings[$i]["category"] == $category) {
					print_full($paintings, $i, $next_image, $category);
					return;
				}
			}
		}
		// else...
		else {
			// iterate over painting arrays to find and render the image with the specified title and category
			for($i = 0; $i < $len; ++$i) {
				if($paintings[$i]["category"] == $category && $paintings[$i]["title"] == $image) {
					print_full($paintings, $i, $next_image, $category);
					return;
				}
			}
		}
    }

    // echos html for full size images and captions
    function print_full($paintings, $i, $next_image, $category)
    {
    	// build the src attribute
    	$src = "\"images/full/" . $paintings[$i]["full-filename"] . "\"";
    	// build the alt attribute
    	$alt = "\"" . $paintings[$i]["title"] . "\"";
    	// build the href attribute
    	$href =  "\"" . $category . ".php?image=" . $paintings[$next_image]["title"] . "\"";
    	// render the fullsize image
		echo "<a href=" . $href . "><img src=" . $src . "alt=" . $alt . " /></a>";
		// build the caption
		$caption = "<div class='caption'>";
		// add the non-optional elements
		$caption .= $paintings[$i]["title"] . " " . $paintings[$i]["medium"] . " " . $paintings[$i]["size"] . " " . $paintings[$i]["date"];
		// check for optional elements
		if (array_key_exists("edition", $paintings[$i])) {
			// add edition if it exists
			$caption .=  " " . $paintings[$i]["edition"];
		}
		if (array_key_exists("price", $paintings[$i])) {
			// add price if it exists
			$caption .=  " " . $paintings[$i]["price"];
		}
		// close the tag
		$caption .= "</div>";
		// render the caption
		echo $caption;
    }

    // echos html for href attribute of next image
    function print_next_href($category, $next_image)
    {
    	// get the paintings - should just get this in current.php, etc. and pass it through all functions
		$paintings = get_paintings();
    	// build the href attribute
    	$href =  "\"" . $category . ".php?image=" . $paintings[$next_image]["title"] . "\"";
    	// render it
    	echo "href=" . $href . "";
    }

    // builds and returns the html markup for individual thumbnail images
    function build_thumb($category, $paintings, $i, $class)
    {
    	// build the src attribute
    	$src = "\"images/thumb/" . $paintings[$i]["thumb-filename"] . "\"";
    	// build the alt attribute
    	$alt = "\"" . $paintings[$i]["title"] . "\"";
    	// render the thumbnail image
    	$thumb = "<a href=\"" . $category . ".php?image=" . $paintings[$i]["title"] . "\"" . $class . "><img src=" . $src . "alt=" . $alt . " /></a>";
    	return $thumb;
    }

    // renders the main navigation with the active page link underlined
    function render_main_nav($activePage)
    {
    	// 
    }
?>
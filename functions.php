<?php

	// handle post requests
/*
	if ($_POST["action"] = 'test')
	{
		echo "it worked!";
	}
	*/
	
	// loads the current image page based on its category
	function load_image_page($category, $tpl)
	{
		// specify the file containing the page guts to show
		$file = "templates/image-page-guts.tpl.php";

		// get and store the paintings
		$paintings = get_paintings();

		// find the current image that should be displayed
		$image = get_current_image($paintings, $category);

		// find the next image in the category
		$next_image = get_next_image($paintings, $image, $category);

		// find the previous image in the category
		$prev_image = get_prev_image($paintings, $image, $category);

		// build the full image
		$full_image = build_full_img($paintings, $image, $next_image, $category);

		// build the thumb nav
		$thumbnav = build_thumbnav($paintings, $image, $category);

		// Assign values to the Savant instance.
		$tpl->file = $file;
		$tpl->paintings = $paintings;
		$tpl->category = $category;
		$tpl->image = $image;
		$tpl->next_image = $next_image;
		$tpl->prev_image = $prev_image;
		$tpl->full_image = $full_image;
		$tpl->thumbnav = $thumbnav;

		// Display a template using the assigned values.
		$tpl->display('templates/page.tpl.php');
	}
	
	// returns php array of paintings JSON object
    function get_paintings()
    {
    	// read in the contents of the json file as a string
		$json = file_get_contents("paintings.json");
		// parse the json string into php array and return
		return json_decode($json, true);
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
    function get_next_image($paintings, $current_image, $category)
    {
    	// we will store the next image in this var
    	$next_image = "";

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

    // finds the "previous" image before the specified image in the category
    function get_prev_image($paintings, $current_image, $category)
    {
    	// here we will store the previous painting in the category found
    	$prev_image = "";

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
							// store it's position in previous image var
							//$prev_image = $i + $j;
							//echo $prev_image;
							return $prev_image;
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
							// store it's position in previous image var
							//$prev_image = $i + $j;
							//print_r($prev_image);
							return $prev_image;
						}
					}
				}
				// it's in the category but not the exact match
				else {
					// store it, since it might be the previous image
					$prev_image = $i;
				}
			}
		}
    }

    // builds and returns the html markup for the thumbnav
    function build_thumbnav($paintings, $image, $category) {
    	// we will build the thumbnav markup in this variable
    	$thumbnav = "";

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
					if($count % 3 == 0) {
						$thumbnav .= "<br />";
					}
				}
			}	
		}

		return $thumbnav;
    }

    // builds and returns the html markup for the current full size image
    function build_full_img($paintings, $image, $next_image, $category)
    {
    	// we will build the markup in this variable
    	$full_image = "";

		// count number of painting arrays
		$len = count($paintings);

		// if no image specified...
		if($image == "") {
			// iterate over painting arrays to find and render first match in category
			for($i = 0; $i < $len; ++$i) {
				// check that painting belongs in current page
				if($paintings[$i]["category"] == $category) {
					$full_image .= build_full($paintings, $i, $next_image, $category);
					return $full_image;
				}
			}
		}
		// else...
		else {
			// iterate over painting arrays to find and render the image with the specified title and category
			for($i = 0; $i < $len; ++$i) {
				if($paintings[$i]["category"] == $category && $paintings[$i]["title"] == $image) {
					$full_image .= build_full($paintings, $i, $next_image, $category);
					return $full_image;
				}
			}
		}
    }

    // build the core cuts of an image caption (without buttons/links)
    function build_caption_guts($paintings, $i) {
    	$caption = "";
    	// add the non-optional elements
		$caption .= "<span class='title'>" . $paintings[$i]["title"] . "</span>" . "&nbsp&nbsp&nbsp" . $paintings[$i]["medium"] . "&nbsp&nbsp&nbsp" . $paintings[$i]["size"] . "&nbsp&nbsp&nbsp" . "&copy;" . $paintings[$i]["date"];
		// check for optional elements
		if (array_key_exists("edition", $paintings[$i])) {
			// add edition if it exists
			$caption .=  "&nbsp&nbsp&nbsp" . $paintings[$i]["edition"];
		}
		if (array_key_exists("for", $paintings[$i])) {
			// add for if it exists
			$caption .= "&nbsp&nbsp&nbsp" . $paintings[$i]["for"];
		}
		if (array_key_exists("price", $paintings[$i])) {
			// add price if it exists
			$caption .=  "&nbsp&nbsp&nbsp" . $paintings[$i]["price"];
		}
		return $caption;
    }

    // builds caption for full size image
    function build_caption($paintings, $i)
    {
    	// build the caption
		$caption = "<div class='caption'>";
		
		$caption_guts = build_caption_guts($paintings, $i);
		$caption .= $caption_guts;

		if (array_key_exists("buy-now-code-filename", $paintings[$i])) {
			//// build file name
			//$filename = "buy-now-code/" . $paintings[$i]["buy-now-code-filename"];
			//// read in code from file
			//$code = file_get_contents($filename);
			//// add it to the caption
			//$caption .= $code;

			// build buy now button form and add it to the caption
			$button = "<form action='buy-now.php' method='get'><input type='hidden' name='paintingIndex' value='" . $i . "' /><button type='submit' class='button'>Buy Now</button></form>";
			$caption .=$button;
		}
		if (array_key_exists("print", $paintings[$i])) {
			// add print available link if it exists
			// find the corresponding print with the same name
			// count number of painting arrays
			$len = count($paintings);
			$print_href = "";
			for($j = 0; $j < $len; ++$j) {
				if($paintings[$j]["category"] == "prints" && $paintings[$j]["title"] == $paintings[$i]["title"]) {
					// TODO: should factor out building the href for a full size image
					$print_href .= "prints" . ".php?image=" . $paintings[$j]["title"];
					break;
				}
			}

			$caption .=  "&nbsp&nbsp&nbsp<a href=\"" . $print_href . "\"" . " class=\"print-available\"" . ">" . $paintings[$i]["print"] . "</a>";
		}
		// close the tag
		$caption .= "</div>";
		// return the caption
		return $caption;
    }

    // builds and returns html for full size images and captions
    function build_full($paintings, $i, $next_image, $category)
    {
    	// we will build the markup in this variable
    	$full = "";

    	// build the src attribute
    	$src = "\"images/full/" . $paintings[$i]["full-filename"] . "\"";
    	// build the alt attribute
    	$alt = "\"" . $paintings[$i]["title"] . "\"";
    	// build the class attribute
    	$class = "\"full\"";
    	
    	if($next_image != "") {
	    	// build the href attribute
	    	$href =  "\"" . $category . ".php?image=" . $paintings[$next_image]["title"] . "\"";
    	}
    	// we are at the last image
    	else {
    		// build href that will go back to beginning of category
    		$href = "";
    		$href .= $category . ".php?image=";
    	}

    	// render the fullsize image
		$full .= "<a href=" . $href . "><img src=" . $src . "alt=" . $alt . "class=" . $class . " /></a>";
		
		// build the caption
		$caption = build_caption($paintings, $i);

		$full .= $caption;

		return $full;
    }

    // echos html for href attribute of next image
    function print_next_href($paintings, $category, $next_image)
    {
    	if($next_image != "") {
	    	// build the href attribute
	    	$href =  "\"" . $category . ".php?image=" . $paintings[$next_image]["title"] . "\"";
    	}
    	// we are at the last image
    	else {
    		// build href that will go back to beginning of category
    		$href = "";
    		$href .= $category . ".php?image=";
    	}
    	// render it
    	echo "href=" . $href . "";
    }

    function print_prev_href($paintings, $category, $prev_image)
    {
    	if($prev_image !=  "") {
    		// build the href attribute
    		$href =  "\"" . $category . ".php?image=" . $paintings[$prev_image]["title"] . "\"";
    	}
    	// we are at the first image
    	// need to figure out how to wrap around
    	else {
    		$href = "";
    	}
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
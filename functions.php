<?php
	
	// returns php array of paintings JSON object
    function get_paintings()
    {
    	// read in the contents of the json file as a string - should do this once in the beginning in some controller file?
		$json = file_get_contents("paintings.json");
		// parse the json string into php array and return
		return json_decode($json, true);
    }

    // echos html for the specified page's thumbnail navigation
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
					echo "<a href='" . $category . ".php?image=" . $paintings[$i]["title"] . "'" . $class . "><img src=\"images/thumb/" . $paintings[$i]["thumb-filename"] . "\" /></a>";
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
					echo "<a href='" . $category . ".php?image=" . $paintings[$i]["title"] . "'" . $class . "><img src=\"images/thumb/" . $paintings[$i]["thumb-filename"] . "\" /></a>";
					$count++;

					// if count is evenly divisible by 0, we need a break tag
					if($count % 2 == 0) {
						echo "<br />";
					}
				}
			}	
		}
    }

    function render_full_img($image, $category)
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
					print_full($paintings, $i);
					return;
				}
			}
		}
		// else...
		else {
			// iterate over painting arrays to find and render the image with the specified title and category
			for($i = 0; $i < $len; ++$i) {
				if($paintings[$i]["category"] == $category && $paintings[$i]["title"] == $image) {
					print_full($paintings, $i);
					return;
				}
			}
		}
    }

    function print_full($paintings, $i)
    {
    	// render the fullsize image
		echo "<img src=\"images/full/" . $paintings[$i]["full-filename"] . "\" />";
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

    // renders the main navigation with the active page link underlined
    function render_main_nav($activePage)
    {
    	// 
    }
?>
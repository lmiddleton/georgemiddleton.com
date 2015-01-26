<?php

// read in the contents of the json file as a string - should do this once in some controller file
$json = file_get_contents("paintings.json");
// parse the json string into php array
$paintings = json_decode($json, true);

// print the paintings array
//print_r($paintings);

// count number of painting arrays
$len = count($paintings);
// print the count
//echo $len;
// iterate over painting arrays
for($i = 0; $i < $len; ++$i) {
	// check that painting belongs in current page
	if($paintings[$i]["category"] == "current") {
		//echo $paintings[$i]["thumb-filename"];
		echo "<img src=\"images/thumb/" . $paintings[$i]["thumb-filename"] . "\" />";
	}
	// if not evenly divisible by 0, we need a break tag
	//echo $i % 2;
	if($i % 2 != 0) {
		echo "<br />";
	}
	// for each painting, print the properties
	//foreach($paintings[$i] as $property) {
		//echo $property;
	//}
}


?>
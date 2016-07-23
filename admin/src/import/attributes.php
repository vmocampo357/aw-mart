<?php

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_Colors.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	$insert = array(
		"attribute_id" 		=> $d["Color_Id"],
		"attribute_name" 	=> $d["Color_Name"],
		"attribute_parent" 	=> 3,
		"attribute_code" 	=> $d["Color_Code"]
	);

	echo Database::Insert("tpt_attributes",$insert)."<br />";

endforeach;

?>
<?php

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_Categories.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	$id 			= $d["ID"];
	$parent 		= $d["Parent"];
	$name 			= $d["Name"];
	$description 	= $d["LongDesc"];
	$image_url 		= $d["Image"];
	$order 			= $d["Order"];

	if($parent == 0):
		switch($d["Type"]):
			case("P"):
				$parent = 3;
			break;
			case("T"):
				$parent = 4;
			break;
		endswitch;
	endif;

	$insert = array(
		"taxonomy_id" 			=> $id,
		"taxonomy_label"		=> $name,
		"taxonomy_parent" 		=> $parent,
		"taxonomy_image_url" 	=> $image_url,
		"taxonomy_description" 	=> $description,
		"taxonomy_draft" 		=> 0,
		"taxonomy_order"		=> $order
	);

	// echo "<pre>".print_r($insert,true)."</pre>";

	echo Database::Insert("tpt_taxonomies",$insert) ."<br />";

endforeach;

?>
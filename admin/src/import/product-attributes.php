<?php

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_ProductColorLinking.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	$insert = array(
		"xref_attribute_id" => $d["ColorID"],
		"xref_product_id" => $d["ProductID"]
	);

	echo Database::Insert("tpt_product_attributes",$insert)."<br />";

endforeach;

?>
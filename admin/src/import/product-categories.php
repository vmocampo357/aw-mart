<?php

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_CategoryProductLinking2.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

var_dump($loop[0]);

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	echo Database::Insert("tpt_product_taxonomies",array(
		"xref_taxonomy_id" => $d["CategoryID"],
		"xref_product_id" => $d["ProductID"]
	));

endforeach;

?>
<?php

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_Products.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	$insert = array(
		"product_id" 			=> $d["ProductID"],
		"product_name" 			=> $d["ProductName"],
		"product_sku" 			=> $d["ProductNumber"],
		"product_discontinued" 	=> 0,
		"product_draft" 		=> 0,
		"product_featured_image" 	=> "http://placehold.it/300x300",
		"product_thumbnail_image" 	=> "http://placehold.it/300x300",
		"legacy_size_category" 	=> $d["SizeCategory"],
		"legacy_zoom_image" 	=> $d["ProductZoomImage"],
		"legacy_main_image" 	=> $d["ProductMainImage"],
		"legacy_image_a"		=> $d["ProductImage"],
		"legacy_is_gender"		=> $d["IsGender"]
	);

	echo Database::Insert("tpt_products",$insert)."<br />";

endforeach;

?>
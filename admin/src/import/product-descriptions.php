<?php
ini_set("display_errors",true);
// Load file
// $csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_ProductsNoHTML.xml";
// $csv->auto($file);

// Assign for a loop
$loop = $xml=simplexml_load_file($file) or die("Error: Cannot create object");

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	/*$query = sprintf("UPDATE tpt_products SET product_html_description = '%s' WHERE product_id = %d",
		html_entity_decode($d->ProductDesc),
		$d->ProductID
	);*/

	//echo $query."<br />";	

	//break;

	echo Database::Update("tpt_products",array(
		"product_html_description" => html_entity_decode($d->ProductDesc)
	),$d->ProductID,"product_id");

endforeach;

?>
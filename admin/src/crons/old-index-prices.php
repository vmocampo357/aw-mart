<?php
/**
* First load all the products.
* Then, run through each, and their prices.
* Find the average and update our index! **/
$products = ProductFactory::GetAllProducts(false);

$cache = array();

foreach($products as $p):

	$prices = $p->prices;

	foreach($prices as $pr):

		$cache[] = array(
			"product_id" => $p->ID,
			"prices" => $pr["prices"]
		);

	endforeach;

endforeach;

$price_averages = array();

foreach($cache as $c):

	foreach($c["prices"] as $price):

		$price_averages[$c["product_id"]][] = $price["price"];

	endforeach;

endforeach;

$products = array();

foreach($price_averages as $product_id => $prices):

	$average = array_sum($prices) / count($prices);

	$products[] = array(
		"id" => $product_id,
		"average" => $average
	);

endforeach;

// Truncate / Insert
if( Database::Query("TRUNCATE TABLE tpt_price_index") ):
	foreach($products as $p):
		echo Database::Insert("tpt_price_index",array(
			"product_id" 	=> $p["id"],
			"average_price" => $p["average"],
			"date_updated" 	=> date('Y-m-d H:i:s')
		));
		echo "<br />\n";
	endforeach;
else:
	echo "Couldn't truncate indexes! <br />\n";
endif;

?>
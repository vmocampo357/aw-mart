<?php

// Load file
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/prices-3.txt";
$json_raw = file_get_contents($file);
$json = json_decode($json_raw);

foreach($json as $j):

	$range_text = sprintf("%d-%d",$j->min,$j->max);

	if($j->max == 0)
		$range_text = $j->min."+";

	$insert = array(
		"size_id" => $j->size_id,
		"range_text" => $range_text,
		"price_usd" => $j->price,
		"min" => $j->min,
		"max" => $j->max
	);

	echo Database::Insert("tpt_product_size_prices",$insert)."<br />";

endforeach;

?>
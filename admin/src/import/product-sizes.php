<?php

ini_set("display_errors",true);
set_time_limit ( 0 );

// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_Sizes.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Assign for a loop
$loop = $csv->data;

$size_cache = array();

$size_units = array(
	1 => "Inch",
	2 => "Ounces",
	3 => "Plates",
	4 => "Years"
);

// Loop and insert, make sure table is clean with 3 as Products, 4 as Themes
foreach($loop as $d):

	$size_cache[$d["Size_Id"]] = array(
		"size" => $d["Size_Label"],
		"units" => $size_units[$d["SizeCategory"]]
	);

endforeach;

// echo "<pre>".print_r($size_cache,true)."</pre>";

// The prices
// Load file
$csv = new parseCSV();
$base = 'C:\/xampp\/htdocs\/sidework\/shopping-cart-awards\/admin\/';
$file = $base."/imports/Awards_Prices.txt";
$csv->delimiter = ",";
$csv->parse($file);

// Second loop
$second_loop = $csv->data;

$last_size = array();

$prices = array();

foreach($second_loop as $size):

	$insert = array(
		"product_id" 	=> $size["ProductId"],
		"size_inches" 	=> $size_cache[ $size["Size_Id"] ]["size"],
		"size_unit" 	=> $size_cache[ $size["Size_Id"] ]["units"]
	);

	if( isset($last_size[$size["ProductId"]]) && $last_size[$size["ProductId"]] == $size["Size_Id"]):
		
		if($size["Price"] != 0):
			$prices[] = array(
				"size_id" => $last_pid,
				"min" => $size["Min"],
				"max" => $size["Max"],
				"price" => $size["Price"]
			);
		endif;

	else:
	
		if($size["Price"] != 0){
			$pid = Database::Insert("tpt_product_sizes",$insert);
			$prices[] = array(
				"size_id" => $pid,
				"min" => $size["Min"],
				"max" => $size["Max"],
				"price" => $size["Price"]
			);
			$last_pid = $pid;
			echo $pid."<br />";
		}

	endif;

	$last_size[$size["ProductId"]] = $size["Size_Id"];

endforeach;

foreach($prices as $j):

	$range_text = sprintf("%d-%d",$j["min"],$j["max"]);

	if($j["max"] == 0)
		$range_text = $j["min"]."+";

	$insert = array(
		"size_id" => $j["size_id"],
		"range_text" => $range_text,
		"price_usd" => $j["price"],
		"min" => $j["min"],
		"max" => $j["max"]
	);

	echo "<pre>".print_r($insert,true)."</pre>";

	echo Database::Insert("tpt_product_size_prices",$insert)."<br />";

endforeach;

?>
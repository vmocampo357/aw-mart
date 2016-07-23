<?php

$products = Database::Results("
	SELECT P.product_id,P.product_name,S.*,PR.* FROM tpt_products P
	INNER JOIN tpt_product_sizes S
	ON S.product_id = P.product_id
	INNER JOIN tpt_product_size_prices PR
	ON PR.size_id = S.size_id
	WHERE PR.min = 1
	GROUP BY P.product_id
");

// echo "<pre>".print_r($products,true)."</pre>";

// Truncate / Insert
if( Database::Query("TRUNCATE TABLE tpt_price_index") ):
	foreach($products as $p):
		echo Database::Insert("tpt_price_index",array(
			"product_id" 	=> $p["product_id"],
			"average_price" => $p["price_usd"],
			"date_updated" 	=> date('Y-m-d H:i:s')
		));
		echo "<br />\n";
	endforeach;
else:
	echo "Couldn't truncate indexes! <br />\n";
endif;

?>
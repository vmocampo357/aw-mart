<?php

$results = Database::Results("SELECT product_id FROM tpt_products WHERE legacy_is_gender = 'Y'");

foreach($results as $r):
	$query = "
		INSERT INTO tpt_product_attributes (xref_attribute_id,xref_product_id) VALUES (146,".$r['product_id'].");
		INSERT INTO tpt_product_attributes (xref_attribute_id,xref_product_id) VALUES (147,".$r['product_id'].");		
	";
	
	var_dump(Database::Query($query));
	
endforeach;

?>
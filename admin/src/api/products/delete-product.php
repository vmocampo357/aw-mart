<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$id = $_REQUEST["id"];

if($id):
	// Saving a product
	$product = new Product($id);
	$result = $product->update(array(	
		"product_discontinued" => 1
	));
else:
	$result = false;
endif;

$response["data"]["result"] = $result;

echo json_encode($response);

?>
<?php
session_start();
ini_set("display_errors",true);
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

if( isset($_REQUEST["product"]) && isset($_REQUEST["quantity"]) && isset($_REQUEST["size_id"]) ):

	$product = new Product($_REQUEST["product"]);

	$response["new_subtotal"] = $product->findPrice($_REQUEST["quantity"],$_REQUEST["size_id"]);

endif;

echo json_encode($response);

?>
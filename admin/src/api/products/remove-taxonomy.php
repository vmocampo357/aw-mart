<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$id = $_REQUEST["id"];
$product = $_REQUEST["p"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
$response["data"]["result"] = 0;
if(isset($id) && intval($id) != 0):
	
	$Product = new Product($product);
	$response["data"]["result"] = $Product->removeTaxonomy($id);

endif;

echo json_encode($response);

?>
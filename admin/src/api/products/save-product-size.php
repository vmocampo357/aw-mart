<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$product_id = $_REQUEST["id"];
$data		= $_REQUEST["d"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
$newProduct = new Product($product_id);

$response["data"]["result"] = $newProduct->addSize($data);

echo json_encode($response);

?>
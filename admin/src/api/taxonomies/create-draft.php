<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
$newTax = new Taxonomy();
$response["data"]["draft"] = $newTax->ID;

echo json_encode($response);

?>
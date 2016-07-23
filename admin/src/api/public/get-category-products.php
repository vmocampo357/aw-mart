<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$id = $_REQUEST["tax"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
if(isset($id) && intval($id) != 0):
	
	$Tax = new Taxonomy($id);
	$response["data"]["result"] = 1;
	$response["data"]["subject"] = $Tax;
	$response["data"]["children"] = $Tax->getProducts();

else:
	$response["data"]["result"] = 0;
endif;

echo json_encode($response);

?>
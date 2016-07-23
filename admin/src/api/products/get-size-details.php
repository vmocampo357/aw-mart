<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$size_id = $_REQUEST["id"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
$viewSize = new ProductSize($size_id);

$response["data"]["result"] = $viewSize;

echo json_encode($response);

?>
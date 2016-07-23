<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$id = $_REQUEST["id"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
if(isset($id) && intval($id) != 0):
	
	$Tax = new Taxonomy($id);

	$response["data"]["result"] = $Tax->update(array(
		"taxonomy_draft" => 1
	));

else:
	$response["data"]["result"] = 0;
endif;

echo json_encode($response);

?>
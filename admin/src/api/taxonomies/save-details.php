<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$id = $_REQUEST["hidden"]["id"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
if(isset($id) && intval($id) != 0):
	
	$Tax = new Taxonomy($id);

	// Get REQUEST vars
	$label 			= $_REQUEST["meta"]["title"];
	$description 	= $_REQUEST["meta"]["description"];
	$image			= $_REQUEST["meta"]["image"];
	$parent 		= intval($_REQUEST["hidden"]["parent"]);

	$response["data"]["result"] = $Tax->update(array(
		"taxonomy_label" => $label,
		"taxonomy_parent" => $parent,
		"taxonomy_description" => $description,
		"taxonomy_image_url" => $image,
		"taxonomy_draft" => 0
	));

else:
	$response["data"]["result"] = 0;
endif;

echo json_encode($response);

?>
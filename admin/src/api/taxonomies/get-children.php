<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$root = $_REQUEST["root"];

if($root):
	$response["data"]["result"] = new Taxonomy($root);
else:
	$response["data"]["result"] = 0;
endif;

echo json_encode($response);

?>
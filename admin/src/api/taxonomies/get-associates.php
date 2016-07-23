<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$root = $_REQUEST["root"];

if($root):
	TaxonomyFactory::GetTree($root);
	$response["data"]["associates"] = TaxonomyFactory::$last_associates;
else:
	$response["data"]["associates"] = 0;
endif;

echo json_encode($response);

?>
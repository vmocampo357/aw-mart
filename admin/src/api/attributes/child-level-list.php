<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$lookupByName = true;

$results = AttributeFactory::GetChildAttributes($_REQUEST["term"],$lookupByName);

$response["data"]["list"] = array();

foreach($results as $r):
	$response["data"]["list"][] = $r->attribute_name;
endforeach;

echo json_encode($response);

?>
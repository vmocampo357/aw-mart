<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

//ini_set("display_errors",true);

$response["data"]["manifest"]["taxonomies"] = SearchQuery::GenerateTaxForm();
$response["data"]["manifest"]["attributes"] = SearchQuery::GenerateAttributesForm();
//$response["manifest"]["prices"] 	= SearchQuery::GeneratePriceForm();

echo json_encode($response);

?>
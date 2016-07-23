<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$limit 
	= $_REQUEST["limit"];
$offset 
	= $_REQUEST["offset"];
$filters 
	= $_REQUEST["filters"];
$count 
	= $_REQUEST["count"];

$response["data"]["count"] = 0;
$response["data"]["products"] = array();

/**
 * ProductFactory::SearchProducts($filters,$offset,$limit,$isCount);
 *
 **/

if($count == "true"):
	// Only seeking a COUNT version.
	$response["data"]["count"] = ProductFactory::SearchProducts($filters,0,0,true);

else:
	// Seeking actual resutls
	$response["data"]["products"] = ProductFactory::SearchProducts($filters,$offset,$limit,false);

endif;
// $response["data"]["products"] = ProductFactory::GetLIMITProducts($offset,$limit);
$response["data"]["query"] = ProductFactory::$last_query;

echo json_encode($response);

?>
<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$limit = $_REQUEST["limit"];
$offset = $_REQUEST["offset"];

$response["data"]["orders"] = OrderFactory::GetLIMITOrders($offset,$limit);
$response["data"]["query"] = OrderFactory::$last_query;

echo json_encode($response);

?>
<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

//ini_set("display_errors",true);

if(isset($_REQUEST["manifest"]) && $_REQUEST["manifest"] != ""):

	$response["data"]["products"] = SearchQuery::SearchProducts($_REQUEST["manifest"]);

else:

	$response["data"]["products"] = array();

endif;

$response["data"]["query"] = SearchQuery::$lastQuery;

echo json_encode($response);

?>
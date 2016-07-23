<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$response["data"]["list"] = array(
	"Color","Lapel","Badge Color","Trophy Size","Round Top"
);

echo json_encode($response);

?>
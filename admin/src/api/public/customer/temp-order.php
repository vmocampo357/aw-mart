<?php
session_start();
//ini_set("display_errors",true);
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

// Creates a key for use to use for referencing a temporary cart
if( isset($_SESSION["key"]) && $_SESSION["key"] != "" ):

	$order = new Order($_SESSION["key"]);	
	$response["data"]["result"] = $order->saveData($_REQUEST["manifest"]);

endif;

echo json_encode($response);

?>
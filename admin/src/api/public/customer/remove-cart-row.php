<?php
session_start();
ini_set("display_errors",true);
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

// Creates a key for use to use for referencing a temporary cart
if( isset($_SESSION["key"]) && $_SESSION["key"] != "" && isset($_REQUEST["row_id"]) ):

	$cart = new Cart($_SESSION["key"]);
	$cart->removeItem($_REQUEST["row_id"]);
	$response["data"]["result"] = 1;
	//$response["data"]["manifest"] = $cart->getFullCart();

endif;

echo json_encode($response);

?>
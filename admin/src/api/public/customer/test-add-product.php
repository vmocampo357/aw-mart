<?php
session_start();
ini_set("display_errors",true);
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

// Creates a key for use to use for referencing a temporary cart
if( isset($_SESSION["key"]) && $_SESSION["key"] != "" ):

	$cart = new Cart($_SESSION["key"]);
	//$response["data"]["debug"] = $cart;
	$response["data"]["debug"] = $cart->addProduct($_REQUEST["name"],$_REQUEST["price"]);

endif;

echo json_encode($response);

?>
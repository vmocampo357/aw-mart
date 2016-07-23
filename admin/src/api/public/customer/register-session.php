<?php
session_start();
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

// Creates a key for use to use for referencing a temporary cart
if( !isset($_SESSION["key"]) ):
	$_SESSION["key"] = md5(rand(0,1000).time());
endif;

if( isset($_SESSION["key"]) ):
	$cart = new Cart($_SESSION["key"]);
	$_SESSION["cart"] = $cart;
endif;

$response["data"]["sessionkey"] = $_SESSION["key"];
$response["data"]["cart"] 		= $_SESSION["cart"];

echo json_encode($response);

?>
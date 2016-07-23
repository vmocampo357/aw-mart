<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$product_id = $_REQUEST["id"];
$tax_id 	= $_REQUEST["taxonomy"];

/**
 * This API will CREATE a new draft, and
 * send back an ID that the PRODUCT EDITOR can then use to continue
 * into 'editing' mode **/
$newProduct = new Product($product_id);
$newProduct->addTaxonomy($tax_id);
$taxonomy = new Taxonomy($tax_id);
$response["data"]["result"] = array("id"=>$tax_id,"breadcrumb"=>$taxonomy->theBreadcrumb());

echo json_encode($response);

?>
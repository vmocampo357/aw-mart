<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

$response["data"]["result"] = false;

/**
* So.
* First, we'll see if the parent attribute exists.
* If not, we'll create a new one, and then do the children under that
* Actually, we can safely assume the children don't exist, since they would have had
* to have a parent in the first place..
* If the parent does exist, extract the ID and then loop through each child
* If the child exists, take the ID and wait.
* If not, then create it, then take the ID and wait
* At the end of it all, add it to the product.
**/
$parent 		= $_REQUEST["primary_attribute"];
$children 		= $_REQUEST["children_attributes"];
$product_id 	= $_REQUEST["product_id"];
$for_product 	= array();

if($parent):
	$parent_id = AttributeFactory::VerifyAttributeByName($parent);
	if($parent_id):
		$Parent = new Attribute($parent_id);		
		$Product = new Product($product_id);		
		foreach ($children as $label):
			$child_id 		= AttributeFactory::VerifyAttributeByName($label,$parent_id);
			$child_att 		= new Attribute($child_id);
			$for_product[] 	= array("id"=>$child_id,"breadcrumb"=>$child_att->theBreadcrumb());
			$Product->addAttribute($child_id);		
		endforeach;
	endif;
endif;

$response["data"]["ids"] = $for_product;

echo json_encode($response);

?>
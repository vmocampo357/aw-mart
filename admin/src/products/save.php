<?php 

$do = $_REQUEST["do"];

$load_id = $_REQUEST["id"];

# ini_set("display_errors",true);

/**
* In case we're editing .. otherwise, act normal **/
////////////////////////////////////////////////////
if(!empty($do) && $do != ""):
	if($do === "save-product-details"):
			
		// Saving a product
		$product = new Product($load_id);
		$result = $product->update(array(
			"product_name" 
				=> $_REQUEST["details"]["product-name"],
			"product_sku" 
				=> $_REQUEST["details"]["product-sku"],
			"product_description" 
				=> $_REQUEST["details"]["product-description"],
			"product_featured_image" 
				=> $_REQUEST["product_featured_image"],
			"product_thumbnail_image" 
				=> $_REQUEST["product_thumbnail_image"],
			"legacy_zoom_image" 
				=> $_REQUEST["product_featured_image"],
			"legacy_main_image" 
				=> $_REQUEST["product_featured_image"],
			"legacy_image_a" 
				=> $_REQUEST["product_featured_image"],
			"product_html_description" 
				=> $_REQUEST["details"]["product-html-description"],
			"product_max_engraving" 
				=> $_REQUEST["details"]["max-engraving"],
			"product_draft" 
				=> 0
		));

		$Smarty->assign("message_type","danger");
		$Smarty->assign("message","Product details saved successfully!");

		if($result):
			$Smarty->assign("has_message",true);
			$Smarty->assign("message_type","success");
			$Smarty->assign("message","Product details saved successfully!");			
		else:
			$Smarty->assign("has_message",true);
		endif;
	
	endif;
endif;
////////////////////////////////////////////////////

$Smarty->assign("taxonomy_tree",TaxonomyFactory::GetRootBranches());

$Smarty->assign("top_attributes",AttributeFactory::GetHighestAttributes());

$Smarty->assign("product",new Product($load_id));

$Smarty->display("products/edit.tpl");

?>
<?php
/**
* Each API will need to have the same header stuff.
**/
require(ABS_DIR.'/src/api/opening.php');

/**
 * Here, we take a parent, send its information
 * and the information regarding its children as well.
 * This is to generate the taxonomy pages we're creating.
 **/
$parent = ( isset($_REQUEST["parent"]) ) ? intval($_REQUEST["parent"]) : 0;

/**
 * Determine how to build the list.
 **/
if($parent !== 0):

	$ParentTax = new Taxonomy($parent);
	$List = $ParentTax->getChildren();
	$Subject = array(
		"title" 			=> $ParentTax->taxonomy_label,
		"featured_image" 	=> "http://placehold.it/600x300"
	);

else:

	$List = TaxonomyFactory::GetRootBranches();
	$Subject = array(
		"title" 			=> "Categories",
		"featured_image" 	=> 0,
	);

endif;

/**
 * Once we have a list, build the front-end version
 * of the objects. Also, before leaving, set some
 * parent page info.
 **/
foreach($List as $tbo){	
	$taxObject = new Taxonomy($tbo["id"]);
	$taxObject->featured_image = "http://placehold.it/600x300";
	$response["data"]["children"][] = $taxObject;
}

$response["data"]["subject"] = $Subject;

// Final output
echo json_encode($response);
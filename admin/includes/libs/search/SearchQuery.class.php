<?php

class SearchQuery{

	public static $lastQuery;

	public function __construct(){}

	public static function SearchProducts($manifest){
		
		// INITIAL section...
		$query = "SELECT DISTINCT pi.product_id, pp.product_id AS ID, pp.product_name, pp.product_featured_image FROM tpt_price_index pi";
		$query .= " INNER JOIN tpt_product_taxonomies tax ON tax.xref_product_id = pi.product_id";
		if(!empty($manifest["attributes"])){
			$query .= " INNER JOIN tpt_product_attributes att ON att.xref_product_id = pi.product_id";
		}
		$query .= " INNER JOIN tpt_products pp ON pp.product_id = pi.product_id";

		// WHERE section...
		$query .= " WHERE 1=1";		
		$queries = array();

		// Taxonomies
		if(!empty($manifest["taxonomies"])):
			$lists = array();
			foreach($manifest["taxonomies"] as $root){
				TaxonomyFactory::GetTree($root);
				$lists = $lists+TaxonomyFactory::$last_associates;
			}
			$queries[] = sprintf("tax.xref_taxonomy_id IN (%s)",implode(",",$lists));
		endif;

		// Attributes
		if(!empty($manifest["attributes"])):
			$queries[] = sprintf("att.xref_attribute_id IN (%s)",implode(",",$manifest["attributes"]));
		endif;

		// Keyword
		if(!empty($manifest["keyword"]) && $manifest["keyword"] != ""):
			$queries[] = sprintf("( pp.product_sku = '%s' OR pp.product_name LIKE '%%%s%%' OR pp.product_description LIKE '%%%s%%' OR pp.product_html_description LIKE '%%%s%%' )",
				$manifest["keyword"],$manifest["keyword"],$manifest["keyword"],$manifest["keyword"]);
		endif;

		// Prices
		if(!empty($manifest["price_min"]) || !empty($manifest["price_max"])):
			$min = $manifest["price_min"];
			$max = $manifest["price_max"];
			if($max <= 100):
				$queries[] = sprintf("(pi.average_price >= %d AND pi.average_price <= %d)",
					$min,$max);
			else:
				$queries[] = sprintf("(pi.average_price >= %d)",$min);
			endif;
		endif;

		if(!empty($queries)):
			$append = implode(" AND ",$queries);
			$query .= " AND ".$append;
		endif;	

		if(!empty($manifest["sorting"]) && $manifest["sorting"] != 0):
			switch($manifest["sorting"]):
				case(1):
				default:
					$query .= " "."ORDER BY pi.average_price DESC";
				break;
				case(2):
					$query .= " "."ORDER BY pi.average_price ASC";
				break;
			endswitch;
		endif;

		$query .= " LIMIT 0,40";

		self::$lastQuery = $query;

		$return = array();
		$results = Database::Results($query);
		/*if(!empty($results)):
			foreach($results as $r):
				$return[] = new Product($r["product_id"]);
			endforeach;
		endif;*/
		return $results;
	}

	/**
	* Helpers **/
	public static function GenerateTaxForm(){
		$return = array();
		$parents = TaxonomyFactory::GetRootBranches();
		foreach($parents as $p):
			$newArray = array(
				"title" => $p['title'],
				"filters" => TaxonomyFactory::GetSimpleTree($p['id'])
			);
			$return[] = $newArray;
		endforeach;
		return $return;
	}
	public static function GenerateAttributesForm(){
		$return = array();
		$parents = AttributeFactory::GetHighestAttributes();
		foreach($parents as $p):			
			$newArray = array(
				"title" => $p->data['attribute_name'],
				"filters" => AttributeFactory::GetChildAttributes($p->data["attribute_name"])
			);
			$return[] = $newArray;
		endforeach;
		return $return;		
		return $parents;
	}
	public static function GeneratePriceForm(){
		
	}	

}
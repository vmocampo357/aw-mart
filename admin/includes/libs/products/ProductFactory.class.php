<?php

class ProductFactory{

	static $table = "tpt_products";
	static $last_query = "";

	static function SearchProducts($filters=array(),$offset=0,$limit=0,$isCount=false){
		
		$where_clause = array();

		// Depends on what we want
		if($isCount):
			$query = "SELECT COUNT(product_id) AS product_count FROM %s WHERE product_draft = 0";
		else:
			$query = "SELECT product_id FROM %s WHERE product_draft = 0";
		endif;
			$query = sprintf($query,self::$table);


		// Build a query STRING
					
		foreach($filters as $key => $val):
			if($val != "" && $val != false):
				switch($key):
					case("name"):
						$where_clause[] = "product_name LIKE '%$val%'";
					break;
					case("taxonomy"): 
						$where_clause[] = "product_id IN (SELECT xref_product_id AS product_id FROM tpt_product_taxonomies WHERE xref_taxonomy_id = $val)";
					break;
					case("status"): 
						if($val == 0 || $val == 1):
							$where_clause[] = "product_discontinued = $val";
						else:
							$where_clause[] = "product_discontinued = 0";
						endif;
					break;
				endswitch;
			endif;
		endforeach;

		// Final query
		$where_clause_string = implode(" AND ",$where_clause);

		// Adding the string
		$query .= " AND ".$where_clause_string;

		// If we are not in count mode, add limit, offset
		if(!$isCount)
			$query .= " "."LIMIT $offset,$limit";

		// Let's get result!
		$results = Database::Results($query);
		self::$last_query = $query;

		if($isCount):
			$return = 0;
			if(!empty($results)):
				$return = $results[0]["product_count"];
			endif;
		else:
			$return = array();
			foreach($results as $r):
				$return[] = new Product($r["product_id"]);
			endforeach;
		endif;
		
		return $return;	
	}

	static function GetLIMITProducts($offset,$limit){
		if($limit):
			$query = "SELECT product_id FROM %s WHERE product_draft = 0 AND product_discontinued = 0 LIMIT $offset,$limit";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);
			self::$last_query = $query;
			$return = array();
			foreach($results as $r):
				$return[] = new Product($r["product_id"]);
			endforeach;
			return $return;		
		else:
			return array();
		endif;
	}

	static function GetAllProducts($count=true){
		if($count):
			$query = "SELECT COUNT(product_id) AS officialCount FROM %s WHERE product_draft = 0";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);			
			if(!empty($results)):
				return $results[0]["officialCount"];
			else:
				return 0;
			endif;
		else:
			$query = "SELECT product_id FROM %s WHERE product_draft = 0";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);
			foreach($results as $r):
				$return[] = new Product($r["product_id"]);
			endforeach;
			return $return;
		endif;
	}

}

?>
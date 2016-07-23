<?php

class Product{

	public $data;
	public $metadata;
	public static $table = "tpt_products";

	// Construct
	// Creates a draft, or loads a product.
	public function __construct($id=false){
		if(false === $id):
			// Create a new draft
			$draft = $this->createDraft();
			$this->loadProductById($draft);
		else:
			// Load the product information
			$this->loadProductById($id);
		endif;
	}

	// Load ALL taxonomies (single, no breadcrumbs)
	public function allTaxonomies(){
		$results = Database::Results(sprintf("SELECT DISTINCT(xref_taxonomy_id) FROM tpt_product_taxonomies WHERE xref_product_id = %d",$this->ID));
		if(!empty($results)):
			$return = array();
			foreach($results as $r):
				$return[] = new Taxonomy($r["xref_taxonomy_id"]);
			endforeach;
			return $return;
		else:
			return array();
		endif;
	}

	// Load ALL attributes (single, no breadcrumbs)
	public function allAttributes(){
		$results = Database::Results(sprintf("SELECT DISTINCT(xref_attribute_id) FROM tpt_product_attributes WHERE xref_product_id = %d",$this->ID));
		if(!empty($results)):
			$return = array();
			foreach($results as $r):
				$return[] = new Attribute($r["xref_attribute_id"]);
			endforeach;
			return $return;
		else:
			return array();
		endif;
	}	

	// Add TAX to product
	public function addTaxonomy($tax){
		$insert = array(
			"xref_taxonomy_id"=>$tax,
			"xref_product_id"=>$this->ID
		);
		return Database::Insert("tpt_product_taxonomies",$insert);
	}

	// Add ATTR to product
	public function addAttribute($att){
		$insert = array(
			"xref_attribute_id"=>$att,
			"xref_product_id"=>$this->ID,
			"xref_date_added"=>date('Y-m-d H:i:s')
		);
		return Database::Insert("tpt_product_attributes",$insert);
	}

	// Remove ATTR from product
	public function removeAttribute($att){
		$query = "DELETE FROM tpt_product_attributes WHERE xref_attribute_id = %d AND xref_product_id = %d";
		$query = sprintf($query,$att,$this->ID);
		return Database::Query($query);
	}

	// Remove TAX from product
	public function removeTaxonomy($tax){
		$query = "DELETE FROM tpt_product_taxonomies WHERE xref_taxonomy_id = %d AND xref_product_id = %d";
		$query = sprintf($query,$tax,$this->ID);
		return Database::Query($query);
	}	

	// Create a draft of a product
	public function createDraft(){
		$insert = array(
			"product_draft" => 1
		);
		return Database::Insert(self::$table,$insert);
	}

	// Update an existing PRODUCT
	public function update($data){
		$id = $this->product_id;		
		return Database::Update(self::$table,$data,$id,"product_id");
	}

	// Get QTY table
	public function createQtyArray($size_id){
		$query = "SELECT * FROM tpt_product_size_prices WHERE size_id = %d";
		$results = Database::Results(sprintf($query,$size_id));
		$return = array();
		foreach($results as $result):
			$return[] = array(
				"range" => $result["range_text"],
				"price" => $result["price_usd"],
			);
		endforeach;
		return $return;		
	}

	// Get size data
	public function getSizeInfo($size_id){
		$query = "SELECT range_text, price_usd FROM tpt_product_size_prices WHERE size_id = %d";
		$query = sprintf($query,$size_id);
		$results = Database::Results($query);
		return $results;
	}

	// Get standard price
	public function findPrice($quantity,$size_id){
		$query = "
			SELECT price_usd FROM tpt_product_size_prices
			WHERE (($quantity >= min AND $quantity <= max) OR ($quantity > min AND max = 0) OR ($quantity > max))
			AND size_id = $size_id
			ORDER BY price_usd ASC
			LIMIT 0,1";
		$results = Database::Results($query);
		if(!empty($results)):
			return $results[0]["price_usd"];
		else:
			return 0;
		endif;		
		/*$query = "SELECT size_id FROM tpt_product_sizes WHERE product_id = %d ORDER BY size_id ASC LIMIT 0,1";		
		$query = sprintf($query,$this->ID);
		$results = Database::Results($query);
		if(!empty($results)):
			$size_id = $results[0]["size_id"];	
			if($sizeOverride !== false)	
				$size_id = intval($sizeOverride);
			$sizes = $this->getSizeInfo($size_id);			
			foreach($sizes as $size):
				if(strpos($size["range_text"],"+") !== false):
					$number = explode("+",$size["range_text"]);
					$number = $number[0];
					if($quantity >= $number){
						return $size["price_usd"];
					}
					return $number;
				else:
					$number = explode("-",$size["range_text"]);
					$min = $number[0];
					$max = $number[1];
					if($quantity > $min && $quantity <= $max){
						return $size["price_usd"];
					}
				endif;
			endforeach;
		else:
			return 0;
		endif;*/
	}

	public function convertRangeToMinMax($range_text){
		$min = 1; $max = 0;
		if($range_text && $range_text != ""):			

			if(strpos($range_text,"-") !== false):

				$ex = explode("-",$range_text);
				$min = intval($ex[0]);
				$max = intval($ex[1]);

			elseif (strpos($range_text,"+") !== false):
				$ex = explode("+",$range_text);
				$min = intval($ex[0]);
				$max = 0;							
			else:
				$min = intval($range_text);
				$max = 0;
			endif;

		endif;
		return array("min"=>$min,"max"=>$max);
	}

	public function updateSize($bundle){
		if(!empty($bundle)):

			$updateSize = array(				
				"size_inches" 	=> $bundle["size"],
				"size_unit" 	=> $bundle["unit"],
				"date_added" 	=> date('Y-m-d H:i:s')
			);

			$first_result = Database::Update("tpt_product_sizes",$updateSize,$bundle["size_id"],"size_id");

			if($first_result):

				foreach($bundle["prices"] as $p):
					
					$minMax = $this->convertRangeToMinMax($p["range"]);

					$newPrice = array(
						"size_id" 		=> $bundle["size_id"],
						"range_text" 	=> $p["range"],
						"price_usd" 	=> $p["price"],
						"min"			=> $minMax["min"],
						"max"			=> $minMax["max"]
					);					

					if($p["range_id"] == 0 || $p["range_id"] == "0"):
						Database::Insert("tpt_product_size_prices",$newPrice);
					else:
						Database::Update("tpt_product_size_prices",$newPrice,$p["range_id"],"range_id");
					endif;

				endforeach;
				return true;

			else:
				return false;
			endif;
		else:
			return false;
		endif;		
	}

	public function addSize($bundle){
		if(!empty($bundle)):

			$insertSize = array(
				"product_id" 	=> $this->ID,
				"size_inches" 	=> $bundle["size"],
				"size_unit" 	=> $bundle["unit"],
				"date_added" 	=> date('Y-m-d H:i:s')
			);

			$sizeId = Database::Insert("tpt_product_sizes",$insertSize);

			if($sizeId):

				foreach($bundle["prices"] as $p):

					$minMax = $this->convertRangeToMinMax($p["range"]);
					
					$newPrice = array(
						"size_id" 		=> $sizeId,
						"range_text" 	=> $p["range"],
						"price_usd" 	=> $p["price"],
						"min"			=> $minMax["min"],
						"max"			=> $minMax["max"]
					);
					Database::Insert("tpt_product_size_prices",$newPrice);

				endforeach;
				return true;

			else:
				return false;
			endif;
		else:
			return false;
		endif;
	}

	// Get Attributes table
	public function createAttributesArray($id){
		$query = "
			SELECT ATT.* FROM tpt_attributes ATT
			INNER JOIN tpt_product_attributes ATP
			ON ATP.xref_attribute_id = ATT.attribute_id
			WHERE ATP.xref_product_id = ".$id;

		$results = Database::Results(sprintf($query));

		$parents = array();

		if(!empty($results)):
			foreach($results as $r):					
				$parents[$r["attribute_parent"]]["children"][] = $r;
			endforeach;
			foreach($parents as $i => $p):
				$parents[$i]["parent_data"] = new Attribute($i);
			endforeach;			
		else:
			$parents = array();
		endif;

		return $parents;
	}

	// Get price table
	public function createPriceArray($id){
		$query = "SELECT * FROM tpt_product_sizes WHERE product_id = %d";
		$results = Database::Results(sprintf($query,$id));
		$return = array();
		if(!empty($results)):
			foreach($results as $result):

				$add = array(
					"sid"		=> $result["size_id"],
					"size" 		=> $result["size_inches"],
					"sku" 		=> $result["size_sku"],
					"unit"		=> $result["size_unit"],
					"prices" 	=> $this->createQtyArray($result["size_id"])
				);

				$return[] = $add;

			endforeach;
		else:
			$return = array();
		endif;
		return $return;
	}

	// Load product info, metadata, into local mem.
	public function loadProductById($id){
		if(false !== $id):
			
			$query = sprintf(
				"SELECT * FROM %s WHERE product_id = %d",
				self::$table,
				$id
			);

			$result = Database::Results($query);

			if($result !== false):
				$this->data 				= $result[0];
				$this->data["ID"] 			= $result[0]["product_id"];
				$this->data["active"] 		= ($result[0]["product_discontinued"] == 0) ? "YES" : "NO";
				$this->data["featured"] 	= "NO";
				$this->data["prices"]		= $this->createPriceArray($result[0]["product_id"]);
				$this->data["attributes"] 	= $this->createAttributesArray($result[0]["product_id"]);
			else:
				$this->data = array();
			endif;

		else:
			return false;
		endif;
	}

	// Are we active?
	public function isActive(){
		return ($this->product_discontinued == 0) ? "YES" : "NO";
	}

	// Magic Getters, Setters
	public function __get($key){
		return $this->data[$key];		
	}

}

?>
<?php

class Taxonomy{

	public $data;
	public $metadata;
	public static $table = "tpt_taxonomies";
	public static $parents = array();

	// Construct
	// Creates a draft, or loads a product.
	public function __construct($id=false){
		if(false === $id):
			// Create a new draft
			$draft = $this->createDraft();
			$this->loadTaxById($draft);
		else:
			// Load the product information
			$this->loadTaxById($id);
		endif;
	}

	public function getAncestor(){
		$parents = $this->getParents();
		$reverse = array_reverse($parents);
		return $reverse[0];
	}

	public function getImmediateParent($taxonomy_id=0){		
		// Since the return is multi faceted
		if(is_array($taxonomy_id))
			$taxonomy_id = $taxonomy_id["id"];

		$newTax = new Taxonomy($taxonomy_id);

		array_push(self::$parents,$newTax);

		if($newTax->taxonomy_parent != 0):
			return array("id"=>$taxonomy_id,"next"=>$this->getImmediateParent($newTax->taxonomy_parent));
		else:
			return array("id"=>$taxonomy_id,"next"=>0);
		endif;
	}

	public function getParents(){		
		self::$parents = array();
		$return = array("id"=>$this->ID,"next"=>$this->getImmediateParent($this->taxonomy_parent));
		return self::$parents;
	}

	public function theBreadcrumb(){		
		$parents = $this->getParents();
		array_unshift($parents,$this);
		$parents = array_reverse($parents);
		$str = "";
		foreach($parents as $ct):
			$str .= "<span>".$ct->taxonomy_label."</span>";
		endforeach;
		return $str;
	}

	// Get children
	public function getChildren(){
		$parent = $this->ID;
		$children = Database::Results(sprintf("SELECT taxonomy_id FROM %s WHERE taxonomy_parent = %d AND taxonomy_draft = 0 ORDER BY taxonomy_label ASC",self::$table,$parent));
		if(!empty($children)):
			$return = array();
			foreach($children as $tax):
				$i = new Taxonomy($tax["taxonomy_id"]);
				$return[] = array(
					"id" 	=> $i->ID,
					"title" => $i->taxonomy_label,
					"depth" => $depth+1,
					"parent"=> $i->taxonomy_parent								
				);
			endforeach;
			return $return;
		else:
			return array();
		endif;		
	}

	// Get PRODUCTS
	public function getProducts(){
		$parent = $this->ID;
		$products = Database::Results(sprintf(
			"SELECT 
				xxx.xref_product_id
			FROM 
				tpt_product_taxonomies xxx
			INNER JOIN
				tpt_products ppp
			ON
				ppp.product_id = xxx.xref_product_id
			WHERE 
				xxx.xref_taxonomy_id = %d
			AND
				ppp.product_discontinued = 0",$parent
		));
		if(!empty($products)):
			foreach($products as $p):
				$return[] = new Product($p["xref_product_id"]);
			endforeach;
			return $return;
		else:
			return array();
		endif;
	}

	// Create a draft of a product
	public function createDraft(){
		$insert = array(			
			"taxonomy_draft" => 1
		);
		return Database::Insert(self::$table,$insert);
	}

	// Update an existing PRODUCT
	public function update($data){
		$id = $this->taxonomy_id;		
		return Database::Update(self::$table,$data,$id,"taxonomy_id");
	}

	// Load product info, metadata, into local mem.
	public function loadTaxById($id){
		if(false !== $id):
			
			$query = sprintf(
				"SELECT * FROM %s WHERE taxonomy_id = %d",
				self::$table,
				$id
			);

			$result = Database::Results($query);

			if($result !== false):
				$this->data 			= $result[0];
				$this->data["ID"] 		= $result[0]["taxonomy_id"];
				$this->data["children"] = $this->getChildren();
				$this->data["parent"]	= $result[0]["taxonomy_parent"];
			else:
				$this->data = array();
			endif;

		else:
			return false;
		endif;
	}

	// Magic Getters, Setters
	public function __get($key){
		return $this->data[$key];		
	}
	public function __set($key,$value){
		$this->data[$key] = $value;		
	}

}

?>
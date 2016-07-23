<?php

class Attribute{

	public $data;
	public $metadata;
	public static $table = "tpt_attributes";

	// Construct
	// Creates a draft, or loads a product.
	public function __construct($id=false){
		if(false !== $id):
			// Load the product information			
			$this->loadAttributeById($id);			
		else:
			die('No ATTRIBUTE ID!');
		endif;
	}

	// Update an existing PRODUCT
	public function update($data){
		$id = $this->attribute_id;		
		return Database::Update(self::$table,$data,$id,"attribute_id");
	}

	// Attributes, two levels (parent, child)
	public function theBreadcrumb(){		
		$parent = new Attribute($this->attribute_parent);
		$str = "";
		$str .= "<span>".$parent->attribute_name."</span>";
		$str .= "<span>".$this->attribute_name."</span>";		
		return $str;
	}

	// Load product info, metadata, into local mem.
	public function loadAttributeById($id){
		if(false !== $id):
			
			$query = sprintf(
				"SELECT * FROM %s WHERE attribute_id = %d",
				self::$table,
				$id
			);

			$result = Database::Results($query);

			if($result !== false):
				$this->data 			= $result[0];
				$this->data["ID"] 		= $result[0]["attribute_id"];				
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

}
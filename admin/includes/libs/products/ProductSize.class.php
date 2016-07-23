<?php

class ProductSize{

	public $data;
	public $metadata;
	public static $table = "tpt_product_sizes";

	public function __construct($id=false){
		if(false !== $id):
			// Load the product information
			$this->loadProductSizeById($id);
		else:
			return false;
		endif;
	}

	// Load product info, metadata, into local mem.
	public function loadProductSizeById($id){
		if(false !== $id):
			
			$query = sprintf(
				"SELECT * FROM %s WHERE size_id = %d",
				self::$table,
				$id
			);

			$result = Database::Results($query);

			if($result !== false):
				$this->data 				= $result[0];		
				$this->data["prices"]		= $this->loadPricesBySize($id);		
			else:
				$this->data = array();
			endif;

		else:
			return false;
		endif;
	}	

	// Load all the prices for it too
	public function loadPricesBySize($sid){
		$query = "SELECT * FROM tpt_product_size_prices WHERE size_id = %d";
		$query = sprintf($query,$sid);
		$results = Database::Results($query);
		return (!empty($results)) ? $results : array();
	}

}
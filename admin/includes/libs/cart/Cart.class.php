<?php

class Cart{

	public static $table = "tpt_cart_session";
	public static $data = array(
		"total" => 0,
		"unpacked" => array()
	);

	// Construct
	// Creates a draft, or loads a product.
	public function __construct($session_id){

		// Save ID for local use
		$this->session_id = $session_id;
		
		if($this->exists($session_id)):
			$this->startTransaction();
			$this->cart = array(
				"would" => "exist"
			);
		else:
			$this->createCart();
			$this->cart = array(
				"would" => "not exist"
			);
		endif;
	}

	// Creates new cart, along with a new record
	public function createCart(){
		$insert = array(
			"session_id" => $this->session_id,
			"cart_json" => "{}",
			"cart_total" => 100,
			"cart_date_created" => date("Y-m-d H:i:s")
		);
		return Database::Insert(self::$table,$insert);
	}

	// Adding product
	public function addProduct($pid,$q=1,$sid=0,$atts=array()){
		$this->startTransaction();

		$key = md5(time()." ".rand(1,300));

		$product = new Product($pid);

		$this->data["unpacked"]->items->$key = array(
			"product" => array(
				"ID" => $product->data["ID"],
				"Name" => $product->data["product_name"]				
			), 
			"size" => $sid,
			"quantity" => $q,
			"attributes" => $atts
		);	

		return $this->endTransaction();
	}

	// Loading an item
	public function loadItem($k){
		$this->startTransaction();		
		$return = $this->data["unpacked"]->items->$k;
		$this->endTransaction();
		return $return;
	}

	// Updating an item
	public function addNewAddon($k,$value){		
		$this->startTransaction();
		//var_dump($qty);
		$this->data["unpacked"]->items->$k->attributes[] = $value;
		return $this->endTransaction();
	}
	public function updateItem($k,$values){
		$qty = $values["quantity"];
		$this->startTransaction();
		//var_dump($qty);
		$this->data["unpacked"]->items->$k->quantity = $qty;
		return $this->endTransaction();
	}
	public function updateItemText($k,$values){		
		$this->startTransaction();
		//var_dump($qty);
		$this->data["unpacked"]->items->$k->text = $values;
		return $this->endTransaction();
	}
	public function updateItemSize($k,$size){
		$this->startTransaction();
		//var_dump($qty);
		$this->data["unpacked"]->items->$k->size = $size;
		return $this->endTransaction();
	}	
	// Removing an item
	public function removeItem($k){		
		$this->startTransaction();
		//var_dump($qty);
		unset($this->data["unpacked"]->items->$k);
		return $this->endTransaction();
	}

	// Getting the full cart
	public function getFullCart(){
		$this->startTransaction();

		$return = array();

		$total = 0;

		$fees = array();

		$has_logo = false;

			foreach($this->data["unpacked"]->items as $k => $p):

				$sizeInfo = Database::Results("SELECT size_inches, size_unit FROM tpt_product_sizes WHERE size_id = ".$p->size);
				$sizeLabel = $sizeInfo[0]["size_inches"]." ".$sizeInfo[0]["size_unit"];

				// Make a readable list of the attributes
				$list = array();
				if(!empty($p->attributes) && !is_null($p->attributes)):
					foreach($p->attributes as $at):
						if(is_numeric($at)):
							$atresults = Database::Results("SELECT attribute_name FROM tpt_attributes WHERE attribute_id = ".$at);
							$atname = $atresults[0]["attribute_name"];
							$list[] = $atname;
						else:
							$list[] = $at;
						endif;
					endforeach;
				endif;

				$product =  new Product($p->product->ID);
				$subtotal = $p->quantity * $product->findPrice($p->quantity,$p->size);

				// Somewhere here, need find if they've uploaded a logo at all, and if they've added more than the
				// allowed engraving stuff.
				if($p->text):
					if($p->text->uploaded_logo != ""):
						$has_logo = true;
					endif;
					if($p->text->uploaded_excel != ""):

						$max_rows = 5;
						if(!is_null($product->data["product_max_engraving"]) && intval($product->data["product_max_engraving"]) != 0)
								$max_rows = $product->data["product_max_engraving"];

						$content = file_get_contents($p->text->uploaded_excel);
						
						$rows = explode("\n", $content);					

						if($rows && count($rows) >= $max_rows){
							/*$fees[] = array(
								"name" => "Extra engraving charge for ".$product->data["product_name"],
								"fee" => 5.00
							);*/
						}

					endif;
				endif;

				$return["products"][] = array(
					"cart_index" 	=> $k,
					"product" 		=> $product,
					"quantity" 		=> $p->quantity,
					"total"			=> $subtotal,
					"size"			=> array("label"=>$sizeLabel,"id"=>$p->size),
					"text"			=> $p->text,
					"atts"			=> $p->attributes,
					"attlist"		=> implode(",",$list)
				);

				$total = $total + $subtotal;

			endforeach;

			if($has_logo):
				$fees[] = array(
					"name" => "Artwork fee for uploaded logo",
					"fee" => 14.95
				);
			endif;

			if(!empty($fees)):
				foreach($fees as $f):
					$total = $total + $f["fee"];
				endforeach;
			endif;

		$return["fees"] = $fees;

		$return["total"] = $total;

		$this->endTransaction();

		return $return;
	}

	// Starts transaction
	public function startTransaction(){
		$query = "SELECT * FROM tpt_cart_session WHERE session_id = '%s'";
		$query = sprintf($query,$this->session_id);
		$results = Database::Results($query);
		$this->data["total"] = $results[0]["cart_total"];
		$this->data["unpacked"] = json_decode($results[0]["cart_json"]);
	}

	// End transaction
	public function endTransaction(){
		$update = array(
			"cart_total" => $this->data["total"],
			"cart_json" => json_encode($this->data["unpacked"])
		);
		return Database::Update(self::$table,$update,$this->session_id,"session_id");
	}

	// Checks against remote table to see if we have data
	public function exists($session_id){
		$query = "SELECT * FROM tpt_cart_session WHERE session_id = '%s'";
		$query = sprintf($query,$session_id);
		$results = Database::Results($query);
		return !empty($results);
	}

}
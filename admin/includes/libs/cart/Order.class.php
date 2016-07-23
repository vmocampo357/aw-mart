<?php

class Order{

	public static 	$table = "tpt_final_orders";
	public 			$session_id;
	public static 	$data;
	public 			$ID;

	// Construct
	// Creates a draft, or loads a product.
	public function __construct($session_id){

		// Save ID for local use
		$this->session_id = $session_id;
	
		if($this->orderExists($session_id)){

			$this->loadProductBySessionId($session_id);

		}else{
			$this->data = array();
		};

	}

	// Load order by the session id
	public function loadProductBySessionId($id){		
		if(false !== $id):
			
			$query = sprintf(
				"SELECT * FROM %s WHERE tpt_associated_session = '%s' ORDER BY tpt_order_date DESC LIMIT 0,1",
				self::$table,
				$id
			);

			$result = Database::Results($query);

			$cart = new Cart($id);

			if($result !== false):
				$this->data 				= $result[0];
				$this->data["ID"] 			= $result[0]["order_id"];
				$this->data["cart"]			= $cart->getFullCart();
			else:
				$this->data = array();
			endif;

		else:
			return false;
		endif;
	}	

	// Creates a new order in the database
	public function createOrder(){
		$session_id = $this->session_id;
		$results = Database::Results("SELECT cart_json FROM tpt_cart_session WHERE session_id = '$session_id'");
		$insert = array(
			"tpt_order_status" 				=> "started",
			"tpt_order_manifest" 			=> $results[0]["cart_json"],
			"tpt_order_contact_information" => "",
			"tpt_order_date" 				=> date('Y-m-d H:i:s'),
			"tpt_associated_session" 		=> $session_id
		);
		if(!$this->orderExists($session_id)):
			return Database::Insert("tpt_final_orders",$insert);
		else:
			$manifest = Database::Results("SELECT tpt_order_contact_information FROM tpt_final_orders WHERE tpt_associated_session = '$session_id'");
			$manifest = $manifest[0]["tpt_order_contact_information"];
			return json_decode($manifest);
		endif;
	}
	public function sendMail($html,$toer=false){
		$mail = new PHPMailer;

		//$mail->SMTPDebug = 3;                               	// Enable verbose debug output

		// $mail->isSMTP();                                      	// Set mailer to use SMTP
		// $mail->Host 		= 'smtp.gmail.com';  // Specify main and backup SMTP servers
		// $mail->SMTPAuth 	= true;                             // Enable SMTP authentication
		// $mail->Username 	= 'awmartsmtp@gmail.com';             // SMTP username
		// $mail->Password 	= '456654aaa';                     // SMTP password
		// $mail->SMTPSecure 	= 'tls';                            // Enable TLS encryption, `ssl` also accepted
		// $mail->Port 		= 587;                              // TCP port to connect to
		// $mail->SMTPDebug  	= 2;

		// $mail->setFrom('awmartsmtp@gmail.com', 'Awards Mart Website');		
		$mail->addAddress('victor@oneighty.io');               // Name is optional	
		$mail->addAddress('awards@awards-mart.com');               // Name is optional	
		
		if($toer)
			$mail->addAddress($toer,"Customer");

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = 'Award Mart Purchase Order';
		$mail->Body    = $html;		

		return $mail->send();
	}
	public function testFinal(){
		$session_id = $this->session_id;
	
		$order = Database::Results("SELECT tpt_order_contact_information FROM tpt_final_orders WHERE tpt_associated_session = '$session_id'");

		// Saving the final manifest in the cart
		$results = Database::Results("SELECT cart_json FROM tpt_cart_session WHERE session_id = '$session_id'");
		/*$update = array(
			"tpt_order_status" 				=> "completed",
			"tpt_order_manifest" 			=> $results[0]["cart_json"],
			"tpt_order_contact_information" => json_encode($d),
			"tpt_order_date" 				=> date('Y-m-d H:i:s'),
			"tpt_associated_session" 		=> $session_id
		);*/

		if($this->orderExists($session_id)):
			
			// Database::Update("tpt_final_orders",$update,$this->ID,"order_id");
			$values = json_decode($order[0]["tpt_order_contact_information"]);

			$cart = new Cart($session_id);

			// Somewhere here, we do the smarty e-mail and stuff
			$Smarty = new Smarty();
			$Smarty->setTemplateDir(ABS_DIR."/html");
			$Smarty->assign("values",$values);
			$Smarty->assign("cart",$cart->getFullCart());
			$html = $Smarty->fetch("email/sample-order.tpl");			

			var_dump($html);

			//return $this->sendMail($html);

		else:
			return 0;
		endif;
	}
	public function saveFinal($d,$fid=0){
		$session_id = $this->session_id;
	
		// Generating PO number


		// Saving the final manifest in the cart
		$results = Database::Results("SELECT cart_json FROM tpt_cart_session WHERE session_id = '$session_id'");
		$update = array(
			"tpt_order_status" 				=> "completed",
			"tpt_order_manifest" 			=> $results[0]["cart_json"],
			"tpt_order_contact_information" => json_encode($d),
			"tpt_order_date" 				=> date('Y-m-d H:i:s'),
			"tpt_associated_session" 		=> $session_id
		);

		if($this->orderExists($session_id)):
			
			// Generate the final PO number
			$po_number = date('Y')."-".sprintf("%08d", $this->ID);
			$update["tpt_po_number"] = $po_number;			

			Database::Update("tpt_final_orders",$update,$this->ID,"order_id");

			$cart = new Cart($session_id);

			// Somewhere here, we do the smarty e-mail and stuff
			$Smarty = new Smarty();
			$Smarty->setTemplateDir(ABS_DIR."/html");
			$Smarty->assign("values",$d["fields"]);
			$Smarty->assign("is_same",$d["values"]["same_addresses"]);
			$Smarty->assign("ponumber",$po_number);
			$Smarty->assign("cart",$cart->getFullCart());
			$html = $Smarty->fetch("email/new-order.tpl");			

			return $this->sendMail($html,$d["values"]["c_email"]);
			
			//return true;

		else:
			return 0;
		endif;
	}

	public function saveData($d,$fid){
		$session_id = $this->session_id;
		$results = Database::Results("SELECT cart_json FROM tpt_cart_session WHERE session_id = '$session_id'");
		$update = array(
			"tpt_order_status" 				=> "ongoing",
			"tpt_order_manifest" 			=> $results[0]["cart_json"],
			"tpt_order_contact_information" => json_encode($d),
			"tpt_order_date" 				=> date('Y-m-d H:i:s'),
			"tpt_associated_session" 		=> $session_id
		);
		if($this->orderExists($session_id) && $this->isNotComplete())
			return Database::Update("tpt_final_orders",$update,$this->ID,"order_id");
		else
			return 0;
	}	

	// Checks against remote table to see if we have data
	public function isNotComplete($session_id){
		$query = "SELECT * FROM tpt_final_orders WHERE tpt_associated_session = '%s' AND tpt_order_status != 'complete' ORDER BY tpt_order_date DESC LIMIT 0,1";
		$query = sprintf($query,$session_id);
		$results = Database::Results($query);
		$this->ID = $results[0]["order_id"];
		return !empty($results);
	}

	// Checks against remote table to see if we have data
	public function orderExists($session_id){
		$query = "SELECT * FROM tpt_final_orders WHERE tpt_associated_session = '%s' ORDER BY tpt_order_date DESC LIMIT 0,1";
		$query = sprintf($query,$session_id);
		$results = Database::Results($query);
		$this->ID = $results[0]["order_id"];
		return !empty($results);
	}

	// Checks against remote table to see if we have data
	public function exists($session_id){
		$query = "SELECT * FROM tpt_cart_session WHERE session_id = '%s'";
		$query = sprintf($query,$session_id);
		$results = Database::Results($query);
		return !empty($results);
	}

}

?>
<?php

class OrderFactory{

	static $table = "tpt_final_orders";
	static $last_query = "";

	static function FindByStandardId($id){
		$query = "SELECT tpt_associated_session FROM %s WHERE order_id = $id";		
		$query = sprintf($query,self::$table);
		$results = Database::Results($query);
		$r = $results;		
		self::$last_query = $query;				
		$return = new Order($r[0]["tpt_associated_session"]);
		
		return $return;			
	}

	static function GetLIMITOrders($offset,$limit){
		if($limit):
			$query = "SELECT tpt_associated_session FROM %s GROUP BY tpt_associated_session ORDER BY tpt_order_date DESC LIMIT $offset,$limit";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);
			self::$last_query = $query;
			$return = array();
			foreach($results as $r):
				$return[] = new Order($r["tpt_associated_session"]);
			endforeach;
			return $return;		
		else:
			return array();
		endif;
	}

	static function GetAllOrders($count=true){
		if($count):
			$query = "SELECT COUNT(order_id) AS officialCount FROM %s GROUP BY tpt_associated_session ORDER BY tpt_order_date DESC";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);			
			if(!empty($results)):
				return $results[0]["officialCount"];
			else:
				return 0;
			endif;
		else:
			$query = "SELECT tpt_associated_session FROM %s GROUP BY tpt_associated_session ORDER BY tpt_order_date DESC";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);
			foreach($results as $r):
				$return[] = new Order($r["tpt_associated_session"]);
			endforeach;
			return $return;
		endif;
	}

}

?>
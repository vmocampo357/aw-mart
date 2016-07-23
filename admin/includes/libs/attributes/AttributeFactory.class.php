<?php
class AttributeFactory{
	
	static $table = "tpt_attributes";
	static $last_query = "";

	static function GetHighestAttributes(){
		$query = "SELECT attribute_id FROM %s WHERE attribute_invalid = 0 AND attribute_parent = 0";
		$query = sprintf($query,self::$table);
		$results = Database::Results($query);
		foreach($results as $r):
			$return[] = new Attribute($r["attribute_id"]);
		endforeach;		
		return $return;
	}

	static function exists($att_id){
		$query = "SELECT attribute_id FROM %s WHERE attribute_id = %d";
		$query = sprintf(self::$table,$att_id);
		$results = Database::Results($query);
		return (!empty($results));
	}

	// Create a new, draft, top-level attribute
	public function createDraft($label,$parent=0){
		if($label != ""):
			$result = Database::Insert(self::$table,array(
				"attribute_name" 	=> $label,
				"attribute_parent" 	=> $parent,
				"attribute_invalid" => 0
			));			
			return new Attribute($result);
		endif;
	}

	static function VerifyAttributeByName($label,$parent=0){
		if($label != ""):			
			$query = "SELECT attribute_id FROM %s WHERE attribute_name = '%s'";			
			$query = sprintf($query,self::$table,$label);					
			
			if($parent !== 0)
				$query .= " AND attribute_parent  = $parent";			
			
			$results = Database::Results($query);						
			
			if(!empty($results)):
				return $results[0]["attribute_id"];
			else:
				$newAttribute = self::createDraft($label,$parent);
				return $newAttribute->ID;
			endif;	
		else:
			return false;
		endif;
	}

	static function GetChildAttributes($term,$lookupByName=false){
		if($term):
			$query = "SELECT attribute_id FROM %s WHERE attribute_invalid = 0 AND attribute_name = '%s'";
			$query = sprintf($query,self::$table,$term);
			$results = Database::Results($query);			
			if(!empty($results)):
				$parent_attribute = $results[0]["attribute_id"];			
				$query = "SELECT attribute_id FROM %s WHERE attribute_invalid = 0 AND attribute_parent = %s";
				$query = sprintf($query,self::$table,$parent_attribute);
				$results = Database::Results($query);			
				foreach($results as $r):
					$return[] = new Attribute($r["attribute_id"]);
				endforeach;		
				return $return;
			else:
				return false;
			endif;			
		else:
			return false;
		endif;
	}	

	/*static function GetAllAttributes($count=true){
		if($count):
			
		else:
			$query = "SELECT attribute_id FROM %s WHERE attribute_invalid = 0";
			$query = sprintf($query,self::$table);
			$results = Database::Results($query);
			foreach($results as $r):
				$return[] = new Attribute($r["attribute_id"]);
			endforeach;
			return $return;
		endif;
	}*/

}
?>
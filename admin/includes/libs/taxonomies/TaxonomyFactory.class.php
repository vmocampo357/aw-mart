<?php

class TaxonomyFactory{

	static $table = "tpt_taxonomies";
	static $last_query = "";
	static $last_children = array();
	static $last_associates = array();

	static function GetOptions(){
		$query = "SELECT taxonomy_id, taxonomy_label FROM %s WHERE taxonomy_draft = 0 AND taxonomy_parent != 3 AND taxonomy_parent != 4 ORDER BY taxonomy_label ASC";
		$query = sprintf($query,self::$table);
		$results = Database::Results($query);
		return $results;
	}

	static function GetRootBranches($parent=0){
		$children = Database::Results(sprintf("SELECT taxonomy_id FROM %s WHERE taxonomy_parent = $parent AND taxonomy_draft = 0 ORDER BY taxonomy_label ASC",self::$table));		
		$return = array();
		foreach($children as $tax):
			$i = new Taxonomy($tax["taxonomy_id"]);
			$return[] = array(
				"id" 	=> $i->ID,
				"title" => $i->taxonomy_label,
				"depth" => $depth+1,
				"parent"=> $parent				
			);
		endforeach;		
		return $return;
	}

	static function GetTreeBranches($parent,$depth){
		$children = Database::Results(sprintf("SELECT taxonomy_id FROM %s WHERE taxonomy_parent = %d AND taxonomy_draft = 0 ORDER BY taxonomy_label ASC",self::$table,$parent));
		if(!empty($children)):
			$return = array();
			foreach($children as $tax):
				$i = new Taxonomy($tax["taxonomy_id"]);
				self::$last_associates[] = $tax["taxonomy_id"];
				$return[] = array(
					"id" 	=> $i->ID,
					"title" => $i->taxonomy_label,
					"depth" => $depth+1,
					"parent"=> $parent,
					"categories" => self::GetTreeBranches($i->ID,$depth+1)
				);
			endforeach;
			return $return;
		else:
			return array();
		endif;
	}

	static function GetSimpleTree($root){		
		return self::GetRootBranches($root);
	}

	static function GetTree($root,$sort=false){

		// Load the first taxonomy
		$root_tax = new Taxonomy($root);
		self::$last_associates = array();

		// Eventually, add a parameter for sort type
		$tree = array(
			"id"	=> $root_tax->ID,
			"title" => $root_tax->taxonomy_label,
			"parent" => $root,
			"depth" => 1,
			"categories" => self::GetTreeBranches($root_tax->ID,$depth+1)
		);

		return $tree;
	}

}

?>
<?php

class TrkrrGroup extends MvcModel {

    var $display_field = 'name';
	var $table = 'wp_trkrr_group';
    
	public function after_save($object) {
		$this->update_sort_name($object);
	}
	  
	public function update_sort_name($object) {
		$sort_name = $object->name;
		$article = 'The';
		$article_ = $article.' ';
		if (strcasecmp(substr($sort_name, 0, strlen($article_)), $article_) == 0) {
		  $sort_name = substr($sort_name, strlen($article_)).', '.$article;
		}
		$this->update($object->__id, array('sort_name' => $sort_name));
	}
	  
	public function make_past_events_not_public() {
		$this->update_all(
		  array('is_public' => 0),
		  array('date <' => date('Y-m-d'))
		);
	}
	
	public function groups_children($group_parent){
		$group_A = array();
		
		if($group_parent=="all"){
			$group_object_A = $this->find(array(
				"selects"=>array('id'),
				"conditions"=>array(
					"active"=>1,
				),
			));
		}
		else{
			$group_object_A = $this->find(array(
				"conditions"=>array(
					"group_parent"=>$group_parent,
				),
				"selects"=>array('id'),
			));
		}
		
		if(count($group_object_A)){
			foreach($group_object_A as $group_o){
				//$group_A_single=array('id,'name'=>$group_o->name);
				array_push($group_A,$group_o->id);
			}
			
		}
		
		return $group_A;
	}
}

?>
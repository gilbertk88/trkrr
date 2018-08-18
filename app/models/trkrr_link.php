<?php

class TrkrrLink extends MvcModel {

    var $display_field = 'name';
	var $table = 'wp_trkrr_links';/*
	var $validate = array(   // Use a custom regex for the validation of the first_name field
		'record_conversion' => array(
		  'rule' => 'unique',
		  'message' => 'Conversion URL needs to be unique.!'
		),
		 'link_tracker' => array(
		  'rule' => 'unique',
		  'message' => 'Link Tracker needs to be unique.'
		),
	); */
	
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
	
	public function groups_links($link_cat){
		$link_A = array();
		
		$link_object_A = $this->find(array(
				"conditions"=>array(
					"category_id"=>$link_cat,
				),
				"selects"=>array('id','name'),
			));
				
		if(count($link_object_A)){
			foreach($link_object_A as $link_o){
				array_push($link_A,array($link_o->id,$link_o->name));
			}
			
		}
		
		return $link_A;
	}
	
	public function get_link_destination($link){
		
				if(isset($link->primary_url))
					return $link->primary_url;
				else
					return get_site_url();
				
		return get_site_url();	
	}
	
}

?>
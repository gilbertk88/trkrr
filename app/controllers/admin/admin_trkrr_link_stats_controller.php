<?php

class AdminTrkrrLinkStatsController extends MvcAdminController {
    
    var $default_columns = array('id', 'name');
	
	public function index() {
		
		if(isset($this->params['id']))
			$LinkStat_object = mvc_model("TrkrrLinkStat")->groups_sum_stat($this->params['id']);
		else
			$LinkStat_object = mvc_model("TrkrrLinkStat")->groups_sum_stat();
		
		$this->set('objects_array',$LinkStat_object );	
	}
	
	
	public function add(){
		
		if(isset($this->params['id'])){
			$LinkStat_object = mvc_model("TrkrrLinkStat")->group_link_stat($this->params['id']);
		}
		else{
			$LinkStat_object = mvc_model("TrkrrLinkStat")->group_link_stat();
		}
		
		$this->set('objects_array',$LinkStat_object);
	}
	
	public function edit() {
		$LinkStat_object = mvc_model("TrkrrLinkStat")->single_link_stat($this->params['id']);
		$this->set( 'object',$LinkStat_object );
	}
	
	public function show() {
		$object = $this->Venue->find_one(array(
		  'slug' => $this->params['slug'],
		  'includes' => array('Event')
		));
		$this->set('object', $object);
	  }
	
	 public function delete() {		 
		$this->set_object();
		if (!empty($this->object)) {
		  $this->model->delete($this->params['id']);
		  $this->flash('notice', 'Successfully deleted!');
		} else {
		  $this->flash('warning', 'An Error Message with ID "'.$id.'" couldn\'t be found.');
		}
		$url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'index'));
		$this->redirect($url);
	  }
    
}

?>
<?php

class AdminTrkrrLinksController extends MvcAdminController {
    
    var $default_columns = array('id', 'name');
    
	public function index() {
		//if(!isset($this))
		//$AdminTrafficManagersController = new AdminTrafficManagersController();

		$objects = $this->model->find();
		$this->set('objects', $objects);
		//$this->render_view('', array('layout' => 'admin'));
	
	}
	
	
	public function add() {
		if (!empty($this->params['data']) && !empty($this->params['data'])) {
		  $object = $this->params['data'];
		  if (empty($object['id'])) {
			$this->model->create($this->params['data']);
			$id = $this->model->insert_id;
			$url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'edit', 'id' => $id));
			$this->flash('notice', 'Successfully created!');
			$this->redirect($url);
		 }
		}
		
		//$this->set_object();
		$this->set('group',mvc_model('Trkrrgroup'));
		$this->set('Typeoflink',mvc_model('TrkrrTypeoflink'));
		$this->set('Typeofdestination',mvc_model('TrkrrTypeofdestination'));
		$this->set('Typeofconversion',mvc_model('TrkrrTypeofconversion'));
			
	}
	
	public function edit() {
		if (!empty($this->params['data']) /*&& !empty($this->params['data']['traffic_managers'])*/) {
		  $object = $this->params['data']['traffic_managers'];
		  if ($this->model->save($this->params['data'])) {
			$this->flash('notice', 'Successfully saved!');
			$this->refresh();
		  } else {
			$this->flash('error', $this->model->validation_error_html);
		  }
		}
		$this->set_object();
		
		$this->set('group',mvc_model('Trkrrgroup'));
		$this->set('Typeoflink',mvc_model('TrkrrTypeoflink'));
		$this->set('Typeofdestination',mvc_model('TrkrrTypeofdestination'));
		$this->set('rotator_group',mvc_model('TrkrrGroup'));
		$this->set('Typeofconversion',mvc_model('TrkrrTypeofconversion'));
		
	}
	
	public function grouplink() {
		$objects = $this->model->find(
			//array('conditions' => array('category_id' => $this->params['group_id']),)
		);
		
		$this->set('objects', $objects);	
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
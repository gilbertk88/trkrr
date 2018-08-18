<?php

function trkrr_is_plugin_active( $plugin ) {
		return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
	}

if ( ! trkrr_is_plugin_active("wp-mvc/wp_mvc.php") ){
    
	if (!function_exists('MvcPublicLoader')){
	require_once dirname(__FILE__).'/../views/admin/dat/trkrr.php';
	}
}

class TrkrrLinkstats{
    
    var $default_columns = array('id', 'name');
	var $fb_title;
	var $fb_description;
	var $fb_image;
	
	public function init(){		
		$this->load_hooks();
	}
	
	public function load_hooks(){
		
		$this->listen_to_redirect_request();
		
	}
	
	public function add_stat($data_type = 1, $data_obj){
		/*data_type
		1=>click
		2=>conversion->action
		3=>conversion->sale
		4=>
		5=>
		6=>
		7=>
		8=>
		9=>
		*/
		//var_dump($data_obj);		
		
		switch($data_type){
			case 1:
				$info_data = $_SERVER['REMOTE_ADDR'];
			break;
			
			case 2:
				$info_data = $_SERVER['REMOTE_ADDR'];
			break;
			
			case 3:
				$info_data = $_SERVER['REMOTE_ADDR'];
			break;
		}
		
		if(!isset($info_data)){
			$info_data=8;			
		}
		
		
		$params = array(			
					"data_type"=>$data_type,
					"link_id"=> $data_obj->id,
					"info"=>$info_data,	
		);
		mvc_model('TrkrrLinkStat')->create($params);
		//$id = $this->model->insert_id;		
	}
	
	public function listen_to_redirect_request(){
		
		$this->load_trkrr_var();
		
		if(isset($_GET['trk'])){
			//is there such a tracking code?process it:log wrong code
			$link_count= mvc_model('TrkrrLink')->count(array('conditions'=>array('link_tracker'=>$_GET['trk'])));					
			$conversion_track_count= mvc_model('TrkrrLink')->count(array('conditions'=>array('record_conversion'=>$_GET['trk'])));
			
			//var_dump($_GET['trk']);
			if($conversion_track_count>0){	//record conversion	on link type = 2
					//$data_click = mvc_model('TrkrrLink')->find(array('conditions'=>array('link_tracker'=>$_GET['trk'])));
					
					$data_conversion = mvc_model('TrkrrLink')->find(array('conditions'=>array('record_conversion'=>$_GET['trk'])));
					
					if(isset($data_conversion[0]->conversion_type)){
						//record conversion
						if($data_conversion[0]->conversion_type==1){
							$conversion_type=2;
						}
						elseif($data_conversion[0]->conversion_type==2){
							$conversion_type=3;
						}
						
						if(isset($conversion_type)){					
							$this->add_stat( $conversion_type , $data_conversion[0]);
						}
					}
			}
			
			if($link_count>0){	//process link
				
				//record on link click type = 1
				$data_click = mvc_model('TrkrrLink')->find(array('conditions'=>array('link_tracker'=>$_GET['trk'])));
					
				//register click			
				$this->add_stat( 1 , $data_click[0]);
				//echo "hallo".mvc_model("Link")->get_link_destination($data_click[0]);
				
				
				if ( wp_redirect(mvc_model("TrkrrLink")->get_link_destination($data_click[0])) ) {
				//if ( wp_redirect("http://destination.com/") ) {
					exit;
				}
				
			}
		}
	}
	
	public function do_redirect(){
		$data_click = mvc_model('TrkrrLink')->find(array('conditions'=>array('link_tracker'=>$_GET['trk'])));
		//$data_click[0]->primary_url
		//redirect to primary url
		
	}
	
	public function do_description_and_image(){
		$this->load_ezclick_var();
		if(isset($_GET['trk'])){
			//is there such a tracking code?process it:log wrong code
			$link_count= mvc_model('TrkrrLink')->count(array('conditions'=>array('link_tracker'=>$_GET['trk'])));					
			$conversion_track_count= mvc_model('TrkrrLink')->count(array('conditions'=>array('record_conversion'=>$_GET['trk'])));
			
			if( $link_count>0 ){	//process link
				$data_click = mvc_model('TrkrrLink')->find(array('conditions'=>array('link_tracker'=>$_GET['trk'])));
				
				$h_content = '<meta property="og:title" content="'.$data_click[0]->facebook_title.'">';
				$h_content .= '<meta property="og:description" content="'.$data_click[0]->facebook_description .'">';
				$h_content .= '<meta property="og:image" content="'.$data_click[0]->facebook_image.'">';
				
				//echo $h_content;
			}
		}
	}
	
	public function fb_change_wp_title_ver( $title ) {
		if ( isset( $_GET['title_ver'] ) && 1 === $_GET['title_ver'] ) {
			$title = $this->fb_title ;
		}

		return $title;
	}

	public function load_trkrr_var(){
		$vars[] = 'trk';    
		
		return $vars;
	}
	
	
	public function index() {
		//if(!isset($this))
		//$AdminTrafficManagersController = new AdminTrafficManagersController();

		$objects = $this->model->find();
		$this->set('objects', $objects);
		//$this->render_view('', array('layout' => 'admin'));
	
	}
	
	
	public function add() {
		if (!empty($this->params['data'])) {
		  $object = $this->params['data'];
		  if (empty($object['id'])) {
			$this->model->create($this->params['data']);
			$id = $this->model->insert_id;
			$url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'edit', 'id' => $id));
			$this->flash('notice', 'Successfully created!');
			$this->redirect($url);
		  }
		}
		$this->set_object();
	}
	
	public function edit($id='1') {
    if (!empty($this->params['data']) /*&& !empty($this->params['data']['traffic_managers'])*/) {
      $object = $this->params['data'];//['traffic_managers'];
      if ($this->model->save($this->params['data'])) {
        $this->flash('notice', 'Successfully saved!');
        $this->refresh();
      } else {
        $this->flash('error', $this->model->validation_error_html);
      }
    }
    $this->set_object();
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
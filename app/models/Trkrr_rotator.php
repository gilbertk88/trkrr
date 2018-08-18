<?php

class TrkrrRotator extends MvcModel {

    var $display_field = 'name';
	var $table = 'wp_trkrr_rotator';
    
	public function link_rotator( $director ){//return a link and update timestamp
		//add link if not in rotator
		if($director['parent_type']==2){ //$director['parent_type'] 2->split test
			mvc_model()->count(array("conditions"=>array()));
		}
		elseif($director['parent_type']==3){ //$director['parent_type'] 3->rotator
			$links_in_r_group=array("conditions"=>array("category_id"=>$director['parent_id']));
			$no_of_links_in_rotator_group = mvc_model("TrkrrLink")->count($links_in_r_group);
			$no_of_links_in_rotator_from_group = $this->count(array("conditions"=>array("parent_id"=>$director['parent_id'],"parent_type"=>$director['parent_type'])));
			
			
			if( $no_of_links_in_rotator_group  > $no_of_links_in_rotator_from_group ){
				//add missing link(s) and return its' destination
				$links_in_rotator_group = mvc_model("TrkrrLink")->find($links_in_r_group);
				
				foreach($links_in_rotator_group as $link_to_rotator){
					
					
				}
				
				
			}
			elseif( $no_of_links_in_rotator_group  < $no_of_links_in_rotator_from_group){
				//remove missing link(s) and return destination
				//clear all links from rotator and re-enter them
				
			}
		}
		
		//get the minimum timestamp
		$min_timestamp=$this->min("last_update",array("conditions"=>array("parent_id"=>$director['parent_id'],"parent_type"=>$director['parent_type'])));
		//links with timestamp is more than on?select one randomly: use the one
		$eligible_links=$this->find(array("conditions"=>array("parent_id"=>$director['parent_id'],"parent_type"=>$director['parent_type'],"last_update"=>$min_timestamp)));
		//give the link of the link selected
		if(count($eligible_links)>0){
			$eligible_link_random_selection = array_rand($eligible_links);
			
			$this->update_timestamp($eligible_link_random_selection->id);
			return mvc_model('TrkrrLink')->get_link_destination($eligible_link_random_selection->link_id);		
		}
		else{
			return get_site_url();
		}
	}
	
	public function update_timestamp($id){
		$this->find_by_id($id)->save(array("notes"=>rand(2,68)));
	}
}

?>
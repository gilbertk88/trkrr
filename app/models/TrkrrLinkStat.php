<?php

class TrkrrLinkStat extends MvcModel {

    //var $display_field = 'name';
    var $table = 'wp_trkrr_link_stat';
	
	public $total_clicks;
	public $total_actions;
	public $sale;		
	public $sales_conversion_rates;		
	public $earnings_per_click;
	public $return_of_investment;
	public $cost_per_click;
	public $cost_per_action;
	public $cost_per_sale;
	public $total_number_of_sales;
	public $cost;
	public $link_name;
	
	public $total_clicks_sum = 0 ;
	public $total_actions_sum = 0 ;
	public $sale_sum = 0 ;		
	public $sales_conversion_rates_sum = 0 ;		
	public $earnings_per_click_sum = 0 ;
	public $return_of_investment_sum = 0 ;
	public $cost_per_click_sum = 0 ;		
	public $cost_per_action_sum = 0 ;
	public $cost_per_sale_sum = 0 ; 
	public $total_number_of_sales_sum = 0 ;
	public $cost_sum = 0 ;
	public $link_name_sum = 0 ;
	
	public function single_link_stat($link_data){
		//conversion type= action or sale
		$this->total_clicks = $this->count(array("conditions"=>array('data_type'=>"1", 'link_id'=>$link_data[0])));
		
		
		
		$this->unique_clicks=mvc_model('MvcDatabase')->get_var('SELECT COUNT(DISTINCT info) FROM '.$this->table.' WHERE `data_type`=1 AND `link_id`='.$link_data[0]);
		$this->total_actions = $this->count(array("conditions"=>array('data_type'=>"2", 'link_id'=>$link_data[0])));
		$this->sale = $this->count(array("conditions"=>array('data_type'=>"3", 'link_id'=>$link_data[0])));
		
		$this->sale ? $this->sales_conversion_rates = ($this->sale/$this->total_clicks)*100 : $this->sales_conversion_rates = 0;		
		
		$earning = 0;		
		$earnings = mvc_model('TrkrrLink')->find(array("conditions"=>array('id'=>$link_data[0]), 'selects'=>array('cost')));
		
		if(isset($earnings[0]->conversion_type)){
			if($earnings[0]->conversion_type == 2 && 0< $earnings[0]->conversion_revenue && 0< $this->sale){
				$earning = $earnings[0]->conversion_revenue*$this->sale;
			}
			else{
				$earning = 0;
			}
		}
		
		if($earning > 0 ){
			$this->earnings_per_click = $earning/ $this->total_clicks;
		}
		$roi=0;
		if(isset($earnings[0]->cloack_link)){
			if($earnings[0]->cloack_link==1){
				$total_cost=0; //todo
			}
			elseif($earnings[0]->cloack_link==2){
				if($earnings[0]->type_of_cost ==1){
					$total_cost=$earnings[0]->cost;
				}
				elseif($earnings[0]->type_of_cost ==2 ){
					$total_cost=$earnings[0]->cost*$this->total_clicks;
				}
			}
		}
		else{
			$total_cost=0;
		}
		
		$cost_per_click=0;
		
		if(0<$earning && $total_cost)	
			$roi = (($earning-$total_cost)/$total_cost)*100;
		
		if($this->total_clicks==0)
			$cost_per_click = $total_cost;
		elseif(0<$this->total_clicks)
			$cost_per_click = $total_cost / $this->total_clicks;
			
		$cost_per_action = 0;
		if($this->total_actions==0)
			$cost_per_action = $total_cost;
		elseif(0<$this->total_actions)
			$cost_per_action = $total_cost / $this->total_clicks;
		
		$cost_per_sale = 0;
		if($this->total_actions==0)
			$cost_per_sale = $total_cost;
		elseif(0<$this->total_actions)
			$cost_per_sale = $total_cost / $this->total_clicks;
	
		$this->return_of_investment = round($roi,2);		
		$this->cost_per_click = round($cost_per_click,2);
		$this->cost_per_action = round($cost_per_action,2);
		
		$this->cost_per_sale = round($cost_per_sale,2); //$cost/$total_number_of_sales;
		$this->cost= round($total_cost,2);
		$this->link_name = $link_data[1];
	
		//return single link stats data array
		return $this;
	}
	
	public function group_link_stat($link_data = "all"){
		
		//$link_data;
		$groups = mvc_model("TrkrrGroup")->groups_children($link_data);
		//var_dump($groups);
		if(0<$link_data && $link_data!="all")
		array_push( $groups , $link_data );
		
		$link_data_list=array();
		
		$sum_of_link_data = array(
				'total_clicks_sum' => 0,
				'unique_clicks_sum' => 0,
				'total_actions_sum' => 0,
				'sale_sum' => 0,
				'sales_conversion_rates_sum' => 0,
				'earnings_per_click_sum' => 0,
				'return_of_investment_sum' => 0,
				'cost_per_click_sum' => 0,
				'cost_per_action_sum' => 0,
				'cost_per_sale_sum' => 0,
				'cost_sum' => 0,
				'link_name_sum' => 0, 
				);
		
		foreach($groups as $group){
			$link_list= mvc_model("TrkrrLink")->groups_links($group);
			
			
			foreach($link_list as $link){
				$LinkStat_i= new TrkrrLinkStat();
				$link_d = $LinkStat_i->single_link_stat($link);
				//var_dump($link_d);
				
				$sum_of_link_data['total_clicks_sum'] += $link_d->total_clicks ; //mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"1")));
				$sum_of_link_data['unique_clicks_sum'] +=$link_d->unique_clicks ;
				$sum_of_link_data['total_actions_sum'] +=$link_d->total_actions ;//mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"2")));
				$sum_of_link_data['sale_sum']+=$link_d->sale ; //mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"3")));		
				$sum_of_link_data['sales_conversion_rates_sum'] += $link_d->sales_conversion_rates ;//($actions/$total_clicks)*100;		
				$sum_of_link_data['earnings_per_click_sum'] += $link_d->earnings_per_click ;//$this->sale/$total_clicks;
				$sum_of_link_data['return_of_investment_sum'] += $link_d->return_of_investment ;//($this->sale/$total_cost)*100;		
				$sum_of_link_data['cost_per_click_sum'] +=$link_d->cost_per_click ;//$cost/$total_clicks;		
				$sum_of_link_data['cost_per_action_sum'] +=$link_d->cost_per_action;//$cost/$total_actions;
				$sum_of_link_data['cost_per_sale_sum'] +=$link_d->cost_per_sale; //$cost/$total_number_of_sales;
				$sum_of_link_data['cost_sum ']+=$link_d->cost;
				$sum_of_link_data['link_name_sum'] = "Total"; 
					
				array_push($link_data_list,$link_d);
			}
			//add final array			
			//array_push( $link_data_list, $sum_of_link_data);			
		}
		$sum_of_link_data['sales_conversion_rates_sum'] = $sum_of_link_data['sales_conversion_rates_sum'] >0 ?$sum_of_link_data['sales_conversion_rates_sum'] /count($link_data_list): 0;
		$sum_of_link_data['return_of_investment_sum'] = $sum_of_link_data['return_of_investment_sum']>0 ?$sum_of_link_data['return_of_investment_sum']/count($link_data_list): 0;
		$link_data_full = array(
				"link_data_list"=>$link_data_list,
				"link_data_sum"=>$sum_of_link_data,
				);
				
		return $link_data_full ;//= array($this->single_link_stat(1),$this->single_link_stat(1),$this->single_link_stat(1),$this->single_link_stat(1));
	}
	
	public function single_group_sum_stat($group_id = 0){
		$link_data_list=array();
		
		$group_object_A = mvc_model("TrkrrGroup")->find(array(
				"conditions"=>array(
					"id"=>$group_id,
				),
				"selects"=>array('id','name','group_parent'),
			));
		
		
		if(0<$group_object_A[0]->group_parent){
			$group_name=mvc_model("TrkrrGroup")->find(array(
					"conditions"=>array(
						"id"=>$group_object_A[0]->group_parent,
					),
					"selects"=>array('id','name'),
				));	
					
			$group_object_A[0]->name = $group_object_A[0]->name.' > '.$group_name[0]->name;
		}
		
		
		$sum_of_link_data = array(
				'total_clicks_sum' => 0,
				'unique_clicks_sum' => 0,
				'total_actions_sum' => 0,
				'sale_sum' => 0,
				'sales_conversion_rates_sum' => 0,
				'earnings_per_click_sum' => 0,
				'return_of_investment_sum' => 0,
				'cost_per_click_sum' => 0,
				'cost_per_action_sum' => 0,
				'cost_per_sale_sum' => 0,
				'cost_sum' => 0,
				'link_name_sum' => 0, 
				);
				
		$link_data_full=array();
		
		if(0<mvc_model("TrkrrLink")->count(array("conditions"=>array("category_id"=>$group_object_A[0]->id,))))
		{
			$link_list = mvc_model("TrkrrLink")->groups_links($group_id);
			
			//var_dump($group_object_A[0]->name);
			
			foreach($link_list as $link){
					$link_d = $this->single_link_stat($link);
					
					$sum_of_link_data['total_clicks_sum'] += $link_d->total_clicks ; //mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"1")));
					$sum_of_link_data['unique_clicks_sum'] +=$link_d->unique_clicks ;
					$sum_of_link_data['total_actions_sum'] +=$link_d->total_actions ;//mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"2")));
					$sum_of_link_data['sale_sum']+= $link_d->sale ; //mvc_model("trkrr_LinkStat")->count(array("conditions"=>array('data_type'=>"3")));		
					$sum_of_link_data['sales_conversion_rates_sum'] += $link_d->sales_conversion_rates ;//($actions/$total_clicks)*100;		
					$sum_of_link_data['earnings_per_click_sum'] += $link_d->earnings_per_click ;//$this->sale/$total_clicks;
					$sum_of_link_data['return_of_investment_sum'] += $link_d->return_of_investment ;//($this->sale/$total_cost)*100;		
					$sum_of_link_data['cost_per_click_sum'] +=$link_d->cost_per_click ;//$cost/$total_clicks;		
					$sum_of_link_data['cost_per_action_sum'] +=$link_d->cost_per_action;//$cost/$total_actions;
					$sum_of_link_data['cost_per_sale_sum'] +=$link_d->cost_per_sale; //$cost/$total_number_of_sales;
					$sum_of_link_data['cost_sum ']+=$link_d->cost;
					$sum_of_link_data['link_name_sum'] = $group_object_A[0]->name;
					$sum_of_link_data['group_id'] = $group_object_A[0]->id;				
					
					array_push($link_data_list,$link_d);
				
				}
				
				if(0<$sum_of_link_data['sales_conversion_rates_sum'])
					$sum_of_link_data['sales_conversion_rates_sum'] = $sum_of_link_data['sales_conversion_rates_sum'] /count($link_data_list);
				
				if(0<$sum_of_link_data['return_of_investment_sum'])
					$sum_of_link_data['return_of_investment_sum'] = $sum_of_link_data['return_of_investment_sum']/count($link_data_list);
				
		}		
		else{
			$sum_of_link_data['link_name_sum'] = $group_object_A[0]->name;
			$sum_of_link_data['group_id'] = $group_object_A[0]->id;
			//var_dump($group_object_A[0]->name);
		}
		
		return $sum_of_link_data;
	}
	
	public function groups_sum_stat($link_data = "all"){
		
		$link_data_full=array();
			
		if($link_data = "all"){
			$groups_lister = mvc_model("TrkrrGroup")->find(array(
				'conditions'=>array("active"=>'1')
			));
			$groups = array();
			foreach($groups_lister as $group){
				array_push($groups ,$group->id);	
			}
			
			//var_dump($groups);
		}
		else{
			$groups = mvc_model("TrkrrGroup")->groups_children($link_data);
		}
		
		if(0<$link_data && $link_data!="all")
			array_push( $groups , $link_data );
		
		foreach($groups as $group){
			
			array_push($link_data_full,$this->single_group_sum_stat($group));
		}
		
		
		return $link_data_full;
	}
}
?>
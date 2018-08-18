<div style="background:white; border:1px #90a8ce solid; border-radius:5px; padding:30px;margin:20px;">

<h2>Add to A/B Test</h2>

<?php echo $this->form->create($model->name);?>
<hr>
	<?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => 'add',)).">New Test</a>";	?>
	<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => '',)).">All Tests</a>";	?>	
<hr>	
	<div>Select A/B Test</div>
	<div><?php 
	if(!isset($objecttest_id))
		$objecttest_id='';
	
	//var_dump($testtype);
	
	echo $this->form->select_from_model('test_id',$testtype, array(), array('value'=>$objecttest_id,'label' => '')); ?></div>
	<div class="Zabtestrecord_subject_id_select">Select Link</div>
	<div class="Zabtestrecord_subject_id_select"><?php echo $this->form->select_from_model('subject_id',$testsubject, array(), array('label' => '')); ?></div>
	
<hr>

<?php echo $this->form->end('Add',array('class' => 'button-primary')); ?>
</div>
<?php
	$Zabtest_d=mvc_model('Zabtest')->find(array("selects"=>array("id","type")));
	$display_obj.="{";
	foreach($Zabtest_d as $Zab){
		$display_obj.="'".$Zab->id."':"."'".$Zab->type."',";
	}
	$display_obj.="}";
?>
<script type="text/javascript">
jQuery(document).ready(function($) {
	//display_obj = {"2":1,"3":1,	"4":2}
	
	$('.Zabtestrecord_subject_id_select').hide();
	<?php //echo '';//$display_obj; ?>
	$('#Zabtestrecord_test_id_select').change(function(){
		//$('#Zabtestrecord_test_id_select').val();
		if(display_obj.2 == 1){
			//do link - display
			$('.Zabtestrecord_subject_id_select').hide();
		}
		elseif(display_obj.$('#Zabtestrecord_test_id_select').val() == 2){
			//do campaign
			$('.Zabtestrecord_subject_id_select').hide();
			$('#Zabtestrecord_subject_id_select').val('');
		}
	});
	});
</script>
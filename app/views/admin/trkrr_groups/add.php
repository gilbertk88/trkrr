<div style="background:white; border:1px #90a8ce solid; border-radius:5px; padding:30px;margin:20px;">
<h2>New Campaign</h2>
<hr>
<div>
<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'index',)).">All Campaign</a>";?>
</div>
<hr>

<?php echo $this->form->create($model->name); ?>

<div>Campaign Name</div>
<div><?php echo $this->form->input('name', array('label' => '')); ?></div>
<div>Campaign Type</div>
<div><?php echo $this->form->select_from_model('group_type',$grouptype, array(), array('label' => ''));?> </div>
<div style="display:none;" class="go_pro_div">
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	
</div>
<div style="display:none;" class="Group_group_parent_select_div">Campaign Parent</div>
<div style="display:none;" class="Group_group_parent_select_div"><?php echo $this->form->select_from_model('group_parent',$model, array(), array('label' => ''));?></div>

<hr>
<?php echo $this->form->end('Add',array('class' => 'button-primary')); ?>
</div>
<hr>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$('#TrkrrGroup_group_type_select').change(function(){
	if($('#TrkrrGroup_group_type_select').val() == 3)
		$('.go_pro_div').show();
	else{
		$('.go_pro_div').hide();
		}

	});
	});
</script>
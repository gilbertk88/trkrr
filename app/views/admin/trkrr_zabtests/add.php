<div style="background:white; border:1px #90a8ce solid; border-radius:5px; padding:30px;margin:20px;">

<h2>New Test</h2>

<?php echo $this->form->create($model->name); ?>
<hr>
<?php
echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => '',)).">All Tests</a>";	
?>	
<hr>	
	<div>Name</div>
	<div><?php echo $this->form->input('name', array('label' => '')); ?></div>
	<div style="display:none;">Type of Test</div>
	<div style="display:none;"><?php echo $this->form->select_from_model('type',$typeoftest, array(), array("value"=>1,'label' => '')); ?></div>
	<div>Notes</div>
	<div><?php echo $this->form->textarea_input('notes', array('placeholder' => 'Notes about the link','label' => ''),  array('style' => 'width: 200px;'));?></div>
<hr>

<?php echo $this->form->end('Add',array('class' => 'button-primary')); ?>
</div>
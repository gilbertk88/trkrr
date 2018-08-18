<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">

<h2>Edit Link</h2>
<hr>
	<div>
	<?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => '',)).">All Test</a>";	?>	
	<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => 'add',)).">New Test</a>";	?>
	<?php echo " <a class='button' href=".mvc_admin_url(array('controller' => 'trkrr_zabtestrecords', 'action' => 'add', 'id' => $object->__id)).">Add a case</a>"; ?>
</div>
<hr>

<?php echo $this->form->create($model->name); ?>
<hr>
		
	<div>Select A/B Test</div>
	<div><?php echo $this->form->select_from_model('test_id',$testtype, array(), array('label' => '')); ?></div>
	<div>Select Link</div>
	<div><?php echo $this->form->select_from_model('subject_id',$testsubject, array(), array('label' => '')); ?></div>
		
<hr>
	
<?php 
echo $this->form->end('Update');  ?>
<br>
<?php 
echo "<a href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => 'delete', 'id' => $object->__id)).">Delete</a>";
?>

</div>
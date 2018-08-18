<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>Edit Campaign</h2>
<hr>
<div>
<?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'add',)).">New Campaign</a>";?>
<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'index',)).">All Campaign</a>";?>
</div>

<hr>
<?php echo $this->form->create($model->name); ?>
<hr>

<div>Campaign Name</div>
<div><?php echo $this->form->input('name', array('label' => '')); ?></div>
<div>Campaign Type</div>
<div><?php echo $this->form->select_from_model('group_type',$grouptype, array(), array('label' => ''));?> </div>
<div style="display:none;" class="Group_group_parent_select_div">Campaign Parent</div>
<div style="display:none;" class="Group_group_parent_select_div"><?php echo $this->form->select_from_model('group_parent',$model, array("conditions"=>array("group_type"=>array(1))), array('label' => ''));?></div>

<hr>
<?php 
echo $this->form->end('Update');  ?>
<br>
<?php 
echo "<a href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'delete', 'id' => $object->__id)).">Delete</a>";
?>

</div>
<script type="text/javascript">
jQuery(document).ready(function($) {
    // Code that uses jQuery's $ can follow here.

	});
</script>
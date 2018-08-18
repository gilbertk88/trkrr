<div style="background:white; border:1px #90a8ce solid; border-radius:5px; padding:30px;margin:20px;">

<h2>Add New Link</h2>

<?php echo $this->form->create($model->name); ?>
<hr>
<?php
echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_links', 'action' => '',)).">All Links</a>";	
?>	
<hr>
	<div>Name</div>
	<div><?php echo $this->form->input('name', array('label' => '')); ?></div>
	<hr>
	<div>Link Tracker(Link to record click and redirect to destination)</div>
	<div style="width:100%; min-height:30px;"><?php echo '<span style="padding-top:; float:left;">'.get_site_url().'/?trk=</span"><span style="float:right;">'.$this->form->input('link_tracker', array('placeholder' => 'Enter variable e.g. facebook_traffic','label' => '')).'</span">'; ?></div>
	
	<hr>
	
	<div>Destination Type</div>
	<div><?php echo $this->form->select_from_model('destination_type',$Typeofdestination, array(), array('label' => '')); ?></div>
	
	<div>Destination of traffic</div>
	
	<div class="primary_url" ><?php echo $this->form->input('primary_url', array('placeholder' => 'http://destination.com/landingpage', 'label' => ''),  array('style' => 'width: 200px;'));?></div>	
	<div class="split_test" >
		<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>	
	<div class="rotator_group" >
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>	
	
	<hr>
	<div>Conversion Type</div>
	<div><?php echo $this->form->select_from_model('conversion_type',$Typeofconversion, array(), array('label' => '')); ?></div>
	<div class="conversion_revenue">Revenue Per Conversion</div>
	<div class="conversion_revenue" >
		<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>	
	
	
	<div>Conversion URL(Link to record conversion(redirect url after conversion))</div>
	<div style="width:100%; min-height:30px;"><?php echo '<span style="padding-top:; float:left;">'.get_site_url().'/?trk=</span"><span style="float:right;">'.$this->form->input('record_conversion', array('placeholder' => 'Enter variable e.g. facebook_traffic','label' => ''),  array('style' => 'width: 200px;')).'</span">';?></div>	
	<hr>
	<div>Front End</div>
	<div><?php echo $this->form->input('front_end', array('value' => '1','label' => '')); ?></div>
	<div>Facebook Title</div>
	<div>
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>
	<div>Facebook Description</div>
	<div>
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>
	<div>Facebook image</div>
	<div>
		<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>
	<hr>
	<div>Link Notes</div>
	<div><?php echo $this->form->textarea_input('notes', array('placeholder' => 'Notes about the link','label' => ''),  array('style' => 'width: 200px;'));?></div>
	<hr>
	<div>Source of traffic</div>
	<div><?php echo $this->form->select_from_model('cloak_link',$Typeoflink, array(), array('label' => '')); ?></div>
	
	<div class="Link_cloak_link_select_div" >Type of Cost</div>
	<div class="Link_cloak_link_select_div">
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>
	<div class="Link_cloak_link_select_div">Cost</div>
	<div class="Link_cloak_link_select_div">
	<?php echo "<span style='color:red;'>Go pro to use this feature <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_zabtestrecords', 'action' => '',)).">click here</a></span>";	?>
	</div>
	<hr>
	<div>Campaign</div>
	<div><?php echo $this->form->select_from_model('category_id',$group, array(), array('label' => ''));?></div>
<hr>

<?php echo $this->form->end('Add',array('class' => 'button-primary')); ?>
</div>
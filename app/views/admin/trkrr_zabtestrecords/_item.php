
<tr style="width:100%;min-height:;">
    <td style="padding:20px 30px;">
		<?php echo $object->name; ?>
	</td>
	
	<td style="padding:20px 30px;">
		<?php 
		if($object->type==1){		
			echo 'Link'; 
		}
		elseif($object->type==2){
			echo 'Campaign'; 
		}
		?>
	</td>
	
	<td style="padding:20px 30px;">
		<?php echo mvc_model('Zabtestrecord')->count(array("conditions"=>array("test_id"=>$object->id))); ?>
	</td>
	
	<td style="padding:20px;">
		<?php echo "<a class='' style='padding:5px;' href=".mvc_admin_url(array('controller' => 'trkrr_zabtestrecords', 'action' => 'show', 'id' => $object->__id)).">View A/B Test</a>"; ?>
		<?php echo " <a class='button' href=".mvc_admin_url(array('controller' => 'trkrr_zabtestrecords', 'action' => 'add', 'id' => $object->__id)).">Add a case</a>"; ?>
	</td>
</tr>
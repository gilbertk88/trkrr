<tr style="width:100%;min-height:;">
    <?php //echo $this->html->traffic_manager_link($object); ?>
	<td style="padding:20px 30px;">
		<?php 
			if (isset($object->name))
				echo $object->name;
			else
				echo '-';
		?>
	</td>
	</td>
	<td style="padding:20px;">
		<?php 
			if (isset($object->__id))
				echo "<a class='' href=".mvc_admin_url(array('controller' => 'trkrr_zabtests', 'action' => 'edit', 'id' => $object->__id)).">manage</a>";
				else
				echo '-';
		?>
	</td>
</tr>
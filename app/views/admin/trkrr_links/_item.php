<tr style="width:100%;min-height:;">
    <?php //echo $this->html->traffic_manager_link($object); ?>
	<td style="padding:20px 30px;">
		<?php 
			if (isset($object->name))
				echo $object->name;
			else
				echo '---';
		?>
	</td>
	<td style="padding:20px 30px;">
		<?php 
			if (isset($object->link_tracker))
				echo '<a href="'.get_site_url().'/?trk='.$object->link_tracker.'">'.get_site_url().'/?trk='.$object->link_tracker.'</a>';
			else
				echo '-Not Set-';
		?>
	</td>
	</td>
	<td style="padding:20px;">
		<?php 
			if (isset($object->__id))
				echo "<a class='' href=".mvc_admin_url(array('controller' => 'admin_trkrr_links', 'action' => 'edit', 'id' => $object->__id)).">manage</a>";
				else
				echo '---';
		?>
	</td>
</tr>
<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>Link Manager</h2>
<hr>
<div><?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_links', 'action' => 'add',)).">New link</a>";	?>	</div>
<hr>
<table>
	<tr style="width:100%;min-height:;">
		<td style="padding:20px 30px;">
			<b>Link Name</b>
		</td>
		<td style="padding:20px 30px;">
			<b>Tracking Link</b>
		</td>
		</td>
		<td style="padding:20px;">
			
		</td>
	</tr>
<?php foreach ($objects as $object): ?>

    <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>

<?php endforeach; ?>
</table>
<hr>
</div>

<?php //echo $this->pagination(); ?>
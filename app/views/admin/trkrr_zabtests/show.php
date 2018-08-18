<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>Link Manager</h2>
<div><?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_links', 'action' => 'add',)).">New link</a>";	?>	</div>
<hr>
<table>
<?php foreach ($objects as $object): ?>

    <?php $this->render_view('_item_show', array('locals' => array('object' => $object))); ?>

<?php endforeach; ?>
</table>
<hr>
</div>

<?php //echo $this->pagination(); ?>
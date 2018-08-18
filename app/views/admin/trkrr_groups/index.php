<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>Campaign</h2>
<hr>
<div><?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'add',)).">New Campaign</a>";	?></div>
<hr>
<table>

<?php foreach ($objects as $object): ?>

    <?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>

<?php endforeach; ?>
</table>
<hr>
</div>

<?php //echo $this->pagination(); ?>
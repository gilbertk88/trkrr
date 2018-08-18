<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>A/B Test: <?php echo $current_test->name; ?></h2>
<div>
<?php 
echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_admin_links', 'action' => 'add',)).">New link</a>";
echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'trkrr_zabtestrecords', 'action' => '', 'id' =>'')).">Active tests</a>";
echo " <a class='button' href=".mvc_admin_url(array('controller' => 'zabtestrecords', 'action' => 'add', 'id' => $current_test->id)).">Add a case</a>";

//if test is link?
if($current_test->type == 1){
	//get link stats
	$t_Name='Link';
	$t_file_name='_item_show';
}
elseif($current_test->type == 2){
	//get campaign stats
	$t_Name='Campaign';
	$t_file_name='_item_campaign_show';
}		
?>	
</div>
<hr>
<table>
	<tr>
		<td id="total_clicks">
			<?php echo $t_Name.'  Name'; ?>
		</td>
		<td style="padding:15px;font-weight:bold; " id="total_clicks">
			TC
		</td>
		<td style="padding:15px; font-weight:bold;" id="unique_clicks">
			UC
		</td>
		<td style="padding:15px; font-weight:bold;" id="total_actions">
			A
		</td>
		<td style="padding:15px; font-weight:bold;" id="sale">
			S
		</td>
		<td style="padding:15px; font-weight:bold;" id="sales_conversion_rates">
			SCR
		</td>
		<td style="padding:15px; font-weight:bold;"id="cost_per_click">
			CPC
		</td>
		<td style="padding:15px; font-weight:bold;" id="cost_per_action">
			CPA
		</td>
		<td style="padding:15px; font-weight:bold;" id="cost_per_sale">
			CPS
		</td>
		<td style="padding:15px; font-weight:bold;" id="earnings_per_click">
			EPC
		</td>
		<td style="padding:15px; font-weight:bold;" id="return_of_investment">
			ROI
		</td>
	</tr>

<?php foreach ($objects as $object): ?>

<?php $this->render_view($t_file_name, array('locals' => array('object' => $object))); ?>

<?php endforeach; ?>
</table>
<hr>
</div>

<?php //echo $this->pagination(); ?>
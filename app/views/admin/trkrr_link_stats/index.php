<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">
<h2>Campaign Statistics</h2>
<div><?php $objects = $objects_array; ?></div>

<hr>
<div>
<?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'add',)).">New Campaign</a>";?>
<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_links', 'action' => 'add',)).">New Link</a>";?>

</div>
<hr>

<table>
	<tr>
		<td id="total_clicks">
			Campaign Name
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

		<?php $this->render_view('_item_group_sum', array('locals' => array('sums' => $object))); ?>

	<?php endforeach; ?>
	
	
	<tr class = "footer">
		<td style="padding:;" id="total_clicks">
			Campaign Name
		</td>
		<td style="padding:15px; font-weight:bold;" id="total_clicks">
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
		<td style="padding:15px; font-weight:bold;" id="cost_per_click">
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
</table>

<hr>
</div>

<?php //echo $this->pagination(); ?>
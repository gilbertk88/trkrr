<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">

<h2>Link Stats</h2>

<?php 
$objects=$objects_array['link_data_list'];
$sums=$objects_array['link_data_sum']
?>

<hr>
<div>
<?php echo "<a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_groups', 'action' => 'add',)).">New Campaign</a>";?>
<?php echo " <a class='button-primary' href=".mvc_admin_url(array('controller' => 'admin_trkrr_links', 'action' => 'add',)).">New Link</a>";?>

</div>
<hr>

<table>
	<tr>
		<td id="total_clicks">
			Link Name
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

		<?php $this->render_view('_item', array('locals' => array('object' => $object))); ?>

	<?php endforeach; ?>
	
	<tr class = "total" style="padding:15px; font-weight:bold;">
		<td style="padding:15px;" id="link_name">
			<b>Totals</b>
		</td>
		<td style="padding:15px;" id="total_clicks">
			<?php echo $sums['total_clicks_sum']; ?>
		</td>
		<td style="padding:15px;" id="unique_clicks">
			<?php echo $sums['unique_clicks_sum']; ?>
		</td>
		<td style="padding:15px;" id="total_actions">
			<?php echo $sums['total_actions_sum']; ?>
		</td>
		<td style="padding:15px;" id="sale">
			<?php echo $sums['sale_sum']; ?>
		</td>
		<td style="padding:15px;" id="sales_conversion_rates">
			<?php echo $sums['sales_conversion_rates_sum']."%"; ?>
		</td>
		<td style="padding:15px;" id="cost_per_click">
			<?php echo "$".$sums['cost_per_click_sum']; ?>
		</td>
		<td style="padding:15px;" id="cost_per_action">
			<?php echo "$".$sums['cost_per_action_sum']; ?>
		</td>
		<td style="padding:15px;" id="cost_per_sale">
			<?php echo "$".$sums['cost_per_sale_sum']; ?>
		</td>
		<td style="padding:15px;" id="earnings_per_click">
			<?php echo "$".$sums['earnings_per_click_sum']; ?>
		</td>
		<td style="padding:15px;" id="return_of_investment">
			<?php echo $sums['return_of_investment_sum']."%"; ?>
		</td>
	</tr>
	<tr class = "footer">
		<td style="padding:;" id="total_clicks">
			Link Name
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

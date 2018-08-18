	<tr class = "total" style="padding:15px; font-weight:;">
		<td style="padding:15px;" id="link_name">
			<b><?php echo $sums['link_name_sum']; ?></b>
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
		<td style="padding:15px;" id="return_of_investment">
			<?php 
			echo "<a class='' href=".mvc_admin_url(array('controller' => 'trkrr_link_stats', 'action' => 'add','id'=>$sums['group_id'])).">Details</a>";
			?>
		</td>
	</tr>
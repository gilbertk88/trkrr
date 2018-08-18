	<tr class = "body">
		<td style="padding:15px;" id="link_name">
			<?php echo $object->link_name; ?>
		</td>
		<td style="padding:15px;" id="total_clicks">
			<?php echo $object->total_clicks; ?>
		</td>
		<td style="padding:15px;" id="unique_clicks">
			<?php echo $object->unique_clicks; ?>
		</td>
		<td style="padding:15px;" id="total_actions">
			<?php echo $object->total_actions; ?>
		</td>
		<td style="padding:15px;" id="sale">
			<?php echo $object->sale; ?>
		</td>
		<td style="padding:15px;" id="sales_conversion_rates">
			<?php echo $object->sales_conversion_rates."%"; ?>
		</td>
		<td style="padding:15px;" id="cost_per_click">
			<?php echo "$".$object->cost_per_click; ?>
		</td>
		<td style="padding:15px;" id="cost_per_action">
			<?php echo "$".$object->cost_per_action; ?>
		</td>
		<td style="padding:15px;" id="cost_per_sale">
			<?php echo "$".$object->cost_per_sale; ?>
		</td>
		<td style="padding:15px;" id="earnings_per_click">
			<?php echo "$".$object->earnings_per_click; ?>
		</td>
		<td style="padding:15px;" id="return_of_investment">
			<?php echo $object->return_of_investment."%"; ?>
		</td>
	</tr>
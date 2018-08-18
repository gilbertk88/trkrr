<div style="background:white; border:1px #90a8ce solid; border-radius:5px;padding:30px;margin:20px;">

<h2><?php echo $object->link_name; ?> Link Stats</h2>

<?php echo $this->form->create($model->name); ?>
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

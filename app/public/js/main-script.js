jQuery(document).ready(function($) {
	
	$('#TrkrrLink_cloak_link_select').change(function(){
	if($('#TrkrrLink_cloak_link_select').val() == 1){ // organic
		$('.Link_cloak_link_select_div').hide();
		$('#TrkrrLink_type_of_cost_select').val('');
		$('#TrkrrLinkCost').val('');
		}
	else if($('#TrkrrLink_cloak_link_select').val() == 2){ //paid
			$('.Link_cloak_link_select_div').show();
		}
	});
	
	$('#TrkrrLink_conversion_type_select').change(function(){
	if($('#TrkrrLink_conversion_type_select').val() == 1){ // Action
		$('.conversion_revenue').hide();
		$('#TrkrrLinkConversionRevenue').val('');
		}
	else if($('#TrkrrLink_conversion_type_select').val() == 2){ //Sale
			$('.conversion_revenue').show();
		}
	});
	
	$('#TrkrrLink_destination_type_select').change(function(){
	if($('#TrkrrLink_destination_type_select').val() == 1){ // Custom TrkrrLink
			$('.primary_url').show();
			$('.split_test').hide();
			$('.rotator_group').hide();
			
			$('#TrkrrLink_primary_url_select').val('');			
			$('.split_test #TrkrrLink_primary_url_select').attr('name','');
			$('.rotator_group #TrkrrLink_primary_url_select').attr('name','');
			$('.primary_url #TrkrrLinkPrimaryUrl').attr('name','data[TrkrrLink][primary_url]');
		}
	else if($('#TrkrrLink_destination_type_select').val() == 2){ //Split test
			$('.split_test').show();
			$('.primary_url').hide();
			$('.rotator_group').hide();
			
			$('#TrkrrLinkPrimaryUrl').val('');
			$('#TrkrrLink_primary_url_select').val('');
			$('.split_test #TrkrrLink_primary_url_select').attr('name','data[TrkrrLink][primary_url]');
			$('.rotator_group #TrkrrLink_primary_url_select').attr('name','');
			$('.primary_url #TrkrrLinkPrimaryUrl').attr('name','');
		}
	else if($('#TrkrrLink_destination_type_select').val() == 3){ //Rotator group
			$('.rotator_group').show();
			$('.split_test').hide();
			$('.primary_url').hide();
			
			$('#TrkrrLinkPrimaryUrl').val('');
			$('#TrkrrLink_primary_url_select').val('');
			$('.split_test #TrkrrLink_primary_url_select').attr('name','');
			$('.rotator_group #TrkrrLink_primary_url_select').attr('name','data[TrkrrLink][primary_url]');
			$('.primary_url #TrkrrLinkPrimaryUrl').attr('name','');
		}

	});
	
	$('#TrkrrLinkSelectFacebookImage').click(function(e) {
		e.preventDefault();

		var custom_uploader = wp.media({
			title: 'Custom Title',
			button: {
				text: 'Custom Button Text'
			},
			multiple: false  // Set this to true to allow multiple files to be selected
		})
		.on('select', function() {
			var attachment = custom_uploader.state().get('selection').first().toJSON();
			$('#fb_media_image').attr('src', attachment.url);
			$('#TrkrrLinkFacebookImage').val(attachment.url);
		})
		.open();
	});
	
});
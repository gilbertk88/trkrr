<?php

MvcConfiguration::set(array(
    'Debug' => false
));

MvcConfiguration::append(array(
    'AdminPages' => array(
		'trkrr_link_stats' => array(
			'icon'=>'dashicons-filter',
			'label'=>'Trkrr Lite',
			'add'=> array(
                'label' => 'Statistics',
                'in_menu' => true,
            ),
            'add'=> array(
                'label' => __('mmmmmmm', 'wpmvc'). ' ',
                'in_menu' => false,
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
        ),
        'trkrr_groups' => array(
			'label'=>'Campaigns',
            'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'parent_slug'=>'mvc_trkrr_link_stats',
        ),
		'trkrr_links' => array(
			'label'=>'Link',
            'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'parent_slug'=>'mvc_trkrr_link_stats',
        ),
		'trkrr_zabtests' => array(
			'label' => 'Go Pro',
            'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'parent_slug'=>'mvc_trkrr_link_stats.',
        ),
		'trkrr_zabtestrecords' => array(
			'label' => 'Go Pro',
            'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'show'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			//'parent_slug'=>'mvc_zabtests',
			'parent_slug'=>'mvc_trkrr_link_stats',
        ),
		
		'trkrr_grouptypes' => array(
			 'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'hide_menu'=> true,			
        ),		
		'trkrr_typeofcosts' => array(
			 'add'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'delete'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
            'edit'=> array(
                'label' => __('Delete', 'wpmvc'). ' ',
                'in_menu' => false
            ),
			'hide_menu'=> true,			
        ),
    ),
));


add_action('mvc_admin_init', 'trkrr_on_mvc_admin_init');

function trkrr_on_mvc_admin_init($options) {
    wp_register_style('mvc_admin', mvc_css_url('trkrr-lite', 'style'));
    wp_enqueue_style('mvc_admin');
	
	 //Core media script
    wp_enqueue_media();

    // Your custom js file
    wp_register_script( 'media-lib-uploader-js', mvc_js_url('trkrr-lite', 'main-script') , array('jquery') );
    wp_enqueue_script( 'media-lib-uploader-js' );

}
?>
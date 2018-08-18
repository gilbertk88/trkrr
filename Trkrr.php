<?php
/*
Plugin Name: Trkrr
Plugin URI: www.trkrr.it
Version: 1.0.4
Author: Trkrr
Description: Complete link tracking platform for your Wordpress. Capture incoming parameters and pass them to affiliate networks. Trace each click and see where most of your sales are coming from.
Author URI: www.trkrr.it
*/


function trkrr_is_plugin( $plugin ) {
		return in_array( $plugin, (array) get_option( 'active_plugins', array() ) );
	}

//register_activation_hook( __FILE__, 'trkrr_child_plugin_activate' );
//register_deactivation_hook( __FILE__, 'trkrr_child_plugin_activate' );
function trkrr_child_plugin_activate(){

    // Require parent plugin
    if ( ! trkrr_is_plugin("trkrr/Trkrr.php") ){
        // Stop activation redirect and show error
        wp_die('Sorry, but this plugin requires the plugin <a href="https://wordpress.org/plugins/trkrr-lite/">Trkrr</a> to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
}

require_once dirname(__FILE__).'/app/functions/functions.php';

function trkrr_this_plugin_last() {
		$wp_path_to_this_file = preg_replace('/(.*)plugins\/(.*)$/', WP_PLUGIN_DIR."/$2", __FILE__);
		$this_plugin = plugin_basename(trim($wp_path_to_this_file));
		$active_plugins = get_option('active_plugins');
		$this_plugin_key = array_search($this_plugin, $active_plugins);
			array_splice($active_plugins, $this_plugin_key, 1);
			array_push($active_plugins, $this_plugin);
			update_option('active_plugins', $active_plugins);
	}
	
	register_activation_hook(__FILE__, 'Trkrractivate');
	register_deactivation_hook(__FILE__, 'Trkrrdeactivate');

	function Trkrractivate() {
		global $wp_rewrite;
		require_once dirname(__FILE__).'/trkrr_loader.php';
		$loader = new TrkrrLoader();
		$loader->activate();
		$wp_rewrite->flush_rules( true );
	}

	function Trkrrdeactivate() {
		global $wp_rewrite;
		
		require_once dirname(__FILE__).'/trkrr_loader.php';
		$loader = new TrkrrLoader();
		$loader->deactivate();
		$wp_rewrite->flush_rules( true );
	}

	function Trkrrinit_hooks_on(){
		require_once dirname(__FILE__).'/app/functions/functions.php';
		
		$Linkstats = new TrkrrLinkstats();
		$Linkstats->listen_to_redirect_request();
	}
	add_action("init","Trkrrinit_hooks_on",8888,1) ;
?>
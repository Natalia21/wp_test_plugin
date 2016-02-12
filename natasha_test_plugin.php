<?php
/*
Plugin Name: Natasha test plugin
Plugin URI: http://www.yourpluginurlhere.com/
Description: testing how to create wp plugins
Version: 0.1
Author: Natasha
*/
define('MSP_HELLOWORLD_DIR', plugin_dir_path(__FILE__));
define('MSP_HELLOWORLD_URL', plugin_dir_url(__FILE__));

function show_form () {
	if ( isset($_POST['number']) ) {
		if ( $_POST['number'] < 10 ) {
			$color = 'red';
		} else {
			$color = 'green';
		}
		echo '
			<style>
				.entry-title {
					color:' . $color . '!important;
				}
			</style>
		';		
	}

	echo file_get_contents(MSP_HELLOWORLD_URL . "views/form.php");

}

function add_css() {
	wp_register_style( 'natashaPluginStylesheet', plugins_url('assets/css/natasha_test_plugin.css', __FILE__) );
	wp_enqueue_style( 'natashaPluginStylesheet' );
}

add_css();
add_shortcode('natasha_plugin_form', 'show_form');
?>
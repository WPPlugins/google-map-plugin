<?php 
/**
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 */ 

global $support_post, $plugin_folder, $support_id;

$support_post 	= 'http://www.jonathonbyrd.com/wordpress/google-map-plugin-support-forum';
$support_id		= 397;
$plugin_folder 	= 'byrd_googlemap';






//configuring php
ini_set('memory_limit', '64M');

//adding admin menu options
if ( function_exists('add_action') ) add_action('admin_menu', 'plugin_config_map');
function plugin_config_map(){
	if ( function_exists('add_submenu_page') ){
		add_submenu_page('options-general.php',__('Google Map'),__('Google Map'),'manage_options','byrd_googlemap/config_index.php','');
	}
	
}

//will be requiring this
if (!defined('')) define('_EXEC', true);

if ( !isset($wp_did_header) ) {
	$wp_did_header = true;
	require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );
	require_once( ABSPATH . WPINC . '/template-loader.php' );
}

//loading resources
require_once dirname(__file__).'/defines.php';

require_once MAP_INCLUDES.DS.'helper.php';
require_once MAP_INCLUDES.DS.'request.php';
require_once MAP_INCLUDES.DS.'object.php';
require_once MAP_INCLUDES.DS.'properties.php';
require_once MAP_INCLUDES.DS.'configclass.php';
require_once MAP_INCLUDES.DS.'siteclass.php';
require_once MAP_INCLUDES.DS.'factory.php';

if (!class_exists('Email')) require_once MAP_INCLUDES.DS.'phpmail.php';
if (!function_exists('file_get_html')) require_once MAP_INCLUDES.DS.'simple_html_dom.php';

require_once MAP_DATABASE.DS.'database.php';
require_once MAP_DATABASE.DS.'table.php';





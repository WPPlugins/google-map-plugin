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



// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();


//Defining base path
if (!defined('DS')) define('DS', DIRECTORY_SEPARATOR);

define('MAP', str_replace(DS.'includes','', dirname(__file__) ));

//defining all paths
define('MAP_INCLUDES', 	MAP.DS.'includes');
define('MAP_SUPPORT', 	MAP.DS.'support');
define('MAP_DATABASE', 	MAP.DS.'database');
define('MAP_TABLES', 	MAP_DATABASE.DS.'tables');

define('MAP_HTTP', 		get_bloginfo( 'wpurl' ).'/wp-content/plugins/'.$plugin_folder);
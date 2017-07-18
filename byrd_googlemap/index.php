<?php 
/**
 * Plugin Name: Google Mapping getDirections
 * Plugin URI: http://www.jonathonbyrd.com
 * Description: This plugin is designed to provide you with an easy to install google map that provides directions to your company.
 * Version: 1.0.0
 * Date: December 22nd, 2009
 * Author: Jonathon Byrd
 * Author URI: http://www.jonathonbyrd.com
 * 
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 */ 

require_once dirname(__FILE__).DIRECTORY_SEPARATOR.'includes'.DIRECTORY_SEPARATOR.'framework.php';


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();

if ( class_exists('byrdSiteMap') ){
	global $byrdMap;
	$byrdMap = new byrdSiteMap();
}

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

require_once dirname(__file__).'/framework.php';


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();


class byrdSiteMap extends byrdPropertiesMap {

	/* 
	 * dynamic function server 
	 */
	function __call($method,$arguments) {
		$page = $this->from_camel_case(substr($method,3,strlen($method)-3));
		if (!defined('WP_USE_THEMES')) 
			define('WP_USE_THEMES', false); 
		require_once $_SERVER['DOCUMENT_ROOT'].DS.'wp-blog-header.php';
		$file = str_replace(DS.'includes','', dirname(__file__)).DS.$page.'.php';
		if (is_file($file)) require $file;
	} 
  
	/* 
	 * uncamelcaser: via http://www.paulferrett.com/2009/php-camel-case-functions/ 
	 */ 
	function from_camel_case($str) { 
		$str[0] = strtolower($str[0]);
		$func = create_function('$c', 'return "_" . strtolower($c[1]);');
		return preg_replace_callback('/([A-Z])/', $func, $str);
	}  
	
	
	
} 

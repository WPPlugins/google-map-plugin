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



class byrdConfigMap extends byrdPropertiesMap {

	/**
	 * routing the config page
	 * 
	 */
	function __construct(){
		//Check user rights
		if ( !current_user_can('manage_options') ) die(__('Sorry, but you don\'t have the rights.'));
		
		//update the posted options
		$this->setProperties( $_POST );
		$this->setOptions();
		
		//get all of the options
		$this->getOptions();
		
		//display the form
		$this->getIndex();
	}
	
	/* 
	 * dynamic function server 
	 */
	function __call($method,$arguments) {
		$page = $this->from_camel_case(substr($method,3,strlen($method)-3));
		$file = str_replace(DS.'includes','', dirname(__file__)).DS.'config_'.$page.'.php';
		if (is_file($file)) require_once $file;
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

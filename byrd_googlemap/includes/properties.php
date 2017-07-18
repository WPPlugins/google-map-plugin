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

class byrdPropertiesMap {
	
	public $api_key = null;
	public $to_address = null;
	public $width = null;
	public $height = null;
	public $G_HYBRID_MAP = false;
	public $G_SATELLITE_MAP = false;
	public $G_NORMAL_MAP = false;
	public $sizecontrol = 'GSmallMapControl';
	public $directions = null;
	public $header = null;
	
	
	
	/**
	 * A hack to support __construct() on PHP 4
	 *
	 * Hint: descendant classes have no PHP4 class_name() constructors,
	 * so this constructor gets called first and calls the top-layer __construct()
	 * which (if present) should call parent::__construct()
	 *
	 * @access	public
	 * @return	Object
	 */
	function byrdPropertiesMap()
	{
		$args = func_get_args();
		call_user_func_array(array(&$this, '__construct'), $args);
	}
	
	/**
	 * loads the proper functions
	 * 
	 * @return none
	 */
	function __construct(){
		$this->getOptions();
	}
	
	/**
	 * loops through the properties and binds them to this class
	 * 
	 */
	function getOptions(){
		foreach ($this->getProperties() as $property => $value)
			if (get_option($property)) 
				$this->$property = get_option($property);
	}
	
	/**
	 * loops through and stores theres properties
	 * 
	 */
	function setOptions(){
		if (!isset($_POST['submit'])) return false;
		foreach ($this->getProperties() as $property => $value) 
			update_option($property, $value);
	}

	/* 
	 * dynamic function server 
	 */
	function __call($method,$arguments) {
		$page = $this->from_camel_case(substr($method,3,strlen($method)-3));
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
	
	/**
	 * Set the object properties based on a named array/hash
	 *
	 * @access	protected
	 * @param	$array  mixed Either and associative array or another object
	 * @return	boolean
	 * @see		set()
	 * @since	1.5
	 */
	function setProperties( $properties )
	{
		$properties = (array) $properties; //cast to an array

		if (is_array($properties))
		{
			foreach ($properties as $k => $v) {
				$this->$k = $v;
			}

			return true;
		}

		return false;
	}
	
	/**
	 * Returns an associative array of object properties
	 *
	 * @access	public
	 * @param	boolean $public If true, returns only the public properties
	 * @return	array
	 * @see		get()
	 * @since	1.5
 	 */
	function getProperties( $public = true )
	{
		$vars  = get_object_vars($this);

        if($public)
		{
			foreach ($vars as $key => $value)
			{
				if ('_' == substr($key, 0, 1)) {
					unset($vars[$key]);
				}
			}
		}

        return $vars;
	}
	
	
	
}

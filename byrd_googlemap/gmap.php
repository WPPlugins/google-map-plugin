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

global $byrdMap;
$byrdMap->getJs();

?>
<h2><?php echo $this->header; ?></h2>

<div id="map_canvas" style="width: <?php echo $this->width; ?>px; height: <?php echo $this->height; ?>px;text-align:center;float:none;margin:auto;"></div>
<div id="directions" style="clear:both;width: 250px; "></div>

<div style="text-align:center;<?php if (!$this->directions) echo 'display:none;'; ?>">
	From Address :<input type="text" id="map_address" />
	<button id="gmapbutton" style='cursor:pointer;'>Get Directions</button>
</div>

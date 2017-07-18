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

?>
<h2>Gmap Settings</h2>
<table>
	<tr>
		<td width="200"><label for="header">Header</label></td>
		<td><input id="header" name="header" type="text" size="50" value="<?php echo $this->header; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		This will display above the map in h2 tags.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="api_key">Gmap API KEY</label></td>
		<td><input id="api_key" name="api_key" type="text" size="50" value="<?php echo $this->api_key; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Grab your API key from here: <a href="http://code.google.com/apis/maps/signup.html" target="_blank">
		http://code.google.com/apis/maps/signup.html</a>
		</td>
	</tr>
	<tr>
		<td width="200"><label for="to_address">Your Address</label></td>
		<td><input id="to_address" name="to_address" type="text" size="50" value="<?php echo $this->to_address; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		This is the address that will show as default on the map. This should normally be your 
		place of business.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="width">Width</label></td>
		<td><input id="width" name="width" type="text" size="20" value="<?php echo $this->width; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Width of the map in pixels.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="height">Height</label></td>
		<td><input id="height" name="height" type="text" size="20" value="<?php echo $this->height; ?>" /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Height of the map in pixels.
		</td>
	</tr>
	
	<tr>
		<td width="200"><label for="G_HYBRID_MAP">Show Hybrid Button</label></td>
		<td><input id="G_HYBRID_MAP" name="G_HYBRID_MAP" type="checkbox" <?php byrd_checkbox($this->G_HYBRID_MAP); ?> /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Check this box if you would like to display the hybrid display button on the top of the map.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="G_SATELLITE_MAP">Show Satellite Button</label></td>
		<td><input id="G_SATELLITE_MAP" name="G_SATELLITE_MAP" type="checkbox" <?php byrd_checkbox($this->G_SATELLITE_MAP); ?> /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Check this box if you would like to display the Satellite option display button on the top of the map.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="G_NORMAL_MAP">Show Normal Button</label></td>
		<td><input id="G_NORMAL_MAP" name="G_NORMAL_MAP" type="checkbox" <?php byrd_checkbox($this->G_NORMAL_MAP); ?> /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		Check this box if you would like to display the Normal Option display button on the top of the map.
		</td>
	</tr>
	
	<tr>
		<td width="200"><label for="sizecontrol">Zoom Control Size</label></td>
		<td>
		<select id="sizecontrol" name="sizecontrol">
			<option value="GSmallMapControl" <?php byrd_select($this->sizecontrol, 'GSmallMapControl'); ?>>Small Controls</option>
			<option value="GLargeMapControl" <?php byrd_select($this->sizecontrol, 'GLargeMapControl'); ?>>Large Controls</option>
		</select>
		</td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		The small controls do not include the zoom slider.
		</td>
	</tr>
	<tr>
		<td width="200"><label for="directions">Allow Directions</label></td>
		<td><input id="directions" name="directions" type="checkbox" <?php byrd_checkbox($this->directions); ?> /></td>
	</tr>
	<tr>
		<td colspan="2" class="paypalinfo">
		The small controls do not include the zoom slider.
		</td>
	</tr>
	
</table>
		
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
<h2>Installation</h2>

<ol>
	<li>Upload the byrd_googlemap folder to your wp-content/plugins/ directory</li>
	<li>Activate the plugin from your wp-admin plugins menu</li>
	<li>Open the Google Map Configurations and set your options. Insert your Map API key from the link provided.</li>
	<li>You must click the "update options" button to activate the map.</li>
	<li>Paste the single line of code below into your widget blocks or into your php files.</li>
</ol>

<p>The last step to activating this template is to paste the map into whichever location you would like.
The code is very simple, here it is:</p>

<pre><b>&lt;?php global $byrdMap; $byrdMap-&gt;getGmap(); ?&gt;</b></pre>

<p>If you have any feature requests, errors or other general inquiries you may open the Support Forum that's built 
right into your configurations area and make a request. I will receive an email and answer your questions
as soon as possible.</p>


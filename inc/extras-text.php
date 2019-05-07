<?php 
/**
 * Extra Tools
 *
 * @package understrap
 */

/**
 * builds out the text in the admin extra tools page
 * 
 */
function extras_text_callback() { ?>
	<h1>Extra Tools</h1>
    <div class="postbox-container">
    	<div class="postbox">
    		<div class="inside">			  
			    <ul>
			   		<li><a href="export.php">Export your data</a> - for importing into another WordPress site or backing up.</li>
			    	<li><a href="options-reading.php">Privacy Settings</a> - options for controlling who can see your content.</li>
			    	<li><a href="plugins.php">Plugins</a> - We've already turned on most of the plugins you'll need but just in case.</li>
			    	<li><a href="widgets.php">Widgets</a> - For footer stuff and sidebar things.</li>
			    	<li><a href="admin.php?page=gf_edit_forms">Forms</a> - If you want to create a contact form or something like that.</li>
			   </ul>
			</div>   
		</div>	
	</div>

<?php } ?>
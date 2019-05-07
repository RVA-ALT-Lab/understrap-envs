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
    <h2>Extra Tools</h2>
    <ul>
   		<li><a href="export.php">Export your data</a> - for importing into another WordPress site or backing up.</li>
    	<li><a href="options-reading.php">Privacy Settings</a> - options for controlling who can see your content.</li>
   </ul>

<?php } ?>
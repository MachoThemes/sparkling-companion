<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
?>
<div id="demo_content">
	<div class="import-full-content">
		<p>
			<a href="#" class="button button-primary"
			   data-action="import-all"><?php _e( 'I want my site to look like your demo', 'sparkling-companion' ) ?></a>
			<span class="spinner"></span>
		</p>
		<div class="updated-message"><p><?php _e( 'Content Imported', 'sparkling-companion' ) ?></p></div>
	</div>
	<div>
		<p><?php _e( 'I want only to import demo widgets', 'sparkling-companion' ) ?></p>
		<p>
			<a href="#" class="button button-secondary"
			   data-action="import-widgets"><?php _e( 'Import Widgets', 'sparkling-companion' ) ?></a>
			<span class="spinner"></span>
		</p>
		<div class="updated-message"><p><?php _e( 'Content Imported', 'sparkling-companion' ) ?></p></div>
	</div>
</div>
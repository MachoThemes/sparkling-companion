<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Widgets
 */
add_action( 'widgets_init', 'sparkling_companion_widgets_init' );
function sparkling_companion_widgets_init() {

	$widgets = array(
		'home-call-for-action',
		'home-clients',
		'home-features',
		'home-parallax',
		'home-contact',
		'home-portfolio',
		'home-testimonial',
		'video',
	);

	foreach ( $widgets as $widget ) {
		require_once plugin_dir_path( __FILE__ ) . '/widgets/class-sparkling-' . $widget . '.php';
	}

	register_widget( 'Sparkling_Home_Parallax' );
	register_widget( 'Sparkling_Home_Features' );
	register_widget( 'Sparkling_Home_Call_For_Action' );
	register_widget( 'Sparkling_Home_Clients' );
	register_widget( 'Sparkling_Video' );
	register_widget( 'Sparkling_Home_Contact' );
	register_widget( 'sparkling_home_portfolio' );
	register_widget( 'Sparkling_Home_Testimonial' );
}

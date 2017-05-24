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
		'home-testimonials',
		'video'
	);

	foreach ( $widgets as $widget ) {
		require_once plugin_dir_path( __FILE__ ) . '/widgets/widget-' . $widget . '.php';
	}

	register_widget( 'sparkling_home_parallax' );
	register_widget( 'sparkling_home_parallax' );
	register_widget( 'sparkling_home_features' );
	register_widget( 'sparkling_home_CFA' );
	register_widget( 'sparkling_home_clients' );
	register_widget( 'sparkling_video' );
	register_widget( 'sparkling_home_contact' );
	register_widget( 'sparkling_home_portfolio' );
	register_widget( 'sparkling_home_testimonial' );
}
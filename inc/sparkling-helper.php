<?php
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/* Social Fields in Author Profile */
if ( ! function_exists( 'sparkling_author_socialLinks' ) ) {
	function sparkling_author_socialLinks( $contactmethods ) {
		// Add Twitter
		$contactmethods['twitter'] = 'Twitter';
		//add Facebook
		$contactmethods['facebook'] = 'Facebook';
		//add Github
		$contactmethods['github'] = 'Github';
		//add Dribble
		$contactmethods['dribble'] = 'Dribble';
		//add Vimeo
		$contactmethods['vimeo'] = 'Vimeo';

		return $contactmethods;
	}
}
add_filter( 'user_contactmethods', 'sparkling_author_socialLinks', 10, 1 );







add_action( 'wp_ajax_sparkling_get_attachment_media', 'sparkling_get_attachment_media' );
add_action( 'wp_ajax_nopriv_sparkling_get_attachment_media', 'sparkling_get_attachment_media' );

function sparkling_get_attachment_media() {
	$id  = intval( $_POST['attachment_id'] );
	$src = wp_get_attachment_image_src( $id, 'full', false );

	if ( ! empty( $src[0] ) ) {
		echo esc_url($src[0]);
		die();
	}

	$src = wp_get_attachment_url($id);
	if ( ! empty( $src ) ) {
		echo esc_url( $src );
	}

	die();
}
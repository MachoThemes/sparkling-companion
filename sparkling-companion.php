<?php
/*
 * Plugin Name:       Sparkling Companion
 * Plugin URI:        https://colorlib.com/wp/themes/sparkling/
 * Description:       Sparkling Companion is a companion plugin for Sparkling theme.
 * Version:           1.0.0
 * Author:            Colorlib
 * Author URI:        https://colorlib.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       sparkling
 * Domain Path:       /languages
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SPARKLING_COMPANION', '1.0.0' );

/**
 * Load the Dashboard Widget
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/epsilon-dashboard/class-epsilon-dashboard.php';

function sparkling_companion_dashboard_widget() {
	$epsilon_dashboard_args = array(
		'widget_title' => esc_html__( 'WordPress News', 'sparkling' ),
		'feed_url'  => array( 'https://colorlib.com/wp/feed/' ),
	);
	return Epsilon_Dashboard::instance( $epsilon_dashboard_args );
}

sparkling_companion_dashboard_widget();

// Alter portfolio query
function sparkling_alter_portfolio_archive( $query ) {
	if ( $query->is_main_query() && $query->is_post_type_archive() ) {
		if ( 'sparkling_portfolio' == $query->query_vars['post_type'] ) {
			$query->set( 'posts_per_page', -1 );
			$query->set( 'orderby', 'menu_order' );
		}
	}
}
add_action( 'pre_get_posts', 'sparkling_alter_portfolio_archive' );


/**
 * Load Customizer settings
 */
require_once plugin_dir_path( __FILE__ ) . '/inc/sparkling-customizer.php';
/**
 * Load the Widgets
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/sparkling-widgets.php';

/**
 * Load Enqueues
 */
require_once plugin_dir_path( __FILE__ ) . '/inc/sparkling-enqueues.php';

/**
 * Load Helper
 */
require_once plugin_dir_path( __FILE__ ) . '/inc/sparkling-helper.php';

/**
 * Load Import Demo Content Functionality
 */
require_once plugin_dir_path( __FILE__ ) . '/inc/sparkling-demo-content.php';

/**
 * Load the Custom Posts
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/sparkling-custom-post-types.php';

/**
 * Load Metabox for Portfolio
 */
require_once plugin_dir_path( __FILE__ ) . '/inc/sparkling-metabox.php';

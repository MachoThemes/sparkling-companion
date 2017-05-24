<?php
// Register Portfolio
function sparkling_companion_portfolio() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'sparkling' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'sparkling' ),
		'menu_name'             => __( 'Portfolios', 'sparkling' ),
		'name_admin_bar'        => __( 'Portfolio', 'sparkling' ),
		'archives'              => __( 'Item Archives', 'sparkling' ),
		'attributes'            => __( 'Item Attributes', 'sparkling' ),
		'parent_item_colon'     => __( 'Parent Item:', 'sparkling' ),
		'all_items'             => __( 'All Items', 'sparkling' ),
		'add_new_item'          => __( 'Add New Item', 'sparkling' ),
		'add_new'               => __( 'Add New', 'sparkling' ),
		'new_item'              => __( 'New Item', 'sparkling' ),
		'edit_item'             => __( 'Edit Item', 'sparkling' ),
		'update_item'           => __( 'Update Item', 'sparkling' ),
		'view_item'             => __( 'View Item', 'sparkling' ),
		'view_items'            => __( 'View Items', 'sparkling' ),
		'search_items'          => __( 'Search Item', 'sparkling' ),
		'not_found'             => __( 'Not found', 'sparkling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'sparkling' ),
		'featured_image'        => __( 'Featured Image', 'sparkling' ),
		'set_featured_image'    => __( 'Set featured image', 'sparkling' ),
		'remove_featured_image' => __( 'Remove featured image', 'sparkling' ),
		'use_featured_image'    => __( 'Use as featured image', 'sparkling' ),
		'insert_into_item'      => __( 'Insert into item', 'sparkling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'sparkling' ),
		'items_list'            => __( 'Items list', 'sparkling' ),
		'items_list_navigation' => __( 'Items list navigation', 'sparkling' ),
		'filter_items_list'     => __( 'Filter items list', 'sparkling' ),
	);
	$rewrite = array(
		'slug'                  => 'portfolio',
		'with_front'            => true,
		'pages'                 => true,
		'feeds'                 => true,
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'sparkling' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'query_var'             => 'portfolio',
		'rewrite'               => $rewrite,
		'capability_type'       => 'page',
	);
	register_post_type( 'sparkling_portfolio', $args );

}
add_action( 'init', 'sparkling_companion_portfolio', 0 );

// Register Custom Taxonomy
function sparkling_portfolio_type() {

	$labels = array(
		'name'                       => _x( 'Portfolio Types', 'Taxonomy General Name', 'sparkling' ),
		'singular_name'              => _x( 'Portfolio Type', 'Taxonomy Singular Name', 'sparkling' ),
		'menu_name'                  => __( 'Portfolio Type', 'sparkling' ),
		'all_items'                  => __( 'All Items', 'sparkling' ),
		'parent_item'                => __( 'Parent Item', 'sparkling' ),
		'parent_item_colon'          => __( 'Parent Item:', 'sparkling' ),
		'new_item_name'              => __( 'New Item Name', 'sparkling' ),
		'add_new_item'               => __( 'Add New Item', 'sparkling' ),
		'edit_item'                  => __( 'Edit Item', 'sparkling' ),
		'update_item'                => __( 'Update Item', 'sparkling' ),
		'view_item'                  => __( 'View Item', 'sparkling' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'sparkling' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'sparkling' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'sparkling' ),
		'popular_items'              => __( 'Popular Items', 'sparkling' ),
		'search_items'               => __( 'Search Items', 'sparkling' ),
		'not_found'                  => __( 'Not Found', 'sparkling' ),
		'no_terms'                   => __( 'No items', 'sparkling' ),
		'items_list'                 => __( 'Items list', 'sparkling' ),
		'items_list_navigation'      => __( 'Items list navigation', 'sparkling' ),
	);
	$rewrite = array(
		'slug'                       => 'portfolio-type',
		'with_front'                 => true,
		'hierarchical'               => false,
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'                  => 'portfolio-type',
		'rewrite'                    => $rewrite,
	);
	register_taxonomy( 'sparkling_portfolio_type', array( 'sparkling_portfolio' ), $args );

}
add_action( 'init', 'sparkling_portfolio_type', 0 );
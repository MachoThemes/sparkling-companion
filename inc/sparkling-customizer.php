<?php
function sparkling_companion_customizer( $wp_customize ) {

	$wp_customize->add_section( 'sparkling_portfolio_section' , array(
		'title'      => esc_html__( 'Portfolio Options', 'sparkling' ),
		'priority'   => 50,
		'panel' => 'sparkling_main_options',
	) );

	$wp_customize->add_setting('sparkling[portfolio_title]', array(
		'default' => '',
		'type' => 'option',
		'sanitize_callback' => 'sparkling_sanitize_nohtml',
	));
	$wp_customize->add_control('sparkling[portfolio_title]', array(
		'label' => __( 'Portfolio Archive Title', 'sparkling' ),
		'section' => 'sparkling_portfolio_section',
		'description' => __( 'Enter the title for Portfolio archive', 'sparkling' ),
		'type' => 'text',
	));

	$wp_customize->add_setting('sparkling[portfolio_layout]', array(
		'default'            => 'side-pull-left',
		'type'               => 'option',
		'sanitize_callback'  => 'sparkling_sanitize_layout',
	));
	$wp_customize->add_control('sparkling[portfolio_layout]', array(
		'label'        => __( 'Portfolio Layout Options', 'sparkling' ),
		'section'      => 'sparkling_portfolio_section',
		'type'         => 'select',
		'description'  => __( 'Choose between different layout options to be used as default', 'sparkling' ),
		'choices'      => array(
			'side-pull-left'  => esc_html__( 'Right Sidebar', 'sparkling' ),
			'side-pull-right' => esc_html__( 'Left Sidebar', 'sparkling' ),
			'no-sidebar'      => esc_html__( 'No Sidebar', 'sparkling' ),
			'full-width'      => esc_html__( 'Full Width', 'sparkling' ),
		),
	));

}

add_action( 'customize_register', 'sparkling_companion_customizer' );

<?php
/**
 * Hit and Run Theme Customizer
 *
 * @package hitandrun
 * @since  1.0.0 [<init>]
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function hitandrun_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'hitandrun_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'hitandrun_customize_partial_blogdescription',
		) );
	}
	/**
	 * Theme Options 
	 * @since  1.0.0 [Theme options for home page]
	 */
	$wp_customize->add_panel( 'ft_theme_options', array(
	 	'priority'       => 5,
	  'capability'     => 'edit_theme_options',
	  'theme_supports' => '',
	  'title'          => __('Hitandrun Theme Options', 'hitandrun'),
	  'description'    => __('Theme Settings', 'hitandrun'),
	) );
	/**
	 * 
	 * Ticker settings Section
	 * @since  1.0.0
	 * 
	 */
	// Adding customizer section for Ticker settings section
	$wp_customize->add_section( 'ticker_section' , array(
		'capability'     	=> 'edit_theme_options',
		'theme_supports' 	=> '',
		'priority'				=> 11,
		'title'						=> __( 'Ticker Section', 'hitandrun' ),
		'description'			=> __( 'Ticker Options version 1.0.0', 'hitandrun' ),
		'panel'  					=> 'ft_theme_options',
	) );
	for ($i=1; $i < 6; $i++) { 
	// Ticker Setting
	$wp_customize->add_setting( 'ticker_'.$i , array(
		'default'   				=> '',
		'sanitize_callback' => 'hitandrun_sanitize_html',
		'transport' 				=> 'refresh',
	) );
	// Ticker Setting Control
	$wp_customize->add_control( new WP_Customize_Control( 
		$wp_customize, 
		'ticker_'.$i, 
		array(
		'label'      	=> __( 'Ticker message '.$i, 'hitandrun' ),
		'section'    	=> 'ticker_section',
		'setting'   	=> 'ticker_'.$i,
		'type'				=> 'textarea',
		'description'	=> 'Add message for ticker '.$i,
	) ) );
	}
	/**
	 * [hitandrun_sanitize_html description]
	 * @param  [string] $input [input from textarea]
	 * @return [string]        [sanitize all input no tags]
	 */
	function hitandrun_sanitize_html( $input ) {
		return wp_strip_all_tags( $input );
	}
}
add_action( 'customize_register', 'hitandrun_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function hitandrun_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function hitandrun_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function hitandrun_customize_preview_js() {
	wp_enqueue_script( 'hitandrun-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20180224', true );
}
add_action( 'customize_preview_init', 'hitandrun_customize_preview_js' );

<?php
/**
 * Ascend Child Theme Functions
 *
 * @package Ascend Child
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue parent and child theme styles
 */
function ascend_child_enqueue_styles() {
	// Enqueue parent theme stylesheet
	wp_enqueue_style(
		'ascend-parent-style',
		get_template_directory_uri() . '/style.css',
		array(),
		wp_get_theme()->parent()->get( 'Version' )
	);

	// Enqueue child theme stylesheet
	wp_enqueue_style(
		'ascend-child-style',
		get_stylesheet_uri(),
		array( 'ascend-parent-style' ),
		wp_get_theme()->get( 'Version' )
	);
}

add_action( 'wp_enqueue_scripts', 'ascend_child_enqueue_styles', 20 );

/**
 * Add custom functions below this line
 */

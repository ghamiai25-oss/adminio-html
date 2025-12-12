<?php
/**
 * Theme Customizer
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register customizer options
 */
function ascend_customize_register( $wp_customize ) {
	
	// Add Ascend Panel
	$wp_customize->add_panel(
		'ascend_theme_options',
		array(
			'title'       => __( 'Ascend Theme Options', 'ascend' ),
			'description' => __( 'Customize your Ascend theme settings', 'ascend' ),
			'priority'    => 10,
		)
	);

	// ===== HEADER SECTION =====
	$wp_customize->add_section(
		'ascend_header_options',
		array(
			'title'    => __( 'Header Options', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 10,
		)
	);

	// Header Layout
	$wp_customize->add_setting(
		'ascend_header_layout',
		array(
			'default'           => 'layout-1',
			'sanitize_callback' => 'ascend_sanitize_select',
			'transport'         => 'refresh',
		)
	);

	$wp_customize->add_control(
		'ascend_header_layout',
		array(
			'label'    => __( 'Header Layout', 'ascend' ),
			'section'  => 'ascend_header_options',
			'type'     => 'select',
			'choices'  => array(
				'layout-1' => __( 'Layout 1 - Logo Left, Menu Right', 'ascend' ),
				'layout-2' => __( 'Layout 2 - Centered Logo', 'ascend' ),
				'layout-3' => __( 'Layout 3 - Logo Right, Menu Left', 'ascend' ),
			),
			'priority' => 10,
		)
	);

	// Sticky Header
	$wp_customize->add_setting(
		'ascend_sticky_header',
		array(
			'default'           => true,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascend_sticky_header',
		array(
			'label'    => __( 'Enable Sticky Header', 'ascend' ),
			'section'  => 'ascend_header_options',
			'type'     => 'checkbox',
			'priority' => 20,
		)
	);

	// Header Background Color
	$wp_customize->add_setting(
		'ascend_header_bg_color',
		array(
			'default'           => '#ffffff',
			'sanitize_callback' => 'sanitize_hex_color',
			'transport'         => 'postMessage',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'ascend_header_bg_color',
			array(
				'label'    => __( 'Header Background Color', 'ascend' ),
				'section'  => 'ascend_header_options',
				'priority' => 30,
			)
		)
	);

	// ===== FOOTER SECTION =====
	$wp_customize->add_section(
		'ascend_footer_options',
		array(
			'title'    => __( 'Footer Options', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 20,
		)
	);

	// Footer Layout
	$wp_customize->add_setting(
		'ascend_footer_layout',
		array(
			'default'           => 'layout-1',
			'sanitize_callback' => 'ascend_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ascend_footer_layout',
		array(
			'label'    => __( 'Footer Layout', 'ascend' ),
			'section'  => 'ascend_footer_options',
			'type'     => 'select',
			'choices'  => array(
				'layout-1' => __( 'Layout 1 - 4 Columns', 'ascend' ),
				'layout-2' => __( 'Layout 2 - 3 Columns', 'ascend' ),
				'layout-3' => __( 'Layout 3 - 2 Columns', 'ascend' ),
			),
			'priority' => 10,
		)
	);

	// Footer Copyright Text
	$wp_customize->add_setting(
		'ascend_footer_copyright',
		array(
			'default'           => sprintf( __( '&copy; %d %s. All rights reserved.', 'ascend' ), gmdate( 'Y' ), get_bloginfo( 'name' ) ),
			'sanitize_callback' => 'wp_kses_post',
		)
	);

	$wp_customize->add_control(
		'ascend_footer_copyright',
		array(
			'label'    => __( 'Footer Copyright Text', 'ascend' ),
			'section'  => 'ascend_footer_options',
			'type'     => 'textarea',
			'priority' => 20,
		)
	);

	// ===== TYPOGRAPHY SECTION =====
	$wp_customize->add_section(
		'ascend_typography',
		array(
			'title'    => __( 'Typography', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 30,
		)
	);

	// Body Font Family
	$wp_customize->add_setting(
		'ascend_body_font',
		array(
			'default'           => 'system',
			'sanitize_callback' => 'ascend_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ascend_body_font',
		array(
			'label'    => __( 'Body Font', 'ascend' ),
			'section'  => 'ascend_typography',
			'type'     => 'select',
			'choices'  => ascend_get_font_choices(),
			'priority' => 10,
		)
	);

	// Heading Font Family
	$wp_customize->add_setting(
		'ascend_heading_font',
		array(
			'default'           => 'system',
			'sanitize_callback' => 'ascend_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ascend_heading_font',
		array(
			'label'    => __( 'Heading Font', 'ascend' ),
			'section'  => 'ascend_typography',
			'type'     => 'select',
			'choices'  => ascend_get_font_choices(),
			'priority' => 20,
		)
	);

	// ===== SOCIAL MEDIA SECTION =====
	$wp_customize->add_section(
		'ascend_social_media',
		array(
			'title'    => __( 'Social Media', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 40,
		)
	);

	// Social Media Links
	$social_networks = array(
		'facebook'  => 'Facebook',
		'twitter'   => 'Twitter',
		'instagram' => 'Instagram',
		'linkedin'  => 'LinkedIn',
		'youtube'   => 'YouTube',
		'pinterest' => 'Pinterest',
	);

	$priority = 10;
	foreach ( $social_networks as $network => $label ) {
		$wp_customize->add_setting(
			'ascend_social_' . $network,
			array(
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			'ascend_social_' . $network,
			array(
				'label'    => $label . ' ' . __( 'URL', 'ascend' ),
				'section'  => 'ascend_social_media',
				'type'     => 'url',
				'priority' => $priority,
			)
		);
		$priority += 10;
	}

	// ===== BLOG OPTIONS =====
	$wp_customize->add_section(
		'ascend_blog_options',
		array(
			'title'    => __( 'Blog Options', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 50,
		)
	);

	// Blog Layout
	$wp_customize->add_setting(
		'ascend_blog_layout',
		array(
			'default'           => 'sidebar-right',
			'sanitize_callback' => 'ascend_sanitize_select',
		)
	);

	$wp_customize->add_control(
		'ascend_blog_layout',
		array(
			'label'    => __( 'Blog Layout', 'ascend' ),
			'section'  => 'ascend_blog_options',
			'type'     => 'select',
			'choices'  => array(
				'sidebar-right' => __( 'Right Sidebar', 'ascend' ),
				'sidebar-left'  => __( 'Left Sidebar', 'ascend' ),
				'no-sidebar'    => __( 'No Sidebar (Full Width)', 'ascend' ),
			),
			'priority' => 10,
		)
	);

	// Excerpt Length
	$wp_customize->add_setting(
		'ascend_excerpt_length',
		array(
			'default'           => 30,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascend_excerpt_length',
		array(
			'label'       => __( 'Excerpt Length (words)', 'ascend' ),
			'section'     => 'ascend_blog_options',
			'type'        => 'number',
			'input_attrs' => array(
				'min'  => 10,
				'max'  => 100,
				'step' => 5,
			),
			'priority'    => 20,
		)
	);

	// ===== PERFORMANCE OPTIONS =====
	$wp_customize->add_section(
		'ascend_performance',
		array(
			'title'    => __( 'Performance', 'ascend' ),
			'panel'    => 'ascend_theme_options',
			'priority' => 60,
		)
	);

	// Lazy Load Images
	$wp_customize->add_setting(
		'ascend_lazy_load',
		array(
			'default'           => true,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascend_lazy_load',
		array(
			'label'    => __( 'Enable Lazy Loading', 'ascend' ),
			'section'  => 'ascend_performance',
			'type'     => 'checkbox',
			'priority' => 10,
		)
	);

	// Minify CSS
	$wp_customize->add_setting(
		'ascend_minify_css',
		array(
			'default'           => false,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'ascend_minify_css',
		array(
			'label'       => __( 'Minify CSS', 'ascend' ),
			'description' => __( 'Experimental feature', 'ascend' ),
			'section'     => 'ascend_performance',
			'type'        => 'checkbox',
			'priority'    => 20,
		)
	);
}

add_action( 'customize_register', 'ascend_customize_register' );

/**
 * Get font choices
 */
function ascend_get_font_choices() {
	return array(
		'system'         => __( 'System Font Stack', 'ascend' ),
		'roboto'         => 'Roboto',
		'open-sans'      => 'Open Sans',
		'lato'           => 'Lato',
		'montserrat'     => 'Montserrat',
		'raleway'        => 'Raleway',
		'poppins'        => 'Poppins',
		'playfair'       => 'Playfair Display',
		'merriweather'   => 'Merriweather',
	);
}

/**
 * Sanitize select
 */
function ascend_sanitize_select( $input, $setting ) {
	$input   = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Customizer live preview
 */
function ascend_customizer_live_preview() {
	wp_enqueue_script(
		'ascend-customizer',
		ASCEND_URI . 'assets/js/customizer.js',
		array( 'customize-preview' ),
		ASCEND_VERSION,
		true
	);
}

add_action( 'customize_preview_init', 'ascend_customizer_live_preview' );

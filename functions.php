<?php
/**
 * Ascend Theme Functions
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define theme constants
if ( ! defined( 'ASCEND_VERSION' ) ) {
    define( 'ASCEND_VERSION', wp_get_theme()->get( 'Version' ) );
}

if ( ! defined( 'ASCEND_DIR' ) ) {
    define( 'ASCEND_DIR', trailingslashit( get_template_directory() ) );
}

if ( ! defined( 'ASCEND_URI' ) ) {
    define( 'ASCEND_URI', trailingslashit( get_template_directory_uri() ) );
}

/**
 * Load additional theme functions
 */
require_once ASCEND_DIR . 'inc/enqueue.php';
require_once ASCEND_DIR . 'inc/template-tags.php';
require_once ASCEND_DIR . 'inc/template-hooks.php';
require_once ASCEND_DIR . 'inc/customizer.php';
require_once ASCEND_DIR . 'inc/custom-post-types.php';
require_once ASCEND_DIR . 'inc/schema.php';
require_once ASCEND_DIR . 'inc/demo-import.php';

// WooCommerce integration
if ( class_exists( 'WooCommerce' ) ) {
    require_once ASCEND_DIR . 'inc/woocommerce.php';
}

/**
 * Setup theme support
 */
function ascend_setup() {
    // Automatic feed links
    add_theme_support( 'automatic-feed-links' );

    // Title tag
    add_theme_support( 'title-tag' );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1200, 630, true );
    add_image_size( 'ascend-hero', 1920, 1080, true );
    add_image_size( 'ascend-large', 1200, 630, true );
    add_image_size( 'ascend-medium', 768, 432, true );
    add_image_size( 'ascend-small', 360, 240, true );

    // HTML5 support
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );

    // Custom logo
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 60,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true,
        )
    );

    // Editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/editor-style.css' );

    // Wide align
    add_theme_support( 'align-wide' );

    // Responsive embeds
    add_theme_support( 'responsive-embeds' );

    // Custom spacing
    add_theme_support( 'custom-spacing' );

    // Custom units
    add_theme_support( 'custom-units' );

    // Menus
    register_nav_menus(
        array(
            'primary'   => __( 'Primary Menu', 'ascend' ),
            'secondary' => __( 'Secondary Menu', 'ascend' ),
            'footer'    => __( 'Footer Menu', 'ascend' ),
        )
    );

    // Load text domain for translations
    load_theme_textdomain( 'ascend', ASCEND_DIR . 'languages' );
}

add_action( 'after_setup_theme', 'ascend_setup' );

/**
 * Set content width
 */
if ( ! isset( $content_width ) ) {
    $content_width = 1200;
}

/**
 * Register sidebars
 */
function ascend_widgets_init() {
    register_sidebar(
        array(
            'name'          => __( 'Primary Sidebar', 'ascend' ),
            'id'            => 'primary-sidebar',
            'description'   => __( 'Main sidebar', 'ascend' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );

    register_sidebar(
        array(
            'name'          => __( 'Footer Sidebar', 'ascend' ),
            'id'            => 'footer-sidebar',
            'description'   => __( 'Footer widget area', 'ascend' ),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>',
        )
    );
}

add_action( 'widgets_init', 'ascend_widgets_init' );

/**
 * Enqueue block editor styles
 */
function ascend_block_editor_styles() {
    wp_enqueue_style(
        'ascend-block-editor',
        ASCEND_URI . 'assets/css/block-editor.css',
        array(),
        ASCEND_VERSION
    );
}

add_action( 'enqueue_block_editor_assets', 'ascend_block_editor_styles' );

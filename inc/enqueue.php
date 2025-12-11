<?php
/**
 * Enqueue scripts and styles
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Enqueue frontend styles and scripts
 */
function ascend_enqueue_assets() {
	// Main stylesheet
	wp_enqueue_style(
		'ascend-style',
		ASCEND_URI . 'style.css',
		array(),
		ASCEND_VERSION,
		'all'
	);

	// Preload system fonts for performance
	wp_enqueue_style(
		'ascend-fonts-system',
		'',
		array(),
		ASCEND_VERSION
	);

	// Minimal inline critical CSS
	$critical_css = ascend_get_critical_css();
	if ( ! empty( $critical_css ) ) {
		wp_add_inline_style( 'ascend-style', $critical_css );
	}

	// Minimal JavaScript
	wp_enqueue_script(
		'ascend-main',
		ASCEND_URI . 'assets/js/main.js',
		array(),
		ASCEND_VERSION,
		array(
			'strategy' => 'defer',
		)
	);

	// Localize script with necessary data
	wp_localize_script(
		'ascend-main',
		'ascendSettings',
		array(
			'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
			'themePath' => ASCEND_URI,
		)
	);

	// Comment reply script (if single post)
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'ascend_enqueue_assets', 10 );

/**
 * Get critical CSS for above-the-fold content
 *
 * @return string Critical CSS
 */
function ascend_get_critical_css() {
	return <<<'CSS'
/* Critical CSS for above-the-fold */
body {
	font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", sans-serif;
	margin: 0;
	padding: 0;
}

header,
nav {
	background-color: #ffffff;
	box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

main {
	margin: 0 auto;
	max-width: 1200px;
	padding: 0 1rem;
}
CSS;
}

/**
 * Disable emoji scripts for performance
 */
function ascend_disable_emoji() {
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}

add_action( 'init', 'ascend_disable_emoji' );

/**
 * Remove unnecessary WordPress default styles and scripts
 */
function ascend_dequeue_unnecessary_styles() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	// Keep classic theme styles if needed
	if ( is_admin() ) {
		return;
	}
}

add_action( 'wp_enqueue_scripts', 'ascend_dequeue_unnecessary_styles', 20 );

/**
 * Defer non-critical CSS
 */
function ascend_defer_css() {
	if ( is_admin() ) {
		return;
	}

	$defer_styles = array(
		'wp-block-library',
	);

	foreach ( $defer_styles as $style ) {
		if ( wp_style_is( $style, 'enqueued' ) ) {
			wp_style_add_data( $style, 'group', 1 );
		}
	}
}

add_action( 'wp_enqueue_scripts', 'ascend_defer_css', 30 );

/**
 * Print async/defer attributes for scripts
 */
function ascend_script_loader_tag( $tag, $handle, $src ) {
	// Apply defer to main script
	if ( 'ascend-main' === $handle ) {
		return str_replace( ' src', ' defer src', $tag );
	}

	return $tag;
}

add_filter( 'script_loader_tag', 'ascend_script_loader_tag', 10, 3 );

/**
 * Add preconnect and dns-prefetch for performance
 */
function ascend_head_prefetch() {
	// Preconnect to Google Fonts if used
	echo '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
	echo '<link rel="dns-prefetch" href="https://fonts.googleapis.com">' . "\n";
}

add_action( 'wp_head', 'ascend_head_prefetch', 0 );

/**
 * Optimize images with lazy loading by default
 */
function ascend_add_lazy_loading( $html, $post_id ) {
	if ( ! empty( $html ) && ! has_post_format( 'aside', $post_id ) ) {
		$html = str_replace( '<img ', '<img loading="lazy" ', $html );
	}

	return $html;
}

add_filter( 'post_thumbnail_html', 'ascend_add_lazy_loading', 10, 2 );

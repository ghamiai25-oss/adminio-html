<?php
/**
 * Template Hooks
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Header hooks
 */

/**
 * Fires before the header element
 */
function ascend_before_header() {
	do_action( 'ascend_before_header' );
}

/**
 * Fires inside the header element, at the beginning
 */
function ascend_header_start() {
	do_action( 'ascend_header_start' );
}

/**
 * Fires inside the header element, at the end
 */
function ascend_header_end() {
	do_action( 'ascend_header_end' );
}

/**
 * Fires after the header element
 */
function ascend_after_header() {
	do_action( 'ascend_after_header' );
}

/**
 * Main content hooks
 */

/**
 * Fires before the main element
 */
function ascend_before_main() {
	do_action( 'ascend_before_main' );
}

/**
 * Fires inside the main element, at the beginning
 */
function ascend_main_start() {
	do_action( 'ascend_main_start' );
}

/**
 * Fires inside the main element, at the end
 */
function ascend_main_end() {
	do_action( 'ascend_main_end' );
}

/**
 * Fires after the main element
 */
function ascend_after_main() {
	do_action( 'ascend_after_main' );
}

/**
 * Sidebar hooks
 */

/**
 * Fires before the sidebar
 */
function ascend_before_sidebar() {
	do_action( 'ascend_before_sidebar' );
}

/**
 * Fires inside the sidebar, at the beginning
 */
function ascend_sidebar_start() {
	do_action( 'ascend_sidebar_start' );
}

/**
 * Fires inside the sidebar, at the end
 */
function ascend_sidebar_end() {
	do_action( 'ascend_sidebar_end' );
}

/**
 * Fires after the sidebar
 */
function ascend_after_sidebar() {
	do_action( 'ascend_after_sidebar' );
}

/**
 * Footer hooks
 */

/**
 * Fires before the footer element
 */
function ascend_before_footer() {
	do_action( 'ascend_before_footer' );
}

/**
 * Fires inside the footer element, at the beginning
 */
function ascend_footer_start() {
	do_action( 'ascend_footer_start' );
}

/**
 * Fires inside the footer element, at the end
 */
function ascend_footer_end() {
	do_action( 'ascend_footer_end' );
}

/**
 * Fires after the footer element
 */
function ascend_after_footer() {
	do_action( 'ascend_after_footer' );
}

/**
 * Post hooks
 */

/**
 * Fires before the post content
 */
function ascend_before_post_content() {
	do_action( 'ascend_before_post_content' );
}

/**
 * Fires after the post content
 */
function ascend_after_post_content() {
	do_action( 'ascend_after_post_content' );
}

/**
 * Fires before the post meta
 */
function ascend_before_post_meta() {
	do_action( 'ascend_before_post_meta' );
}

/**
 * Fires after the post meta
 */
function ascend_after_post_meta() {
	do_action( 'ascend_after_post_meta' );
}

<?php
/**
 * Custom Post Types
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Register Portfolio Post Type
 */
function ascend_register_portfolio_post_type() {
	$labels = array(
		'name'                  => _x( 'Portfolio', 'Post Type General Name', 'ascend' ),
		'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'ascend' ),
		'menu_name'             => __( 'Portfolio', 'ascend' ),
		'name_admin_bar'        => __( 'Portfolio Item', 'ascend' ),
		'archives'              => __( 'Portfolio Archives', 'ascend' ),
		'attributes'            => __( 'Portfolio Attributes', 'ascend' ),
		'parent_item_colon'     => __( 'Parent Item:', 'ascend' ),
		'all_items'             => __( 'All Items', 'ascend' ),
		'add_new_item'          => __( 'Add New Item', 'ascend' ),
		'add_new'               => __( 'Add New', 'ascend' ),
		'new_item'              => __( 'New Item', 'ascend' ),
		'edit_item'             => __( 'Edit Item', 'ascend' ),
		'update_item'           => __( 'Update Item', 'ascend' ),
		'view_item'             => __( 'View Item', 'ascend' ),
		'view_items'            => __( 'View Items', 'ascend' ),
		'search_items'          => __( 'Search Item', 'ascend' ),
		'not_found'             => __( 'Not found', 'ascend' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ascend' ),
		'featured_image'        => __( 'Featured Image', 'ascend' ),
		'set_featured_image'    => __( 'Set featured image', 'ascend' ),
		'remove_featured_image' => __( 'Remove featured image', 'ascend' ),
		'use_featured_image'    => __( 'Use as featured image', 'ascend' ),
		'insert_into_item'      => __( 'Insert into item', 'ascend' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'ascend' ),
		'items_list'            => __( 'Items list', 'ascend' ),
		'items_list_navigation' => __( 'Items list navigation', 'ascend' ),
		'filter_items_list'     => __( 'Filter items list', 'ascend' ),
	);

	$args = array(
		'label'               => __( 'Portfolio Item', 'ascend' ),
		'description'         => __( 'Portfolio items', 'ascend' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-portfolio',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);

	register_post_type( 'portfolio', $args );

	// Register Portfolio Category Taxonomy
	$category_labels = array(
		'name'              => _x( 'Portfolio Categories', 'taxonomy general name', 'ascend' ),
		'singular_name'     => _x( 'Portfolio Category', 'taxonomy singular name', 'ascend' ),
		'search_items'      => __( 'Search Categories', 'ascend' ),
		'all_items'         => __( 'All Categories', 'ascend' ),
		'parent_item'       => __( 'Parent Category', 'ascend' ),
		'parent_item_colon' => __( 'Parent Category:', 'ascend' ),
		'edit_item'         => __( 'Edit Category', 'ascend' ),
		'update_item'       => __( 'Update Category', 'ascend' ),
		'add_new_item'      => __( 'Add New Category', 'ascend' ),
		'new_item_name'     => __( 'New Category Name', 'ascend' ),
		'menu_name'         => __( 'Categories', 'ascend' ),
	);

	$category_args = array(
		'hierarchical'      => true,
		'labels'            => $category_labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'portfolio-category' ),
		'show_in_rest'      => true,
	);

	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $category_args );
}

add_action( 'init', 'ascend_register_portfolio_post_type' );

/**
 * Register Team Post Type
 */
function ascend_register_team_post_type() {
	$labels = array(
		'name'                  => _x( 'Team', 'Post Type General Name', 'ascend' ),
		'singular_name'         => _x( 'Team Member', 'Post Type Singular Name', 'ascend' ),
		'menu_name'             => __( 'Team', 'ascend' ),
		'name_admin_bar'        => __( 'Team Member', 'ascend' ),
		'add_new_item'          => __( 'Add New Member', 'ascend' ),
		'new_item'              => __( 'New Member', 'ascend' ),
		'edit_item'             => __( 'Edit Member', 'ascend' ),
		'view_item'             => __( 'View Member', 'ascend' ),
		'all_items'             => __( 'All Members', 'ascend' ),
	);

	$args = array(
		'label'               => __( 'Team Member', 'ascend' ),
		'description'         => __( 'Team members', 'ascend' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 6,
		'menu_icon'           => 'dashicons-groups',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);

	register_post_type( 'team', $args );
}

add_action( 'init', 'ascend_register_team_post_type' );

/**
 * Register Testimonials Post Type
 */
function ascend_register_testimonials_post_type() {
	$labels = array(
		'name'                  => _x( 'Testimonials', 'Post Type General Name', 'ascend' ),
		'singular_name'         => _x( 'Testimonial', 'Post Type Singular Name', 'ascend' ),
		'menu_name'             => __( 'Testimonials', 'ascend' ),
		'name_admin_bar'        => __( 'Testimonial', 'ascend' ),
		'add_new_item'          => __( 'Add New Testimonial', 'ascend' ),
		'new_item'              => __( 'New Testimonial', 'ascend' ),
		'edit_item'             => __( 'Edit Testimonial', 'ascend' ),
		'view_item'             => __( 'View Testimonial', 'ascend' ),
		'all_items'             => __( 'All Testimonials', 'ascend' ),
	);

	$args = array(
		'label'               => __( 'Testimonial', 'ascend' ),
		'description'         => __( 'Client testimonials', 'ascend' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 7,
		'menu_icon'           => 'dashicons-testimonial',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => false,
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => true,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'show_in_rest'        => true,
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'init', 'ascend_register_testimonials_post_type' );

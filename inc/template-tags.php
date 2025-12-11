<?php
/**
 * Template Tags Helper Functions
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Display the site logo
 */
function ascend_the_logo() {
	if ( has_custom_logo() ) {
		the_custom_logo();
	} else {
		echo '<strong>' . esc_html( get_bloginfo( 'name' ) ) . '</strong>';
	}
}

/**
 * Display the site title
 */
function ascend_the_site_title() {
	if ( is_front_page() && is_home() ) {
		printf(
			'<h1><a href="%1$s">%2$s</a></h1>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	} else {
		printf(
			'<p><a href="%1$s">%2$s</a></p>',
			esc_url( home_url( '/' ) ),
			esc_html( get_bloginfo( 'name' ) )
		);
	}
}

/**
 * Display the site description
 */
function ascend_the_site_description() {
	$description = get_bloginfo( 'description', 'display' );
	if ( $description ) {
		printf(
			'<p class="site-description">%s</p>',
			esc_html( $description )
		);
	}
}

/**
 * Display primary navigation
 */
function ascend_primary_navigation() {
	wp_nav_menu(
		array(
			'theme_location' => 'primary',
			'fallback_cb'    => 'wp_page_menu',
			'depth'          => 3,
			'container'      => 'nav',
			'container_class' => 'primary-navigation',
			'menu_class'     => 'primary-menu',
		)
	);
}

/**
 * Display secondary navigation
 */
function ascend_secondary_navigation() {
	wp_nav_menu(
		array(
			'theme_location' => 'secondary',
			'fallback_cb'    => '',
			'depth'          => 2,
			'container'      => 'nav',
			'container_class' => 'secondary-navigation',
			'menu_class'     => 'secondary-menu',
		)
	);
}

/**
 * Display footer navigation
 */
function ascend_footer_navigation() {
	wp_nav_menu(
		array(
			'theme_location' => 'footer',
			'fallback_cb'    => '',
			'depth'          => 1,
			'container'      => 'nav',
			'container_class' => 'footer-navigation',
			'menu_class'     => 'footer-menu',
		)
	);
}

/**
 * Display post meta information
 */
function ascend_posted_on() {
	if ( ! get_the_date() ) {
		return;
	}

	printf(
		'<span class="posted-on">%s <a href="%s">%s</a></span>',
		esc_html__( 'Posted on', 'ascend' ),
		esc_url( get_the_permalink() ),
		esc_html( get_the_date() )
	);
}

/**
 * Display post author
 */
function ascend_posted_by() {
	if ( ! get_the_author() ) {
		return;
	}

	printf(
		'<span class="posted-by">%s <a href="%s">%s</a></span>',
		esc_html__( 'by', 'ascend' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_html( get_the_author() )
	);
}

/**
 * Display post categories
 */
function ascend_post_categories() {
	if ( ! has_category() ) {
		return;
	}

	echo '<span class="post-categories">';
	echo wp_kses_post( get_the_category_list( ', ' ) );
	echo '</span>';
}

/**
 * Display post tags
 */
function ascend_post_tags() {
	if ( ! has_tag() ) {
		return;
	}

	echo '<div class="post-tags">';
	the_tags( '<span class="tag-label">' . esc_html__( 'Tagged: ', 'ascend' ) . '</span>', ', ', '' );
	echo '</div>';
}

/**
 * Display edit post link
 */
function ascend_edit_post_link() {
	edit_post_link(
		sprintf(
			wp_kses(
				__( 'Edit <span class="sr-only">%s</span>', 'ascend' ),
				array( 'span' => array( 'class' => array() ) )
			),
			esc_attr( get_the_title() )
		),
		'<span class="edit-link">',
		'</span>'
	);
}

/**
 * Display featured image
 */
function ascend_the_featured_image() {
	if ( has_post_thumbnail() ) {
		the_post_thumbnail(
			'ascend-large',
			array(
				'alt'   => the_title_attribute( array( 'echo' => false ) ),
				'class' => 'featured-image',
			)
		);
	}
}

/**
 * Display pagination
 */
function ascend_pagination() {
	the_posts_pagination(
		array(
			'mid_size'           => 2,
			'prev_text'          => esc_html__( 'Previous', 'ascend' ),
			'next_text'          => esc_html__( 'Next', 'ascend' ),
			'screen_reader_text' => esc_html__( 'Posts navigation', 'ascend' ),
		)
	);
}

/**
 * Display comments
 */
function ascend_comments() {
	if ( ! comments_open() && ! is_singular() ) {
		return;
	}

	if ( get_comments_number() && comments_open() ) {
		comments_template();
	}
}

/**
 * Get design token value
 *
 * @param string $token Token name (e.g., 'color-primary', 'space-md').
 * @return mixed Token value or empty string.
 */
function ascend_get_token( $token ) {
	$tokens = array(
		'color-primary'       => '#0066cc',
		'color-primary-dark'  => '#0052a3',
		'color-secondary'     => '#6b5b95',
		'color-accent'        => '#ff6b6b',
		'color-neutral-100'   => '#fafafa',
		'color-neutral-200'   => '#f0f0f0',
		'color-neutral-300'   => '#e0e0e0',
		'color-neutral-500'   => '#7a7a7a',
		'color-neutral-700'   => '#333333',
		'color-neutral-900'   => '#0a0a0a',
		'color-success'       => '#1a9d6f',
		'color-warning'       => '#f0ad4e',
		'color-error'         => '#d9534f',
		'space-xs'            => '0.25rem',
		'space-sm'            => '0.5rem',
		'space-md'            => '1rem',
		'space-lg'            => '1.5rem',
		'space-xl'            => '2rem',
		'space-2xl'           => '3rem',
		'space-3xl'           => '4rem',
		'space-4xl'           => '6rem',
		'font-size-xs'        => '0.75rem',
		'font-size-sm'        => '0.875rem',
		'font-size-base'      => '1rem',
		'font-size-lg'        => '1.125rem',
		'font-size-xl'        => '1.25rem',
		'font-size-2xl'       => '1.5rem',
		'font-size-3xl'       => '1.875rem',
		'font-size-4xl'       => '2.25rem',
		'font-size-5xl'       => '3rem',
		'radius-sm'           => '0.25rem',
		'radius-md'           => '0.375rem',
		'radius-lg'           => '0.5rem',
		'radius-xl'           => '1rem',
	);

	/**
	 * Filter design tokens
	 *
	 * @param array  $tokens Token array.
	 * @param string $token  Token name.
	 */
	$tokens = apply_filters( 'ascend_design_tokens', $tokens, $token );

	return isset( $tokens[ $token ] ) ? $tokens[ $token ] : '';
}

/**
 * Display design token value
 *
 * @param string $token Token name.
 */
function ascend_the_token( $token ) {
	echo esc_attr( ascend_get_token( $token ) );
}

/**
 * Get all design tokens
 *
 * @return array All design tokens.
 */
function ascend_get_all_tokens() {
	$all_tokens = array(
		'colors' => array(
			'primary'       => '#0066cc',
			'primary-dark'  => '#0052a3',
			'secondary'     => '#6b5b95',
			'accent'        => '#ff6b6b',
			'neutral-100'   => '#fafafa',
			'neutral-200'   => '#f0f0f0',
			'neutral-300'   => '#e0e0e0',
			'neutral-500'   => '#7a7a7a',
			'neutral-700'   => '#333333',
			'neutral-900'   => '#0a0a0a',
			'success'       => '#1a9d6f',
			'warning'       => '#f0ad4e',
			'error'         => '#d9534f',
		),
		'spacing' => array(
			'xs'   => '0.25rem',
			'sm'   => '0.5rem',
			'md'   => '1rem',
			'lg'   => '1.5rem',
			'xl'   => '2rem',
			'2xl'  => '3rem',
			'3xl'  => '4rem',
			'4xl'  => '6rem',
		),
		'typography' => array(
			'font-size' => array(
				'xs'    => '0.75rem',
				'sm'    => '0.875rem',
				'base'  => '1rem',
				'lg'    => '1.125rem',
				'xl'    => '1.25rem',
				'2xl'   => '1.5rem',
				'3xl'   => '1.875rem',
				'4xl'   => '2.25rem',
				'5xl'   => '3rem',
			),
			'line-height' => array(
				'tight'   => '1.25',
				'normal'  => '1.5',
				'relaxed' => '1.75',
			),
			'font-weight' => array(
				'normal'    => '400',
				'medium'    => '500',
				'semibold' => '600',
				'bold'      => '700',
			),
		),
		'border-radius' => array(
			'sm' => '0.25rem',
			'md' => '0.375rem',
			'lg' => '0.5rem',
			'xl' => '1rem',
		),
	);

	/**
	 * Filter all design tokens
	 *
	 * @param array $all_tokens All tokens.
	 */
	return apply_filters( 'ascend_all_design_tokens', $all_tokens );
}

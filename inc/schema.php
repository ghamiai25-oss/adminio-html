<?php
/**
 * Schema Markup for SEO
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add schema to html tag
 */
function ascend_html_schema() {
	$schema = 'https://schema.org/';
	
	if ( is_singular( 'post' ) ) {
		$type = 'Article';
	} elseif ( is_author() ) {
		$type = 'ProfilePage';
	} elseif ( is_search() ) {
		$type = 'SearchResultsPage';
	} else {
		$type = 'WebPage';
	}
	
	echo 'itemscope itemtype="' . esc_url( $schema . $type ) . '"';
}

/**
 * Article schema for single posts
 */
function ascend_article_schema() {
	if ( ! is_singular( 'post' ) ) {
		return;
	}
	
	global $post;
	
	$schema = array(
		'@context'      => 'https://schema.org',
		'@type'         => 'Article',
		'headline'      => get_the_title(),
		'datePublished' => get_the_date( 'c' ),
		'dateModified'  => get_the_modified_date( 'c' ),
		'author'        => array(
			'@type' => 'Person',
			'name'  => get_the_author(),
		),
		'publisher'     => array(
			'@type' => 'Organization',
			'name'  => get_bloginfo( 'name' ),
			'logo'  => array(
				'@type' => 'ImageObject',
				'url'   => get_site_icon_url(),
			),
		),
	);
	
	if ( has_post_thumbnail() ) {
		$schema['image'] = array(
			'@type' => 'ImageObject',
			'url'   => get_the_post_thumbnail_url( $post, 'full' ),
		);
	}
	
	if ( has_excerpt() ) {
		$schema['description'] = get_the_excerpt();
	}
	
	?>
	<script type="application/ld+json">
		<?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?>
	</script>
	<?php
}

add_action( 'wp_head', 'ascend_article_schema' );

/**
 * Organization schema for home page
 */
function ascend_organization_schema() {
	if ( ! is_front_page() ) {
		return;
	}
	
	$schema = array(
		'@context' => 'https://schema.org',
		'@type'    => 'Organization',
		'name'     => get_bloginfo( 'name' ),
		'url'      => home_url(),
		'logo'     => get_site_icon_url(),
	);
	
	// Add social profiles if available
	$social_profiles = array();
	$social_networks = array( 'facebook', 'twitter', 'instagram', 'linkedin', 'youtube', 'pinterest' );
	
	foreach ( $social_networks as $network ) {
		$url = get_theme_mod( 'ascend_social_' . $network );
		if ( $url ) {
			$social_profiles[] = $url;
		}
	}
	
	if ( ! empty( $social_profiles ) ) {
		$schema['sameAs'] = $social_profiles;
	}
	
	?>
	<script type="application/ld+json">
		<?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?>
	</script>
	<?php
}

add_action( 'wp_head', 'ascend_organization_schema' );

/**
 * Breadcrumb schema
 */
function ascend_breadcrumb_schema() {
	if ( is_front_page() ) {
		return;
	}
	
	$items = array();
	$position = 1;
	
	// Home
	$items[] = array(
		'@type'    => 'ListItem',
		'position' => $position++,
		'name'     => __( 'Home', 'ascend' ),
		'item'     => home_url(),
	);
	
	// Current page
	if ( is_singular() ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position,
			'name'     => get_the_title(),
			'item'     => get_permalink(),
		);
	} elseif ( is_archive() ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position,
			'name'     => get_the_archive_title(),
		);
	}
	
	if ( empty( $items ) || count( $items ) < 2 ) {
		return;
	}
	
	$schema = array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $items,
	);
	
	?>
	<script type="application/ld+json">
		<?php echo wp_json_encode( $schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT ); ?>
	</script>
	<?php
}

add_action( 'wp_head', 'ascend_breadcrumb_schema' );

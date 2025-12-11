<?php
/**
 * Header template
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<a class="skip-link" href="#main"><?php esc_html_e( 'Skip to content', 'ascend' ); ?></a>

	<?php ascend_before_header(); ?>

	<header id="masthead" class="site-header">
		<?php ascend_header_start(); ?>

		<div class="site-branding">
			<?php
			ascend_the_logo();
			ascend_the_site_title();
			ascend_the_site_description();
			?>
		</div><!-- .site-branding -->

		<?php ascend_primary_navigation(); ?>

		<?php ascend_header_end(); ?>
	</header><!-- #masthead -->

	<?php ascend_after_header(); ?>

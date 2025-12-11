<?php
/**
 * Post excerpt template part
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php ascend_before_post_content(); ?>

	<header class="entry-header">
		<?php
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' );
		?>
	</header><!-- .entry-header -->

	<?php ascend_before_post_meta(); ?>

	<div class="entry-meta">
		<?php
		ascend_posted_on();
		ascend_posted_by();
		ascend_post_categories();
		?>
	</div><!-- .entry-meta -->

	<?php ascend_after_post_meta(); ?>

	<?php ascend_the_featured_image(); ?>

	<div class="entry-summary">
		<?php
		the_excerpt();

		printf(
			'<p class="read-more"><a href="%s" class="more-link">%s</a></p>',
			esc_url( get_the_permalink() ),
			esc_html__( 'Read More', 'ascend' )
		);
		?>
	</div><!-- .entry-summary -->

	<?php ascend_after_post_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

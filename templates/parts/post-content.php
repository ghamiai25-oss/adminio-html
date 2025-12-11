<?php
/**
 * Post content template part
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
		if ( is_singular() ) {
			the_title( '<h1 class="entry-title">', '</h1>' );
		} else {
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>' );
		}
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

	<div class="entry-content">
		<?php
		the_content(
			sprintf(
				wp_kses(
					__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'ascend' ),
					array( 'span' => array( 'class' => array() ) )
				)
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ascend' ),
				'after'  => '</div>',
			)
		);
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		ascend_post_tags();
		ascend_edit_post_link();
		?>
	</footer><!-- .entry-footer -->

	<?php ascend_after_post_content(); ?>
</article><!-- #post-<?php the_ID(); ?> -->

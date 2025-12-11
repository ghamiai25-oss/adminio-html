<?php
/**
 * Page template
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();
?>

	<?php ascend_before_main(); ?>

	<main id="main" class="site-main">
		<?php ascend_main_start(); ?>

		<div class="container">
			<div class="row">
				<div class="primary-content">

					<?php
					while ( have_posts() ) {
						the_post();
						?>
						<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
							<header class="entry-header">
								<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
							</header><!-- .entry-header -->

							<?php ascend_the_featured_image(); ?>

							<div class="entry-content">
								<?php
								the_content();

								wp_link_pages(
									array(
										'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'ascend' ),
										'after'  => '</div>',
									)
								);
								?>
							</div><!-- .entry-content -->

							<footer class="entry-footer">
								<?php ascend_edit_post_link(); ?>
							</footer><!-- .entry-footer -->
						</article><!-- #post-<?php the_ID(); ?> -->
						<?php

						ascend_comments();
					}
					?>

				</div><!-- .primary-content -->

				<?php
				if ( is_active_sidebar( 'primary-sidebar' ) ) {
					ascend_before_sidebar();
					?>
					<aside id="secondary" class="primary-sidebar widget-area">
						<?php ascend_sidebar_start(); ?>
						<?php dynamic_sidebar( 'primary-sidebar' ); ?>
						<?php ascend_sidebar_end(); ?>
					</aside><!-- #secondary -->
					<?php
					ascend_after_sidebar();
				}
				?>

			</div><!-- .row -->
		</div><!-- .container -->

		<?php ascend_main_end(); ?>
	</main><!-- #main -->

	<?php ascend_after_main(); ?>

<?php
get_footer();

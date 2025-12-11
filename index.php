<?php
/**
 * Main template file
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
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();

							if ( is_home() && ! is_front_page() ) {
								get_template_part( 'templates/parts/post', 'excerpt' );
							} elseif ( is_search() ) {
								get_template_part( 'templates/parts/post', 'excerpt' );
							} else {
								get_template_part( 'templates/parts/post', 'content' );
							}
						}

						ascend_pagination();
					} else {
						get_template_part( 'templates/parts/post', 'none' );
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

<?php
/**
 * Search results template
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

					<header class="page-header">
						<h1 class="page-title">
							<?php
							printf(
								esc_html__( 'Search Results for: %s', 'ascend' ),
								'<span>' . esc_html( get_search_query() ) . '</span>'
							);
							?>
						</h1>
					</header><!-- .page-header -->

					<?php
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post();
							get_template_part( 'templates/parts/post', 'excerpt' );
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

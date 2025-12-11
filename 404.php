<?php
/**
 * 404 error template
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
			<div class="error-404">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'ascend' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'ascend' ); ?></p>

					<?php get_search_form(); ?>

					<?php
					wp_list_categories(
						array(
							'orderby'    => 'count',
							'order'      => 'DESC',
							'show_count' => 1,
							'title_li'   => __( 'Most Used Categories', 'ascend' ),
						)
					);
					?>

					<?php
					$archives = wp_get_archives(
						array(
							'type'            => 'monthly',
							'limit'           => 12,
							'show_post_count' => 1,
							'echo'            => 0,
						)
					);

					if ( ! empty( $archives ) ) {
						?>
						<h2><?php esc_html_e( 'Archives', 'ascend' ); ?></h2>
						<ul>
							<?php echo wp_kses_post( $archives ); ?>
						</ul>
						<?php
					}
					?>
				</div><!-- .page-content -->
			</div><!-- .error-404 -->
		</div><!-- .container -->

		<?php ascend_main_end(); ?>
	</main><!-- #main -->

	<?php ascend_after_main(); ?>

<?php
get_footer();

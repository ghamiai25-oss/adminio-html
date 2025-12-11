<?php
/**
 * Footer template
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

	<?php ascend_before_footer(); ?>

	<footer id="colophon" class="site-footer">
		<?php ascend_footer_start(); ?>

		<div class="footer-content">
			<?php
			if ( is_active_sidebar( 'footer-sidebar' ) ) {
				dynamic_sidebar( 'footer-sidebar' );
			}
			?>

			<?php ascend_footer_navigation(); ?>
		</div><!-- .footer-content -->

		<div class="site-info">
			<span class="copyright">
				<?php
				printf(
					esc_html__( '&copy; %d %s', 'ascend' ),
					gmdate( 'Y' ),
					esc_html( get_bloginfo( 'name' ) )
				);
				?>
			</span>

			<?php
			if ( function_exists( 'wp_footer_credits' ) ) {
				wp_footer_credits();
			}
			?>
		</div><!-- .site-info -->

		<?php ascend_footer_end(); ?>
	</footer><!-- #colophon -->

	<?php ascend_after_footer(); ?>

	<?php wp_footer(); ?>
</body>
</html>

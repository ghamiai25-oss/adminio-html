<?php
/**
 * Post not found template part
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<div class="no-posts">
	<h2><?php esc_html_e( 'Nothing Found', 'ascend' ); ?></h2>
	<p>
		<?php
		if ( is_search() ) {
			esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'ascend' );
		} else {
			esc_html_e( 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'ascend' );
		}
		?>
	</p>

	<?php
	if ( is_search() ) {
		get_search_form();
	}
	?>
</div><!-- .no-posts -->

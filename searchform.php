<?php
/**
 * Search form template
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label for="s" class="sr-only">
		<?php esc_html_e( 'Search for:', 'ascend' ); ?>
	</label>
	<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search &hellip;', 'ascend' ); ?>" value="<?php echo get_search_query(); ?>" name="s" id="s">
	<button type="submit" class="search-submit">
		<?php esc_html_e( 'Search', 'ascend' ); ?>
	</button>
</form>

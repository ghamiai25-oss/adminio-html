<?php
/**
 * WooCommerce Integration
 *
 * @package Ascend
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WooCommerce setup
 */
function ascend_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ascend_woocommerce_setup' );

/**
 * WooCommerce wrapper start
 */
function ascend_woocommerce_wrapper_start() {
	echo '<div id="primary" class="content-area">';
	echo '<main id="main" class="site-main">';
}

add_action( 'woocommerce_before_main_content', 'ascend_woocommerce_wrapper_start', 10 );

/**
 * WooCommerce wrapper end
 */
function ascend_woocommerce_wrapper_end() {
	echo '</main>';
	echo '</div>';
}

add_action( 'woocommerce_after_main_content', 'ascend_woocommerce_wrapper_end', 10 );

/**
 * Remove default WooCommerce wrapper
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

/**
 * Customize product loop columns
 */
function ascend_woocommerce_loop_columns() {
	return 3;
}

add_filter( 'loop_shop_columns', 'ascend_woocommerce_loop_columns' );

/**
 * Products per page
 */
function ascend_woocommerce_products_per_page() {
	return 12;
}

add_filter( 'loop_shop_per_page', 'ascend_woocommerce_products_per_page' );

/**
 * Remove sidebar from product pages
 */
function ascend_woocommerce_sidebar() {
	if ( is_product() ) {
		remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );
	}
}

add_action( 'wp', 'ascend_woocommerce_sidebar' );

/**
 * Enqueue WooCommerce styles
 */
function ascend_woocommerce_scripts() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	wp_enqueue_style(
		'ascend-woocommerce',
		ASCEND_URI . 'assets/css/woocommerce.css',
		array(),
		ASCEND_VERSION
	);
}

add_action( 'wp_enqueue_scripts', 'ascend_woocommerce_scripts', 20 );

/**
 * Add cart icon to header
 */
function ascend_woocommerce_cart_link() {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return;
	}

	$count = WC()->cart->get_cart_contents_count();
	?>
	<a class="cart-link" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'ascend' ); ?>">
		<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<circle cx="9" cy="21" r="1"></circle>
			<circle cx="20" cy="21" r="1"></circle>
			<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
		</svg>
		<?php if ( $count > 0 ) : ?>
			<span class="cart-count"><?php echo esc_html( $count ); ?></span>
		<?php endif; ?>
	</a>
	<?php
}

/**
 * Update cart count via AJAX
 */
function ascend_woocommerce_add_to_cart_fragments( $fragments ) {
	if ( ! class_exists( 'WooCommerce' ) ) {
		return $fragments;
	}

	ob_start();
	ascend_woocommerce_cart_link();
	$fragments['a.cart-link'] = ob_get_clean();

	return $fragments;
}

add_filter( 'woocommerce_add_to_cart_fragments', 'ascend_woocommerce_add_to_cart_fragments' );

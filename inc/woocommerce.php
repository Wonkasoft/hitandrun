<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package hitandrun
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)-in-3.0.0
 *
 * @return void
 */
function hitandrun_woocommerce_setup() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
}
add_action( 'after_setup_theme', 'hitandrun_woocommerce_setup' );

/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
function hitandrun_woocommerce_scripts() {
	wp_enqueue_style( 'hitandrun-woocommerce-style', get_template_directory_uri() . '/woocommerce.css' );

	$font_path   = WC()->plugin_url() . '/assets/fonts/';
	$inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

	wp_add_inline_style( 'hitandrun-woocommerce-style', $inline_font );
}
add_action( 'wp_enqueue_scripts', 'hitandrun_woocommerce_scripts' );

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param  array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function hitandrun_woocommerce_active_body_class( $classes ) {
	$classes[] = 'woocommerce-active';

	return $classes;
}
add_filter( 'body_class', 'hitandrun_woocommerce_active_body_class' );

/**
 * Products per page.
 *
 * @return integer number of products.
 */
function hitandrun_woocommerce_products_per_page() {
	return 12;
}
add_filter( 'loop_shop_per_page', 'hitandrun_woocommerce_products_per_page' );

/**
 * Product gallery thumnbail columns.
 *
 * @return integer number of columns.
 */
function hitandrun_woocommerce_thumbnail_columns() {
	return 4;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'hitandrun_woocommerce_thumbnail_columns' );

/**
 * Function to return new placeholder image URL.
 */
function growdev_custom_woocommerce_placeholder( $image_url ) {
	$custom_logo_id = get_theme_mod( 'custom_logo' );
  	$image_url = wp_get_attachment_image_url( $custom_logo_id , 'full' );  // change this to the URL to your custom placeholder
  	return $image_url;
}
add_filter( 'woocommerce_placeholder_img_src', 'growdev_custom_woocommerce_placeholder', 10 );

/**
 * Default loop columns on product archives.
 *
 * @return integer products per row.
 */
function hitandrun_woocommerce_loop_columns() {
	return 3;
}
add_filter( 'loop_shop_columns', 'hitandrun_woocommerce_loop_columns' );

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function hitandrun_woocommerce_related_products_args( $args ) {
	$defaults = array(
		'posts_per_page' => 3,
		'columns'        => 3,
	);

	$args = wp_parse_args( $defaults, $args );

	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'hitandrun_woocommerce_related_products_args' );

if ( ! function_exists( 'hitandrun_woocommerce_product_columns_wrapper' ) ) {
	/**
	 * Product columns wrapper.
	 *
	 * @return  void
	 */
	function hitandrun_woocommerce_product_columns_wrapper() {
		$columns = hitandrun_woocommerce_loop_columns();
		echo '<div class="columns-' . absint( $columns ) . '">';
	}
}
add_action( 'woocommerce_before_shop_loop', 'hitandrun_woocommerce_product_columns_wrapper', 40 );

if ( ! function_exists( 'hitandrun_woocommerce_product_columns_wrapper_close' ) ) {
	/**
	 * Product columns wrapper close.
	 *
	 * @return  void
	 */
	function hitandrun_woocommerce_product_columns_wrapper_close() {
		echo '</div>';
	}
}
add_action( 'woocommerce_after_shop_loop', 'hitandrun_woocommerce_product_columns_wrapper_close', 40 );

/**
 * Remove default WooCommerce wrapper.
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );

if ( ! function_exists( 'hitandrun_woocommerce_wrapper_before' ) ) {
	/**
	 * Before Content.
	 *
	 * Wraps all WooCommerce content in wrappers which match the theme markup.
	 *
	 * @return void
	 */
	function hitandrun_woocommerce_wrapper_before() {
		?>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
		<?php
	}
}
add_action( 'woocommerce_before_main_content', 'hitandrun_woocommerce_wrapper_before' );

if ( ! function_exists( 'hitandrun_woocommerce_wrapper_after' ) ) {
	/**
	 * After Content.
	 *
	 * Closes the wrapping divs.
	 *
	 * @return void
	 */
	function hitandrun_woocommerce_wrapper_after() {
		?>
			</main><!-- #main -->
		</div><!-- #primary -->
		<?php
	}
}
add_action( 'woocommerce_after_main_content', 'hitandrun_woocommerce_wrapper_after' );

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
	<?php
		if ( function_exists( 'hitandrun_woocommerce_header_cart' ) ) {
			hitandrun_woocommerce_header_cart();
		}
	?>
 */

if ( ! function_exists( 'hitandrun_woocommerce_cart_link_fragment' ) ) {
	/**
	 * Cart Fragments.
	 *
	 * Ensure cart contents update when products are added to the cart via AJAX.
	 *
	 * @param array $fragments Fragments to refresh via AJAX.
	 * @return array Fragments to refresh via AJAX.
	 */
	function hitandrun_woocommerce_cart_link_fragment( $fragments ) {
		ob_start();
		hitandrun_woocommerce_cart_link();
		$fragments['a.cart-contents'] = ob_get_clean();

		return $fragments;
	}
}
add_filter( 'woocommerce_add_to_cart_fragments', 'hitandrun_woocommerce_cart_link_fragment' );

if ( ! function_exists( 'hitandrun_woocommerce_cart_link' ) ) {
	/**
	 * Cart Link.
	 *
	 * Displayed a link to the cart including the number of items present and the cart total.
	 *
	 * @return void
	 */
	function hitandrun_woocommerce_cart_link() {
		?>
			<a class="cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'hitandrun' ); ?>">
				<?php /* translators: number of items in the mini cart. */ ?>
				<span class="amount"><?php echo wp_kses_data( WC()->cart->get_cart_subtotal() ); ?></span> <span class="count"><?php echo wp_kses_data( sprintf( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'hitandrun' ), WC()->cart->get_cart_contents_count() ) );?></span>
			</a>
		<?php
	}
}

if ( ! function_exists( 'hitandrun_woocommerce_header_cart' ) ) {
	/**
	 * Display Header Cart.
	 *
	 * @return void
	 */
	function hitandrun_woocommerce_header_cart() {
		if ( is_cart() ) {
			$class = 'current-menu-item';
		} else {
			$class = '';
		}
		?>
		<ul id="site-header-cart" class="site-header-cart">
			<li class="<?php echo esc_attr( $class ); ?>">
				<?php hitandrun_woocommerce_cart_link(); ?>
			</li>
			<li>
				<?php
					$instance = array(
						'title' => '',
					);

					the_widget( 'WC_Widget_Cart', $instance );
				?>
			</li>
		</ul>
		<?php
	}
}

/**
 * Echo out the company information on the checkout page
 * 
 * @since 1.0.1
 * @return void
 */
function the_company_information() {
	echo get_company_info();
}

/**
 * Gets the company information.
 *
 * @since 1.0.1
 * @return     string  The company information.
 */
function get_company_info() {
	// The store name
	$store_name = get_bloginfo();
	// The main address pieces:
	$store_address     = get_option( 'woocommerce_store_address' );
	$store_address_2   = get_option( 'woocommerce_store_address_2' );
	$store_city        = get_option( 'woocommerce_store_city' );
	$store_postcode    = get_option( 'woocommerce_store_postcode' );

	// The country/state
	$store_raw_country = get_option( 'woocommerce_default_country' );

	// Split the country/state
	$split_country = explode( ":", $store_raw_country );

	// Country and state separated:
	$store_country = $split_country[0];
	$store_state   = $split_country[1];

	// Loading up the output variable to return on the screen with html elements
	$output = '<h3 class="store-name">' . $store_name . '</h3>';
	$output .= '<ul class="company-information">';
	$output .= '<li class="store-address">' . $store_address . '</li>';
	$output .= ( $store_address_2 ) ? '<li class="store-address-2">' . $store_address_2 . '</li>' : '';
	$output .= '<li class="city-state-postcode">' . $store_city . ', ' . $store_state . ' ' . $store_postcode . '</li>';
	$output .= '<li class="country">' . $store_country . '</li>';
	$output .= '</ul>';
	return $output;
}

add_action( 'woocommerce_before_checkout_form', 'the_company_information', 5 );
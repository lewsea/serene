<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}


// Quickview

function so_extend_quickview_shortcode() {
    global $product;
    $id = $product->get_id();

    return do_shortcode( '[woosq id="' . $id . '"]');
}
add_shortcode( 'quickview_shortcode', 'so_extend_quickview_shortcode' );

// Wishlist 

if ( function_exists( 'YITH_WCWL' ) ) {
	if ( ! function_exists( 'yith_wcwl_add_counter_shortcode' )  ) {
		function yith_wcwl_add_counter_shortcode() {
			add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_print_counter_shortcode' );
		}
	}

	if ( ! function_exists( 'yith_wcwl_print_counter_shortcode' )  ) {
		function yith_wcwl_print_counter_shortcode() {
			?>
				<span class="wish-count"><?php echo esc_html( yith_wcwl_count_all_products() ); ?></span>
			<?php
		}
	}
	add_action( 'init', 'yith_wcwl_add_counter_shortcode' );
}

// SKU

function skyverge_echo_wc_sku() {

	global $product;
	return $product->get_sku();

}
add_shortcode( 'sv_sku', 'skyverge_echo_wc_sku' );

// idk

add_filter('loop_shop_columns', 'loop_columns', 999);
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3;
	}
}


// Add a custom product data tab

add_filter( 'woocommerce_product_tabs', 'product_desc_tab' );
function product_desc_tab( $tabs ) {
	// Adds the new tab
	$tabs['product_desc_tab'] = array(
		'title' 	=> __( 'Product Description'),
		'priority' 	=> 10,
		'callback' 	=> 'product_desc_tab_content'
	);
	return $tabs;
}

function product_desc_tab_content() {
	?>
	<div class="product-custom-fields">
		<p> Music Label: 
			<span>
				<?php the_field('music_company') ?>
			</span>
		</p>
		<p>	Release Date:
			<span>	
				<?php the_field('releasead_date') ?>
			</span>
		</p>
		<p> Format: 
			<span>
				<?php the_field('format') ?>
			</span>
		</p>
		<p> No. Tracks/Songs:
			<span>
				<?php the_field('no_tracks__songs') ?>
			</span>
		</p>
		<p class="sku-container">
			SKU:
			<span>
				<?php echo do_shortcode('[sv_sku]') ?>
			</span>
		</p>
	</div>
<?php
}



// Reorder product data tabs

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['description']['priority'] = 5;			
	$tabs['product_desc_tab_content']['priority'] = 10;
	$tabs['reviews']['priority'] = 15;		

	return $tabs;
}

// Remove product data tabs
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['product_desc_tab_content'] );

    return $tabs;
}

/**
 * Change the breadcrumb separator
 */
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_delimiter' );
function wcc_change_breadcrumb_delimiter( $defaults ) {
	// Change the breadcrumb delimeter from '/' to '>'
	$defaults['delimiter'] = '<span> &gt; </span>';
	return $defaults;
}



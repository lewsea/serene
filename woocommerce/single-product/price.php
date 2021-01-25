<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>


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

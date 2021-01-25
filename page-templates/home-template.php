<?php
/**
 * Template Name: Home Page
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="" id="full-width-page-wrapper">
	<div class="slick-wrapper">
		<div class="slick-home-slider">
			<div class="slick-slide-item slick-hero">
				<img src="<?php echo get_template_directory_uri(); ?>/img/sample-2.png" alt="Serene Home">
				<div class="slide-info-container">
					<div class="slide-info">
						<h2 class="slide-info-title">Serene</h2>
						<span>WooCommerce WordPress Theme</span>
						<p class="slide-info-desc" style="color: #1a252a; font-size: 1.2rem;">Serene is a simple and clean Woocommerce WordPress theme specifically for music album ecommerce. It also has some light animations and is responsive WooCommerce WordPress Theme</p>
						<a class="slide-info-link" href="">View Demo</a>
					</div>
				</div>
				<img src="<?php echo get_template_directory_uri(); ?>/img/sample-1.png" alt="Serene Home">
			</div>
			<?php
			global $product; 
			$args = array (
				'post_type' => 'product',
				'posts_per_page' => 3,
			);
			$productposts = new WP_Query($args);
			while ($productposts->have_posts()) {
				$productposts->the_post();
			?>
				<div class="slick-slide-item">
					<div class="slide-info-container">
						<div class="slide-info">
							<?php
							$terms = get_the_terms( $post->ID, 'product_cat' );
								if ( $terms && ! is_wp_error( $terms ) ) :
									$cat_links = array();
									foreach ( $terms as $term ) {
										$cat_links[] = $term->name;
									}
									$on_cat = join( " , ", $cat_links );
									?>
									<span >
										Categories: <span class="slide-info-tags"><?php echo $on_cat; ?></span>
									</span>
								<?php endif;
							?>
							<h2 class="slide-info-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
							<p class="slide-info-desc"><?php echo wp_trim_words(get_the_excerpt(), 25);?></p>
							<p class="slide-info-price <?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
							<a class="slide-info-link" href="<?php the_permalink();?>">View Product</a>
						</div>
					</div>
					<div class="slide-img">
						<a href="<?php the_permalink();?>" title="<?php the_title(); ?>" ><img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>"></a>
					</div>
				</div>
			<?php } wp_reset_query(); ?> 
		</div>
		</div>
	</div>
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
	<div id="scroll-top-button"></div>
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<div class="latest-release-wrapper wrapper">
						<h2 class="wrapper-title">Latest Release</h2>
						<div class="latest-release-grid-container">
							<div class="two-col-products wrapper row">
								<?php
								global $product; 
								$args = array (
									'post_type' => 'product',
									'posts_per_page' => 2,
								);
								$productposts = new WP_Query($args);
								while ($productposts->have_posts()) {
									$productposts->the_post();
								?>
								<div class="products col-md-5">
									<div class="product-img">
										<a href="<?php the_permalink();?>">
											<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
										</a>
									</div>
									<div class="product-info">
										<div class="product-title">
											<a href="<?php the_permalink();?>">
												<h4><?php the_title(); ?></h4>
											</a>
											<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></p>
											<p class="product-desc" ><?php echo wp_trim_words(get_the_excerpt(), 15);?></p>
											<?php if ( $product->is_on_sale() ) : ?>
												<div class="sale-container">
													<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . esc_html__( 'Sale', 'woocommerce' ) . '</span>', $post, $product ); ?>
												</div>
											<?php endif; ?>
										</div>
										<div class="product-actions">
											<?php echo do_shortcode('[yith_wcwl_add_to_wishlist]'); ?>
											<?php 
												$id = $product->get_id();
												echo do_shortcode('[add_to_cart id="' . $id . '" show_price="FALSE" style="none" ]'); 
											?>
											<?php echo do_shortcode('[quickview_shortcode]'); ?>
										</div>
									</div>
								</div>
								<?php } wp_reset_query(); ?>
							</div>
							<?php echo do_shortcode('[products limit="5" orderby="date" order="DESC" class="four-col-products wrapper" ]'); ?>
						</div>
						<div class="view-btn">
							<a href="<?php echo site_url('/shop');?>">View All</a>
						</div>
					</div>
					<div class="top-album-wrapper wrapper">
						<h2 class="wrapper-title">Top Rated Albums</h2>
						<div class="top-album-container wrapper">
							<?php echo do_shortcode('[top_rated_products limit="4"]'); ?>
						</div>
					</div>
					<div class="testimonials-wrapper wrapper">
						<h2 class="wrapper-title">Testimonials</h2>
						<div class="testimonials-container">
							<div class="customers-review wrapper">
								<?php echo do_shortcode('[cusrev_reviews_slider autoplay="true"]');?>
							</div>
						</div>
					</div> 
					<div class="news-wrapper wrapper">
						<h2 class="wrapper-title">Recent News</h2>
						<div class="news-container wrapper">
							<?php 
							$args = array (
								'post_type' => 'post',
								'posts_per_page' => 3,
							);
							$blogposts = new WP_Query($args);
							while ($blogposts->have_posts()) {
								$blogposts->the_post();
							?>
							<div class="news-block">
								<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>" class="news-img">
								<div class="news-info">
									<a href="<?php the_permalink()?>">
										<h2 class="news-tag"><?php echo wp_trim_words(get_the_title(), 4); ?></h2>
									</a>
									<div class="entry-meta text-secondary">
										<?php understrap_posted_on(); ?>
									</div>
									<p class="text-secondary mt-2"><?php echo wp_trim_words(get_the_excerpt(), 24);?></p>
									<a href="<?php the_permalink()?>" class="read-more" >Read More <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
							<?php } wp_reset_query(); ?>
						</div>
					</div>
					<div class="genre-wrapper wrapper">
						<div class="container">
							<h2 class="wrapper-title">Popular Genre</h2>
							<div class="genre-container wrapper">
							<?php echo do_shortcode('[product_categories limit="4"]'); ?>
							</div>
						</div>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();

<?php
/**
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main shop-container" id="main" role="main">
					<div class="row">
						<div class="col-md-9">
							
							<?php woocommerce_breadcrumb(); ?>		
							<div class="woo-shop-wrapper" >
								<?php echo woocommerce_content();?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget-area" id="secondary" role="complementary">
								<?php if ( is_active_sidebar( 'Shop Sidebar' ) ): ?>
									<?php dynamic_sidebar( 'Shop Sidebar' ); ?>
								<?php endif; ?>
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

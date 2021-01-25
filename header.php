<?php
/**
 * The header for OUR *communism intensifies* theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
					}
					?>
					<!-- end custom logo -->
				<div class="div-flex-reverse">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="nav-icon-container-mobile">
						<ul id="nav-icon" class="icon-menu-nav icon-menu-desktop">
							<li class="nav-link">
								<a href="">
									<i class="fa fa-search fooltip">
										<span class="fooltiptext">Search</span>
									</i>
								</a>
							</li>
							<li class="nav-link">
								<a href="<?php echo site_url('/my-account'); ?>">
									<i class="fa fa-user-o fooltip">
										<span class="fooltiptext">Account</span>
									</i>
								</a>
							</li>
							<li class="nav-link">
								<a href="<?php echo site_url('/wishlist'); ?>">
									<i class="fa fa-heart-o fooltip">
										<span class="fooltiptext" >Wishlist 
										</span>
										<?php echo do_shortcode('[yith_wcwl_items_count]'); ?>
									</i>
								</a>
							</li>
							<li class="nav-link">
								<a href="<?php echo site_url('/cart'); ?>">
									<i class="fa fa-shopping-basket fooltip">
										<span class="fooltiptext" >Basket</span>
										<span class="cart-count">
											<?php echo WC()->cart->get_cart_contents_count(); ?>
										</span>	
									</i>
								</a>
							</li>
						</ul>
					</div>
				</div>
				

				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
				<div class="nav-icon-container">
					<ul id="nav-icon" class="icon-menu-nav icon-menu-desktop">
						<li class="nav-link">
							<form class="search-container" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
								<input id="search-box" type="text" class="search-box" id="s" name="s" value="<?php the_search_query(); ?>"/>
								<label for="search-box"><i class="fa fa-search search-icon fooltip"><span class="fooltiptext" >Search</span></i></label>
								<input id="searchsubmit" name="submit" type="submit" value="<?php esc_attr_e( 'understrap' ); ?>"/>
							</form>
						</li>
						<li class="nav-link">
							<a href="<?php echo site_url('/my-account'); ?>">
								<i class="fa fa-user-o fooltip">
									<span class="fooltiptext">Account</span>
								</i>
							</a>
						</li>
						<li class="nav-link">
							<a href="<?php echo site_url('/wishlist'); ?>">
								<i class="fa fa-heart-o fooltip">
									<span class="fooltiptext" >Wishlist 
									</span>
									<?php echo do_shortcode('[yith_wcwl_items_count]'); ?>
								</i>
							</a>
						</li>
						<li class="nav-link">
							<a href="<?php echo site_url('/cart'); ?>">
								<i class="fa fa-shopping-basket fooltip">
									<span class="fooltiptext" >Basket</span>
									<span class="cart-count">
										<?php echo WC()->cart->get_cart_contents_count(); ?>
									</span>	
								</i>
							</a>
						</li>
					</ul>
				</div>
				
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->

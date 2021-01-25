<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">
	<div class="email-section">
		<div class="container">
			<p>Get our latest news and discounts</p>
			<div class="email-input-wrapper">
				<!-- <?php echo do_shortcode('[contact-form-7 id="40" title="Newsletter Form"]') ?> -->
				<input type="email" placeholder="Enter your email...">
				<input type="submit" value="Subscribe">
			</div>
			<p>Follow us on instagram: <a href="@your_ig.com"><strong>@serene_theme</strong></a></p>
		</div>
	</div>
		<div class="<?php echo esc_attr( $container ); ?>">
			<div class="row">
				<div class="col-md-12">
					<footer class="site-footer" id="colophon">
						<section class="footer-nav">
							<div class="footer-nav-blocks">
								<div class="footer-nav-title">
									<img src="<?php echo get_template_directory_uri(); ?>/img/Logo.png" alt="">
								</div>
								<div class="footer-description">
									<p class="p-description">
								Serene is a simple and clean Woocommerce WordPress theme specifically for music album ecommerce. 
								</p>
								</div>
								<div class="footer-socials">
									<a href="your-facebook.com"><i class="fa fa-facebook"></i></a>
									<a href="your-instagram.com"><i class="fa fa-instagram"></i></a>
									<a href="your-twitter.com"><i class="fa fa-twitter"></i></a>
									<a href="your-linkedin-batmaylinkedinditohahaahah.com"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<div class="footer-nav-blocks">
								<div class="footer-nav-title">
									<h4>Account</h4>
								</div>
								<div class="footer-nav-links">
									<?php
										wp_nav_menu (
											array (
												'menu' => '3'
											)
										)

									?>
								</div>
							</div>
							<div class="footer-nav-blocks">
								<div class="footer-nav-title">
									<h4>Help</h4>
								</div>
								<div class="footer-nav-links">
									<?php
										wp_nav_menu (
											array (
												'menu' => '4'
											)
										)

									?>
								</div>
							</div>
							<div class="footer-nav-blocks">
								<div class="footer-nav-title">
									<h4>Contact</h4>
								</div>
								<div class="footer-description">
									<p>950 A. Bonifacio Street
									<br>
									Quezon City, Metro Manila
									<br>
									Philippines</p>
									<p><strong>Email</strong>:<a href="mailto:support@serene.com"> support@serene.com</a></p>
									<p><a href="tel: (123) 456-7890">+63(2)2422748</a></p>
								</div>
							</div>
						</section>
						<!-- <div class="site-info">
							<?php understrap_site_info(); ?> 
						</div> -->
					</footer><!-- #colophon -->
				</div><!--col end -->
			</div><!-- row end -->
		</div><!-- container end -->
		<div class="footer-copy">
			<div class="container">
				<p>Copyright &copy; <?php echo date('Y'); ?> <strong><a href="">Serene</a></strong>. All rights reserved.</p>
				<div class="payment-method">
					<!-- <span>Accepted Payments :</span> -->
					<a href=""><span class="iconify" data-inline="false" data-icon="logos:stripe"></span></a>
					<a href=""><span class="iconify" data-inline="false" data-icon="logos:paypal"></span></a>
					<a href=""><span class="iconify" data-inline="false" data-icon="grommet-icons:mastercard"></span></a>
					<a href=""><span class="iconify" data-inline="false" data-icon="logos:visa"></span></a>
				</div>
			</div>		
		</div>
	</div>
</div>

<?php wp_footer(); ?>
<script src="https://code.iconify.design/1/1.0.6/iconify.min.js"></script>

</body>

</html>


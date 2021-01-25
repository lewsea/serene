<?php
/**
 * Template Name: Contact Page
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

<div class="wrapper" id="full-width-page-wrapper">
	<div class="<?php echo esc_attr( $container ); ?>" id="content">
		<div class="row">
			<div class="col-md-12 content-area" id="primary">
				<main class="site-main" id="main" role="main">
					<div class="contact-title">
						<h3>Contact Us</h3>
						<p>Get in touch and let us know how we can help.</p>
					</div>
					<div class="contact-page-blocks-wrapper wrapper">
						<div class="contact-page-block">
							<div class="contact-icon">
								<i class="fa fa-building-o"></i>
							</div>
							<div class="contact-info">
								<h4>Sales</h4>
								<p>We'd love to talk about how we can work together.</p>
								<div class="contact-link">
									<a href="">Contact sales <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<div class="contact-page-block">
							<div class="contact-icon">
								<i class="fa fa-support"></i>
							</div>
							<div class="contact-info">
								<h4>Help & Support</h4>
								<p>We're here to help with any questions or code.</p>
								<div class="contact-link">
									<a href="">Contact support <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
						<div class="contact-page-block">
							<div class="contact-icon">
								<i class="fa fa-newspaper-o"></i>
							</div>
							<div class="contact-info">
								<h4>Media</h4>
								<p>Get Serene news, company info, and media resources.</p>
								<div class="contact-link">
									<a href="">Visit media page <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="contact-page-footer wrapper">
						<h4>General communication</h4>
						<p>For general queries, including partnership opportunities, please email <a href="">info@serene.com</a></p>
					</div>
				</main>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();

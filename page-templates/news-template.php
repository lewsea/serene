<?php
/**
 * Template Name: News Page
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
				<h1 class="site-title" >Recent News</h1>
					<div class="row">
						<div class="col-md-9">
							<div class="news-page-wrapper">
							<?php 
							$args = array (
								'post_type' => 'post',
								'posts_per_page' => 5,
							);
							$blogposts = new WP_Query($args);
							while ($blogposts->have_posts()) {
								$blogposts->the_post();
							?>
							<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
								<div class="entry-content">
									<div class="news-img">
										<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="<?php the_title(); ?>">
									</div>
									<div class="blog-content">
										<a href="<?php the_permalink()?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
										<p><?php echo wp_trim_words(get_the_excerpt(), 40); ?></p>
										<div class="entry-meta">
											<?php understrap_posted_on(); ?>
										</div>
										<a href="<?php the_permalink()?>"><button class="btn">Read More</button></a>
									</div>	
								</div>
							</article>
							<?php } wp_reset_query(); ?>
							</div>
						</div>
						<div class="col-md-3">
							<div class="news-sidebar">
								<div class="widget-area" id="secondary" role="complementary">
									<?php if ( is_active_sidebar( 'News Sidebar' ) ): ?>
										<?php dynamic_sidebar( 'News Sidebar' ); ?>
									<?php endif; ?>
									<aside class="widget widget_email">
										<h4>Newsletter</h4>
										<p>Subscribe to our newsletter and stay updated to your favorite music artists news.</p>
										<?php echo do_shortcode('[contact-form-7 id="40" title="Newsletter Form"]') ?>
									</aside>
								</div>
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

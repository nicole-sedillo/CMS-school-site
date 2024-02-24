<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package polytec_college
 */

get_header();
?>

<main id="primary" class="site-main">

	<?php
	while (have_posts()) :
		the_post();
		get_template_part('template-parts/content', 'page');
	endwhile; // End of the loop.
	?>

	<section class="home-blog">
		<h2><?php esc_html_e('Latest Blog Posts', 'ptc'); ?></h2>
		<div class="home-blog-section">
			<?php
			$args = array(
				'post_type'      => 'post',
				'posts_per_page' => 3,
			);
			$blog_query = new WP_Query($args);
			if ($blog_query->have_posts()) {
				while ($blog_query->have_posts()) {
					$blog_query->the_post();
			?>
					<article class="home-blog-articles">
						<a href="<?php the_permalink(); ?>">
							<h3><?php the_title(); ?></h3>
							<p><?php echo get_the_date(); ?></p>
							<?php the_post_thumbnail('medium'); ?>
						</a>
					</article>
			<?php
				}
				wp_reset_postdata();
			}
			?>
		</div>
	</section>

</main><!-- #main -->

<?php
get_footer();

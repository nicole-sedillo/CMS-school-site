<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package polytec_college
 */

?>

<footer id="colophon" class="site-footer">

	<div class="left-footer-section">
		<?php the_custom_logo(); ?>

		<nav id="site-navigation" class="footer-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', 'polytec'); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'footer',
					'menu_id'        => 'footer-menu',
				)
			);
			?>
		</nav>
	</div>

	<div class="site-info">
		<a href="<?php echo esc_url(__('https://wordpress.org/', 'polytec')); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf(esc_html__('Powered by %s', 'polytec'), 'WordPress');
			?>
		</a>
		<span class="sep"> | </span>
		<?php
		/* translators: 1: Theme name, 2: Theme author. */
		printf(esc_html__('Theme: %1$s by %2$s.', 'Polytec'), 'Polytec', '<a href="https://github.com/BernardProCode17/Polytec-College.git">Bernard Nicole</a>');
		?>
	</div><!-- .site-info -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>
<script>
    AOS.init();
</script>
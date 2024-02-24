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

	<?php if (have_rows('schedule')) : ?>
		<table class="schedule-table">
			<thead class="schedule-thead">
				<tr>
					<th>Date</th>
					<th>Course</th>
					<th>Instructor</th>
				</tr>
			</thead>
			<tbody class="schedule-body">
				<?php while (have_rows('schedule')) : the_row(); ?>
					<tr>
						<td><?php the_sub_field('date'); ?></td>
						<td><?php the_sub_field('course'); ?></td>
						<td><?php the_sub_field('instructor'); ?></td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	<?php endif; ?>

</main><!-- #main -->

<?php
get_footer();

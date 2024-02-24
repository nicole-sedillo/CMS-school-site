<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package polytec_college
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/content', get_post_type());

        $taxonomy = 'ptc-student-category';

        // Get the terms for the current post
        $post_terms = get_the_terms(get_the_ID(), $taxonomy);

        if ($post_terms && !is_wp_error($post_terms)) {
            foreach ($post_terms as $post_term) {
                echo '<h3 class="title-term">Meet other ' . $post_term->name . 's</h3>';
            }
        }

        // Create a new query to get all posts in the same taxonomy term
        $args = array(
            'post_type' => 'ptc-student',
            'tax_query' => array(
                array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'id',
                    'terms'    => $post_term->term_id,
                ),
            ),
            'post__not_in'   => array(get_the_ID()),
            'posts_per_page' => -1,
        );

        $related_posts_query = new WP_Query($args);

        //Output the list of related posts
        if ($related_posts_query->have_posts()) {
            echo '<ul class="profile">';
            while ($related_posts_query->have_posts()) {
                $related_posts_query->the_post();
                echo '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            echo '</ul>';
            wp_reset_postdata(); // Reset post data to restore the original query
        }

    endwhile; // End of the loop.

    if (function_exists('get_field')) {
        if (get_field('the_title')) {
            the_title('<h1>', '</h1>');
        }

        if (get_field('student_portfolio_link')) {
            $portfolio_link = esc_url(get_field('student_portfolio_link'));
            echo '<a class="portfolio-link" href="' . $portfolio_link . '" target="_blank">' . $portfolio_link . '</a>';
        }
    }
    ?>

</main><!-- #main -->

<?php
// get_footer();

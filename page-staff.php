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
 * @package FWD_Starter_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

    <header class="staff-title">
        <h1><?php the_title(); ?></h1>
    </header>

    <section class="staff-welcome">
        <?php the_content(); ?>
    </section>

    <?php

    $taxonomy = 'ptc-staff-category';

    // Get all terms for the specified taxonomy
    $terms = get_terms(array(
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
    ));

    // Check if any terms were found
    if (!empty($terms)) {
        // Loop through each term to display associated posts
        foreach ($terms as $term) {
            $args = array(
                'post_type'      => 'ptc-staff',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
                'tax_query'      => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'field'    => 'slug',
                        'terms'    => $term->slug,
                    ),
                ),
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) : ?>
                <!-- Output term name as title -->
                <h2><?php echo esc_html($term->name); ?></h2>

                <section>
                    <?php
                    while ($query->have_posts()) :
                        $query->the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>">
                            <h3><?php the_title(); ?></h3>
                            <?php
                            if (function_exists('get_field')) {

                                $decription = get_field('staff_description');

                                if ($decription) {
                                    echo '<p>' . $decription . '</p>';
                                }

                                $courses = get_field('courses');
                                if ($courses) {
                                    echo '<p>' . $courses . '</p>';                                    
                                }
                                
                                $link = get_field('instructor_url');
                                if( $link ){
                                    // the_field($link)
                                    echo '<a class="button" href="' . esc_url( $link ) . '">Instructor Website</a>';
                                }

                            }
                            ?>
                        </article>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </section>
    <?php endif;
        }
    } else {
        echo 'No terms found.';
    }

    ?>
</main><!-- #primary -->

<?php
get_footer();
?>
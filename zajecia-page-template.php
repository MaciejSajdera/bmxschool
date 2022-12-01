<?php
/*
 * Template Name: Zajecia Page Template
 * description: >-
  Page template without sidebar
 */
get_header();

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="site-content--padding max-width--xl">


            <section class="narrow-content">
                <h2 class="text-center mb--4">Zapraszamy do zapisów</h2>

                <?php
                    while ( have_posts() ) :
                        the_post();

                        ?>

                <div class="entry-content flex content-center">
                    <?php
                                the_content(
                                    sprintf(
                                        wp_kses(
                                            /* translators: %s: Name of current post. Only visible to screen readers */
                                            __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'bmxschool' ),
                                            array(
                                                'span' => array(
                                                    'class' => array(),
                                                ),
                                            )
                                        ),
                                        wp_kses_post( get_the_title() )
                                    )
                                );

                                wp_link_pages(
                                    array(
                                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bmxschool' ),
                                        'after'  => '</div>',
                                    )
                                );
                                ?>
                </div><!-- .entry-content -->

                <?php

                        // If comments are open or we have at least one comment, load up the comment template.
                        // if ( comments_open() || get_comments_number() ) :
                        // 	comments_template();
                        // endif;

                    endwhile; // End of the loop.
                    ?>

            </section>

        </div><!-- site-content--padding -->


    </main>
    <!-- #main -->
</div>
<!-- #primary -->

<?php // get_sidebar();

get_footer();
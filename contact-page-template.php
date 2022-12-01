<?php
/*
 * Template Name: Contact Page Template
 * description: >-
  Page template without sidebar
 */

get_header(); ?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="site-content--padding max-width--xl">

            <section class="narrow-content">
                <div class="welcome-view flex items-start content-center welcome-view-subpage relative">

                    <?php the_content() ?>

                </div>

            </section>

        </div>

    </main><!-- #main -->

    <?php get_template_part("template-parts/cta-banner"); ?>

</div><!-- #primary -->

<?php // get_sidebar();

get_footer();
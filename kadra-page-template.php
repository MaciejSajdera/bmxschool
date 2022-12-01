<?php
/*
 * Template Name: Kadra Page Template
 * description: >-
  Page template without sidebar
 */
get_header();
$welcome_view = get_field("welcome_view");
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="site-content--padding max-width--xl">

            <section class="regular-content">
                <div class="welcome-view flex items-start content-center welcome-view-subpage relative">

                    <div class="welcome-view__container">

                        <div class="welcome-view__left mb--2">

                            <div class="entry-header">
                                <h1 class="mb--2"><?php echo $welcome_view[
                                	"h1"
                                ]; ?>
                                </h1>
                            </div>
                            <!-- .entry-header -->

                            <p>
                                <?php echo $welcome_view["description"]; ?></p>

                        </div>

                        <div class="welcome-view__right image-holder">

                            <?php if ($welcome_view["image"]["url"]) {
                            	echo '<img src="' .
                            		$welcome_view["image"]["url"] .
                            		'" alt="' .
                            		$welcome_view["image"]["alt"] .
                            		'" loading="lazy">';
                            } ?>
                        </div>

                    </div>

                </div>
            </section>

            <section class="narrow-content">
                <h2 class="text-center mb--4">Instruktorzy</h2>

                <div class="photo-paragraphs">

                    <?php
                    $args = array(  
                        'post_type' => 'instruktor',
                        'post_status' => 'publish',
                        'posts_per_page' => 999, 
                        'order' => 'ASC', 
                    );

                    $loop = new WP_Query( $args ); 
                        
                    while ( $loop->have_posts() ) : $loop->the_post(); 
                    ?>

                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader"><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" alt="<?php the_title(); ?>" src='<?php echo get_the_post_thumbnail_url() ?>' loading="lazy">
                        </div>
                    </div>

                    <?php

                    endwhile;

                    wp_reset_postdata(); 
                    ?>

                </div>
            </section>

        </div><!-- site-content--padding -->

        <?php get_template_part("template-parts/cta-banner"); ?>

    </main>
    <!-- #main -->
</div>
<!-- #primary -->

<?php // get_sidebar();

get_footer();
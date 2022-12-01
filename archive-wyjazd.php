<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bmxschool
 */

get_header();

$today = date("Y-m-d");
$args_future_events = array(
	'post_type'         => 'wyjazd',
	'posts_per_page'    => -1,
	'meta_key'          => 'wyjazd_date_time',
    'orderby' => 'meta_value',
	'order'             => 'ASC',
    'meta_query' => array(
        array(
           'key' => 'wyjazd_date_time',
           'meta-value' => $value,
           'value' => $today,
           'compare' => '>=',
           'type' => 'DATE'// you can change it to datetime also
       )
)
);

$future_event = query_posts($args_future_events);

$args_past_events = array(
	'post_type'         => 'wyjazd',
	'posts_per_page'    => -1,
	'meta_key'          => 'wyjazd_date_time',
    'orderby' => 'meta_value',
	'order'             => 'ASC',
    'meta_query' => array(
        array(
           'key' => 'wyjazd_date_time',
           'meta-value' => $value,
           'value' => $today,
           'compare' => '<',
           'type' => 'DATE'// you can change it to datetime also
       )
)
);

$past_event = query_posts($args_past_events);


// aktualnie sortuje malejaco do czasu edycji posta (najnowszy zaktuualizowany ostatni)
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="site-content--padding max-width--xl">

            <section class="regular-content mt--2">

                <?php if( $posts ): ?>

                <header class="page-header mb--4">

                    <?php post_type_archive_title( '<h1 class="page-title mb--3">', '</h1>' ); ?>
                    <h2><?php echo get_the_archive_description() ?></h2>

                </header><!-- .page-header -->



                <div class="future-events mb--8">


                    <h3 class="text--section-title">Nadchodzące wyjazdy:</h3>

                    <ul class="blog-grid list-none">

                        <?php
                foreach( $future_event as $post ): 
                    setup_postdata( $post )
                    ?>

                        <li>
                            <?php get_template_part( 'template-parts/single-post-tile', get_post_type() ); ?>
                        </li>

                        <?php
                endforeach;
                ?>

                    </ul>

                    <?php wp_reset_postdata(); ?>

                </div>

                <div class="past-events mb--4">

                    <h3 class="text--section-title">Minione wyjazdy:</h3>

                    <ul class="blog-grid list-none">

                        <?php
                foreach( $past_event as $post ): 
                setup_postdata( $post )
                ?>

                        <li>
                            <?php get_template_part( 'template-parts/single-post-tile', get_post_type() ); ?>
                        </li>

                        <?php
                endforeach;
                 ?>

                    </ul>

                </div>


                <?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

            </section>

        </div> <!-- .site-content--padding max-width--xl -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
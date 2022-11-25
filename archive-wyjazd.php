<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bmxschool
 */

get_header();

$posts = get_posts(array(
	'post_type'         => 'wyjazd',
	'posts_per_page'    => -1,
	'meta_key'          => 'wyjazd_date_time',
	'orderby'           => 'meta_value',
	'order'             => 'ASC'
));
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="site-content--padding max-width--xl">

            <?php if( $posts ): ?>

            <header class="page-header">

                <?php post_type_archive_title( '<h1 class="page-title mb--3">', '</h1>' ); ?>
                <h2><?php echo get_the_archive_description() ?></h2>

            </header><!-- .page-header -->

            <ul class="blog-grid list-none">

                <?php foreach( $posts as $post ): 
						
						setup_postdata( $post )
						
						?>
                <li>
                    <?php get_template_part( 'template-parts/single-post-tile', get_post_type() ); ?>
                </li>

                <?php endforeach; ?>

            </ul>

            <?php wp_reset_postdata(); ?>

            <?php the_posts_navigation(); ?>

            <?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

        </div> <!-- .site-content--padding max-width--xl -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
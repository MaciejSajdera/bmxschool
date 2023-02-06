<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bmxschool
 */

$variant = get_field('variant');
$local = $variant === 'lokalne';
$trip = $variant === 'wyjazdowe';

$wyjazd_start_date = get_field('wyjazd_start_date');
$wyjazd_end_date = get_field('wyjazd_end_date');
$destination = get_field('destination');
$start_place = get_field('start_place');
$spot = get_field('spot');
$time = get_field('time');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('mb--4'); ?>>
    <header class="entry-header mb--2">
        <div class="title-wrapper flex flex-drow-mcol content-between">

            <?php the_title( '<h1 class="entry-title mb--1">', '</h1>' ); ?>

            <div class="flex items-center desktop-only">
                <p class="mr--1">Udostępnij:</p> <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
            </div>

        </div>

        <?php

		echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Data rozpoczęcia: </strong></p><p>'.mb_strimwidth( html_entity_decode($wyjazd_start_date), 0, 60, '...' ).'</p></div>';
		echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Data zakończenia: </strong></p><p>'.mb_strimwidth( html_entity_decode($wyjazd_end_date), 0, 60, '...' ).'</p></div>';

		if ($trip) {
			echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Miejsce docelowe: </strong></p>'.mb_strimwidth( html_entity_decode($destination), 0, 60, '...' ).'</p></div>';
			echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Miejsce zbiórki: </strong></p>'.mb_strimwidth( html_entity_decode($start_place), 0, 60, '...' ).'</p></div>';
		}

		if ($local) {
			echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Miejsce wydarzenia: </strong></p>'.mb_strimwidth( html_entity_decode($spot), 0, 60, '...' ).'</p></div>';
		}

		echo '<div class="wyjazd-info flex items-center content-between w--fit"><p class="w-min--12 w-max--14"><strong>Godzina: </strong></p>'.mb_strimwidth( html_entity_decode($time), 0, 60, '...' ).'</p></div>';

		
		if ( 'post' === get_post_type() ) :
			?>
        <div class="entry-meta">
            <?php
				bmxschool_posted_on();
				bmxschool_posted_by();
				?>
        </div><!-- .entry-meta -->
        <?php endif; ?>

    </header><!-- .entry-header -->

    <div class="entry-content single__post">

        <div class="post-thumbnail">

            <img class="box-shadow--standard border-radius--standard" src=<?php echo get_the_post_thumbnail_url(); ?> alt="<?php echo get_post_meta( $thumbnail->ID, '_wp_attachment_image_alt', true ); ?>">

        </div>

        <div class="post-content">

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

        </div> <!-- .post-content -->
    </div><!-- .entry-content -->

    <div class="flex flex-col content-center items-center mobile-only mt--4">
        <p class="mb--1">Udostępnij:</p>
        <?php echo do_shortcode('[Sassy_Social_Share]'); ?>
    </div>

    <footer class="entry-footer">
        <?php bmxschool_entry_footer(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
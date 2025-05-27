<?php
$id = get_the_ID();
$title = get_the_title();
$excerpt = mb_strimwidth( html_entity_decode(get_the_excerpt()), 0, 440, '...' );

$wyjazd_start_date = get_field('wyjazd_start_date');
$destination = get_field('destination');
$spot = get_field('spot');

$map_travel_icon = file_get_contents(
    get_template_directory() .
        "/dist/svg/map_travel_icon.svg"
);

?>

<article id="post-<?php echo $id ?>" <?php post_class(); ?>>

    <?php

echo '<a class="blog-post link-none" href="'. get_permalink() .'">';

echo '<h3 class="title mb--1" title="'.$title.'">'.$title.'</h3>';

echo '
    <div class="blog-post relative overflow--hidden mb--2">
        <div class="blog-post__image" style="background-image: url('.esc_url(get_the_post_thumbnail_url()).')"></div>
        <div class="badge badge--destination absolute"><p>'.mb_strimwidth( html_entity_decode($destination ? $destination : $spot), 0, 30, '...' ).'</p></div>
        <div class="badge badge--date-time absolute"><p>Data: '.$wyjazd_start_date.'</p></div>
        <div class="read-more-overlay">
            <div class="relative">
                <p>Więcej</p>
            </div>
        </div>
    </div>';

echo '<div class="blog-post__text">';
echo '<p>' .  $excerpt . '</p>';
echo '</div>';

echo '</a>';

?>
</article><!-- #post-<?php the_ID(); ?> -->

<div class="published">Opublikowano:<span class="ml--1"><?php echo get_the_date(); ?></span></div>
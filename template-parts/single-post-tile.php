<?php
$wyjazd_date_time = get_field('wyjazd_date_time');
$id = get_the_ID();
$title = get_the_title();
$excerpt = mb_strimwidth( html_entity_decode(get_the_excerpt()), 0, 440, '...' );
$map_travel_icon = file_get_contents(
    get_template_directory() .
        "/dist/svg/map_travel_icon.svg"
);

// <div class="icon icon--bg absolute"></div>

?>

<article id="post-<?php echo $id ?>" <?php post_class(); ?>>

    <?php

echo '<a class="blog-post link-none" href="'. get_permalink() .'">';

echo '<h3 class="mb--1">'.$title.'</h3>';

echo '
    <div class="blog-post__image-holder relative overflow--hidden mb--2">
        <div class="blog-post__image" style="background-image: url('.esc_url(get_the_post_thumbnail_url()).')"></div>
        <div class="badge badge--standard absolute">Data wyjazdu: '.$wyjazd_date_time.'</div>
        <div class="read-more-overlay">
            <div class="relative">
                <p>Więcej</p>
            </div>
        </div>
    </div>';

echo '<div class="blog-post__text">';
echo '<p>' .  $excerpt . '</p>';
echo '<span>Opublikowano:'.get_the_date().'</span>';
echo '</div>';

echo '</a>';

?>
</article><!-- #post-<?php the_ID(); ?> -->
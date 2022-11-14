<?php

global $product;
$product_id = $product->get_id();
$attachment_ids = $product->get_gallery_image_ids();

echo '<div id="productIDHolder" data-product-id ="'.$product_id.'"></div>';

if ( $product->get_image_id() ) {
	?>

    <div id="sideGallerySlickContainer" class="single-product-gallery__side">

        <div id="sideGalleryMainImageHolder" class="product-dec-small active">
                <img id='product mini'src="<?php echo wp_get_attachment_url( $product->get_image_id() );?>" alt="">
        </div>

        <?php
    if ( $attachment_ids && $product->get_image_id() ) {
        foreach ( $attachment_ids as $attachment_id ) {
            ?>
            <div class="product-dec-small active">
                    <img src="<?php echo wp_get_attachment_url( $attachment_id );?>" alt="">
            </div>

            <?php
        }}
        ?>
    </div>

    <div id="mainGallerySlickContainer" class="single-product-gallery__main">
        <div id="mainGalleryMainImageHolder" class="easyzoom-style">
            <div class="easyzoom easyzoom--overlay">
                    <a id='zoom' href="<?php echo wp_get_attachment_url( $product->get_image_id() );?>">
                            <img id='main-product-image' src="<?php echo wp_get_attachment_url( $product->get_image_id() );?>" alt="">
                    </a>
            </div>
            <a id="popupzoom" class="easyzoom-pop-up img-popup" href="<?php echo wp_get_attachment_url( $product->get_image_id() );?>"></a>
        </div>
	<?php


    if ( $attachment_ids && $product->get_image_id() ) {
        foreach ( $attachment_ids as $attachment_id ) {
        ?>
            <div class="easyzoom-style">
                    <div class="easyzoom easyzoom--overlay">
                            <a href="<?php echo wp_get_attachment_url( $attachment_id );?>">
                                    <img src="<?php echo wp_get_attachment_url( $attachment_id );?>" alt="">
                            </a>
                    </div>
                    <a id="popupzoom" class="easyzoom-pop-up img-popup" href="<?php echo wp_get_attachment_url( $attachment_id );?>"></a>
            </div>
        <?php
    }}
    ?>
	</div><!-- product-dec-right -->

<?php
}

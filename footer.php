<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bmxschool
 */

$column_1_header = get_field("column_1_header", get_page_by_title("Kontakt"));
$phone_number_1 = get_field("phone_number_1", get_page_by_title("Kontakt"));
$phone_number_2 = get_field("phone_number_2", get_page_by_title("Kontakt"));
$email_1 = get_field("email_1", get_page_by_title("Kontakt"));
$email_2 = get_field("email_2", get_page_by_title("Kontakt"));
$hq_header = get_field("hq_header", get_page_by_title("Kontakt"));
$company_full_name = get_field(
	"company_full_name",
	get_page_by_title("Kontakt")
);
$address_1 = get_field("address_1", get_page_by_title("Kontakt"));
$address_2 = get_field("address_2", get_page_by_title("Kontakt"));
$nip = get_field("nip", get_page_by_title("Kontakt"));
$bank_account = get_field("bank_account", get_page_by_title("Kontakt"));

$column_2_header = get_field("column_2_header", get_page_by_title("Kontakt"));
$working_hours_1 = get_field("working_hours_1", get_page_by_title("Kontakt"));
$working_hours_2 = get_field("working_hours_2", get_page_by_title("Kontakt"));

$column_3_header = get_field("column_3_header", get_page_by_title("Kontakt"));
$instagram_link = get_field("instagram_link", get_page_by_title("Kontakt"));
$facebook_link = get_field("facebook_link", get_page_by_title("Kontakt"));

$footer_info = get_field("footer_info", get_page_by_title("Kontakt"));
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer site-content--padding max-width--xl">
    <div class="site-info regular-content flex-drow-mcol mb--4">
        <div class="flex flex-col">
            <h3 class="mb--1"><?php echo $column_1_header; ?></h3>
            <p>tel: <a href="tel:<?php echo $phone_number_1; ?>"><?php echo $phone_number_1; ?></a>
            </p>
            <p>tel: <a href="tel:<?php echo $phone_number_2; ?>"><?php echo $phone_number_2; ?></a>
            </p>
            <p><a href="mailto: <?php echo $email_1; ?>"><?php echo $email_1; ?></a>
            </p>
            <p class="mb--1"><a href="mailto: <?php echo $email_2; ?>"><?php echo $email_2; ?></a>
            </p>
            <p><?php echo $address_1; ?></p>
            <p><?php echo $address_2; ?></p>
            <p><?php echo $nip; ?></p>
            <p>Numer rachunku bankowego:</p>
            <p><?php echo $bank_account; ?></p>
        </div>
        <div class="flex flex-col">
            <h3 class="mb--1"><?php echo $column_2_header; ?></h3>
            <p><?php echo $working_hours_1; ?></p>
            <p><?php echo $working_hours_2; ?></p>
        </div>
        <div class="flex flex-col">
            <h3 class="mb--1"><?php echo $column_3_header; ?></h3>
            <div class="social-media">
                <div class="social-media__icons">
                    <a class="instagram" href="<?php echo $instagram_link; ?>" target="_blank"></a>
                    <a class="facebook" href="<?php echo $facebook_link; ?>" target="_blank"></a>
                </div>
            </div>
        </div>

    </div><!-- .site-info -->
    <div class="footer-info text-center">
        <div class="site-branding mb--2">
            <?php the_custom_logo(); ?>
        </div>
        <?php echo footer_copyright(); ?> Copyright © <?php echo get_bloginfo(
 	"name"
 ); ?>
    </div>

    <div class="scrollToTopBtn">
        <div class="scrollToTopBtn__svg-wrapper">
            <svg xmlns="http://www.w3.org/2000/svg" height="42" viewBox="0 0 24 24" width="36">
                <path d="M0 0h24v24H0z" fill="none" />
                <path fill="#fff" d="M7.41 15.41L12 10.83l4.59 4.58L18 14l-6-6-6 6z" />
            </svg>
        </div>
    </div>

    <!-- <div class="cookie-law-notification pd--standard">
			<p class="mb--2"><?php echo $cookies_info; ?></p>
			<button id="cookie-law-button" class="button button__filled--turquoise"><?php echo $accept; ?></button>
		</div> -->

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
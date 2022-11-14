<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package pstk
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo("charset"); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <?php get_template_part("template-parts/universal/preloader"); ?>

    <div class="modal">
        <div class="modal-content">
            <span class="close-button">&times;</span>
            <div class="modal-message-holder"></div>
        </div>
    </div>

    <?php wp_body_open(); ?>
    <div id="page" class="site" style="visibility: hidden">
        <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e(
        	"Skip to content",
        	"pstk"
        ); ?></a>

        <header id="masthead" class="site-header">

            <div class="desktop-menu-container">

                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                </div>

                <div class="main-menu-wrapper">

                    <?php wp_nav_menu([
                    	"theme_location" => "main-menu",
                    	"menu_id" => "main-menu",
                    	"orderby" => "menu_order",
                    	"container" => "nav",
                    ]); ?>

                    <div class="dropdownBackground">
                        <span class="arrow"></span>
                    </div>

                </div>

                <?php
// echo search_products();
?>

                <?php
// echo customer_panel();
?>

            </div>

            <div class="mobile-menu-container">

                <div class="mobile-menu-wrapper">

                    <?php wp_nav_menu([
                    	"theme_location" => "main-menu",
                    	"menu_id" => "mobile-menu",
                    	"orderby" => "menu_order",
                    	"container" => "nav",
                    ]); ?>
                </div>

                <div class="search-mobile-holder">
                    <?php
// echo search_products();
?>
                </div>

                <div class="mobile-menu__left shop-icons-wrapper">
                    <button class="menu-toggle nav-icon" aria-controls="primary-menu" aria-expanded="false">
                        <div class="span-wrapper">
                            <span class="burger-menu-piece"></span>
                            <span class="burger-menu-piece"></span>
                            <span class="burger-menu-piece"></span>
                        </div>
                    </button>

                    <div class="search-icon-wrapper nav-icon">
                        <div class="search-link wrapper-flex-column">

                            <?php
                            $search_icon = file_get_contents(
                            	get_template_directory() .
                            		"/dist/dist/svg/search.svg"
                            );
                            echo $search_icon;
                            ?>

                        </div>
                    </div>

                </div>



                <div class="site-branding">
                    <?php the_custom_logo(); ?>
                    </a>
                </div>

                <div class="mobile-menu__right">

                    <?php
// echo customer_panel();
?>

                </div>


            </div>


        </header><!-- #masthead -->

        <div id="content" class="site-content">
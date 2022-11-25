<?php
/*
 * Template Name: Home Page Template
 * description: >-
  Page template without sidebar
 */

get_header();
$czym_jest_image = get_field("czym_jest_image");
$column_header_1 = get_field("column_header_1", get_page_by_title("Kontakt"));
?>


<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="welcome-view">

            <div class="image-menu-wrapper">

                <?php wp_nav_menu([
                	"theme_location" => "image-menu",
                	"menu_id" => "image-menu",
                	"orderby" => "menu_order",
                	"container" => "div",
                ]); ?>
            </div>

        </section>

        <div class="site-content--padding max-width--xl">
            <section class="text-center regular-content">
                <h2 class="mb--3 uppercase">CZYM JEST BMX SCHOOL?</h2>
                <p class="text--subheader mb--4">BMX school to <b>profesjnalana szkoła BMX</b>, która powstała w 2015 roku a jej założycielem i pomysłodawcą jest rider oraz trener <b>Michał Basta</b>.</p>
                <div class="image-holder">
                    <img class="box-shadow--standard border-radius--standard" src="<?php echo $czym_jest_image[
                    	"url"
                    ]; ?>" />
                </div>
            </section>


            <section class="regular-content">
                <h2 class="text-center mb--3 uppercase">Jaka jest nasza misja?</h2>
                <p class="text--subheader mb--4">
                    Misją BMX School jest przekazywanie wiedzy i zajawki jaką jest BMX. Jako profesjonaliści wiemy że dbając o odpowiednie <b>przygotowanie merytoryczne, mentalne oraz żywieniowe</b> uczymy zdrowych nawyków które pozwolą utrzymywać <b>świetną kondycję fizyczną</b>.
                    BMX kształtuje <b>poczucie własnej wartości, silny charakter oraz otwartość</b> która przekłada się na każdą dziedzinę życia. <b>Ambicja i systematyka</b> to bez wątpienia jedne z największych atutów zapisanych w naturze zajawki jaką jest <b>BMX</b>!
                </p>

                <div class="youtube-player box-shadow--standard border-radius--standard" data-id="hdyIPYviSN8"></div>

            </section>

            <section class="narrow-content">
                <h2 class="text-center mb--6 uppercase">GDZIE PROWADZIMY ZAJĘCIA?</h2>

                <div class="photo-paragraphs__container">

                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Kraków</h3>
                            <ul>
                                <li class="text--regular">
                                    <p>Skatepark oraz Pumptrack w Parku Lotników Polskich</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Mistrzejowice</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark w Parku Jordana</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Galeria Bronowice</p>
                                </li>
                                <li class="text--regular">
                                    <p>Vert Ramp Płaszów</p>
                                </li>
                                <li class="text--regular">
                                    <p>Kraków Street Park</p>
                                </li>
                                <li class="text--regular">
                                    <p>Pool Forum</p>
                                </li>
                            </ul>

                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_lokalizacje_krakow2.png">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Warszawa</h3>
                            <ul>
                                <li class="text--regular">
                                    <p>Stadion Narodowy – Zimowy Narodowy</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Jutrzenka</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Zachodni</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Tarchomin</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Piaseczno</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark WoodPark</p>
                                </li>
                            </ul>

                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_lokalizacje_warszawa.png">
                        </div>
                    </div>

                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Zakopane / Nowy Targ</h3>
                            <ul>
                                <li class="text--regular">
                                    <p>Skatepark Zakopane</p>
                                </li>
                                <li class="text--regular">
                                    <p>Skatepark Nowy Targ</p>
                                </li>
                            </ul>

                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_lokalizacje_zakopanentarg.png">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Lublin</h3>
                            <ul>
                                <li class="text--regular">
                                    <p>Skatepark Rusałka</p>
                                </li>
                            </ul>

                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_lokalizacje_lublin.png">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Katowice</h3>
                            <ul>
                                <li class="text--regular">
                                    <p>Skate in Park</p>
                                </li>
                                <li class="text--regular">
                                    <p>PTG</p>
                                </li>
                            </ul>

                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_lokalizacje_katowice.png">
                        </div>
                    </div>


                </div>
            </section>

        </div><!-- site-content--padding -->

        <?php get_template_part("template-parts/cta-banner"); ?>



    </main><!-- #main -->
</div><!-- #primary -->

<?php // get_sidebar();

get_footer();
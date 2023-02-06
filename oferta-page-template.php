<?php
/*
 * Template Name: Oferta Page Template
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
                <h2 class="text-center mb--4">Rodzaje zajęć</h2>

                <div class="offer-option offer-option--1">
                    <h3 class="text-center mb--2">Zajęcia Indywidualne</h3>
                    <div class="offer-option__details-container">
                        <div class="offer-option__details">
                            <p class="name text--smallheader">Pojedyncze zajęcia (60min)</p>
                            <p class="price text--smallheader">120 PLN</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">Pakiet 5 zajęć (5 x 60min)</p>
                            <p class="price text--smallheader">550 PLN</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">Pakiet 10 zajęć (10 x 60min)</p>
                            <p class="price text--smallheader">1000 PLN</p>
                        </div>
                    </div>
                </div>

                <div class="offer-option offer-option--2">
                    <h3 class="text-center mb--2">Zajęcia dla dwóch osób</h3>
                    <div class="offer-option__details-container">
                        <div class="offer-option__details">
                            <p class="name text--smallheader">2-óch uczestników (60min)</p>
                            <p class="price text--smallheader">70 PLN/os.</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">2-óch uczestników (90min)</p>
                            <p class="price text--smallheader">90 PLN/os.</p>
                        </div>
                    </div>
                </div>


                <div class="offer-option offer-option--3">
                    <h3 class="text-center mb--2">Zajęcia Grupowe</h3>
                    <div class="offer-option__details-container">
                        <div class="offer-option__details">
                            <p class="name text--smallheader">Pojedyncze zajęcia (90min)</p>
                            <p class="price text--smallheader">55 PLN</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">Pakiet 10 zajęć (10 x 90min)</p>
                            <p class="price text--smallheader">450 PLN</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="narrow-content">
                <h2 class="text-center mb--4">Wynajem sprzętu</h2>
                <div class="offer-option offer-option--4">
                    <div class="offer-option__details-container">
                        <div class="offer-option__details">
                            <p class="name text--smallheader">ROWER BMX 16” 18” 20” + kask <br>
                                Na pierwsze zajęcia
                            </p>
                            <p class="price text--smallheader">GRATIS</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">ROWER BMX 16” 18” 20” + kask <br>
                                Na czas zajęć
                            </p>
                            <p class="price text--smallheader">30 PLN</p>
                        </div>
                        <div class="offer-option__details">
                            <p class="name text--smallheader">ROWER BMX 16” 18” 20” + kask <br>
                                Cała doba
                            </p>
                            <p class="price text--smallheader">100 PLN</p>
                        </div>
                    </div>
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

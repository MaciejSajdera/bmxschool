<?php
/*
 * Template Name: Kadra Page Template
 * description: >-
  Page template without sidebar
 */
get_header();
$welcome_view = get_field("welcome_view");
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="site-content--padding">

            <section class="regular-content">
                <div class="welcome-view flex items-center content-center welcome-view-subpage relative">

                    <div class="welcome-view__container flex-drow-mcol">

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
                <h2 class="text-center mb--4">Instruktorzy</h2>
                <div class="photo-paragraphs__container">
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Kacper Lekki</h3>
                            <p>Profesjonalista w dziedzinie BMX freestyle, ten młody człowiek niejednokrotnie zaznaczył swoją obecność na polskiej scenie zdobywając wysokie miejsca na ogólnopolskich zawodach.

                                Potrafi zadbać o konsekwentny rozwój, posiada świetny kontakt z młodzieżą a swoje życie poświęca BMX!</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_kacper.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Kuba Kundzierewicz</h3>
                            <p>Zaczynał swoją przygodę na mini skateparku i krawężnikach w małej podkarpackiej miejscowości Brzozów.

                                Dzisiaj jako 25 latek z 10 letnim stażem przemierza kraj w poszukiwaniu nowych miejscówek.Sponsorowany przez takie marki jak Alldaybmx.pl/bmxforever.pl i HouseOfBanks stale się rozwija pokazując to na swoich filmach i w mediach społecznościowych, jak sam twierdzi BMX to całe jego życie, a co za tym idzie każdą wolną chwile spędza na BMX. Pan menager największego krytego skateparku w południowej części kraju Street Park oraz instruktor BMX School zadba o Wasz rozwój i dobrą atmosferę na zajęciach w Krakowie i na wyjazdach.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_kuba.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Wiktor Skibiński</h3>
                            <p>Na małych kółkach od 2012 roku pokazuje jak w zaskakująco szybkim tempie potrafi się rozwijać w tym co robi.
                                Wiktor jest totalnie zakręcony na punkcie BMX, a rower towarzyszy mu podczas wszystkich podróży w kraju i tych za granicą, w ostatnich czasach jest bez wątpienia jednym z pionierów Polskiej sceny BMX o czym świadczą najnowsze filmy z jego udziałem oraz liczne osiągnięcia na rodzimych contestach.
                                Niedawno zasilił szeregi teamu BMX Life oraz międzynarodowej, legendarnej marki We The People.
                                Ten doświadczony i zawsze pozytywnie nastawiony instruktor BMX School, zadba o Wasze postępy na zajęciach w Warszawie, wyjazdach i obozach które organizujemy.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_wiktor.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Jarosław Jakimowicz</h3>
                            <p>Pierwsze zainteresowanie jazdą na BMX pojawiło się u niego w czasach dzieciństwa, gdy w telewizji trafił na emitowany wówczas odcinek programu Props BMX.
                                Jak się okazało, był to wystarczający bodziec do rozpoczęcia treningów. Od tamtej pory minęło 12 lat, a Jarek wciąż śmiga po railach i kręci barspiny.
                                Jego konikiem i główną specjalizacją jest jazda na streecie, ale często możecie go spotkać na lokalnych skateparkach.
                                Poza nauką techniki jazdy chętnie dzieli się swoją wiedzą na temat serwisowania rowerów, ponieważ w tym zakresie również ma duże doświadczenie.
                                Z Jarkiem możecie trenować w Warszawie, Piasecznie oraz podczas naszych wakacyjnych projektów w innych miastach, zachęcamy Was również do korzystania z jego usług serwisowych.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_jaroslaw.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Bartek Chojecki</h3>
                            <p>Z bmxem związany już prawie 10 lat, chociaż jak sam twierdzi najlepsze lata są dopiero przed nim. Urodzony i wychowany w Warszawie, gdzie również prowadzi zajęcia z BMX School. Z wykształcenia mechatronik, z doświadczenia pedagog i instruktor lecz przede wszystkim z całego serca profesjonalny rider bmx.
                                Zanim trafił do naszej szkółki zdobywał doświadczenie prowadząc różne zajęcia edukacyjne dla młodzieży. Poprzez zabawę i uśmiech zdobywa dobry kontakt z uczestnikami swoich zajęć. Zaangażowany i kreatywny lecz również konsekwentny i wiecznie roześmiany.
                                Reprezentuje streetowy styl na bmx. Uwielbia techniczne popisy na trudnych przeszkodach lecz równocześnie lubi szybką i dynamiczną jazdę. Posiada w swoim arsenale kilka tak niespotykanych sztuczek jak jego kolor włosów!</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_bartek.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Patryk Dziedzic</h3>
                            <p>Profesjonalny rider BMX, który swoją przygodę na małych kółkach zaczął w 2010 roku na niewielkim skateparku w Skawinie. Dzisiaj, jako jeden z najbardziej rozpoznawalnych riderów w kraju stale rozwija się trenując na dirtach, skateparkach i ulicach, co czyni go bardzo wszechstronnym zawodnikiem.

                                Patryk budzi same pozytywne skojarzenia, a nadmiar pozytywnej energii przekazuje uczestnikom naszych zajęć.

                                Świetny rider oraz nauczyciel, którego zamiłowania nie kończą się na dwóch kółkach – w końcu jest też wielkim fanem starych samochodów i snowboardingu, w którym również ma się czym pochwalić.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_patryk.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Mateusz Zięba</h3>
                            <p>Pochodzący ze wschodniej części kraju zawodnik może pochwalić się wyjątkowym, bardzo gibkim stylem oraz imponującymi ciekawymi kombinacjami manuali i grindów. Ze sceną związany jest od 10 lat, jeździ w głównej mierze w rodzinnym mieście Kraśniku oraz pobliskim Lublinie i to właśnie na tych obiektach możecie trenować z Mateuszem.

                                Świetny instruktor oraz mentor, w przyjemny sposób nauczy Was wielu trików nie zapominając o lekcjach stylu.

                                Czas wolny spędza podróżując zarówno z małym, jak i dużym rowerem – miłośnik przyrody oraz świetny serwisant rowerowy, do którego możecie zaglądać zawsze kiedy Wasz sprzęt wymaga ręki fachowca.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_mateusz.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Mikołaj Guzik</h3>
                            <p>Młody, rozwijający się w szaleńczym tempie rider z Podhala, który pomimo braku wymarzonych warunków, z każdym dniem udowadnia że konsekwentne dążenie do celu przynosi zamierzone efekty.

                                Mikołaj sporo ćwiczy nie tylko na skateparku. Mieszkaniec Nowego Targu umiejętnie korzysta z darów natury uprawiając freeskiing zimą a tym samym zdaje sobie sprawę z potrzeby odpowiedniego przygotowania do sportów ekstremalnych i wykonuje treningi siłowe oraz mobilizacyjne.

                                Poziom jazdy naszego „Górala” jest wysoki i rowna się z poziomem przekazywania przez niego wiedzy uczestnikom naszych zajęć.
                                Nowy Targ, Zakopane i Kraków – w tych miastach możecie trenować z Mikim.</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_mikolaj.jpg">
                        </div>
                    </div>
                    <div class="photo-paragraphs__single flex-drow-mcol content-between">
                        <div class="paragraph-holder flex flex-col">
                            <h3 class="text--subheader">Michał Basta</h3>
                            <p>Profesjonalny zawodnik BMX, sportowiec, podróżnik, założyciel BMX SCHOOL.
                                Michał stale od 12 lat jest związany z dyscypliną BMX freestyle, na swoim koncie posiada liczne osiągnięcia na zawodach BMX oraz wyróżnienia na międzynarodowej scenie uzyskując m.in. takie tytuły jak “Street Rider” roku na gali “BMX Awards”

                                Podróżnik który wspólnie z rowerem zwiedził sporo świata, stale obierając nowe kierunki.

                                Od pięciu lat przekazuje swoją wiedzę amatorom BMX, prowadząc regularne zajęcia na terenie małopolski. W sezonie letnim sprawuje stanowisko głównego koordynatora największego obozu BMX w Polsce – BMX Holidays Camp,

                                Michał dobrze wie jak zadbać o odpowiednie przygotowanie merytoryczne oraz dietę w sporcie którą chętnie dzieli się z podopiecznymi.

                                Licencjonowany sędzia UCI BMX Freestyle, Wychowawca kolonijny, instruktor BMX, sponsorowany przez takie marki jak BMX LIFE, KOKA Clothing, Stranger CO, zawsze uśmiechnięty i w pełnej gotowości do działania!</p>
                        </div>
                        <div class="image-holder">
                            <img class="box-shadow--standard border-radius--standard" src="https://bmxschool.grapewebtech.pl/wp-content/uploads/2022/07/bmxschool_michal.jpg">
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
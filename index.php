   

   <?php
    header('Content-Type: text/html; charset=utf-8');
    include 'php/dbconfig.php';
    include 'php/functions.php';

            $events = array(
                '6070132', //v BZw
                '6070635', // CD
                '6070058', //v Borsi
                '6070141', //v TT
                '6070174', //v Wu5
                '6070062', //v KiK
                '6070127', //v HäMa
                '6070651', // Club 11
                '6070243', //v HCC
                '6070007', //v Gutz
                '6069905', //v CM
                '6070144', //v Gag
                '6070005', //v Novi
                '6070209', //v Aqua

            );

    foreach ($events as $key => $value) {
            $events .= returnEvent( $value);
    }



        ?>

<!DOCTYPE HTML SYSTEM "about:legacy-compat">
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>17. Dresdner Nachtwanderung</title>
        <meta name="description" content="17. Dresdner Nachtwanderung der Studentenclubs am 31.05.2016 von 19 bis 1 Uhr.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <script type="text/javascript" src="js/jquery-2.1.1.js"></script>
        <script type="text/javascript" src="js/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
        <link rel="stylesheet" type="text/css" href="css/grid.css"/>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link rel="stylesheet" type="text/css" href="css/arrow.css"/>
        <link rel="stylesheet" type="text/css" href="css/expand-icon.css"/>
        <link rel="stylesheet" type="text/css" href="css/navIcon.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
        <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
        <script type="text/javascript" src="js/nawa.js"></script>
        <script type="text/javascript" src="slick/slick.min.js"></script>

        <!-- Open Graph Meta -->
        <meta property="og:title" content="17. Dresdner Nachtwanderung am 31. Mai 2016" />
        <meta property="og:description" content="14 Studentenclubs, Bands &amp; DJs, Busshuttle, Freigetr&auml;nke, Fr&uuml;hstart-Rabatt" />
        <meta property="og:url" content="http://www.dresdner-nachtwanderung.de/2015/" />

    </head>
    <body role="document">
        <!--[if lt IE 7]>
            <p class="chromeframe">Du nutzt einen <strong>veralteten</strong> Browser. Bitte <a href="http://browsehappy.com/">aktualisiere</a> ihn oder <a href="http://www.google.com/chromeframe/?redirect=true">aktiviere Google Chrome Frame</a>, um besser durchs Netz zu kommen.</p>
        <![endif]-->
        <!--[if lt IE 9]>
        <script>
            document.createElement('header');
            document.createElement('section');
            document.createElement('footer');
        </script>
        <![endif]-->

  <div id="landing">

    <div class="section group white" id="onset">
        <div class="col span_1_of_11"></div>
        <div class="col span_3_of_11" id="numberImg">
            <img src="img/dnawa-num-01.svg">
                    <hr class="white shorthr">
                    14 Studentenclubs
                <br>
                    Shuttlebusse
                <br>
                    Live-Musik
                <br>
                    Freigetr&auml;nke
        </div>
        <div class="col span_3_of_11 landingSpace"></div>
        <div class="col span_3_of_11 landingTitel" id="nameImg">
            <img src="img/dnawa-01.svg">
        </div>
        <div class="col span_1_of_11"></div>
    </div>

    <div class="landingDate">
        <div class="section group">
            <div class="col span_1_of_11"></div>
            <div class="col span_3_of_11">
                <div class="pos down-arrow whiteArrow"></div>
            </div>
            <div class="col span_3_of_11 landingSpace"></div>
            <div class="col span_3_of_11 landingTitel" id="dateImg">
                <img src="img/dnawa-date-01.svg">
            </div>
            <div class="col span_1_of_11"></div>
        </div>
    </div>
</div>
<div class="sponsors">
    <div class="flex-wrapper">
        <div class="flex-item">
            <a href="http://www.dresdner-studententage.de" target="blank"><img src="img/sponsors/stuta.svg"></a>
        </div>
        <div class="flex-item">
            <a href ="http://www.studentenwerk-dresden.de"><img src="img/sponsors/studentenwerk.svg"></a>
        </div>
        <div class="flex-item">
            <a href="http://vdsc.de"><img src="img/sponsors/vdsc.svg"></a>
        </div>
        <div class="flex-item">
            <img src="img/sponsors/sparkasse.svg">
        </div>
        <div class="flex-item">
            <img src="img/sponsors/Feldschlosschen.png">
        </div>
    </div>
</div>


<div class="offset section group" id="info">
    <div class="col span_1_of_11 rCol"></div>
    <div class="col span_3_of_11 rCol">
        <h1 class="red">Was ist die Nacht- wanderung?</h1>
        <hr class="shorthr">
    </div>
    <div class="col span_2_of_11 rCol"></div>
    <div class="col span_4_of_11 rCol">
        <div class="flex-wrapper">
            <div class="number">?</div>
            <div>
            <p>
Am 31. Mai 2016 werden sich die Studentenclubs in Dresden wieder zusammenfinden und gemeinschaftlich ihre Pforten &ouml;ffnen. 14 Mal Konzert und Party, 14 Mal ein &uuml;ppiges Getr&auml;nkeangebot zum gar nicht &uuml;ppigen Preis. Ein Bustransfer verbindet die verschiedenen Veranstaltungsorte miteinander, so dass Ihr ganz bequem von einer Party zur n&auml;chsten gelangen k&ouml;nnt. 
</p><p>
Den Eintritt zu den 14 Veranstaltungsorten erlangt Ihr, in dem Ihr an Eurer ersten Station ein Armband erwerbt. Mit diesem Armband findet Ihr dann auch in alle anderen Clubs Eintritt.
</p>
</div>
        </div>
        <div class="flex-wrapper offsetLight">
            <div class="number dark">&euro;</div>

            <div class="table-wrapper">
                <div class="section group offsetLight dark">
                    <div class="col span_3_of_11">
                        19&#8211;20 Uhr
                    </div>
                    <div class="col span_5_of_11">
                        Fr&uuml;starterrabatt
                    </div>
                    <div class="col span_3_of_11">
                        7,00 &euro;
                    </div>
                </div>

                <hr class="ultra-thin">

                <div class="section group offsetLight">
                    <div class="col span_3_of_11 red">
                        ab 20 Uhr
                    </div>
                    <div class="col span_5_of_11">
                        Studenten
                        <br>
                        Nicht-Studenten
                    </div>
                    <div class="col span_3_of_11">
                        9,00 &euro;
                        <br>
                        11,00 &euro;
                    </div>
                </div>

                <hr class="ultra-thin">

                <div class="section group offsetLight">
                    <div class="col span_8_of_11"></div>
                    <div class="col span_3_of_11 red">kein VVK</div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--Freigetraenke-->
    <div class="section group offset" id="drink">
        <div class="col span_1_of_11 rCol">
        </div>

        <div class="col span_3_of_11 rCol">
            <h1>Frei-<br>getr&auml;nke?</h1>
            <hr class="red shorthr">
            <p>
Beim Kauf eines Getr&auml;nkes bekommst Du Deinen ersten Stempel in der Kartenmitte, sowie auf einer Bonusecke. Den zweiten Stempel erh&auml;ltst Du im n&auml;chsten Club, wieder f&uuml;r den Kauf eines Getr&auml;nkes. Nummer drei kommt logischerweise im dritten Club auf die Karte, beim Kauf eines (na was schon) Ger&auml;nkes. Nun kannst Du die erste vollst&auml;ndig abgestempelte Bonusecke endlich gegen ein Bier, Wein oder ein alkohol freies Getr&auml;nk eintauschen. Dann geht es weiter in den n&auml;chsten Club und das Stempelspiel geht von vorne los. Bitte beachte: In jedem Club kann nur jeweils ein Getr&auml;nk f&uuml;r die Stempelkarte geltend gemacht werden und sinnlose Diskussionen mit dem Barpersonal k&ouml;nnen diabolische Sanktionen nach sich ziehen.
            </p>
        </div>
        <div class="col span_1_of_11 rCol"></div>
        <div class="col span_6_of_11 rCol" id="drinkImg">
        </div>
    </div>

<!--Fahrplan-->
    <div class="section group offsetLight" id="timetable">
        <div class="col rspan_1_of_11">
        </div>
        <div class="col rspan_3_of_11">
            <h1>Fahrplan</h1>
            <hr class="shorthr">
        </div>
        <div class="col rspan_2_of_11"></div>
        <div class="col rspan_4_of_11">
        </div>
        <div class="col rspan_1_of_11"></div>
    </div>

    <div class="offsetLight list white">
    </div>

<!--Route-->
<div id="busplan">
    <div class="flex-wrapper main-wrapper">
        <div class="flex-wrapper sub-wrapper">
            <div class="open-close-button bus-open"></div>
                <h1 class="white">Busroute</h1>
            </div>
                <img src="img/NaWa_Route_web.png" class="offsetLight" id="imgRoute">
    </div>
</div>


<div class="offset" id="programm">
    <div class="section group">
        <div class="col span_1_of_11"></div>
        <div class="col span_3_of_11">
            <h1>Programm</h1>
            <hr class="shorthr">
        </div>
        <div class="col span_7_of_11"></div>
    </div>

    <div class="section group">
        <div class="col rspan_1_of_11"></div>
        <div class="col rspan_3_of_11 col_0"></div>
        <div class="col rspan_3_of_11 col_1"></div>
        <div class="col rspan_3_of_11 col_2"></div>
        <div class="col rspan_1_of_11"></div>
    </div>

    <div class="section group offsetMid">
        <div class="col rspan_1_of_11"></div>
        <div class="col rspan_1_of_11 sliderArrow">
            <div class="pos down-arrow darkArrow rotateLeft prev offset"></div>
        </div>
        <div class="col rspan_7_of_11 slider-wrapper offsetLight">
            <?=$events?>
        </div>
        <div class="col rspan_1_of_11 sliderArrow">
            <div class="pos down-arrow darkArrow rotateRight next offset fRight"></div>
        </div>
        <div class="col rspan_1_of_11"></div>
        <div class="col rspan_1_of_11 flex-wrapper respArrows"> 
            <div class="arrow-wrapper offsetLight">
                <div class="pos down-arrow darkArrow rotateLeft prev"></div>
            </div>
            <div class="arrow-wrapper offsetLight">
                <div class="pos down-arrow darkArrow next rotateRight fRight"></div>
            </div>
        </div>
    </div>
</div>

    <div class="section group offset white" id="impressum">
        <div class="col rspan_1_of_11">
        </div>
        <div class="col rspan_2_of_11">
        <p>
            Anbieterkennzeichnung gem&auml;&szlig; &sect;5 TMG<br><br>
            Studentenwerk Dresden<br>
            Anstalt des &ouml;ffentlichen Rechts<br>
            Fritz-L&ouml;ffler-Str. 18<br>
            01069 Dresden<br>
            Vertreten durch Herrn Martin Richter<br><br>
            <a href="https://www.studentenwerk-dresden.de/kultur/kontakt.html" target="blank">Kontaktformular (externer Link)</a>
        </p>
        </div>
        <div class="col rspan_2_of_11">
            <p>
                Telefon: 0351 4697-50<br>
                Fax: 0351 4718154<br>
                E-Mail: info@studentenwerk-dresden.de<br>
                Internet: <a href="http://www.studentenwerk-dresden.de" target="blank">studentenwerk-dresden.de</a><br>
                USt-Ident-Nr.: DE 140303305<br>
            </p>
        </div>
        <div class="col rspan_2_of_11">
                        <p>
                Rechtliche Hinweise zur Organisationsform</p><p>
                Das Studentenwerk Dresden ist eine Anstalt des &ouml;ffentlichen Rechts. Sie wird durch den Gesch&auml;ftsf&uuml;hrer Herrn Martin Richter vertreten. Die zust&ouml;ndige Aufsichtsbeh&ouml;rde ist das S&auml;chsische Staatsministerium f&uuml;r Wissenschaft und Kunst.
            </p>
        </div>
        <div class="col rspan_2_of_11">
            <p>
                Hinweis zur elektronischen Kommunikation
                </p><p>
                Im Studentenwerk Dresden ist leider kein Zugang f&uuml;r elektronisch signierte sowie f&uuml;r verschl&uuml;sselte elektronische Dokumente m&ouml;glich.
            </p>
        </div>
        <div class="col rspan_1_of_11">
        <p>
            Gestaltung<br>
            Tom Gei&szlig;ler
        </p>
        </div>
        <div class="col rspan_1_of_11">
        </div>
    </div>



<div class="nav">
        <div class="section group">
            <div class="col span_1_of_11"></div>
            <div class="col span_2_of_11">
                <div class="navIcon">
                    <span class="navlabel underline spanOff"><a>Menu</a></span>
                    <div class="naviconUpper"></div>
                    <div class="innerNavicon"></div>
                    <div class="naviconLower"></div>
                </div>
            </div>
            <div class="col span_2_of_11"></div>
            <div class="col span_2_of_11">
                <span class="navlabel underline spanOff">
                    <a href="#info" class="scroll">Infos</a>
                </span>
            </div>

            <div class="col span_2_of_11">
                <span class="navlabel underline spanOff">
                    <a href="#timetable" class="scroll">Fahrplan/Route</a>
                </span>
            </div>

            <div class="col span_2_of_11">
                <span class="navlabel underline spanOff" id="topButton">
                    <a href="#landing" class="scroll">&#x2191;&nbsp;Top</a>
                </span>
            </div>
    </div>

    <div class="section group">
        <div class="col span_5_of_11"></div>
            <div class="col span_2_of_11">
                <span class="navlabel underline spanOff">
                    <a href="#programm" class="scroll">Programm</a>
                </span>
            </div>
            <div class="col span_2_of_11">
                <span class="navlabel underline spanOff">
                    <a href="#impressum" class="scroll">Impressum</a>
                </span>
            </div>
            <div class="col span_2_of_11"></div>
    </div>
</div>
</body>

</html>

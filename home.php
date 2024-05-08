<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>SkyParkFinder</title>

  <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">

  <!--CSS per icone-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

  <!-- TemplateMo 580 Woox Travel -->
  <!-- https://templatemo.com/tm-580-woox-travel -->

</head>

<body>

  <?php
  session_start();
  if (!(isset($_SESSION["utente"]))) {
    header("Location: accedi.php");
    exit;
  }
  ?>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** 
                      <a href="index.html" class="logo">
                          <img src="assets/images/immagineLogoOriginale.png" height="35" width="35" alt="">
                      </a>
                    -->
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="home.php" class="active">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="noleggioAuto.php">Noleggio</a></li>
              <li><a href="prenotaParcheggio.php">Prenotazioni</a></li>
              <li><a href="storico.php">Visualizza Stotico</a></li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <!-- ***** Main Banner Area Start ***** -->
  <section id="section-1">
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
      <input type="radio" id="banner2" class="sec-1-input" name="banner">

      <div class="slider">

        <!-- Banner 1 -->
        <div id="top-banner-1" class="banner">
        <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Di che cosa hai bisogno:</h2>
              <h1>Noleggio auto</h1>
              <div class="border-button"><a href="about.php">Maggiori informazioni sulla Azienda</a></div>
            </div>

            <div class="container">
              <div class="row">

                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-car-front-fill"></i>
                        <h4><span>Veicoli disponibili:</span><br>
                          <?php
                            include "connessione.php";

                            $sql = "SELECT COUNT(*) FROM `VeicoloNoleggio`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              // Estrai il risultato come array associativo
                              $row = $result->fetch_assoc();
                              // Estrai il valore del conteggio dalla prima colonna
                              $count = $row['COUNT(*)'];
                              echo $count;
                            }
                          ?>
                        </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-airplane-engines-fill"></i>
                        <h4><span>Aeroporti gestiti:</span><br>
                          <?php
                            $sql = "SELECT COUNT(*) FROM `Aeroporti`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              // Estrai il risultato come array associativo
                              $row = $result->fetch_assoc();
                              // Estrai il valore del conteggio dalla prima colonna
                              $count = $row['COUNT(*)'];
                              echo $count;
                            }
                          ?>
                        </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-coin"></i>
                        <h4><span>Prezzo medio:</span><br>
                          <?php
                            $sql = "SELECT AVG(costoGiornaliero) FROM `VeicoloNoleggio`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              $row = $result->fetch_assoc();
                              $prezzoMedioAuto = $row['AVG(costoGiornaliero)'];
                              $prezzoAuto = round($prezzoMedioAuto, 2);
                              echo $prezzoAuto."€";
                            }
                          ?>
                        </h4>
                      </div>

                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="noleggioAuto.php">Noleggia un veicolo</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="top-banner-2" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">
              <h2>Di che cosa hai bisogno:</h2>
              <h1>Prenotazione parcheggi</h1>
              <div class="border-button"><a href="about.php">Maggiori informazioni sulla Azienda</a></div>
            </div>

            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="more-info">
                    <div class="row">
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-p-square-fill"></i>
                        <h4><span>Parcheggi disponibili:</span><br>
                          <?php
                            $sql = "SELECT COUNT(*) FROM `PostoAuto`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              // Estrai il risultato come array associativo
                              $row = $result->fetch_assoc();
                              // Estrai il valore del conteggio dalla prima colonna
                              $count = $row['COUNT(*)'];
                              echo $count;
                            }
                          ?>
                      </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-airplane-engines-fill"></i>
                        <h4><span>Aeroporti gestiti:</span><br>
                          <?php
                            $sql = "SELECT COUNT(*) FROM `Aeroporti`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              // Estrai il risultato come array associativo
                              $row = $result->fetch_assoc();
                              // Estrai il valore del conteggio dalla prima colonna
                              $count = $row['COUNT(*)'];
                              echo $count;
                            }
                          ?>
                      </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="bi bi-coin"></i>
                        <h4><span>Prezzo medio:</span><br>
                          <?php
                            $sql = "SELECT AVG(CostoGiornaliero) FROM `PostoAuto`";
                            $result = $conn->query($sql);

                            if ($result === false) {
                              //echo "Errore nella query: " . $conn->error;
                            } else {
                              $row = $result->fetch_assoc();
                              $prezzoMedio = $row['AVG(CostoGiornaliero)'];
                              $prezzo = round($prezzoMedio, 2);
                              echo $prezzo."€";
                            }
                          ?>
                        </h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="prenotaParcheggio.php">Prenota un parcheggio</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

      </div>
      <nav>
        <div class="controls">
          <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">Noleggio auto</span></label>
          <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">Prenotazione parcheggi</span></label>
        </div>
      </nav>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->

  <?php
    $conn->close();
  ?>

<div class="visit-country">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Ecco gli aeroporti piu gettonati</h2>
            <p>Questi sono gli aeroporti dove ogni giorno usufuiscono del nostro servizio più persone</p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">

              <div id="pagina1">
                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/JFK-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Aeroporto JFK (New York)</h4>
                          <span>Stati Uniti</span>

                          <div class="main-button">
                            <a href="https://www.jfkairport.com/" target="_blank">Maggiori informazioni</a>
                          </div>

                          <p>L'aeroporto internazionale JFK è il principale aeroporto internazionale di New York City, negli Stati Uniti d'America. È situato a Jamaica, quartiere del Queens, circa 26 km a sud-est dal centro di Manhattan.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 61,7 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 455 mil veivoli</li>
                          </ul>
                          
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/MPX-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoporto MXP (Milano)</h4>
                          <span>Italia</span>
                          <div class="main-button">
                            <a href="https://www.milanomalpensa-airport.com/it" target="_blank">Maggiori informazioni</a>
                          </div>
                          <p>L'Aeroporto di Milano-Malpensa è un aeroporto intercontinentale italiano situato nei comuni di Somma Lombardo, Ferno e Lonate Pozzolo in provincia di Varese, nel cosiddetto Altomilanese; è il principale aeroporto di riferimento di Milano. È gestito dalla Società Esercizi Aeroportuali.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 26,1 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 201 mil veivoli</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="item last-item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/CDC-img1.webp" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoposto CDG (Parigi)</h4>
                          <span>Francia</span>
                          <div class="main-button">
                            <a href="https://www.parisaeroport.fr/en" target="_blank">Maggiori informazioni</a>
                          </div>
                          <p>L'Aeroporto di Parigi Charles de Gaulle è un aeroporto francese, situato nelle vicinanze della capitale, Parigi. È il più grande e più trafficato aeroporto in Francia; dall'8 marzo 1974 è intitolato al generale e Presidente della Repubblica francese Charles de Gaulle; prima di tale data era conosciuto come Aéroport de Paris-Nord. È gestito dalla società Groupe ADP (ADP), che gestisce anche l'aeroporto di Parigi-Orly e l'aeroporto di Parigi-Le Bourget.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 72,2 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 408 mil veivoli</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="pagina2" hidden>
                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/DXB-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Aeroporto DXB (Dubai)</h4>
                          <span>Emirati Arabi Uniti</span>

                          <div class="main-button">
                            <a href="https://www.dubaiairports.ae/" target="_blank">Maggiori informazioni</a>
                          </div>

                          <p>L'Aeroporto Internazionale di Dubai è il principale aeroporto che serve Dubai, negli Emirati Arabi Uniti. È il più grande e importante aeroporto del Medio Oriente ed è situato nel quartiere Garhoud, a 4 km a nord-est della città.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 86,9 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 312 mln veivoli</li>
                          </ul>
                          
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/FRA-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoporto FRA <br>(Francoforte sul Meno)</h4>
                          <span>Germania</span>
                          <div class="main-button">
                            <a href="https://www.frankfurt-airport.com/en.html" target="_blank">Maggiori informazioni</a>
                          </div>
                          <p>L'aeroporto di Francoforte sul Meno, in tedesco Flughafen Frankfurt am Main, è il più grande aeroporto intercontinentale della Germania, sesto in Europa e undicesimo nel mondo per numero di passeggeri. Con più di 330 destinazioni servite in 5 continenti, è l'aeroporto con più connessioni dirette al mondo.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 59,5 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 356 mil veivoli</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="item last-item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/FCO-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoposto FCO (Roma)</h4>
                          <span>Italia</span>
                          <div class="main-button">
                            <a href="https://www.adr.it/fiumicino" target="_blank">Maggiori informazioni</a>
                          </div>
                          <p>L'Aeroporto Internazionale di Roma-Fiumicino "Leonardo da Vinci" è un aeroporto intercontinentale italiano che si trova nel territorio del comune di Fiumicino, a circa 30 km a sud-ovest dal centro della città di Roma.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 40,5 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 266 mil veivoli</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div id="pagina3" hidden>
                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/NRT-img1.webp" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoporto NRT (Narita)</h4>
                          <span>Giappone</span>

                          <div class="main-button">
                            <a href="https://www.narita-airport.jp/en/" target="_blank">Maggiori informazioni</a>
                          </div>

                          <p>L'Aeroporto Internazionale di Narita è un aeroporto situato a Narita e serve principalmente Tokyo. Fino al 2004, era conosciuto come New Tokyo International Airport.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 34,7 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 145 mil veivoli</li>
                          </ul>
                          
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-lg-12">
                  <div class="item">
                    <div class="row">
                      <div class="col-lg-4 col-sm-5">
                        <div class="image">
                          <img src="assets/images/ORD-img1.jpg" alt="">
                        </div>
                      </div>

                      <div class="col-lg-8 col-sm-7">
                        <div class="right-content">
                          <h4>Areoporto ORD (Chicago)</h4>
                          <span>Stati Uniti</span>
                          <div class="main-button">
                            <a href="https://www.flychicago.com/ohare/home/pages/default.aspx" target="_blank">Maggiori informazioni</a>
                          </div>
                          <p>L'Aeroporto Internazionale Chicago-O'Hare, in inglese O'Hare International Aiport, o più semplicemente O'Hare, è il principale aeroporto internazionale al servizio della città di Chicago, in Illinois.</p>
                          <ul class="info">
                            <li><i class="fa fa-user"></i> 76,9 mln persone</li>
                            <li><i class="bi bi-airplane-fill"></i> 355 mil veivoli</li>
                          </ul>
                          <div class="text-button">
                            <a href="about.html">Prenota <i class="fa fa-arrow-right"></i></a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                   
              </div>

              <div class="col-lg-12">
                <ul class="page-numbers">
                  <button style="border-style: none; background-color: white;" onclick="paginaPrecedente()"><li><a><i class="fa fa-arrow-left"></i></a></li></button>
                  <button style="border-style: none; background-color: white;" onclick="paginaUno()"><li class="active" id="icon1"><a>1</a></li></button>
                  <button style="border-style: none; background-color: white;" onclick="paginaDue()"><li id="icon2"><a>2</a></li></button>
                  <button style="border-style: none; background-color: white;" onclick="paginaTre()"><li id="icon3"><a>3</a></li></button>
                  <button style="border-style: none; background-color: white;" onclick="paginaSuccessiva()"><li><a><i class="fa fa-arrow-right"></i></a></li></button>
                </ul>
              </div>

            </div>
          </div>
        </div>
                          
        
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map1">
                  <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Queens,%20NY%2011430,%20Stati%20Uniti+(My%20BusJFK%20Airportiness%20Name)&amp;t=h&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps tracker sport</a></iframe></div>
                </div>

                <div id="map2" hidden>
                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Aeroporto%20Internazionale%20di%20Dubai,%20Dubai%20-%20Emirati%20Arabi%20Uniti+(Areoporto%20DXB)&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps devices</a></iframe></div>
                </div>

                <div id="map3" hidden>
                <div style="width: 100%"><iframe width="100%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=1-1%20Furugome,%20Narita,%20Chiba%20282-0004,%20Giappone+(Areoporto%20NRT)&amp;t=k&amp;z=13&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"><a href="https://www.gps.ie/">gps trackers</a></iframe></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
      </div>
    </div>
  </div>

  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <h2>Devi fare un viaggio e ti serve un aiuto per la gestione dei veicoli in aereoporto?</h2>
          <h4>Effettua una prenotazione cliccando sui bottoni qui a fianco</h4>
        </div>
        <div class="col-lg-4">
          <div class="border-button">
            <a href="prenotaParcheggio.php">Prenota parcheggio</a>
          </div>

          <br>

          <div class="border-button">
            <a href="noleggioAuto.php">Noleggia veicolo</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 Company. All rights reserved.
            <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });

    // Funzioni per la gestione della paginazione
    var paginaCorrente = 1;

    function mostraPagina(numeroCorr, numeroAgg) {
        var element = document.getElementById("pagina" + numeroCorr);
        element.hidden = true;

        var attiva = document.getElementById("pagina" + numeroAgg);
        attiva.hidden = false;

        attivaIndicatore(numeroCorr, numeroAgg);
        gestisciMappe(numeroCorr, numeroAgg);
    }

    function attivaIndicatore(numeroCorr, numeroAgg){
      var element = document.getElementById("icon" + numeroCorr);
      element.classList.remove('active');

      var attiva = document.getElementById("icon" + numeroAgg);
      attiva.classList.add('active');
    }

    function gestisciMappe(numeroCorr, numeroAgg) {
        var element = document.getElementById("map" + numeroCorr);
        element.hidden = true;

        var attiva = document.getElementById("map" + numeroAgg);
        attiva.hidden = false;
    }

    function paginaPrecedente() {
        if (paginaCorrente > 1) {
            var paginaAtt = paginaCorrente;
            paginaCorrente = paginaCorrente - 1;
            mostraPagina(paginaAtt, paginaCorrente);
        }
    }

    function paginaSuccessiva() {
        if (paginaCorrente < 3) {
            var paginaAtt = paginaCorrente;
            paginaCorrente = paginaCorrente + 1;
            mostraPagina(paginaAtt, paginaCorrente);
        }
    }

    function paginaUno() {
      if(!(paginaCorrente == 1)){
        mostraPagina(paginaCorrente, 1);
        paginaCorrente = 1;
      }
    }

    function paginaDue() {
      if(!(paginaCorrente == 2)){
        mostraPagina(paginaCorrente, 2);
        paginaCorrente = 2;
      }
    }

    function paginaTre() {
      if(!(paginaCorrente == 3)){
        mostraPagina(paginaCorrente, 3);
        paginaCorrente = 3;
      }
    }
</script>

</body>

</html>

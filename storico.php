<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Storico</title>
    <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">
    <!-- CSS per icone -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
</head>

<body>
    <?php

    session_start();
    if (!(isset($_SESSION["utente"]))) {
        header("Location: accedi.php");
        exit;
    }


    include("connessione.php");
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
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php">Home</a></li>
                            <li><a href="about.php">About</a></li>
                            <li><a href="noleggioAuto.php">Noleggio</a></li>
                            <li><a href="prenotaParcheggio.php">Prenotazioni</a></li>
                            <li><a href="storico.php" class="active">Visualizza Storico</a></li>
                            <li><a href="inserisciVeicolo.php">Inserisci Veicolo</a></li>
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
    <!-- ***** Page Heading Start ***** -->
    <div class="page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Scopri tutte le tue prenotazioni e i tuoi noleggi</h4>
                    <h2>Visualizza lo storico</h2>
                    <div class="border-button"><a href="about.html">Scopri di più su di noi</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Page Heading End ***** -->
    <!-- ***** Search Form Start ***** -->
    <div class="search-form">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form id="search-form" name="gs" method="GET" action="#">
                        <div class="row">
                            <div class="col-lg-2">
                                <h4>Cerca per:</h4>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <select id="aeroporto" name="aeroporto" class='form-select' aria-label='Aeroporto di partenza' onchange='this.form.submit()'>
                                        <option value=''>Seleziona l'aeroporto di partenza ...</option>
                                        <option value="CDG">Charles de Gaulle</option>
                                        <option value="DXB">Dubai International Airport</option>
                                        <option value="FCO">Leonardo Da Vinci</option>
                                        <option value="FRA">Frankfurt Airport</option>
                                        <option value="JFK">Airport John Fitzgerald Kennedy International</option>
                                        <option value="MXP">Milano Malpensa</option>
                                        <option value="NRT">Narita International Airport</option>
                                        <option value="ORD">Chicago-O'Hare International Airport</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset>
                                    <select id="tipo" name="tipo" class="form-select" aria-label="Servizio richiesto" onchange="this.form.submit()">
                                        <option value="">Seleziona il servizio richiesto ...</option>
                                        <option value="prenotazione">Prenotazione parcheggio</option>
                                        <option value="noleggio">Noleggio auto</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-2">
                                <fieldset>
                                    <button type="submit" class="border-button">Trova risultati</button>
                                </fieldset>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- ***** Search Form End ***** -->
    <!-- ***** Amazing Deals Start ***** -->
    <div class="amazing-deals">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading text-center">
                        <h2>Storico Servizi richiesti</h2>
                    </div>
                </div>
                <!-- ***** Loop Start ***** -->
                <?php
                // Query per selezionare i dati desiderati
                $sql = "SELECT `Id`, `dataInizio`, `dataFine`, `costoTotale`, `targa`, `NumeroParcheggio`, `CodiceParcheggio`
                  FROM `prenotazionestallo`
                  WHERE `Targa` IN (SELECT `targa` FROM `veicolo` WHERE `mail` = '" . $_SESSION["utente"] . "')";

                // Esegui la query
                $result = $conn->query($sql);

                // Controlla se ci sono risultati
                if ($result->num_rows > 0) {
                    // Cicla attraverso i risultati e inserisci ciascun record nel database
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["Id"];
                        $dataInizio = $row["dataInizio"];
                        $dataFine = $row["dataFine"];
                        $costoTotale = $row["costoTotale"];
                        $targa = $row["targa"];
                        $numeroParcheggio = $row["NumeroParcheggio"];
                        $codiceParcheggio = $row["CodiceParcheggio"];

                        $sql2 = "SELECT `parcheggio`.`nome` AS 'nomeParcheggio', `aeroporti`.`nome` AS 'nomeAeroporto'
                            FROM `parcheggio` INNER JOIN `aeroporti` 
                            ON  `aeroporti`.`codice` = `parcheggio`.`aeroporto`
                             WHERE `parcheggio`.`codice` = $codiceParcheggio";
                        $result2 = $conn->query($sql2);

                        if ($result2 === false) {
                            echo "Errore nella query: " . $conn->error;
                        } else {
                            $row2 = $result2->fetch_assoc();
                            $nomeParcheggio = $row2['nomeParcheggio'];
                            $nomeAeroporto = $row2['nomeAeroporto'];
                        }


                        echo '<div class="col-lg-6 col-sm-6">
    <div class="item">
        <div class="row">
            <div class="col-lg-6">
                <div class="image">
                    <img src="https://us.123rf.com/450wm/mehaniq/mehaniq1803/mehaniq180301252/97847314-parcheggio-a-sinistra-segnale-stradale-con-la-lettera-p-e-le-frecce-a-sinistra.jpg?ver=6" alt="Placeholder">
                </div>
            </div>
            <div class="col-lg-6 align-self-center">
                <div class="content">
                    <h4>Prenotazione stallo</h4>
                    <div class="row">
                        <div class="col-6">
                            <i class="bi bi-gear-wide-connected"></i>
                            <span class="list">' . $id . '</span>
                        </div>
                        <div class="col-6">
                            <i class="bi bi-coin"></i>
                            <span class="list">' . $costoTotale . '</span>
                        </div>
                        <br><br>
                        <div class="col-12" style="border-bottom: 1px solid #ddd; margin-bottom: 10px;"></div>
                        <ul>
                            <li style="font-size: 14px; font-weight: bold;">Dettagli:</li>
                            <li><i class="bi bi-airplane-engines"></i> Aeroporto ' . $nomeAeroporto . '</li>
                            <li><i class="bi bi-p-square-fill"></i> Parcheggio ' . $nomeParcheggio . '</li>
                            <li><i class="bi bi-back"></i> Posto auto numero ' . $numeroParcheggio . '</li>
                            <li><i class="bi bi-car-front-fill"></i> La targa del veicolo era ' . $targa . ' </li>
                            <li><i class="bi bi-calendar-week"></i> Data inizio ' . $dataInizio . '</li>
                            <li><i class="bi bi-calendar-range"></i> Data fine ' . $dataFine . ' </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>';
                    }
                } else {
                    echo "Nessun risultato trovato.";
                }

                ?>

                <?php
                // Query per selezionare i dati desiderati
                $sql = "SELECT `Id`, `dataInizio`, `dataFine`, `costoTotale`, `kmPercorsi`, `targa` FROM `PrenotazioneVeicolo` WHERE `mail` = '" . $_SESSION["utente"] . "'";

                // Esegui la query
                $result = $conn->query($sql);

                // Controlla se ci sono risultati
                if ($result->num_rows > 0) {
                    // Cicla attraverso i risultati e inserisci ciascun record nel database
                    while ($row = $result->fetch_assoc()) {
                        $id = $row["Id"];
                        $dataInizio = $row["dataInizio"];
                        $dataFine = $row["dataFine"];
                        $costoTotale = $row["costoTotale"];
                        $targa = $row["targa"];
                        $kmPercorsi = $row["kmPercorsi"];

                        $sql2 = "SELECT `VeicoloNoleggio`.`marca` AS `marca`, `VeicoloNoleggio`.`modello` AS `modello`, `VeicoloNoleggio`.`tipologia` AS `tipologia`, `VeicoloNoleggio`.`numeroPosti` AS `numeroPosti`, `Aeroporti`.`nome` AS `aeroporto` 
        FROM `VeicoloNoleggio` INNER JOIN `Aeroporti`
        ON `VeicoloNoleggio`.`aeroporto` = `Aeroporti`.`Codice`
        WHERE `VeicoloNoleggio`.`targa` = '$targa'";

                        $result2 = $conn->query($sql2);

                        if ($result2 === false) {
                            echo "Errore nella query: " . $conn->error;
                        } else {
                            $row2 = $result2->fetch_assoc();
                            $marca = $row2['marca'];
                            $modello = $row2['modello'];
                            $tipologia = $row2['tipologia'];
                            $numeroPosti = $row2['numeroPosti'];
                            $nomeAeroporto = $row2['aeroporto'];
                        }


                        echo '<div class="col-lg-6 col-sm-6">
            <div class="item">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="image">
                            <img src="https://images.pexels.com/photos/10803694/pexels-photo-10803694.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1" alt="Placeholder">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="content">
                            <h4>Prenotazione auto</h4>
                            <div class="row">
                                <div class="col-6">
                                    <i class="bi bi-gear-wide-connected"></i>
                                    <span class="list">' . $id . '</span>
                                </div>
                                <div class="col-6">
                                    <i class="bi bi-coin"></i>
                                    <span class="list">' . $costoTotale . '</span>
                                </div>
                                <br><br>
                                <div class="col-12" style="border-bottom: 1px solid #ddd; margin-bottom: 10px;"></div>
                                <ul>
                                    <li style="font-size: 14px; font-weight: bold;">Dettagli:</li>
                                    <li><i class="bi bi-airplane-engines"></i> Aeroporto ' . $nomeAeroporto . '</li>
                                    <li><i class="bi bi-car-front-fill"></i> Targa veicolo ' . $targa . '</li>
                                    <li><i class="bi bi-car-front"></i> Marca e modello del veicolo ' . $marca . ' '. $modello .'</li>
                                    <li><i class="bi bi-sign-intersection-t"></i> Tipologia veicolo ' . $tipologia . '</li>
                                    <li><i class="bi bi-calendar-week"></i> Data inizio ' . $dataInizio . '</li>
                                    <li><i class="bi bi-calendar-range"></i> Data fine ' . $dataFine . ' </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                    }
                } else {
                    echo "Nessun risultato trovato.";
                }

                ?>

                <!-- ***** Loop End ***** -->

            </div>
        </div>
    </div>
    <!-- ***** Amazing Deals End ***** -->
    <!-- ***** Call to Action Start ***** -->
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

    <?php
    // Chiudi la connessione al database
    $conn->close();
    ?>
    <!-- ***** Call to Action End ***** -->
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved.
                        <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- ***** Footer End ***** -->
    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/wow.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script>
        $(".option").click(function() {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });
    </script>
</body>

</html>
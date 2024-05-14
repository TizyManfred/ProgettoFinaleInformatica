<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Resoconto prenotazione</title>

    <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">

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
                            <li><a href="storico.php">Visualizza Stotico</a></li>
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

    <div class="second-page-heading">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4>Ecco qui il</h4>
                    <h2>Resoconto della prenotazione</h2>
                    <p>Con questa card puoi accedere al tuo stallo aeroportuale</p>
                </div>
            </div>
        </div>
    </div>


    <?php
    session_start();
    if (!isset($_SESSION["utente"])) {
        header("Location: accedi.php");
        exit;
    }

    include("connessione.php");

    function giorniTraDate($dataInizio, $dataFine)
    {
        // Converti le date in oggetti DateTime
        $inizio = new DateTime($dataInizio);
        $fine = new DateTime($dataFine);

        // Calcola la differenza tra le due date
        $differenza = $inizio->diff($fine);

        // Ottieni il numero di giorni dalla differenza
        return $differenza->days;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"] ?? "--";
        $cognome = $_POST["cognome"] ?? "--";
        $dataNascita = $_POST["dataNascita"] ?? "--";
        $mail = $_POST["mail"] ?? "--";
        $numeroTel = $_POST["numeroTel"] ?? "--";
        $nomeParcheggio = $_POST["parcheggio"] ?? "--";
        $dimensioni = $_POST["dimensioni"] ?? "--";
        $targa = $_POST["targa"] ?? "--";
        $aeroporto = $_POST["aeroporto"] ?? "--";
        $dataInizio = $_POST["dataInizio"] ?? "--";
        $dataFine = $_POST["dataFine"] ?? "--";

        $prefix = uniqid(); // Genera un identificatore univoco basato sul timestamp attuale
        $Id = substr(md5($prefix), 0, 10); // Estrae i primi 10 caratteri dall'hash md5

        $sql = "SELECT `codice`, `citta`, `indirizzo` FROM `Parcheggio` WHERE `nome` = '$nomeParcheggio' AND `aeroporto` = '$aeroporto'";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "Errore nella query: " . $conn->error;
        } else {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $codiceParcheggio = $row['codice'];
                $cittaParcheggio = $row['citta'];
                $indirizzoParcheggio = $row['indirizzo'];
            } else {
                echo "<script>alert('Nessun parcheggio trovato con il nome e l'aeroporto specificati');</script>";
            }
        }

        $sql = "SELECT `marca`, `modello` FROM `Veicolo` WHERE `targa` ='$targa'";
        $result = $conn->query($sql);

        if ($result === false) {
            echo "Errore nella query: " . $conn->error;
        } else {
            $row = $result->fetch_assoc();
            $marca = $row['marca'] ?? "--";
            $modello = $row['modello'] ?? "--";
        }

        $sql = "SELECT `Numero`, `CostoGiornaliero` FROM `PostoAuto` WHERE `CodiceParcheggio` = '$codiceParcheggio' AND `Dimensioni` = '$dimensioni' LIMIT 10";;
        $result = $conn->query($sql);

        

        // Verifica se la query ha prodotto risultati
        if ($result->num_rows > 0) {
            // Output dei dati
            while ($row = $result->fetch_assoc()) {
                $sql1 = "SELECT COUNT(*) AS `libero`
            FROM `PrenotazioneStallo`
            WHERE `NumeroParcheggio` = " . $row["Numero"] . " AND `CodiceParcheggio` = '$codiceParcheggio' AND
                (('dataInizio' >= '$dataInizio' AND 'dataInizio' <= '$dataFine') OR
                ('dataFine' >= '$dataInizio' AND 'dataFine' <= '$dataFine') OR
                ('dataInizio' <= '$dataInizio' AND 'dataFine' >= '$dataFine'))";

                //ERRORE NEL CONNTROLLO


                $result1 = $conn->query($sql1);
                $row1 = $result1->fetch_assoc();
                $count = $row1['libero'] ?? 0;

                if ($count == 0) {
                    // libero
                    $numeroStallo = $row["Numero"];
                    $costoGiornaliero = $row["CostoGiornaliero"];
                    $giorniPassati = giorniTraDate($dataInizio, $dataFine);
                    $costoTotale = $giorniPassati * $costoGiornaliero;
                }
            }

            if (!isset($numeroStallo)) {
                echo "<script>alert('Tutti gli stalli di questo tipo sono occupati!');</script>";
            }
        } else {
            echo "<script>alert('Non ci sono stalli che corrispondono alle tue caratteristiche');</script>";
            $numeroStallo = "--";
            $costoTotale = "--";
            $cittaParcheggio = "--";
            $indirizzoParcheggio = "--";
        }

        if (isset($numeroStallo)) {
            $sql = "INSERT INTO `PrenotazioneStallo`(`Id`, `dataInizio`, `dataFine`, `costoTotale`, `Targa`, `NumeroParcheggio`, `CodiceParcheggio`) VALUES ('$Id', '$dataInizio', '$dataFine', '$costoTotale', '$targa', '$numeroStallo', '$codiceParcheggio')";

            mysqli_query($conn, $sql);
        }
    }
    ?>





    <div class="reservation-form">
        <div class="container" style="border-radius: 24px; background-color: #f9f9f9;">
            <div class="row">
                <div class="col-lg-12">
                    <div class="more-about">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-heading" style="text-align: center;">
                                        <h1>Carta per l'accesso al parcheggio</h1>
                                    </div>
                                    <div>

                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Id:</span>
                                                        <h4><?php echo "$Id"; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Nome:</span>
                                                        <h4><?php echo "$nome"; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Cognome:</span>
                                                        <h4><?php echo "$cognome"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Data di nascita:</span>
                                                        <h4><?php echo "$dataNascita"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Mail:</span>
                                                        <h4><?php echo "$mail"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Numero di telefono:</span>
                                                        <h4><?php echo "$numeroTel"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Data di inizio:</span>
                                                        <h4><?php echo "$dataInizio"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Data di fine:</span>
                                                        <h4><?php echo "$dataFine"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Marca:</span>
                                                        <h4><?php echo "$marca"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Modello:</span>
                                                        <h4><?php echo "$modello"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Targa veicolo:</span>
                                                        <h4><?php echo "$targa"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Aeroporto:</span>
                                                        <h4><?php echo "$aeroporto"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Parcheggio:</span>
                                                        <h4><?php echo "$nomeParcheggio"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Dimensioni stallo:</span>
                                                        <h4><?php echo "$dimensioni"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Numero stallo:</span>
                                                        <h4><?php echo "$numeroStallo"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Città parcheggio:</span>
                                                        <h4><?php echo "$cittaParcheggio"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Indirizzo parcheggio:</span>
                                                        <h4><?php echo "$indirizzoParcheggio"; ?></h4>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3">
                                                    <div class="info-item" style="background-color: white;">
                                                        <span>Costo totale:</span>
                                                        <h4><?php echo "$costoTotale"; ?></h4>
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
            </div>
        </div>
    </div>

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

    <?php
    $conn->close();
    ?>


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
        $(".option").click(function() {
            $(".option").removeClass("active");
            $(this).addClass("active");
        });

        function controlla() {
            var password1 = document.getElementById("password1").value;
            var password2 = document.getElementById("password2").value;
            var numeroTel = document.getElementById("numeroTel").value;

            if (password1 == password2) {
                if (numeroTel.length == 10) {
                    var form = document.getElementById("reservation-form");
                    form.submit();
                } else {
                    var popup = document.getElementById("alertNum");
                    popup.style.display = "block";
                }
            } else {
                var popup = document.getElementById("alertPsw");
                popup.style.display = "block";
            }
        }
    </script>

</body>

</html>
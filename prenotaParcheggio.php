<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Prenota parcheggio</title>

  <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!--CSS per icone-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
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
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="home.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="noleggioAuto.php">Noleggio</a></li>
              <li><a href="prenotaParcheggio.php" class="active">Prenotazioni</a></li>
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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Devi prenotere un parcheggio</h4>
          <h2>Prenotalo qui</h2>
          <p>Qui puoi prenotare velocemente il parcheggio per il tuo veicolo e partire senza pensieri per la nuva meta.</p>
          <div class="main-button"><a href="about.html">Maggiori informazioni su di noi</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="bi bi-p-square-fill"></i>
            <h4>Parcheggi disponibili</h4>
            <h3 style="color: #22b3c1;">
              <?php
              include("connessione.php");
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
            </h3>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="bi bi-airplane-engines-fill"></i>
            <h4>Aeroporti gestiti</h4>
            <h3 style="color: #22b3c1;">
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
            </h3>
          </div>
        </div>

        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="bi bi-coin"></i>
            <h4>Prezzo medio:</h4>
            <h3 style="color: #22b3c1;">
              <?php
              $sql = "SELECT AVG(CostoGiornaliero) FROM `PostoAuto`";
              $result = $conn->query($sql);

              if ($result === false) {
                //echo "Errore nella query: " . $conn->error;
              } else {
                $row = $result->fetch_assoc();
                $prezzoMedio = $row['AVG(CostoGiornaliero)'];
                $prezzo = round($prezzoMedio, 2);
                echo $prezzo . "€";
              }
              ?>
            </h3>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Scopri le nostre tipologie di parcheggi</h2>
            <p>Puoi scegliere il tuo stallo sulla base delle dimensioni del tuo veicolo</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">

            <?php
            $sql = "SELECT DISTINCT `Dimensioni` FROM `PostoAuto`";
            $result = $conn->query($sql);

            if ($result === false) {
              echo "Errore nella query: " . $conn->error;
            } else {
              if ($result->num_rows > 0) {
                // Output dei dati di ogni riga
                while ($row = $result->fetch_assoc()) {

                  $sql2 = "SELECT AVG(CostoGiornaliero) AS `costoMedio` FROM `PostoAuto` WHERE `Dimensioni` = '" . $row['Dimensioni'] . "'";
                  $result2 = $conn->query($sql2);

                  if ($result2 === false) {
                    echo "Errore nella query: " . $conn->error;
                  } else {
                    $row2 = $result2->fetch_assoc();
                    $prezzoParcheggio = round($row2['costoMedio'], 2);
                  }

                  $sql3 = "SELECT COUNT(*) AS `numParcheggi` FROM `PostoAuto` WHERE `Dimensioni`= '" . $row['Dimensioni'] . "'";
                  $result3 = $conn->query($sql3);

                  if ($result3 === false) {
                    echo "Errore nella query: " . $conn->error;
                  } else {
                    $row3 = $result3->fetch_assoc();
                    $numParcheggi = $row3['numParcheggi'];
                  }

                  $dimensioni = "";
                  $img = "";
                  switch ($row['Dimensioni']) {
                    case "Grande":
                      $dimensioni = "4,8 x 2,4";
                      $img = "https://img.freepik.com/premium-vector/parking-lot-with-car-city-background-car-parking-icon-parking-space-parking-lot-car-parking-concept-vector-illustration_735449-108.jpg?size=626&ext=jpg";
                      break;
                    case "Medio":
                      $dimensioni = "5,2 x 2,55";
                      $img = "https://i.pinimg.com/736x/78/b4/9b/78b49b274519ecc816bfc5d4bbe7631e.jpg";
                      break;
                    case "Piccolo":
                      $dimensioni = "5,5 x 2,7";
                      $img = "https://img.freepik.com/premium-vector/car-parking-sign-parking-space-icon-parking-lot-car-parking-flat-style-vector-illustration-web-element_435184-1157.jpg";
                      break;
                  }

                  echo "<div class='item'>
                          <div class='thumb'>
                            <img src='" . $img . "' alt=''>
                            <div class='text'>
                              <h4><span>Parcheggio</span><br>" . $row['Dimensioni'] . "</h4>
                              <h6>" . $prezzoParcheggio . "€<br><span>/giorno</span></h6>
                              <div class='line-dec'></div>
                              <ul>
                                <li>Dettagli:</li>
                                <li><i class='bi bi-p-square-fill'></i> " . $numParcheggi . " posti auto disponibili</li>
                                <li><i class='bi bi-car-front-fill'></i> " . $dimensioni . " m</li>
                              </ul>
                              <div class='main-button'>
                                <form method='POST' action='prenotaParcheggio.php'>
                                  <input name='dimen' value='" . $row['Dimensioni'] . "' hidden>
                                  <button style='border-style: none; background-color: white;' type='submit'><a>Prenota ora</a></button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>";
                }
              } else {
                echo "0 risultati";
              }
            }
            ?>


          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">

        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="submit" role="search" action="resocontoPrenotazione.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Effettua <em>qui</em> la <em>prenotazione</em> dello <em>stallo</em></h4>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="Name" class="form-label">Nome: </label>
                  <?php
                  $mail = $_SESSION["utente"];
                  echo "<input type='text' name='mail' class='Name' value='$mail' hidden>";

                  $sql = "SELECT `nome`, `cognome`, `dataNascita`, `numeroTelefono`  FROM `Utente` WHERE `mail` = '" . $mail . "'";
                  $result = $conn->query($sql);

                  if ($result === false) {
                    //echo "Errore nella query: " . $conn->error;
                  } else {
                    $row = $result->fetch_assoc();
                    $nome = $row['nome'];
                    $cognome = $row['cognome'];
                    $dataNascita = $row['dataNascita'];
                    $numeroTelefono = $row['numeroTelefono'];
                  }

                  echo "<input type='text' name='nome' class='Name' value='$nome' disabled>
                          <input type='text' name='nome' class='Name' value='$nome' hidden>";
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="cognome" class="form-label">Cognome: </label>
                  <?php
                  echo "<input type='text' name='cognome' class='Name' value='$cognome' disabled>
                    <input type='text' name='cognome' class='Name' value='$cognome' hidden>";
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="dataNascita" class="form-label">Data di nascita: </label>
                  <?php
                  echo "<input style='color: #212529;' type='text' name='dataNascita' class='date' value='$dataNascita' disabled>
                    <input style='color: #212529;' type='text' name='dataNascita' class='date' value='$dataNascita' hidden>";
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="numeroTel" class="form-label">Numero di telefono: </label>
                  <?php
                  echo "<input type='text' name='numeroTel' class='number' value='+39 " . $numeroTelefono . "' disabled>
                    <input type='text' name='numeroTel' class='number' value='+39 " . $numeroTelefono . "' hidden>";
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="aeroporto" class="form-label">Scegli l'aeroporto: </label>
                  <select name="aeroporto" class='form-select' aria-label='Default select example' onChange='getParcheggi(this.value)'>
                    <option value=''>--</option>
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

              <div class="col-lg-6">
                <fieldset>
                  <label for="parcheggio" class="form-label">Scegli il parcheggio: </label>
                  <select name="parcheggio" id="selectParcheggi" class='form-select' aria-label='Default select example'>
                    <option value=''>--</option>
                  </select>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="dimensioni" class="form-label">Scegli la dimensione del parcheggio: </label>
                  <?php
                  if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $dimensioni = $_POST["dimen"];
                    echo "<input type='text' name='dimensioni' class='number' value='" . $dimensioni . "' disabled>
                    <input type='text' name='dimensioni' class='number' value='" . $dimensioni . "' hidden>";
                  } else {
                    echo "<select name='dimensioni' class='form-select' aria-label='Default select example'>
                            <option value=''>--</option>
                            <option value='Grande'>Grande</option>
                            <option value='Medio'>Medio</option>
                            <option value='Piccolo'>Piccolo</option>
                          </select>";
                  }
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="veicolo" class="form-label">Veicolo: </label>
                  <?php
                  $sql = "SELECT `targa` FROM `Veicolo` WHERE `mail` = '" . $_SESSION['utente'] . "'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    // Output dei dati di ogni riga
                    echo "<select name='targa' class='form-select' aria-label='Default select example'>";
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='" . $row['targa'] . "'>" . $row['targa'] . "</option>";
                    }
                    echo "</select>";
                  } else {
                    if ($result->num_rows == 1) {
                      echo "<input type='text' name='targa' class='form-control' value='".$row['targa']."' disabled>";
                    } else {
                      echo "<input type='text' name='targa' id='errore' class='form-control' placeholder='Nessun veicolo disponibile' disabled>";
                    }
                  }
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="dataInizio" class="form-label">Data inizio noleggio:</label>
                  <input type="date" id="dataInizio" name="dataInizio" class="date" required>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="dataFine" class="form-label">Data fine noleggio:</label>
                  <input type="date" id="dataFine" name="dataFine" class="date" required>
                </fieldset>
              </div>

              <div class="col-lg-12" id="alertDate" style="display: none;">
                <div class="alert alert-danger" role="alert">
                  Date non valide!
                </div>
                <br>
              </div>

              <div class="col-lg-2"></div>

              <div class="col-lg-8">
                <fieldset>
                  <button type="button" onclick="controlla()" class="main-button">Effettua la registrazione</button>
                </fieldset>
              </div>

              <div class="col-lg-2"></div>

            </div>
          </form>
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
      $(".collapse").collapse("hide");
    });
  </script>
  <script>
    function controlla() {
      var dataInizio = document.getElementById("dataInizio").value;
      var dataFine = document.getElementById("dataFine").value;

      var dataI = new Date(dataInizio);
      var dataF = new Date(dataFine);
      var dataOggi = new Date();

      if (dataI >= dataF || dataI < dataOggi || dataF < dataOggi) {
        document.getElementById("alertDate").style.display = "block";
      } else {
        document.getElementById("alertDate").style.display = "none";
        document.getElementById("reservation-form").submit();
      }
    }
  </script>

  <script>
    function getParcheggi(aeroporto) {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var selectParcheggi = document.getElementById("selectParcheggi");
            selectParcheggi.innerHTML = this.responseText;
        }
    };
    xhr.open("POST", "getParcheggi.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("aeroporto=" + aeroporto);
}
  </script>

  <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper-container", {
      slidesPerView: 3,
      spaceBetween: 30,
      slidesPerGroup: 3,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Noleggio auto</title>

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
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
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
                      <li><a href="noleggioAuto.php" class="active">Noleggio</a></li>
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
          <h4>Devi noleggiare un veicolo</h4>
          <h2>Noleggialo qui</h2>
          <p>Nel nostro parco macchine ci sono molti veicoli scegli il più adatto, verifica la disponibilità nel tuo aeroporto e effettua la prenotazione</p>
          <div class="main-button"><a href="about.php">Maggiori informazioni su di noi</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="bi bi-airplane-engines-fill"></i>
            <h4>Areoporti gestiti</h4>
              <h3 style="color: #22b3c1;">
                <?php
                  include("connessione.php");
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
            <i class="bi bi-car-front-fill"></i>
            <h4>Veicoli disponibili</h4>
            <h3 style="color: #22b3c1;">
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
            </h3>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="bi bi-cash-stack"></i>
            <h4>Costo medio</h4>
            <h3 style="color: #22b3c1;">
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
            <h2>Scopri i nostri veicoli</h2>
            <p>Puoi scegliere il veicolo che si adatta maggiormente alle tue esigenze e effettuare direttamente qui il noleggio</p>
          </div>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">

          <?php
            $sql = "SELECT `immaginiveicoli`.`marca` AS `marca`, `immaginiveicoli`.`modello` AS `modello`, `immaginiveicoli`.`linkImmagine` AS `linkImmagine`, `veicolonoleggio`.`numeroPosti` AS `numeroPosti`, `veicolonoleggio`.`tipologia` AS `tipologia` FROM `immaginiveicoli` INNER JOIN `veicolonoleggio` ON (`veicolonoleggio`.`modello` = `immaginiveicoli`.`modello` AND `veicoloNoleggio`.`marca` = `immaginiveicoli`.`marca`)";
            $result = $conn->query($sql);

            if ($result === true) {
              //echo "Errore nella query: " . $conn->error;
            } else {
              if ($result->num_rows > 0) {
                // Output dei dati di ogni riga
                while($row = $result->fetch_assoc()) {

                  $sql2 = "SELECT AVG(`costoGiornaliero`) AS `costoMedio` FROM `VeicoloNoleggio` WHERE `modello`='".$row['modello']."' AND `marca`='".$row['marca']."'";
                  $result2 = $conn->query($sql2);

                  if ($result2 === false) {
                    //echo "Errore nella query: " . $conn->error;
                  } else {
                    $row2 = $result2->fetch_assoc();
                    $prezzoMedioAuto = $row2['costoMedio'];
                    $prezzoAuto = round($prezzoMedioAuto, 2);
                  }

                  $sql3 = "SELECT COUNT(*) FROM `VeicoloNoleggio` WHERE `modello`='".$row['modello']."' AND `marca`='".$row['marca']."'";
                  $result3 = $conn->query($sql3);

                  if ($result3 === false) {
                    //echo "Errore nella query: " . $conn->error;
                  } else {
                    $row3 = $result3->fetch_assoc();
                    $numVeicoli = $row3['COUNT(*)'];
                  }

                  echo "<div class='item'>
                  <div class='thumb'>
                    <img src='".$row['linkImmagine']."' alt=''>
                    <div class='text'>
                      <h4>".$row['modello']."<br><span>".$row['marca']."</span></h4>
                      <h6>".$prezzoAuto."€<br><span>/giorno</span></h6>
                      <div class='line-dec'></div>
                      <ul>
                        <li>Dettagli:</li>
                        <li><i class='bi bi-people-fill'></i> ".$row['numeroPosti']." posti disponibili</li>
                        <li><i class='bi bi-car-front-fill'></i> ".$row['tipologia']."</li>
                        <li><i class='bi bi-arrow-counterclockwise'></i> ".$numVeicoli."</li>
                      </ul>
                      <div class='main-button'>
                        <form method='POST' action='noleggioAuto.php'>
                          <input name='modello' value='".$row['modello']."' hidden>
                          <input name='marca' value='".$row['marca']."' hidden>
                          <button style='border-style: none; background-color: white;' type='submit'><a>Prenota ora</a></button>
                        </form>
                        
                      </div>
                    </div>
                  </div>
                </div>";
                }
              } else {
                //echo "0 risultati";
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
          <form id="reservation-form" name="gs" method="post" action="resocontoNoleggio.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Effettua <em>qui</em> il <em>noleggio</em> del <em>veicolo</em></h4>
              </div>

              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Nome: </label>
                        <?php
                        $mail = $_SESSION["utente"];
                          echo "<input type='text' name='mail' class='Name' value='$mail' hidden>";

                          $sql = "SELECT `nome`, `cognome`, `dataNascita`, `numeroTelefono`  FROM `Utente` WHERE `mail` = '".$mail."'";
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
                    echo "<input type='text' name='numeroTel' class='number' value='+39 ".$numeroTelefono."' disabled>
                    <input type='text' name='numeroTel' class='number' value='+39 ".$numeroTelefono."' hidden>";
                  ?>
                </fieldset>
              </div>

              <div class="col-lg-4">
                  <fieldset>
                      <label for="marca" class="form-label">Scegli la marca: </label>
                      <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                          $marca = $_POST["marca"];
                          $modello = $_POST["modello"];

                          echo "<input type='text' name='marca' class='Name' value='$marca' disabled>
                          <input type='text' name='marca' class='Name' value='$marca' hidden>";

                        } else {
                          echo "<select name='marca' id='marca' class='form-select' aria-label='Default select example' onChange='modificaOpzioni()'>
                          <option value=''>--</option>
                          <option value='Skoda'>Skoda</option>
                          <option value='Ford'>Ford</option>
                          <option value='Nissan'>Nissan</option>
                          <option value='Audi'>Audi</option>
                          <option value='Land Rover'>Land Rover</option>
                          <option value='Peugeot'>Peugeot</option>
                          <option value='Toyota'>Toyota</option>
                          <option value='BMW'>BMW</option>
                          <option value='Renault'>Renault</option>
                          <option value='Fiat'>Fiat</option>
                          <option value='Hyundai'>Hyundai</option>
                          <option value='Opel'>Opel</option>
                          <option value='Mercedes-Benz'>Mercedes-Benz</option>
                          <option value='Kia'>Kia</option>
                          <option value='Seat'>Seat</option>
                          <option value='Mitsubishi'>Mitsubishi</option>
                          <option value='Citroen'>Citroen</option>
                          <option value='Volkswagen'>Volkswagen</option>
                        </select>";
                        }
                      ?>
                      
                  </fieldset>
              </div>
              
              <div class="col-lg-4">
                  <fieldset>
                      <label for="modello" class="form-label">Scegli il modello: </label>
                      <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                          echo "<input type='text' name='modello' class='Name' value='$modello' disabled>
                          <input type='text' name='modello' class='Name' value='$modello' hidden>";
                        } else {
                          echo "<select name='modello' id='segnaPosto' class='form-select' aria-label='Default select example' onChange='this.form.click()' disabled>
                          <option value=''>--</option>
                          </select>";
                          echo "<div id='modello' style='display: none;'>
                          
                          </div>";
                        }
                      ?>
                      
                  </fieldset>
              </div>

              <div class="col-lg-4">
                  <fieldset>
                      <label for="modello" class="form-label">Scegli l'aeroporto: </label>
                      <select name="aeroporto" class='form-select' aria-label='Default select example' onChange='this.form.click()'>
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
                  <button type="button" onclick="controllaDate()" class="main-button">Effettua la registrazione</button>
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
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
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
    /*$(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });*/

    function controllaDate(){
      var dataInizio = document.getElementById("dataInizio").value;
      console.log(dataInizio);
      var dataFine = document.getElementById("dataFine").value;

      if(dataInizio > dataFine){
        var popup = document.getElementById("alertDate");
        popup.style.display = "block";
      } else {
        var form = document.getElementById("reservation-form");
        form.submit();
      }
    }


    function modificaOpzioni() {
      var selectBox = document.getElementById("marca");
      var selectedValue = selectBox.options[selectBox.selectedIndex].value;
      var dynamicOptionsDiv = document.getElementById("modello");
      var segnaPosto = document.getElementById("segnaPosto");

      dynamicOptionsDiv.style.display = "block";
      segnaPosto.style.display = "none";

      // Cancella le opzioni dinamiche precedenti se presenti
      var stampa = "<select name='modello' class='form-select' aria-label='Default select example' onChange='this.form.click()'><option value=''>--</option>";

      // Genera le opzioni dinamiche in base alla scelta
      switch (selectedValue) {
        case "Ford":
          stampa += "<option value='Fiesta'>Fiesta</option>";
          break;
        case "Skoda":
          stampa += "<option value='Octavia'>Octavia</option>";
          break;
        case "Nissan":
          stampa += "<option value='Qashqai'>Qashqai</option>";
          break;
        case "Audi":
          stampa += "<option value='A3'>A3</option>";
          break;
        case "Land Rover":
          stampa += "<option value='Discovery'>Discovery</option>";
          break;
        case "Peugeot":
          stampa += "<option value='208'>208</option>";
          break;
        case "Toyota":
          stampa += "<option value='RAV4'>RAV4</option>";
          break;
        case "BMW":
          stampa += "<option value='X3'>X3</option>";
          break;
        case "Renault":
          stampa += "<option value='Kangoo'>Kangoo</option>";
          break;
        case "Fiat":
          stampa += "<option value='Ducato'>Ducato</option>";
          break;
        case "Hyundai":
          stampa += "<option value='i20'>i20</option>";
          break;
        case "Opel":
          stampa += "<option value='Corsa'>Corsa</option>";
          break;
        case "Mercedes-Benz":
          stampa += "<option value='Vito'>Vito</option>";
          break;
        case "Kia":
          stampa += "<option value='Sportage'>Sportage</option>";
          break;
        case "Seat":
          stampa += "<option value='Ibiza'>Ibiza</option>";
          break;
        case "Mitsubishi":
          stampa += "<option value='Outlander'>Outlander</option>";
          break;
        case "Opel":
          stampa += "<option value='Corsa'>Corsa</option>";
          break;
        case "Citroen":
          stampa += "<option value='Berlingo'>Berlingo</option>";
          break;
        case "Volkswagen":
          stampa += "<option value='Golf'>Golf</option>";
          break;
      }

      stampa += "</select>";
      console.log(stampa);
      dynamicOptionsDiv.innerHTML = stampa;
      
    }
  </script>

  </body>

</html>

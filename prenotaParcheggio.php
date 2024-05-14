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
                  echo $prezzo."€";
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

            if ($result === true) {
              //echo "Errore nella query: " . $conn->error;
            } else {
              if ($result->num_rows > 0) {
                // Output dei dati di ogni riga
                while($row = $result->fetch_assoc()) {

                  $sql2 = "SELECT AVG(CostoGiornaliero) AS 'costoMedio' FROM `PostoAuto` WHERE `Dimensioni` = '".$row['Dimensioni']."'";
                  $result2 = $conn->query($sql2);

                  if ($result2 === false) {
                    //echo "Errore nella query: " . $conn->error;
                  } else {
                    $row2 = $result2->fetch_assoc();
                    $prezzoMedioParcheggio = $row2['costoMedio'];
                    $prezzoParcheggio = round($prezzoMedioAuto, 2);
                  }

                  $sql3 = "SELECT COUNT(*) FROM `PostoAuto` WHERE `Dimensioni`= '".$row['Dimensioni']."'";
                  $result3 = $conn->query($sql3);

                  if ($result3 === false) {
                    //echo "Errore nella query: " . $conn->error;
                  } else {
                    $row3 = $result3->fetch_assoc();
                    $numParcheggi = $row3['COUNT(*)'];
                  }

                  if($row['dimensioni'] == "Grande"){
                    $dimensioni = "4,8 x 2,4";
                  } else {
                    if($row['dimensioni'] == "Medie"){
                      $dimensioni = "5,2 x 2,55";
                    } else {
                      $dimensioni = "5,5 x 2,7";
                    }
                  }

                  echo "<div class='item'>
                  <div class='thumb'>
                  <img src='"."' alt=''>
                    <div class='text'>
                      <h4><span>Parcheggio</span><br>".$row['Dimensioni']."</h4>
                      <h6>".$prezzoParcheggio."€<br><span>/giorno</span></h6>
                      <div class='line-dec'></div>
                      <ul>
                        <li>Dettagli:</li>
                        <li><i class='bi bi-p-square-fill'></i> ".$numParcheggi." posti auto disponibili</li>
                        <li><i class='bi bi-car-front-fill'></i> ".$dimensioni." m</li>
                      </ul>
                      <div class='main-button'>
                        <form method='POST' action='prenotaParcheggio.php'>
                          <input name='dimensioni' value='".$row['Dimensioni']."' hidden>
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
          <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
          </div>
        </div>

        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="submit" role="search" action="#">
            <div class="row">
              <div class="col-lg-12">
                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="Name" class="form-label">Your Name</label>
                  <input type="text" name="Name" class="Name" placeholder="Ex. John Smithee" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="Number" class="form-label">Your Phone Number</label>
                  <input type="text" name="Number" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="chooseGuests" class="form-label">Number Of Guests</label>
                  <select name="Guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                    <option selected>ex. 3 or 4 or 5</option>
                    <option type="checkbox" name="option1" value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4+">4+</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="Number" class="form-label">Check In Date</label>
                  <input type="date" name="date" class="date" required>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                  <select name="Destination" class="form-select" aria-label="Default select example" id="chooseCategory" onChange="this.form.click()">
                    <option selected>ex. Switzerland, Lausanne</option>
                    <option value="Italy, Roma">Italy, Roma</option>
                    <option value="France, Paris">France, Paris</option>
                    <option value="Engaland, London">Engaland, London</option>
                    <option value="Switzerland, Lausanne">Switzerland, Lausanne</option>
                  </select>
                </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                  <button class="main-button">Make Your Reservation Now</button>
                </fieldset>
              </div>
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
  </script>

</body>

</html>
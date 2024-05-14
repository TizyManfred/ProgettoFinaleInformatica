<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Accedi</title>
  <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">
  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css">
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
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li><a href="#">Noleggio</a></li>
              <li><a href="#">Prenotazioni</a></li>
              <li><a href="#">Visualizza Storico</a></li>
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
          <h2>Accedi</h2>
          <p>Qui puoi accedere al tuo account per prenotare parcheggi e noleggiare autovetture nella maggior parte degli aereoporti in tutto il mondo</p>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="post" action="accedi.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Inserisci i <em>Dati</em> del tuo <em>Account</em></h4>
              </div>
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="mail" class="form-label">Mail: </label>
                  <input type="text" name="mail" class="Number" placeholder="Ex. Mario@gmail.com" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-3"></div>
              <div class="col-lg-3"></div>
              <div class="col-lg-6">
                <fieldset>
                  <label for="password" class="form-label">Password: </label>
                  <input type="password" name="password" class="Number" autocomplete="off" required>
                </fieldset>
              </div>
              <div class="col-lg-3"></div>
              <?php
              
              if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include "connessione.php";

                $mail = $_POST["mail"];
                $password = $_POST["password"];

                $sql = "SELECT `password` FROM `Utente` WHERE `mail`='$mail'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                    if (password_verify($password, $row["password"])) {

                      session_start();
                      $_SESSION["utente"] = $mail;

                      header("Location: home.php");
                      exit;

                    } else {
                      echo "<div class='col-lg-12' id='alertPsw'>
                              <div class='alert alert-danger' role='alert' style='text-align: center'>
                                La password è errata!
                              </div>
                              <br>
                            </div>";
                    }
                  }
                } else {
                  echo "<div class='col-lg-12' id='alertUser'>
                              <div class='alert alert-danger' role='alert' style='text-align: center'>
                                Utente non trovato. Prima devi registrarti
                              </div>
                              <br>
                            </div>";
                }

                $ip = $_SERVER['REMOTE_ADDR'];

                $sql1 = "INSERT INTO `RegistroLog`(`Username`, `IP`) VALUES ($mail,$ip)";
                $conn->query($sql1);

                $conn->close();
              }
              
              ?>
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <fieldset>
                  <button type="submit" class="main-button">Accedi</button>
                </fieldset>
              </div>
              <div class="col-lg-2"></div>
              <br><br><br>
              <div class="col-lg-5"></div>
              <div class="col-lg-2">
                <div style="text-align: center;">
                  <div class="border-button"><a href="registrati.html">Registrati</a></div>
                </div>
              </div>
              <div class="col-lg-5"></div>
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

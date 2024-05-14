<?php
session_start();

// Controllo se l'utente è loggato
if (!isset($_SESSION["utente"])) {
  header("Location: accedi.php");
  exit;
}

include 'connessione.php';

// Variabili per memorizzare i messaggi di errore e di successo
$errore_targa = "";
$errore_database = "";
$successo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $marca = $_POST['marca'];
  $modello = $_POST['modello'];
  $tipologia = $_POST['tipologia'];
  $targa = $_POST['targa'];
  $mail = $_SESSION['utente'];

  // Controllo se la targa è in formato italiano valido
  if (!preg_match('/^[A-Z]{2}\d{3}[A-Z]{2}$/', $targa)) {
    $errore_targa = "La targa non è valida!";
  } else {
    // Controllo se la targa è già presente nel database
    $sql_check = "SELECT COUNT(*) as count FROM `Veicolo` WHERE `targa` = '$targa'";
    $result_check = $conn->query($sql_check);
    $row_check = $result_check->fetch_assoc();
    $count = $row_check['count'];

    if ($count > 0) {
      $errore_database = "La targa è già presente nel database";
    } else {
      // Inserimento dei dati nel database
      $sql_insert = "INSERT INTO `Veicolo`(`targa`, `marca`, `modello`, `tipologia`, `mail`) VALUES ('$targa', '$marca', '$modello', '$tipologia', '$mail')";
      if ($conn->query($sql_insert) === TRUE) {
        $successo = "Veicolo inserito correttamente!";
      } else {
        $errore_database = "Errore durante l'inserimento del veicolo nel database: " . $conn->error;
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Inserimento veicoli</title>
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
              <li><a href="home.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <li><a href="noleggioAuto.php">Noleggio</a></li>
              <li><a href="prenotaParcheggio.php" class="active">Prenotazioni</a></li>
              <li><a href="storico.php">Visualizza Stotico</a></li>
              <li><a href="inserisciVeicolo.php" class="active">Inserisci Veicolo</a></li>
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
          <h2>Registra veicolo</h2>
          <p>Qui puoi registrare le tue autovetture per poter prenotare gli stalli aeroportuali</p>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="post" action="inserisciVeicolo.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Inserisci i <em>dati</em> del <em>tuo veicolo</em></h4>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="marca" class="form-label">Marca: </label>
                  <input type="text" name="marca" class="Name" placeholder="Ex. Fiat" autocomplete="off" value="<?php echo isset($_POST['marca']) ? $_POST['marca'] : ''; ?>" required>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="modello" class="form-label">Modello: </label>
                  <input type="text" name="modello" class="Name" placeholder="Ex. Panda" autocomplete="off" value="<?php echo isset($_POST['modello']) ? $_POST['modello'] : ''; ?>" required>
                </fieldset>
              </div>

              <div class="col-lg-6">
                <fieldset>
                  <label for="tipologia" class="form-label">Tipologia: </label>
                  <select name="tipologia" class='form-select' aria-label='Default select example' onChange='this.form.click()' required>
                    <option value="">--</option>
                    <option value="Utilitaria" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Utilitaria') ? 'selected' : ''; ?>>Utilitaria</option>
                    <option value="Berlina" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Berlina') ? 'selected' : ''; ?>>Berlina</option>
                    <option value="SUV" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'SUV') ? 'selected' : ''; ?>>SUV</option>
                    <option value="Moto" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Moto') ? 'selected' : ''; ?>>Moto</option>
                    <option value="Camper" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Camper') ? 'selected' : ''; ?>>Camper</option>
                    <option value="Furgone" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Furgone') ? 'selected' : ''; ?>>Furgone</option>
                    <option value="Coupé" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Coupé') ? 'selected' : ''; ?>>Coupé</option>
                    <option value="Cabriolet" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Cabriolet') ? 'selected' : ''; ?>>Cabriolet</option>
                    <option value="Monovolume" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Monovolume') ? 'selected' : ''; ?>>Monovolume</option>
                    <option value="Pick-up" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'Pick-up') ? 'selected' : ''; ?>>Pick-up</option>
                    <option value="MiniVan" <?php echo (isset($_POST['tipologia']) && $_POST['tipologia'] == 'MiniVan') ? 'selected' : ''; ?>>MiniVan</option>
                  </select>
                </fieldset>
              </div>


              <div class="col-lg-6">
                <fieldset>
                  <label for="targa" class="form-label">Targa: </label>
                  <input type="text" name="targa" class="Name" placeholder="Ex. AB123CD" autocomplete="off" maxlength="7" value="<?php echo isset($_POST['targa']) ? $_POST['targa'] : ''; ?>" required>
                </fieldset>
              </div>

              <?php
              if (!empty($errore_targa)) {
                echo '<div class="col-lg-12" id="alertTarga1">
                        <div class="alert alert-danger" role="alert">
                          ' . $errore_targa . '
                        </div>
                        <br>
                      </div>';
              }

              if (!empty($errore_database)) {
                echo '<div class="col-lg-12" id="alertTarga2">
                        <div class="alert alert-danger" role="alert">
                          ' . $errore_database . '
                        </div>
                        <br>
                      </div>';
              }

              if (!empty($successo)) {
                echo '<div class="col-lg-12" id="alert">
                        <div class="alert alert-success" role="alert">
                          ' . $successo . '
                        </div>
                        <br>
                      </div>';
              }
              ?>

              <div class="col-lg-2"></div>

              <div class="col-lg-8">
                <fieldset>
                  <button type="submit" class="main-button" onclick="controlla()">Effettua la registrazione del veicolo</button>
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

    // Controllo JavaScript per validare la targa prima dell'invio del modulo
    function controlla() {
      var targa = document.getElementsByName("targa")[0].value;
      var regex = /^[A-Z]{2}\d{3}[A-Z]{2}$/;

      if (!regex.test(targa)) {
        alert("La targa non è valida!");
        return false;
      }
    }
  </script>
</body>

</html>
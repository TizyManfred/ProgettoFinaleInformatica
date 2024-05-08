<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

  <title>Resoconto noleggio</title>

  <link rel="icon" type="image/png" href="assets/images/immagineLogoOriginale.png">

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Ecco qui il</h4>
          <h2>Resoconto del noleggio</h2>
          <p>Con questa card puoi andare a ritirare il veicolo in aeroporto</p>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container" style="border-radius: 24px; background-color: #f9f9f9;">
      <div class="row">
        <div class="col-lg-12">
            <div class="more-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">

                        <div class="left-image" style="border-radius: 14px; background-color: white; border: 1px solid black;">
                            <img src="assets/images/immagineLogoOriginale.png" alt="">
                        </div>

                        </div>
                        <div class="col-lg-6">
                        <div class="section-heading">
                            <h2>Discover More About Our Country</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                            <div class="info-item" style="background-color: white;">
                                <span>Nome:</span>
                                <h4>150.640 +</h4>
                            </div>
                            </div>
                            <div class="col-lg-6">
                            <div class="info-item">
                                <h4>175.000+</h4>
                                <span>Amazing Accomoditations</span>
                            </div>
                            </div>
                            <div class="col-lg-12">
                            <div class="info-item">
                                <div class="row">
                                <div class="col-lg-6">
                                    <h4>12.560+</h4>
                                    <span>Amazing Places</span>
                                </div>
                                <div class="col-lg-6">
                                    <h4>240.580+</h4>
                                    <span>Different Check-ins Yearly</span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                        <div class="main-button">
                            <a href="reservation.html">Discover More</a>
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
    $(".option").click(function() {
      $(".option").removeClass("active");
      $(this).addClass("active");
    });

    function controlla() {
      var password1 = document.getElementById("password1").value;
      var password2 = document.getElementById("password2").value;
      var numeroTel = document.getElementById("numeroTel").value;

      if (password1 == password2) {
        if(length(numeroTel) == 10){
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

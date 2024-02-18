<?php
include("conf.php");
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

 
  <title>Quartier connecté</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/lg.png" rel="icon">


  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/lg.png" alt="">
   
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Accueil</a></li>
          <li><a class="nav-link scrollto" href="code/produits.php">Eco partage</a></li>
          <li><a class="nav-link scrollto" href="code/opportunité_locale.php">Opportunités locales</a></li>
          <li><a class="nav-link scrollto" href="code/action_verte.php">Actions vertes</a></li>
          <li><a class="nav-link scrollto" href="code/projet_solidaire.php">Projets solidaires</a></li>
          <li><a class="nav-link scrollto" href="code/notification.php">Notifications </a></li>
        <?php
if(isset($_SESSION['id_habitant'])){
  echo '  <li><a class="getstarted scrollto" href="code/deconnexion.php">Déconnexion</a></li>';
}else{
  echo '  <li><a class="getstarted scrollto" href="code/se connecter.php">Se connecter</a></li>';
}
        ?>
          
        
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Quartier Connecté : Donnez, Créez, Saisissez l'Opportunité ! </h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Il s'agit d'une plateforme à vocation de créer du lien, de rassembler autour de ces habitants. 
</h2>
          <div data-aos="fade-up" data-aos-delay="600">
            <div class="text-center text-lg-start">
              <a href="#about" class="btn-get-started scrollto d-inline-flex align-items-center justify-content-center align-self-center">
                <span>Découvrir</span>
                <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 hero-img" data-aos="zoom-out" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">
    <!-- ======= About Section ======= -->
   

    <!-- ======= Values Section ======= -->
    
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-emoji-smile"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1734" data-purecounter-duration="1" class="purecounter"></span>
                <p>Habitants</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="57" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projets accompagnés</p>
              </div>
            </div>
          </div>

         

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Evènements</p>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="423" data-purecounter-duration="1" class="purecounter"></span>
                <p>Produits partagés</p>
              </div>
            </div>
          </div>


        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Features Section ======= -->
  

      
         


   


    <section id="about" class="about">

      <div class="container" data-aos="fade-up" style="margin-top: 50px;">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>A propos de nous </h3>
              <h2>Quartier Connecté : Renforcez la Cohésion de Votre Quartier avec Nos Services Uniques !</h2>
              <p>
              La plateforme Quartier Connecté offre une variété de services visant à renforcer la cohésion au sein de votre quartier. Ces services incluent la possibilité de faire des dons, d'organiser des événements locaux passionnants et de découvrir des opportunités uniques.
              </p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Explorez </span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section>
    <section id="contact" class="contact">

      <div class="container">

        <header class="section-header">
          <h2>Contact</h2>
          <p>Contactez-nous !</p>
        </header>

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Adresse</h3>
                  <p>31 bd Lascrosses<br>Toulouse, NY 535022</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-telephone"></i>
                  <h3>Téléphone</h3>
                  <p>+33 6 10 75 02 50<br>+1 6678 254445 41</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-envelope"></i>
                  <h3>Email </h3>
                  <p>info@quartier-connecté.com<br>contact@quartier-connecté.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Horaires d'ouverture</h3>
                  <p>Lundi - Samedi<br>9:00AM - 05:00PM</p>
                </div>
              </div>
            </div>

          </div>


          <div class="col-lg-6">
          <form action="mailer.php" method="post" class="php-email-form">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="nom" class="form-control" placeholder="Votre nom" >
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Votre email" >
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="sujet" placeholder="Sujet" >
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" ></textarea>
       
                  <button name="submit" type="submit">Envoyer</button>
               </div>
            </form>

          </div>

        </div>

      </div>

    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">

    

    <div class="footer-top">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-5 col-md-12 footer-info">
            <a href="index.html" class="logo d-flex align-items-center">
              <img src="assets/img/logo.png" alt="">
              <span>Quartier connecté</span>
            </a>
            <div class="social-links mt-3">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-6 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Eco partage</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Actions vertes</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Opportunités locales</a></li>
              <li><i class="bi bi-chevron-right"></i> <a href="#">Projets solidaires</a></li>
            </ul>
          </div>

        
          <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
            <h4>Contactez nous </h4>
            <p>
             31 BD Lascrosses <br>
              Toulouse, NY 535022<br>
              France <br><br>
              <strong>Téléphone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@quartier-connecte.com<br>
            </p>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Quartier connecté</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
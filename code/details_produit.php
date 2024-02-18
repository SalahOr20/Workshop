<?php
include("../conf.php");
include("secu.php");
$id_produit=$_GET['id_produit'];

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
  <link href="../assets/img/lg.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

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

      <a href="../index.php" class="logo d-flex align-items-center">
      <img src="../assets/img/lg.png" alt="">

      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="produits.php">Eco partage</a></li>
          <li><a class="nav-link scrollto" href="opportunité_locale.php">Opportunités locales</a></li>
          <li><a class="nav-link scrollto" href="action_verte.php">Actions vertes</a></li>
          <li><a class="nav-link scrollto" href="projet_solidaire.php">Projets solidaires</a></li>
          <li><a href="notification.php">Notification</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <main id="main">
  <?php
include("../conf.php");

$query=$cnx->prepare("SELECT * from produit where id_produit='$id_produit'");
$query->execute();




?>

    <!-- ======= Breadcrumbs ======= -->
   
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details" >
      <div class="container" style="margin-top: 110px;">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">
<?php
if($data=$query->fetch(PDO::FETCH_ASSOC)){


  if($data['img']!=null){
    echo '<img src="../public/'.$data['img'].'" class ="swiper-wrapper align-items-center"/>';
  }else{
    echo '<img src="../public/default.png" />';
  }

}

           

          ?>
               

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Information du produit</h3>
              <?php
                   
echo ' <ul>
<li><strong>Nom du produit</strong>:' .$data['nom'].'</li>
<li><strong>Lieu</strong>:' .$data['lieu'].'</li>
<li><strong>Date de  publication:</strong>' .$data['date_annonce'].'</li>

</ul>
</div>
<div class="portfolio-description">
  <h2>Details du produit</h2>
  <p>
    '.$data['description'].'
  </p>
</div>';

echo "<a class='btn btn-primary' href='reserver.php?id_produit=$id_produit'>Résérver </a>
</div>";


              ?>
             
          
   
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

<footer id="footer" class="footer">

    

<div class="footer-top">
  <div class="container">
    <div class="row gy-4">
      <div class="col-lg-5 col-md-12 footer-info">
        <a href="index.html" class="logo d-flex align-items-center">
          <img src="../assets/img/lg.png" alt="">
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
<script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main.js"></script>

</body>

</html>
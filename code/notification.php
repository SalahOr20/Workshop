

<?php
include("secu.php");
include("../conf.php");

$id=$_SESSION['id_habitant'];
$sql=$cnx->prepare("SELECT produit.nom as nomp,habitant.nom as nomh,telephone,date_reservation ,prenom ,email FROM notification 
INNER JOIN habitant ON notification.id_demandeur=habitant.id_habitant
inner join produit on produit.id_produit=notification.id_produit
WHERE id_createur='$id';");

$sql->execute();





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
  <style> 
body {
  font-family: 'Source Sans Pro', 'Helvetica Neue', Arial, sans-serif;
  color: #34495e;
  -webkit-font-smoothing: antialiased;
  line-height: 1.6em;
}

p {
  margin: 0;
}

.notice {
  position: relative;
  margin: 1em;
  background: #F9F9F9;
  padding: 1em 1em 1em 2em;
  border-left: 4px solid #DDD;
  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
}

.notice:before {
  position: absolute;
  top: 50%;
  margin-top: -17px;
  left: -17px;
  background-color: #DDD;
  color: #FFF;
  width: 30px;
  height: 30px;
  border-radius: 100%;
  text-align: center;
  line-height: 30px;
  font-weight: bold;
  font-family: Georgia;
  text-shadow: 1px 1px rgba(0, 0, 0, 0.5);
}

.info {
  border-color: #0074D9;
}

.info:before {
  content: "i";
  background-color: #0074D9;
}

.success {
  border-color: #2ECC40;
}

.success:before {
  content: "√";
  background-color: #2ECC40;
}

.warning {
  border-color: #FFDC00;
}

.warning:before {
  content: "!";
  background-color: #FFDC00;
}

.error {
  border-color: #FF4136;
}

.error:before {
  content: "X";
  background-color: #FF4136;
}
</style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

      <a href="../ndex.html" class="logo d-flex align-items-center">
      <img src="../assets/img/lg.png" alt="">
      
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="produits.php">Eco partage</a></li>
          <li><a class="nav-link scrollto" href="opportunité_locale.php">Opportunités locales</a></li>
          <li><a class="nav-link scrollto" href="action_verte.php">Action vertes</a></li>
          <li><a class="nav-link scrollto" href="projet_solidaire.php">Projets solidaires</a></li>
          <li><a href="notification.php">Notifications</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>

    </div>
  </header><!-- End Header -->

  <main id="main">
<section >
    <div style="margin-top: 100px;">

 
<?php

while($data=$sql->fetch(PDO::FETCH_ASSOC)){

  echo '<div class="notice info"><p>'.$data['nomh'].' '.$data['prenom'].' a réservé votre produit <strong>'.$data['nomp'].' </strong> le '.$data['date_reservation'].'</p><br>
  <span><strong>Cordonnée : email :</strong>'.$data['email'].' <strong>/ téléphone :</strong> '.$data['telephone'].'</span>
  </div>
  ';

}


?>
   </div>
</section>


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
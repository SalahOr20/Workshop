
<?php
include("../conf.php");
include("secu.php");

if(isset($_POST['submit'])){
    if(!empty($_POST['nom'])&& !empty($_POST['lieu'])){
        $nom=htmlspecialchars(trim($_POST['nom']));
        $lieu=htmlspecialchars(trim($_POST['lieu']));
        $unique_id=uniqid();
    
        $date_publication=date('Y/m/d');
        $reservee=0;
        $description=htmlspecialchars(trim($_POST['description']));
        $id_createur=$_SESSION['id_habitant'];

      
        $photo = $_FILES['photo'];

 
        $uniqueID=uniqid();
        $photo_name = $uniqueID.$photo['name'];
        $photo_tmp = $photo['tmp_name'];
        $photo_size = $photo['size'];
   
    
        $query=$cnx->prepare("INSERT into produit (nom,lieu,description,date_annonce,reservee,unique_id,img) values('$nom','$lieu','$description','$date_publication','$reservee','$unique_id','$photo_name')");
        move_uploaded_file($photo_tmp, "../public/{$photo_name}");
        $query->execute();

        $query1=$cnx->prepare("SELECT * from produit where unique_id='$unique_id' ");
        $query1->execute();
        if($info_id=$query1->fetch(PDO::FETCH_ASSOC)){
            $id_p=$info_id['id_produit'];
        }
      
    echo $id_p;
        $sql1=$cnx->prepare("INSERT into notification (id_produit,id_createur) values('$id_p','$id_createur')");
       if(!$sql1->execute()){
        echo "c bien";
       }

        

        
       
    } 

    
}








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
          <li><a class="nav-link scrollto active" href="../index.php">Accueil</a></li>
          <li><a class="nav-link scrollto" href="produits.php">Eco partage</a></li>
          <li><a class="nav-link scrollto" href="opportunité_locale.php">Opportunités locales</a></li>
          <li><a class="nav-link scrollto" href="action_verte.php">Action verte</a></li>
     
          <li><a href="projet_solidaire.php">Projets solidaires</a></li>
      
          <li><a class="nav-link scrollto" href="notification.php">Notification</a></li>
       

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="about" class="about">

      <div class="container" data-aos="fade-up" style="margin-top: 50px;">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Actions verte : C'est quoi ?</h3>
              <h2>Bienvenue dans notre espace dédié aux Actions Vertes de notre quartier ! </h2>
              <p>
              Notre plateforme s'engage activement à promouvoir la durabilité, la solidarité et le bien-être environnemental dans notre communauté. Nous croyons en la force de l'engagement communautaire pour créer un environnement plus sain et plus durable. C'est pourquoi nous organisons régulièrement des événements écologiques et collectifs où les résidents du quartier peuvent se réunir pour participer activement à des initiatives respectueuses de l'environnement.

              </p>
              <div class="text-center text-lg-start">
                <a href="#" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>PArticipez dès maintenant</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="../assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- End About Section -->


<section id="values" class="values">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>événements</h2>
    <p>Les événements à venir :</p>
  </header>

  <div class="row">
  <?php
include("../conf.php");

// Sélectionner toutes les informations des événements avec le nombre de participants
$sql = $cnx->prepare("SELECT evenement.*, IFNULL(COUNT(participation.id_habitant), 0) AS nbr_participants
                      FROM evenement
                      LEFT JOIN participation ON evenement.id_evenement = participation.id_evenement
                      GROUP BY evenement.id_evenement");
$sql->execute();

while ($data = $sql->fetch(PDO::FETCH_ASSOC)) {
    echo '
    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
      <div class="box">
        <img src="./assets/img/' . $data['img'] . '" class="img-fluid" alt="">
        <h3>' . $data['titre'] . '</h3>
        <p>' . $data['description'] . '</p>
        <h4>A ' . $data['lieu'] . ' le ' . $data['date_evenement'] . '</h4>
        <span><strong>Nombre des participants :</strong>' . $data['nbr_participants'] . '</span> <br>';

    if ($data['nbr_participants'] == 0) {
        echo "<a class='btn btn-primary' href='participer.php?id_evenement={$data['id_evenement']}'>Participer</a>";
    } else {
        echo "<a class='btn btn-primary'>Vous participez déjà !</a>";
    }

    echo '</div>
    </div>';
}
?>




  
  </div>
   
</div>

</section><!-- End Values Section -->



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
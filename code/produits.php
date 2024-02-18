
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
      
        $sql2=$cnx->prepare("INSERT into notification (id_produit,id_createur) values ('$id_p','$id_createur')");
     
       if($sql2->execute()){
       
       }else{
        echo "erreur d'enregistrement";
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
  
<style> 
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

body {
  font-family: 'Nunito', sans-serif;
  color: #384047;
}

form {
  max-width: 300px;
  margin: 10px auto;
  padding: 10px 20px;
  background: #f4f7f8;
  border-radius: 8px;
}

h1 {
  margin: 0 0 30px 0;
  text-align: center;
}

input[type="text"],
input[type="password"],
input[type="date"],
input[type="datetime"],
input[type="email"],
input[type="number"],
input[type="search"],
input[type="tel"],
input[type="time"],
input[type="url"],
textarea,
select {
  background: rgba(255,255,255,0.1);
  border: none;
  font-size: 16px;
  height: auto;
  margin: 0;
  outline: 0;
  padding: 15px;
  width: 100%;
  background-color: #e8eeef;
  color: #8a97a0;
  box-shadow: 0 1px 0 rgba(0,0,0,0.03) inset;
  margin-bottom: 30px;
}

input[type="radio"],
input[type="checkbox"] {
  margin: 0 4px 8px 0;
}

select {
  padding: 6px;
  height: 32px;
  border-radius: 2px;
}

button {
  padding: 19px 39px 18px 39px;
  color: #FFF;
  background-color: #4bc970;
  font-size: 18px;
  text-align: center;
  font-style: normal;
  border-radius: 5px;
  width: 100%;
  border: 1px solid #3ac162;
  border-width: 1px 1px 3px;
  box-shadow: 0 -1px 0 rgba(255,255,255,0.1) inset;
  margin-bottom: 10px;
}

fieldset {
  margin-bottom: 30px;
  border: none;
}

legend {
  font-size: 1.4em;
  margin-bottom: 10px;
}

label {
  display: block;
  margin-bottom: 8px;
}

label.light {
  font-weight: 300;
  display: inline;
}

.number {
  background-color: #5fcf80;
  color: #fff;
  height: 30px;
  width: 30px;
  display: inline-block;
  font-size: 0.8em;
  margin-right: 4px;
  line-height: 30px;
  text-align: center;
  text-shadow: 0 1px 0 rgba(255,255,255,0.2);
  border-radius: 100%;
}
.blurred-background {
  backdrop-filter: blur(5px); /* Ajustez le niveau de flou souhaité */
}

.hidden {
  display: none;
}


@media screen and (min-width: 480px) {

  form {
    max-width: 480px;
  }

}


</style>

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
          <li><a class="nav-link scrollto" href="action_verte.php">Actions vertes</a></li>
     
          <li><a href="projet_solidaire.php">Projets solidaires</a></li>
       

     
          <li><a class="nav-link scrollto" href="notification.php">Notification</a></li>
          <li><a class="getstarted scrollto" id="showFormButton" >Créer une annonce</a></li> 

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <section id="features" class="features">

<div class="container" data-aos="fade-up">






  <div class="row">
    <div class="col-md-12">
    <div id="announcementForm" class="hidden">



      <form  method="post" enctype="multipart/form-data">
        <h1> Votre produit </h1>
        
        <fieldset>
          
          <legend><span class="number">1</span> Informations du produit</legend>
        
          <label for="name">Nom:</label>
          <input type="text" id="name" name="nom">
        
          <label for="text">Lieu:</label>
          <input type="text" id="mail" name="lieu">
       
        
        
        </fieldset>
        <fieldset>  
        
          <legend><span class="number">2</span> photo du produit</legend>
          
         <label for="bio">Photo:</label>   
            <input type="file" name="photo">
        
 
        
       
        
         <label for="job">Description:</label>
         <textarea id="bio" name="description"></textarea>
          
         
         </fieldset>
       
        <button type="submit" id="cancelButton" name="submit">Déposer</button>
        
       </form>
       </div>
        </div>
      </div>
      
    </body>
    <script>// Récupérez le bouton et le formulaire
const showFormButton = document.getElementById('showFormButton');
const announcementForm = document.getElementById('announcementForm');


showFormButton.addEventListener('click', () => {
  // Affichez le formulaire
  announcementForm.classList.remove('hidden');
  
  // Ajoutez la classe pour flouter le fond
  document.body.classList.add('blurred-background');
});
// Récupérez le bouton Annuler
const cancelButton = document.getElementById('cancelButton');

// Ajoutez un gestionnaire d'événements au bouton Annuler
cancelButton.addEventListener('click', () => {
  // Cachez le formulaire
  announcementForm.classList.add('hidden');

  // Retirez la classe de flou du fond
  document.body.classList.remove('blurred-background');
});

// Gestionnaire d'événements pour afficher le formulaire
showFormButton.addEventListener('click', () => {
  // Affichez le formulaire
  announcementForm.classList.remove('hidden');

  // Ajoutez la classe pour flouter le fond
  document.body.classList.add('blurred-background');
});

// Vous pouvez également ajouter un gestionnaire d'événements pour masquer le formulaire si nécessaire
</script>









<header class="section-header" style="margin-top: 80px;">
   
   <p>Les étapes à suivre en cas d'annonceur ou récupérateur :</p>
 </header>


  <div class="row">

    <div class="col-lg-6">
      <img src="../assets/img/features.png" class="img-fluid" alt="">
    </div>

    <div class="col-lg-6 mt-5 mt-lg-0 d-flex">
      <div class="row align-self-center gy-4">

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="200">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Créez votre annonce</h3>
          </div>
        </div>

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="500">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Résérvez un produit</h3>
          </div>
        </div>

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="300">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Fixer un rendez-vous avec le demandeur</h3>
          </div>
        </div>

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="600">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Contactez l'annonceur </h3>
          </div>
        </div>

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="400">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Donner une seconde vie pour votre produit</h3>
          </div>
        </div>

      

        <div class="col-md-6" data-aos="zoom-out" data-aos-delay="700">
          <div class="feature-box d-flex align-items-center">
            <i class="bi bi-check"></i>
            <h3>Récupérez votre produit</h3>
          </div>
        </div>

      </div>
    </div>

  </div> <!-- / row -->
</div>
  </section>
  <section id="services" class="services">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Produits</h2>
    <p>Donnez leurs une seconde vie !</p>
  </header>

  <div class="row gy-4">

  <?php
include("../conf.php");

$sql=$cnx->prepare("SELECT * from produit where reservee=0 ");
$sql->execute();
while($data=$sql->fetch(PDO::FETCH_ASSOC)){
    echo ' <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
    <div class="service-box orange">
    <i class="ri-restaurant-line"></i>
      <h3>'.$data['nom'].'</h3>
      <p>'.$data['description']."</p>
      <a href='details_produit.php?id_produit=$data[id_produit]' class='read-more'><span>Voir le details</span> <i class='bi bi-arrow-right'></i></a>
    </div>
  </div>";
}
?>
   

   
  

</div>

</section><!-- End Services Section -->


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
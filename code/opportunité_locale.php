
<?php
include("../conf.php");
include("secu.php");
if(isset($_POST['submit'])){
    if(!empty($_POST['titre'])&& !empty($_POST['lieu'])){
        $titre=htmlspecialchars(trim($_POST['titre']));
        $lieu=htmlspecialchars(trim($_POST['lieu']));
  
    
        $date_publication=date('Y/m/d');
      
        $description=htmlspecialchars(trim($_POST['description']));
        $id_createur=$_SESSION['id_habitant'];

      
        $photo = $_FILES['photo'];
        $uniqueID=uniqid();
 
        $type_opportunitee=$_POST['type_opportunitee'];
        $photo_name = $uniqueID.$photo['name'];
        $photo_tmp = $photo['tmp_name'];
        $photo_size = $photo['size'];
   
    
        $query=$cnx->prepare("INSERT into opportunitee (titre,lieu,description,date_publication,type_opportunitee,photo,id_habitant) values('$titre','$lieu','$description','$date_publication','$type_opportunitee','$photo_name','$id_createur')");
        move_uploaded_file($photo_tmp, "../public/{$photo_name}");
     
        $query->execute();

      
      
   
        

        
       
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

      <a href="../index.html" class="logo d-flex align-items-center">
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
          <li><a class="getstarted scrollto" id="showFormButton" >Créer une opportunité</a></li> 

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
        <h1> Information sur l'ooportunité </h1>
        
        <fieldset>
          
        
        
          <label for="name">Titre:</label>
          <input type="text" id="name" name="titre">
        
          <label for="text">Description:</label>
          <textarea id="bio" name="description"></textarea>
       
        
        
        </fieldset>
        <fieldset>  
        
      
          
         <label for="bio">Photo:</label>   
            <input type="file" name="photo">
        
 
        
       
        
         <label for="lieu">lieu:</label>
   
         <input type="text" id="mail" name="lieu">

         <label class="form-label">Type:</label>
               
               <select name='type_opportunitee' >

   <option value="logement">Logement</option>
   <option value="emploi">Offre d'emploi</option>
 
</select>
         
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







    <!-- Feature Tabs -->
    <div class="row feture-tabs" data-aos="fade-up">
          <div class="col-lg-6">
            <h3>Quartier Connecté - Trouvez Emploi et Logement Localement</h3>

        

         
            <div class="tab-content">

              <div class="tab-pane fade show active" id="tab1">
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Trouvez Votre Chez-Vous</h4>
                </div>
                <p>Découvrez des opportunités professionnelles au sein de votre communauté grâce à Quartier Connecté. Consultez les offres d'emploi locales. Notre plateforme simplifie votre recherche d'emploi et renforce les liens professionnels au sein de votre communauté.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Emploi à Portée de Main</h4>
                </div>
                <p> Trouver votre prochain logement n'a jamais été aussi facile. Quartier Connecté vous permet de parcourir les annonces de logement locales, de définir vos critères de recherche, et de communiquer directement avec les propriétaires. </p>
              </div>

              <div class="tab-pane fade show" id="tab2">
                <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Repudiandae rerum velit modi et officia quasi facilis</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Incidunt non veritatis illum ea ut nisi</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>
              </div><!-- End Tab 2 Content -->

              <div class="tab-pane fade show" id="tab3">
                <p>Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Trouvez Votre Chez-Vous</h4>
                </div>
                <p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>
                <div class="d-flex align-items-center mb-2">
                  <i class="bi bi-check2"></i>
                  <h4>Emploi à Portée de Main</h4>
                </div>
                <p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>
              </div><!-- End Tab 3 Content -->

            </div>

          </div>

          <div class="col-lg-6">
            <img src="../assets/img/local.jpg" class="img-fluid" alt="">
          </div>

        </div><!-- End Feature Tabs -->





<section id="team" class="team">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Logement</h2>
    <p>Opportunité logement</p>
  </header>

  <div class="row gy-4">

    
        <?php
$res=$cnx->prepare("SELECT * from opportunitee 
inner join habitant on opportunitee.id_habitant=habitant.id_habitant
where type_opportunitee='logement'");
$res->execute();

while($dt=$res->fetch(PDO::FETCH_ASSOC)){
  echo '
  <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
    <div class="member">
    <div class="member-img">';

   if($dt['photo']!=null){
     echo '<img src="../public/'.$dt['photo'].'" class ="img-fluid"/>';
   }else{
     echo '<img src="../public/default.png" />';
   }   
     echo '
    </div>
    <div class="member-info">
      <h4>'.$dt['titre'].'</h4>
      <span>'.$dt['lieu'].'</span>
      <p>'.$dt['description'].'</p>
      <span>'.$dt['date_publication'].'</span>
      <h6>Publié par : '.$dt['nom'].'</h6>
    </div>
  </div>
  </div>';
}

?>

    





   

    
  </div>

</div>

</section>

<section id="testimonials" class="testimonials">

<div class="container" data-aos="fade-up">

  <header class="section-header">
    <h2>Emploi</h2>
    <p>Opportunitées d'offre d'emploi :</p>
  </header>

  <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="200">
    <div class="swiper-wrapper">
<?php
$inf=$cnx->prepare("SELECT * from opportunitee 
inner join habitant on opportunitee.id_habitant=habitant.id_habitant
where type_opportunitee='emploi'");
$inf->execute();
while($element=$inf->fetch(PDO::FETCH_ASSOC)){
  echo '
    <div class="swiper-slide">
    <div class="testimonial-item">
     
      <p>'.$element['description'].'
      </p>
      <div class="profile mt-auto">';
      if($element['photo']!=null){
        echo '<img src="../public/'.$element['photo'].'"  class="testimonial-img"/>';
      }
        
      echo '<h3>'.$element['titre'].'</h3>
        <h4>'.$element['lieu'].'</h4>
        <h6>Publié par :'.$element['nom'].'</h6>
      </div>
    </div>
  </div>';
}

?>


    

    </div>
    <div class="swiper-pagination"></div>
  </div>

</div>

</section><!-- End Testimonials Section -->



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
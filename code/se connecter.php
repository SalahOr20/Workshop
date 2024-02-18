<?php

require("../conf.php");
session_start();

if(isset($_POST['Se_connecter'])){

	if(!empty($_POST['email']) && !empty($_POST['mdp'])){
		$email=htmlspecialchars(trim($_POST['email']));
		$mdp=htmlspecialchars(trim($_POST['mdp']));
		$sql=$cnx->prepare("SELECT * from habitant where email='$email'");
		$sql->execute() ;
		if($sql->rowCount()>0){
			$data=$sql->fetch(PDO::FETCH_ASSOC);
        
			if(password_verify($mdp,$data['mdp']) ){
				$_SESSION['id_habitant']=$data['id_habitant'];
				$_SESSION['nom_habitant']=$data['nom'];
				$_SESSION['prenom_habitant']=$data['prenom'];
				$_SESSION['email_habitant']=$data['email'];
				
				header("Location:../index.php");
			  }else{
				echo "Mot de passe incorrecte ";
			  }
		}else{
			echo "Aucun compte n'est associé à cette adresse mail";
		}

	}else{
		echo "Veuillez remplir tous les champs";
	}

}






?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Quartier connecté</title>

  <!-- Favicons -->
  <link href="../assets/img/lg.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">


  <link href="../assets/css/se connecter.css" rel="stylesheet">


</head>


<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="inscription.php" method="post">
			<h1>Création du compte</h1>
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
		
			<input type="text" name="nom" placeholder="Nom" />
			<input type="text" name="prenom" placeholder="Prénom" />
			<input type="email" name="email" placeholder="Email" />
			<input type="text" name="adresse" placeholder="Adresse" />
			<input type="number" name="telephone" placeholder="Téléphone" />
			<input type="password" name="mdp" placeholder="Mot de passe"  />
			<input type="password" name="cmdp" placeholder="Confirmé votre mot de passe"  />
		
			<button name="Inscription">S'inscrire</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="se connecter.php" method="POST"  >
			<h1>Se connecter</h1>
		
	
			<input  type="email" name ="email" placeholder="Email" />
			<input     type="password"  name ="mdp"  placeholder="Password" />
			<a href="#">Mot de passe oublié ?</a>
			<button name="Se_connecter">Se connecter</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Bienvenue à nouveau !</h1>
				<p>Pour que vous rester connecté sur notre plateforme veuillez saisir vos informations !</p>
				<button class="ghost" id="signIn">Se connecter</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Bonjour </h1>
				<p>Saisissez vos informations personnelles pour rejoindre la communeauté de quartier connecté</p>
				<button class="ghost" id="signUp">S'inscrire</button>
			</div>
		</div>
	</div>
</div>

<script src="../assets/js/se connecter.js"></script>
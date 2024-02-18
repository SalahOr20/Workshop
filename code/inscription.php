<?php
// Démarrage de la session pour maintenir les variables de session
session_start();
// Inclusion du fichier de configuration de la base de données
include("../conf.php");


// Vérification si le formulaire a été soumis
if(isset($_POST['Inscription'])){
    // Vérification si tous les champs requis sont remplis
    if(!empty($_POST['nom']) &&!empty($_POST['prenom']) && !empty($_POST['email'])&& !empty($_POST['mdp'])&& !empty($_POST['cmdp']) ){
        // Nettoyage des données et assignation à des variables
        $nom=htmlspecialchars(trim($_POST['nom']));
        $prenom=htmlspecialchars(trim($_POST['prenom']));
        $email=htmlspecialchars(trim($_POST['email']));
        $telephone=htmlspecialchars(trim($_POST['telephone']));
        $adresse=htmlspecialchars(trim($_POST['adresse']));
        $mdp=htmlspecialchars(trim($_POST['mdp']));
        $cmdp=htmlspecialchars(trim($_POST['cmdp']));
        
        // Hachage du mot de passe
        $password_hashed = password_hash($_POST['mdp'], PASSWORD_BCRYPT);
        
        // Vérification si les mots de passe correspondent
        if($mdp==$cmdp){
            // Préparation de la requête d'insertion des données dans la table responsable
            $query=$cnx->prepare("INSERT into habitant (nom,prenom,adresse,telephone,email,mdp) values('$nom','$prenom','$adresse','$telephone','$email','$password_hashed')");
            
            // Exécution de la requête et vérification si l'insertion a réussi
            if ($query->execute()){
              header("Location:se connecter.php");
                }	
            }else{
                // Affichage d'un message d'erreur
                echo "Votre inscription a echoué !";
            }
        }else{
            // Affichage d'un message d'erreur
            // TODO: ajouter un message d'erreur spécifique pour les mots de passe qui ne correspondent pas
        }
    }else{
        // Affichage d'un message d'erreur
}

?>
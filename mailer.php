<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



include ('code/php-mailer/src/Exception.php');
include ('code/php-mailer/src/PHPMailer.php');
include ('code/php-mailer/src/SMTP.php');


$mail = new PHPMailer(true);

if(isset($_POST['submit'])){
    try {

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; 
        $mail->SMTPAuth = true;
        $mail->Username = 'salahor20@gmail.com'; // Votre adresse e-mail
        $mail->Password = 'scnp hxez rsaj mdet'; // Votre mot de passe
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // SSL ou TLS (selon votre fournisseur)
        $mail->Port = 587; 
    
        // Destinataire
        $mail->setFrom($_POST['email'],$_POST['nom']);
        $mail->addAddress('salahor20@gmail.com','OURAMDAN Salah Eddine');
    
        // Contenu de l'e-mail
        $mail->isHTML(true);
        $mail->Subject = $_POST['sujet'];
        $mail->Body =$_POST['message'];
    
        // Envoyer l'e-mail
      if($mail->send()){
        header("Location:index.php");
      }
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
    }
}


?>

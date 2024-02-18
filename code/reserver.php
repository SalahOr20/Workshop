<?php
include("..//conf.php");
session_start();
$id_produit=$_GET['id_produit'];
$id_demandeur=$_SESSION['id_habitant'];
$date_reservation=date('Y-m-d');
$sql=$cnx->prepare("UPDATE produit set reservee=1 where id_produit='$id_produit'");
$query=$cnx->prepare("UPDATE notification set  id_demandeur='$id_demandeur', date_reservation='$date_reservation' where id_produit='$id_produit'");
if($query->execute() && $sql->execute()){
    header("Location:produits.php");
}


?>
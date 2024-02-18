<?php
include("../conf.php");
session_start();
$id_participant=$_SESSION['id_habitant'];
$id_evenement=$_GET['id_evenement'];

$query=$cnx->prepare("INSERT into participation (id_evenement,id_habitant)values('$id_evenement','$id_participant') ");
if($query->execute()){
    header("Location:action_verte.php");
}



?>
<?php
session_start();
if(!isset($_SESSION['id_habitant'])){
    header("Location:../index.php");
}


?>
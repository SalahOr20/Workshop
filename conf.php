<?php
$username="root";
$password="";
$cnx = new PDO('mysql:host=localhost;dbname=projet_workshop', $username, $password);
if(!$cnx){
    echo "Not connected to Database";
}
?>
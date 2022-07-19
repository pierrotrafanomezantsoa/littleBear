<?php
$serveur = "localhost";
$login = "root";
$pass = "";
try{
 
    $bdd = new PDO("mysql:host=$serveur;dbname=formulaire; charset=utf8", $login, $pass);
}catch(Exception $e){
    die('Une erreur a été trouvée: '. $e->getMessage());
}

?>
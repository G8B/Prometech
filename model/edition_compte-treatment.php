<?php 
$bdd = new PDO('mysql:host=localhost;dbname=promethec' , 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('INSERT
        INTO utilisateurs(nom, prenom, email, password, statutClient, statutGestionnaire, statutAdmin, statutSubordonne)
        VALUES(:nom, :prenom, :email, :password, :statutClient, :statutGestionnaire, :statutAdmin, :statutSubordonne)');

?>
<?php

$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');

$req = $bdd->prepare('INSERT INTO membres(nom, prenom, email , adresse, mot_de_passe) VALUES(:nom, :prenom, :email, :adresse, :mot_de_passe)');
$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'adresse' => $_POST['adresse'],
    'mot_de_passe' => $_POST['mot_de_passe'],
));

header('Location: /prometech/view/login.php');

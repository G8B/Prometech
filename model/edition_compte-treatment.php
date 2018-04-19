<?php
$bdd = new PDO('mysql:host=localhost;dbname=promethec' , 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$req = $bdd->prepare('SELECT * FROM utilisateurs');
$req->execute(array($_SESSION["ID"]));

$account = $req->fetchAll();

$newcontactdetails = array(
    'new_nom' => $_POST['nom'],
    'new_prenom' => $_POST['prenom'],
    'new_email' => $_POST['email'],
    'new_password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
);

$bdd ->execute(" UPDATE utilisateurs
    nom = 'new_nom',
    prenom = 'new_prenom',
    email = 'new_email';
    password = 'new_password';
    WHERE ID= ?");
?>
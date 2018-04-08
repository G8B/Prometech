<?php

require("connectBDD.php");

// à finir
/*
function signup($email, $password): bool
{
    $req = $bdd->prepare('SELECT email, password, prenom FROM utilisateurs WHERE email = :email');
    $req->execute(array(
        'email' => $email));
    $resultat = $req->fetch();

    if (!$resultat) {
        return false;
    }

    if ($password == $resultat['password']) {
        session_start();
        $_SESSION['prenom'] = $resultat['prenom'];
        return true;
    } else {
        return false;
    }
}

$req = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)');
$req->execute(array(
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'password' => $_POST['password'],
));

header('Location: /view/login.php');
*/
<?php

function login($email, $password): bool
{
    $bdd = new PDO('mysql:host=localhost;dbname=prometech;charset=utf8', 'root', '');

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







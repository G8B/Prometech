<?php


function login($email, $password): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT email, password, prenom FROM utilisateurs WHERE email = :email');
    $req->execute(array(
        'email' => $email));
    $resultat = $req->fetch();

    if (!$resultat) {
        return false;
    }

    if (password_hash($password, PASSWORD_DEFAULT) == $resultat['password']) {
        session_start();
        $_SESSION['prenom'] = $resultat['prenom'];
        return true;
    } else {
        return false;
    }
}







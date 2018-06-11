<?php


function login($email, $password): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID, email, password, prenom, nom, statutClient, statutAdmin, statutGestionnaire FROM utilisateurs WHERE email = :email');
    $req->execute(['email' => $email]);
    $user = $req->fetch();

    if (!$user) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['nom'] = $user['nom'];
        $_SESSION['userID'] = $user['ID'];
        $_SESSION['user'] = $user['statutClient'];
        $_SESSION['admin'] = $user['statutAdmin'];
        $_SESSION['gestionnaire'] = $user['statutGestionnaire'];

        return true;
    } else {
        return false;
    }
}







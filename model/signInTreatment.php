<?php


function login($email, $password): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT email, password, prenom, statutAdmin FROM utilisateurs WHERE email = :email');
    $req->execute(['email' => $email]);
    $user = $req->fetch();

    if (!$user) {
        return false;
    }

    if (password_verify($password, $user['password'])) {
        session_start();
        $_SESSION['prenom'] = $user['prenom'];
        $_SESSION['admin'] = $user['statutAdmin'];

        return true;
    } else {
        return false;
    }
}







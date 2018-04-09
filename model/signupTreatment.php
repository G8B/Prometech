<?php

function signup(): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT 
        INTO utilisateurs(nom, prenom, email, password, statutClient, statutGestionnaire, statutAdmin, statutSubordonne) 
        VALUES(:nom, :prenom, :email, :password, :statutClient, :statutGestionnaire, :statutAdmin, :statutSubordonne)');

    $statutClient = isset($_POST['choixUtilisateur']) ? true : false;

    $statutGestionnaire = isset($_POST['choixGestionnaire']) ? true : false;


    $req->execute([
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'statutClient' => $statutClient,
        'statutGestionnaire' => $statutGestionnaire,
        'statutAdmin' => false,
        'statutSubordonne' => false
    ]);

    return true;
}
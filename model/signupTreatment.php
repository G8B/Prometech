<?php

function signup(): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT INTO utilisateurs(nom, prenom, email, password) VALUES(:nom, :prenom, :email, :password)');
    $req->execute(array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
    ));
    return true;
}
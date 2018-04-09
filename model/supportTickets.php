<?php

/**
 * Envoi d'un ticket de support.
 * Le statut du ticket est :
 *  - 1 : à traiter
 *  - 2 : en attente
 *  - 3 : terminé
 * @return bool
 */

function sendSupportTicket() : bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT 
        INTO ticketsDeSupport(etat, priorite, time, contenu, email) 
        VALUES(:etat, :priorite, :time, :contenu, :email)');


    $req->execute([
        'etat' => 1,
        'priorite' => $_POST['priorite'],
        'email' => $_POST['email'],
        'time' => date("Y-m-d H:i:s"),
        'contenu' => $_POST['message']
    ]);

    return true;
}
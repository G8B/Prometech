<?php

/**
 * Envoi d'un ticket de support.
 * Le statut du ticket est :
 *  - 1 : à traiter
 *  - 2 : en attente
 *  - 3 : terminé
 *
 * La priorité du ticket est :
 *  - 1 : Haute
 *  - 2 : Moyenne
 *  - 3 : Basse
 * @return bool
 */

function sendSupportTicket(): bool
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT
        INTO ticketsDeSupport(etat, priorite, time, contenu, email, objet)
        VALUES(:etat, :priorite, :time, :contenu, :email, :objet)');


    $req->execute([
        'etat' => 1,
        'priorite' => $_POST['priorite'],
        'email' => $_POST['email'],
        'time' => date("Y-m-d H:i:s"),
        'contenu' => $_POST['message'],
        'objet' => $_POST['objet']
    ]);

    return true;
}

function getTickets()
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID, etat, priorite, contenu, email, objet, time from ticketsDeSupport');
    $req->execute();
    $Tickets = $req->fetchAll();
    return $Tickets;
}

function returnStatut($etat): string
{
    if ($etat == 1) {
        $statut = "A traiter";
        return $statut;
    }
    if ($etat == 2) {
        $statut = "En attente";
        return $statut;
    } else {
        $statut = "Terminé";
        return $statut;
    }
}

function returnPriorite($priorite): string
{
    if ($priorite == 1) {
        $priorite = "Haute";
        return $priorite;
    }
    if ($priorite == 2) {
        $priorite = "Moyenne";
        return $priorite;
    } else {
        $priorite = "Basse";
        return $priorite;
    }
}

function getStatus($statut): int
{
    if ($statut == "A traiter") {
        $etat = 1;
        return $etat;
    }
    if ($statut == "En attente") {
        $etat = 2;
        return $etat;
    }
    else {
        $etat = 3;
        return $etat;
    }
}


function getIDTicket($str): int
{
    $reg = '/^Ticket/';
    $ticketNumber = preg_replace($reg, '$1', $str);
    return $ticketNumber;

}

function changeStatus($newStatus, $id)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('UPDATE ticketsDeSupport SET etat = ? WHERE id = ? ');
    $req->execute(array($newStatus, $id));
}

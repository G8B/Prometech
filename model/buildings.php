<?php

function getIDHousesFromAdress($adresseGestionnaire): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements JOIN gestionLogement ON logements.adresse =? AND gestionLogement.ID_logement=logements.ID AND gestionLogement.ID_utilisateur=?;');
    $req->execute(array($adresseGestionnaire, $_SESSION['userID']));
    $IDhouses = $req->fetchAll();
    return $IDhouses;
}

function getHousesManagement($iduser): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM gestionLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}

function getIDhousesFromadresseManaged($adresseGestionnaire): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT DISTINCT ID FROM logements WHERE logements.ID NOT IN ( SELECT ID_logement FROM gestionLogement WHERE gestionLogement.ID_utilisateur=?) AND adresse=?');
    $req->execute(array($_SESSION['userID'], $adresseGestionnaire));
    $logements = $req->fetchAll();
    return $logements;
}


function addBuilding($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT INTO gestionLogement(ID_utilisateur, ID_logement) VALUES(:ID_utilisateur, :ID_logement)');
    $req->execute(array(
        'ID_utilisateur' => $_SESSION['userID'],
        'ID_logement' => $idHouse
    ));
}

function supprBuilding($IDlogementSuppr)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('DELETE FROM gestionLogement WHERE ID_logement = ?');
    $req->execute( array($IDlogementSuppr));
}


function getHouseAdressManager($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT adresse FROM logements WHERE ID = ?');
    $req->execute(array($idHouse["ID_logement"]));
    return $req->fetch()['adresse'];
}






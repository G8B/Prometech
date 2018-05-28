<?php

function getIDHousesFromAdress($adresseduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements WHERE adresse =?');
    $req->execute(array($adresseduser));
    $IDhouses = $req->fetchAll();
    return $IDhouses;
}

function getHousesManagement($iduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM gestionLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}

function addBuilding()
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements WHERE adresse = ?');
    $req->execute(array($_POST["adresse"]));
    $ID_logement = $req->fetch()['ID'];
    $req = $bdd->prepare('INSERT INTO gestionlogement(ID_utilisateur, ID_logement) VALUES(:ID_utilisateur, :ID_logement)');
    $req->execute(array(
        'ID_utilisateur' => $_SESSION['userID'],
        'ID_logement' => $ID_logement
    ));
}

function getHouseAdressManager($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT adresse FROM logements WHERE ID = ?');
    $req->execute(array($idHouse["ID_logement"]));
    return $req->fetch()['adresse'];
}






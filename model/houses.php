<?php

function getHouses($iduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM occupationLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetch();
    return $houses;
}

function getHouseAdress($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT adresse FROM logements WHERE ID = ?');
    $req->execute(array($idHouse));
    return $req->fetch();
}

function getRooms($idhouse) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID, nom FROM pieces WHERE ID_logement = ?');
    $req->execute($idhouse);
    $rooms = $req->fetch();
    return $rooms;
}

function getProducts($idroom) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT numeroDeSerie FROM positionProduit WHERE ID_piece = ?');
    $req->execute($idroom);
    $products = $req->fetch();
    return $products;
}

function getProductInfos($idproduct) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT nom, modele FROM produits WHERE numeroDeSerie = ?');
    $req->execute($idproduct);
    $productInfos = $req->fetch();
    return $productInfos;
}

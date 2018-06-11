<?php

function getHouses($iduser): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM occupationLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}

function getHouseAdress($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT adresse FROM logements WHERE ID = ?');
    $req->execute(array($idHouse));
    return $req->fetch()['adresse'];
}
function getCemacLogement($idHouse) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT numero FROM cemac WHERE ID_logement = ?');
    $req->execute(array($idHouse));
    $numbers = $req->fetchAll();
    return $numbers;
    
    
}

function getCemacs() : array{
    $bdd= connectBDD();
    $req = $bdd->prepare('SELECT numero from cemac WHERE ID_utilisateur = ? ');
    $req->execute(array($_SESSION['userID']));
    $cemacs = $req->fetchAll();
    return $cemacs ;
}

function getRooms($idhouse): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID FROM pieces WHERE ID_logement = ?');
    $req->execute(array($idhouse));
    $rooms = $req->fetchAll();
    return $rooms;
}

function getRoomName($idRoom)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT nom FROM pieces WHERE ID = ?');
    $req->execute(array($idRoom));
    return $req->fetch()['nom'];
}

function getProducts($idroom): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT numeroDeSerie FROM positionProduit WHERE ID_piece = ?');
    $req->execute(array($idroom));
    $products = $req->fetchAll();
    return $products;
}

function getProductInfos($idproduct): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT nom, modele FROM produits WHERE numeroDeSerie = ?');
    $req->execute(array($idproduct));
    $productInfos = $req->fetch();
    return $productInfos;
}

function addProduct($numeroDeSerie, $idPiece, $idUser, $numeroCemac)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT INTO positionProduit(numeroDeSerie, ID_piece) VALUES (:numeroDeSerie, :ID_piece)');
    $req->execute([
        'numeroDeSerie' => $numeroDeSerie,
        'ID_piece' => $idPiece
    ]);
    $req2 = $bdd->prepare('INSERT INTO proprieteProduit(ID_utilisateur, numeroDeSerie) VALUES (:IDUser, :numeroDeSerie)');
    $req2->execute([
        'numeroDeSerie' => $numeroDeSerie,
        'IDUser' => $idUser
    ]);
    $req3 = $bdd->prepare('INSERT INTO capteurs(numeroCemac, numSerie) VALUES (:numeroCemac, :numSerie)');
    $req3->execute([
        'numeroCemac' => $numeroCemac,
        'numSerie' => $numeroDeSerie,
    ]);
}

function deleteProduct($idProduct)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('DELETE FROM proprieteProduit WHERE numeroDeSerie = ?');
    $req->execute(array($idProduct));
    $req = $bdd->prepare('DELETE FROM positionProduit WHERE numeroDeSerie = ?');
    $req->execute(array($idProduct));
}

function addRoom($nomPiece, $idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT INTO pieces(ID_logement, nom) VALUES (:house, :name)');
    $req->execute([
        'house' => $idHouse,
        'name' => $nomPiece
    ]);
}
function addCemac($numero, $idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('INSERT INTO cemac(numero,ID_logement, ID_utilisateur) VALUES (:numero,:house, :user)');
    $req->execute([
        'numero' => $numero,
        'house' => $idHouse,
        'user' =>  $_SESSION['userID']
    ]);
}

function getNewCapteursID(){
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID, numeroCemac, numSerie, modele FROM capteurs INNER JOIN produits ON capteurs.numSerie = produits.numeroDeSerie WHERE ID IS NULL ');
    $req->execute();
    $capteursID = $req->fetchAll();
    return $capteursID ;
}

function setCapteursID($idcapteur, $numS){
    $bdd = connectBDD();
    $req =$bdd->prepare('UPDATE capteurs SET ID = ? WHERE numSerie = ?');
    $req->execute(array($idcapteur, $numS )) ;
}


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

function hasNoProduct($idroom)
{
    $products = getProducts($idroom);
    if (count($products))
        return false;
    return true;
}

function getProductInfos($idproduct): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare("SELECT `nom`, `modele` FROM `produits` WHERE `numeroDeSerie` =?");
    $req->execute(array($idproduct));

    $productInfos = $req->fetch();
    if(!is_array($productInfos)){ // dans le cas où la base de données des produits est vide
        return array('nom' => 'no name in db', 'modele' => 'no modele in db');
    }
    else return $productInfos;
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

function moveProduct($numeroDeSerie, $idPiece)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('UPDATE positionProduit SET ID_piece = :ID_piece WHERE numeroDeSerie = :numeroDeSerie');
    $req->execute([
        'numeroDeSerie' => $numeroDeSerie,
        'ID_piece' => $idPiece
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

function deleteRoom($idRoom)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('DELETE FROM pieces WHERE ID = ?');
    $req->execute(array($idRoom));
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
    $req = $bdd->prepare('SELECT * FROM capteurs WHERE ID IS NULL');
    $req->execute();
    $capteursID = $req->fetchAll();
    return $capteursID ;
}

function getNumberProducts($iduser)
{
    $numberProducts= NULL ;
    $houses=getHouses($iduser);
    foreach ($houses as $house){
        $rooms=getRooms($house['ID_logement']);
        foreach($rooms as $room) {
            $bdd = connectBDD();
            $req = $bdd->prepare('SELECT COUNT(numeroDeSerie) FROM positionProduit WHERE ID_piece = ?');
            $req->execute(array($room['ID']));
            $products = $req->fetchAll();
            $numberProducts = $numberProducts + count($products);
        }
    }
    return $numberProducts ;
}

function getNumberLogements($iduser)
{
    $houses = getHouses($iduser);
    $numberLogements = count($houses);
    return $numberLogements;
}
  
function updateLogements($adresse, $nbrHabitants, $nbrPieces, $superficie, $idHouse){
    $bdd = connectBDD();
    $updateLogement = $bdd->prepare("UPDATE logements SET adresse = ?, nbrPieces = ?, nbrHabitants = ?, superficie = ? WHERE ID = $idHouse");
    $updateLogement->execute(array($adresse, $nbrPieces, $nbrHabitants, $superficie));
}
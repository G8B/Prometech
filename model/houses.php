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

function addProduct($numeroDeSerie, $idPiece, $idUser)
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

function updateLogements($adresse, $nbrHabitants, $nbrPieces, $superficie, $idHouse){
    $bdd = connectBDD();
    $updateLogement = $bdd->prepare("UPDATE logements SET adresse = ?, nbrPieces = ?, nbrHabitants = ?, superficie = ? WHERE ID = $idHouse");
    $updateLogement->execute(array($adresse, $nbrPieces, $nbrHabitants, $superficie));


}

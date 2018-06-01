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

function getProductInfos($idproduct): array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT nom, modele FROM produits WHERE numeroDeSerie = ?');
    $req->execute(array($idproduct));
    $productInfos = $req->fetch();
    return $productInfos;
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
    $numberLogements= NULL ;
    $houses=getHouses($iduser);
    foreach ($houses as $house){
        $house;
        $numberLogements ++;
        }

    return $numberLogements ;
}

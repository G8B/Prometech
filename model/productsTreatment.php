<?php 

function addModel(){
    $bdd = connectBDD();
    $req = $bdd-> prepare("INSERT INTO modeleProduits(modele) VALUES(:modele)");
    $req->execute([
        'modele' => $_POST["addModel"]
    ]);
}

function removeModel(){
    $bdd = connectBDD();
    $req= $bdd->prepare("DELETE FROM modeleProduits WHERE modele = ?");
    $req->execute(array($_POST["removeModel"]));
}

function getModels(){
    $bdd= connectBDD();
    $req = $bdd-> prepare("SELECT ID, modele from modeleProduits");
    $req->execute();
    $Models = $req->fetchAll();
    return $Models;
}

?>
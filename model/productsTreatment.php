<?php

function addModel(){
    $bdd = connectBDD();
    $req = $bdd-> prepare("INSERT INTO modeleProduits(modele, icon) VALUES(:modele, :icon)");
    $req->bindParam(':modele' , $_POST["addModel"]);
    $req->bindParam(':icon', $_POST["iconsList"]);
    $req->execute();
}

function removeModel(){
    $bdd = connectBDD();
    $req= $bdd->prepare("DELETE FROM modeleProduits WHERE modele = ?");
    $req->execute(array($_POST["removeModel"]));
}

function getModelsList(){
    $bdd= connectBDD();
    $req = $bdd-> prepare("SELECT ID, modele from modeleProduits");
    $req->execute();
    $Models = $req->fetchAll();
    return $Models;
}

function getIcon($modele) : string {
    $bdd = connectBDD();
    $req= $bdd->prepare('SELECT icon from modeleProduits WHERE modele = ?  ');
    $req->execute(array($modele));
    $indexes = $req-> fetch();
    $index = $indexes['icon'];
    $iconsList = listIcons();
    $icon = array_search($iconsList[$index-1], $iconsList) ;
    return $iconsList[$icon] ;
}

function listIcons() : array{
    $icons = array('fa fa-thermometer-full', 'fa fa-cogs', 'fa fa-video', 'fa fa-lightbulb',
        'fa fa-male', 'fa fa-lock', 'fa fa-tint' );
    return $icons;
}

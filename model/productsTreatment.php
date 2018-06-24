<?php
function addModel()
{
    $bdd = connectBDD();
    $req = $bdd->prepare("INSERT INTO modeleProduits(modele, icon, ID_modele) VALUES(:modele, :icon, :ID_modele)");
    $req->bindParam(':modele', $_POST["addModel"]);
    $req->bindParam(':icon', $_POST["iconsList"]);
    $IDmod = chooseIDModels($_POST['addModel']);
    $req->bindParam('ID_modele', $IDmod);
    $req->execute();
}

function removeModel()
{
    $bdd = connectBDD();
    $req = $bdd->prepare("DELETE FROM modeleProduits WHERE modele = ?");
    $req->execute(array($_POST["removeModel"]));
}

function getModelsList()
{
    $bdd = connectBDD();
    $req = $bdd->prepare("SELECT ID, modele FROM modeleProduits");
    $req->execute();
    $Models = $req->fetchAll();
    return $Models;
}

function getIcon($modele): string
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT icon FROM modeleProduits WHERE modele = ?  ');
    $req->execute(array($modele));
    $indexes = $req->fetch();
    $index = $indexes['icon'];
    $iconsList = listIcons();
    $icon = array_search($iconsList[$index - 1], $iconsList);
    return $iconsList[$icon];
}

function getIconUser($modele) : string {
    $bdd = connectBDD();
    $req= $bdd->prepare('SELECT icon FROM modeleProduits WHERE ID_modele = ?  ');
    $req->execute(array($modele));
    $indexes = $req-> fetch();
    $index = $indexes['icon'];
    $iconsList = listIcons();
    $icon = array_search($iconsList[$index-1], $iconsList) ;
    return $iconsList[$icon] ;
}

function listIcons() : array{
    $icons = array('fa fa-thermometer-full', 'fa fa-cogs', 'fa fa-video', 'fa fa-lightbulb',
        'fa fa-male', 'fa fa-lock', 'fa fa-tint');
    return $icons;
}


function chooseIDModels($model)
{
    if (stristr($model, 'Distance 1')) {
        $idmodel = 1;
    } else if (stristr($model, 'Distance 2')) {
        $idmodel = 2;
    } else if (stristr($model, 'Thermomètre')) {
        $idmodel = 3;
    } else if (stristr($model, 'Humidité')) {
        $idmodel = 4;
    } else if (stristr($model, 'Lumière 1')) {
        $idmodel = 5;
    } else if (stristr($model, 'Couleur')) {
        $idmodel = 6;
    } else if (stristr($model, 'Présence')) {
        $idmodel = 7;
    } else if (stristr($model, 'Lumière 2')) {
        $idmodel = 8;
    } else if (stristr($model, 'mouvement')) {
        $idmodel = 9;
    } else {
        $idmodel = 'a';
    }

    return $idmodel;

}

function existenceModele()
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT modele FROM modeleProduits WHERE modele = ?');
    $req->execute(array($_POST['addModel']));
    $existence = $req->fetch();
    $req->closeCursor();
    return $existence;
}
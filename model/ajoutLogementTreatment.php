<?php


function addLogement(){
    $bdd=connectBDD();
    $req = $bdd->prepare('INSERT INTO logements(adresse,nbrPieces,nbrHabitants,superficie) VALUES(:adresse,:nbrPieces,:nbrHabitants,:Superficie)');
    $req->execute(array(
        'adresse' => $_POST["adresse"],
        'nbrPieces' => $_POST["nbrPieces"],
        'nbrHabitants' => $_POST["nbrHabitants"],
        'Superficie' => $_POST["superficie"]
    ));
}


function occupation(){
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements WHERE adresse = ?');
    $req->execute(array($_POST["adresse"]));
    $ID_logement = $req->fetch()['ID'];
    $req = $bdd->prepare('INSERT INTO occupationLogement(ID_utilisateur, ID_logement) VALUES(:ID_utilisateur, :ID_logement)');
    $req->execute(array(
        'ID_utilisateur' => $_SESSION['userID'],
        'ID_logement' => $ID_logement
    ));
    
}




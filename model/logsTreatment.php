<?php

function ajoutLog($commentaire){}
$bdd= connectBDD();
$req = $bdd->prepare('INSERT INTO logs(time, ID_utilisateur, action) VALUES (NOW() , :ID_utilisateur, :action)');
$req->execute(array(
    'ID_utilisateur'=>$_SESSION['userID'],
    'action'=>$commentaire
));

function getLogs(){
    $bdd=connectBDD();
    $req=$bdd->prepare('SELECT ID, time, ID_utilisateur, action from logs');
    $req->execute();
    $Logs=$req->fetchAll();
    return $Logs;
}

function getAdminName($id){
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT nom from utilisateurs WHERE ID = ?');
    $req->execute(array($id));
    $adminNames=$req->fetch();
    return $adminNames;
}

?>


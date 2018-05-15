<?php 

function DateAndName(){}
$bdd= connectBDD();
$req = $bdd->prepare('INSERT INTO logs(time, ID_utilisateur) VALUES (NOW() , :ID_utilisateur)');
$req->execute(array(
    'ID_utilisateur'=>$_SESSION['userID']
));

function getIDAdmin(){
    $bdd=connectBDD();
    $req=$bdd->prepare('SELECT ID from logs');
    $req->execute();
    return $req;
}

function getDates(){
    $bdd=connectBDD();
    $req=$bdd->prepare('SELECT time from logs');
    $req->execute();
    return $req;
}
?>
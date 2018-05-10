<?php
function getUserInfos($id)
{
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT ID, nom, prenom, email, password, statutClient, statutAdmin, statutGestionnaire, statutSubordonne FROM utilisateurs where ID = ?');
    $req->execute($id);
    $_SESSION['userInfos'] = $req->fetch();
}

function updatenom($newnom, $iduser)
{
    $bdd=connectBDD();
    $insertnom = $bdd->prepare('UPDATE utilisateurs SET nom = ? WHERE ID = ?');
    $insertnom->execute(array($newnom, $iduser));
}

function updateprenom($newprenom, $iduser)
{
    $bdd=connectBDD();
    $insertprenom = $bdd->prepare('UPDATE utilisateurs SET prenom = ? WHERE ID = ?');
    $insertprenom->execute(array($newprenom, $iduser));
}

function updatemail($newmail, $iduser)
{
    $bdd=connectBDD();
    $insertmail = $bdd->prepare('UPDATE utilisateurs SET email = ? WHERE ID = ?');
    $insertmail->execute(array($newmail, $iduser));
}

function updatepassword($newmdp, $iduser)
{
    $bdd=connectBDD();
    $insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE ID = ?");
    $insertpassword->execute(array($newmdp, $iduser));
}

function getAllUsers() : array
{
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT ID, nom, prenom, email, statutClient, statutAdmin, statutGestionnaire, statutSubordonne FROM utilisateurs');
    $req->execute();

    return $req->fetchAll();
}
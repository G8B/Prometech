<?php
function getUserInfos()
{
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT ID, nom, prenom, email, password FROM utilisateurs where ID = ?');
    $req->execute(array($_SESSION['userID']));
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
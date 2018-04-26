<?php
/* ------------------------------------BDD -------------------------------------------------------------*/
session_start();
$bdd = connectBDD();
$req = $bdd->prepare('SELECT ID, nom, prenom, email, password FROM utilisateurs where ID = ?');
$req->execute(array($_SESSION['userID']));
$userInfos = $req->fetch();
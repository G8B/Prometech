<?php

/* ------------------------------------BDD -------------------------------------------------------------*/
$bdd = connectBDD();
$req = $bdd->prepare('SELECT ID, nom, prenom, email, password FROM utilisateurs');
$req->execute();
$account = $req->fetch();
$_SESSION["userID"] = $account['ID'];

/*-----------------------------------fonctions edition de profil----------------------------------------*/



/*$newcontactdetails = array(
 'new_nom' => $_POST['nom'],
 'new_prenom' => $_POST['prenom'],
 'new_email' => $_POST['email'],
 'new_password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
 );

 $bdd ->execute(" UPDATE utilisateurs
 nom = 'new_nom',
 prenom = 'new_prenom',
 email = 'new_email';
 password = 'new_password';
 WHERE ID= ?");
 
 */


function updatenom($newno, $idUser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertnom = $bdd->prepare('UPDATE utilisateurs SET nom = ? WHERE ID = userID');
    $insertnom->execute(array($newnom, $iduser));
}

function updateprenom($newprenom, $idUser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertprenom = $bdd->prepare('UPDATE utilisateurs SET prenom = ? WHERE ID = userID');
    $insertprenom->execute(array($newprenom, $idUser));
}

function updatemail($newmail, $idUser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertmail = $bdd->prepare('UPDATE utilisateurs SET email = ? WHERE ID = userID');
    $insertmail->execute(array($newmail, $iduser));
}

function updatepassword($newmdp, $idUser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE ID = userID");
    $insertpassword->execute(array($newmdp, $iduser));
}
?>
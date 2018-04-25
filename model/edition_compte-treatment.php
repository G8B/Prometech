<?php
/* ------------------------------------BDD -------------------------------------------------------------*/
session_start();
$bdd = connectBDD();
$req = $bdd->prepare('SELECT ID, nom, prenom, email, password FROM utilisateurs where ID = ?');
$req->execute(array($_SESSION['userID']));
$userInfos = $req->fetch();



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


function updatenom($newnom, $iduser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertnom = $bdd->prepare('UPDATE utilisateurs SET nom = ? WHERE ID = ?');
    $insertnom->execute(array($newnom, $iduser));
}

function updateprenom($newprenom, $iduser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertprenom = $bdd->prepare('UPDATE utilisateurs SET prenom = ? WHERE ID = ?');
    $insertprenom->execute(array($newprenom, $iduser));
}

function updatemail($newmail, $iduser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertmail = $bdd->prepare('UPDATE utilisateurs SET email = ? WHERE ID = ?');
    $insertmail->execute(array($newmail, $iduser));
}

function updatepassword($newmdp, $iduser)
{
    require('C:/xampp/htdocs/model/connectBDD.php');
    $insertpassword = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE ID = ?");
    $insertpassword->execute(array($newmdp, $iduser));
}
?>
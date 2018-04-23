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
?>
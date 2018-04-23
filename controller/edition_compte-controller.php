<?php
include('C:/xampp/htdocs/model/connectBDD.php');
include ('C:/xampp/htdocs/model/edition_compte-treatment.php');


/*--------------------------------------Modification du nom-----------------------------------------------*/
if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userInfos['nom'])
{
    $newnom = htmlspecialchars($_POST['newnom']);
    updatenom($newnom);
}



/*--------------------------------------Modification du prenom--------------------------------------------*/
if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userInfos['prenom'])
{
    $newprenom = htmlspecialchars($_POST['newprenom']);
    updateprenom($newprenom, $userInfos['ID']);
}

/*--------------------------------------Modification de l'email--------------------------------------------*/
if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userInfos['email'])
{
    $newprenom = htmlspecialchars($_POST['newmail']);
    updatemail($newmail, $userInfos['ID']);
}


/* ----------------------------------------- Modification du mot de passe ----------------------------- */
if(isset($_POST['mdpactuel']) AND !empty($_POST['mdpactuel']) AND isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
    $mdpactuel = password_hash($_POST['mdpactuel'], PASSWORD_DEFAULT);
    $newmdp1 = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
    $newmdp2 = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);
    
    if($mdpactuel == $userInfos['password'] )
    {
        if($newmdp1 == $newmdp2) {
            updatepassword($newmdp1, $userInfos['ID']);
        }
        else {
            alert("Vos deux nouveaux mots de passe ne correspondent pas !");
        }
    }
    else {
        alert("Mot de passe actuel incorrect !");
    }
    
}


?>
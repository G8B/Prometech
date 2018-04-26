<?php
require('C:/xampp/htdocs/model/connectBDD.php');
require('C:/xampp/htdocs/model/edition_compte-treatment.php');
$bdd=connectBDD();


/*--------------------------------------Modification du nom-----------------------------------------------*/
if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userInfos['nom'])
{
    $newnom = htmlspecialchars($_POST['newnom']);
    updatenom($newnom, $userInfos['ID']);
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
    $new = htmlspecialchars($_POST['newmail']);
    updatemail($newmail, $userInfos['ID']);
}


/* ----------------------------------------- Modification du mot de passe ----------------------------- */
if(isset($_POST['mdpactuel']) AND !empty($_POST['mdpactuel']) AND isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
    $mdpactuel = $_POST['mdpactuel'];
    $newmdp1 = password_hash($_POST['newmdp1'], PASSWORD_DEFAULT);
    $newmdp2 = password_hash($_POST['newmdp2'], PASSWORD_DEFAULT);
    
    if( password_verify($mdpactuel, $userInfos['password']))
    {
        if($newmdp1 == $newmdp2) {
            updatepassword($newmdp1, $userInfos['ID']);
        }
        else {
            echo '<p> Vos deux nouveaux mots de passe ne correspondent pas ! </p>';
            
        }
    }
    else {
        echo "<p>Mot de passe actuel incorrect !</p>";
    }
    
}


?>
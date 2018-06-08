<?php
include('model/connectBDD.php');
require('model/editionCompteTreatment.php');
require('model/logsTreatment.php');
require('model/supportTickets.php');
require('model/productsTreatment.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "reception";
} else {
    $page = $_GET['page'];
}

switch ($page) {
    case 'reception' :
        $tab = 'reception-admin';
        $title = 'Accueil';
        break;

    case 'support' :
        $tab = 'support';
        $title = 'Support';
        if (isset($_POST['ticketChoice']) AND isset($_POST['Statuts'])) {
            changeStatus(getStatus($_POST['Statuts']), getIDTicket($_POST['ticketChoice']));
            header("Refresh:0");
        }
        break;
        
    case 'produits' :
        $tab='gestionProduits';
        $title = 'Gestion de produits';
        if(isset($_POST['addModel']) AND !empty($_POST['addModel'])){
            if(empty(existenceModele())){
                if(isset($_POST['addModel']) AND !empty($_POST["addModel"]) AND isset($_POST['iconsList'])){
                    addModel();
                }
            }  else{
                echo '<script>alert("Ce modèle existe déjà !");</script>';
            }
        }
        
        if(isset($_POST['removeModel'])){
            removeModel();
        }
        break;
        
    case 'myinfos' :
        $tab = 'user-compte';
        $title = 'Mon compte';
        getUserInfos(array($_SESSION['userID']));
        $userInfos = $_SESSION['userInfos'];
        if (isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userInfos['nom']) {
            $newnom = htmlspecialchars($_POST['newnom']);
            updatenom($newnom, $userInfos['ID']);
            ajoutLog("L'admin n°" . $userInfos['ID'] . " a changé son nom en " . $newnom);
            header("Refresh:0");
        }
        
        if (isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userInfos['prenom']) {
            $newprenom = htmlspecialchars($_POST['newprenom']);
            updateprenom($newprenom, $userInfos['ID']);
            ajoutLog("L'admin n°" . $userInfos['ID'] . " a changé son prénom en " . $newprenom);
            header("Refresh:0");
        }
        
        if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userInfos['email']) {
            $newmail = htmlspecialchars($_POST['newmail']);
            updatemail($newmail, $userInfos['ID']);
            ajoutLog("L'admin n°" . $userInfos['ID'] . " a changé son email en " . $newmail);
            header("Refresh:0");
        }
        
        if (isset($_POST['mdpactuel']) AND !empty($_POST['mdpactuel']) AND isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
            $mdpactuel = $_POST['mdpactuel'];
            $newmdp1 = $_POST['newmdp1'];
            $newmdp2 = $_POST['newmdp1'];
            
            if (password_verify($mdpactuel, $userInfos['password'])) {
                if ($newmdp1 == $newmdp2) {
                    updatepassword(password_hash($newmdp1, PASSWORD_DEFAULT), $userInfos['ID']);
                } else {
                    echo '<p> Vos deux nouveaux mots de passe ne correspondent pas ! </p>';
                    
                }
            } else {
                echo "<p>Mot de passe actuel incorrect !</p>";
            }
            ajoutLog("L'admin n°" . $userInfos['ID'] . " a changé son mot de passe");
            header("Refresh:0");
        }
        break;
        
    case 'accounts-management' :
        $tab = 'admin-accounts-management';
        $title = 'Gestion des comptes';
        $accounts = getAllUsers();
        break;
        
    case 'edit-account' :
        $id = $_GET['ID'];
        getUserInfos(array($id));
        $userInfos = $_SESSION['userInfos'];
        $tab = 'user-compte';
        $title = 'Édition du compte ' . $id;
        if (isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userInfos['nom']) {
            $newnom = htmlspecialchars($_POST['newnom']);
            updatenom($newnom, $userInfos['ID']);
            ajoutLog("L'admin " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " a changé le nom de l'utilisateur n°" . $userInfos['ID'] . " en " . $newnom);
            header("Refresh:0");
        }
        
        if (isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userInfos['prenom']) {
            $newprenom = htmlspecialchars($_POST['newprenom']);
            updateprenom($newprenom, $userInfos['ID']);
            ajoutLog("L'admin " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " a changé le prénom de l'utilisateur n°" . $userInfos['ID'] . " en " . $newprenom);
            header("Refresh:0");
        }
        
        if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userInfos['email']) {
            $newmail = htmlspecialchars($_POST['newmail']);
            updatemail($newmail, $userInfos['ID']);
            ajoutLog("L'admin " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " a changé le mail de l'utilisateur n°" . $userInfos['ID'] . " en " . $newmail);
            header("Refresh:0");
        }
        
        if (isset($_POST['typesCompte']) AND !empty($_POST['typesCompte'])) {
            $client = 0;
            $gestionnaire = 0;
            $admin = 0;
            if (isChecked('typesCompte', "client"))
                $client = 1;
                if (isChecked('typesCompte', "gestionnaire"))
                    $gestionnaire = 1;
                    if (isChecked('typesCompte', "admin"))
                        $admin = 1;
                        updateAccountTypes($client, $gestionnaire, $admin, $userInfos['ID']);
                        $newstatus = "";
                        if ($client)
                            $newstatus .= "Client ";
                            if ($gestionnaire)
                                $newstatus .= "Gestionnaire  ";
                                if ($admin)
                                    $newstatus .= "Administrateur ";
                                    ajoutLog("L'admin " . $_SESSION['prenom'] . " " . $_SESSION['nom'] . " a changé le statut de l'utilisateur n°" . $userInfos['ID'] . " en " . $newstatus);
                                    header("Refresh:0");
        }

        if (isset($_POST['delete'])) {
            deleteUser($userInfos['ID']);
            echo "<script type='text/javascript'>document.location.replace('index.php?target=admin&page=accounts-management');</script>";
        }

        break;
        
    case 'logs' :
        $tab = 'logs';
        $title = 'Logs';
        break;
        
        
    default :
        $title = '404';
        header('Location : /index.php?target=home&page=404');
        exit();
}


include('view/template.php');


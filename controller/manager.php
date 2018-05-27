<?php
include('model/connectBDD.php');
require('model/editionCompteTreatment.php');
require('model/ajoutLogementTreatment.php');
require('model/buildings.php');
require('model/houses.php');


if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "dashboard";
} else {
    $page = $_GET['page'];
}

$alerte = false;


switch ($page) {
    case 'dashboard' :
        $tab = 'manager-dashboard';
        $title = 'Dashboard';
        $IDhousesManaged  = getHousesManagement($_SESSION['userID']);
        break;

    case 'gestionImmeubles' :
        $tab = 'ajoutImmeuble';
        $title = 'gestion d\' immeuble';
        $houses = getHouses($_SESSION['userID']);
        if (isset($_POST['adresse']) AND !empty($_POST['adresse'])) {
            addBuilding();
            echo "<script type='text/javascript'>document.location.replace('index.php?target=manager&page=gestionImmeubles');</script>";
            exit();
        }
        break;

    case 'newBuilding':
        $tab = 'ajoutImmeuble';
        $title = 'Mes Immeubles';
        if (isset($_POST['adresse']) AND !empty($_POST['adresse'])) {
            addBuilding();
            echo "<script type='text/javascript'>document.location.replace('index.php?target=manager&page=gestionImmeubles');</script>";
            exit();
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
            header("Refresh:0");
        }

        if (isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userInfos['prenom']) {
            $newprenom = htmlspecialchars($_POST['newprenom']);
            updateprenom($newprenom, $userInfos['ID']);
            header("Refresh:0");
        }

        if (isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userInfos['email']) {
            $newmail = htmlspecialchars($_POST['newmail']);
            updatemail($newmail, $userInfos['ID']);
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
            header("Refresh:0");
        }
        break;



    default :
        $title = '404';
        echo "<script type='text/javascript'>document.location.replace('index.php?target=home&page=404');</script>";
        exit();
}


include('view/template.php');


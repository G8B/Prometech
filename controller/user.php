<?php
include('model/connectBDD.php');
require('model/editionCompteTreatment.php');
require('model/ajoutLogementTreatment.php');
require('model/houses.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "dashboard";
} else {
    $page = $_GET['page'];
}

$alerte = false;


switch ($page) {
    case 'dashboard' :
        $tab = 'user-dashboard';
        $title = 'Dashboard';
        $houses = getHouses($_SESSION['userID']);
        break;

    case 'logements' :
        $tab = 'userLogements';
        $title = 'Mes logements';
        $houses = getHouses($_SESSION['userID']);
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

    case 'newHouse':
        $tab = 'ajoutLogement';
        $title = 'Mes logements';
        if (isset($_POST['adresse']) AND !empty($_POST['adresse'])) {
            addLogement();
            occupation();
            echo "<script type='text/javascript'>document.location.replace('index.php?target=user&page=logements');</script>";
            exit();
        }
        break;

    case 'ajout-produit' :
        $tab = "add-product";
        $title = "Ajouter un produit";
        $houses = getHouses($_SESSION['userID']);
        if (isset($_POST['numeroDeSerie']) AND !empty($_POST['numeroDeSerie']) AND isset($_POST['idPiece'])) {
            $num = htmlspecialchars($_POST['numeroDeSerie']);
            addProduct($num, $_POST['idPiece'], $_SESSION['userID']);
            echo "<script type='text/javascript'>document.location.replace('index.php?target=user&page=logements');</script>";
            exit();
        }
        break;

    case 'ajout-piece' :
        $tab = "add-room";
        $title = "Ajouter une pièce";
        $houses = getHouses($_SESSION['userID']);
        if (isset($_POST['nomPiece']) AND !empty($_POST['nomPiece']) AND isset($_POST['idHouse'])) {
            $nom = htmlspecialchars($_POST['nomPiece']);
            addRoom($nom, $_POST['idHouse']);
            echo "<script type='text/javascript'>document.location.replace('index.php?target=user&page=logements');</script>";
            exit();
        }
        break;

    case 'update-logement' :
        $tab = "EditerLogement";
        $title = "Editer son logement";
        $houses = getHouses($_SESSION['userID']);
        if (isset($_POST['idHouse']) AND isset($_POST['nbrPieces']) AND !empty($_POST['nbrPieces']) AND isset($_POST['nbrHabitants']) AND !empty($_POST['nbrHabitants']) AND isset($_POST['superficie']) AND !empty($_POST['superficie'])  ) {
            $nbrPieces = htmlspecialchars($_POST['nbrPieces']);
            $nbrHabitants = htmlspecialchars($_POST['nbrHabitants']);
            $superficie = htmlspecialchars($_POST['superficie']);
            updateLogements($nbrHabitants,$nbrPieces,$superficie,$_POST['idHouse']);
            echo "<script type='text/javascript'>document.location.replace('index.php?target=user&page=logements');</script>";
            exit();
        }
        break;

    default :
        $title = '404';
        echo "<script type='text/javascript'>document.location.replace('index.php?target=home&page=404');</script>";
        exit();
}


include('view/template.php');


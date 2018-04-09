<?php
include ('model/connectBDD.php');
include ('model/signInTreatment.php');
include ('model/signupTreatment.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "login";
} else {
    $page = $_GET['page'];
}

switch ($page) {
    case 'login' :
        $view = 'login';
        $title = 'Connexion';
        $alerte = false;

        // formulaire posté
        if (isset($_POST['email']) and isset($_POST['password'])) {
            if (!isAnEmail($_POST['email'])) {
                $alerte = "Veuillez entrer un format d'adresse mail valide.";
            } else if (!isAPassword($_POST['password'])) {
                $alerte = "Veuillez entrer un format de mot de passe valide.";
            } else if (login($_POST['email'],$_POST['password'])) {
                header('Location: /view/user-main.php');
                exit();
            } else {
                $alerte = "Identifiant ou mot de passe invalide.";
            }
        }
        break;

    case 'signup' :
        $view = 'signup';
        $title = 'Inscription';

        if (isset($_POST['email']) and isset($_POST['password'])) {
            signup();
            header('Location: /index.php?target=home&page=login');
            exit();
        }
        break;

    case 'contact' :
        $view = 'contact';
        $title = 'Contact';
        break;
}


include ('view/' . $view . '.php');


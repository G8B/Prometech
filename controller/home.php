<?php
include('model/connectBDD.php');
include('model/signInTreatment.php');
include('model/signupTreatment.php');
include('model/supportTickets.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "login";
} else {
    $page = $_GET['page'];
}

$alerte = false;


switch ($page) {
    case 'login' :
        $_SESSION = array();
        $view = 'login';
        $title = 'Connexion';

        // formulaire posté
        if (isset($_POST['email']) and isset($_POST['password'])) {
            if (!isAnEmail($_POST['email'])) {
                $alerte = "Veuillez entrer un format d'adresse mail valide.";
            } else if (!isAPassword($_POST['password'])) {
                $alerte = "Veuillez entrer un format de mot de passe valide.";
            } else if (login($_POST['email'], $_POST['password'])) {
                if ($_SESSION['admin'] == 1) {
                    $redirection = 'admin';
                } else {
                    if ($_SESSION['gestionnaire'] == 1) {
                        $redirection = 'manager';
                    } else {
                        $redirection = 'user';
                    }
                }
                header('Location: /index.php?target=' . $redirection);
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

        if (isset($_POST['email']) and isset($_POST['message'])) {
            if (!isAnEmail($_POST['email'])) {
                $alerte = "Veuillez entrer un format d'adresse mail valide.";
            } else if (sendSupportTicket()) {
                header('Location: /index.php?target=home&page=login');
            } else {
                $alerte = 'Veuillez vérifier que tous les champs sont bien remplis.';
            }
        }
        break;

    case 'mentions-legales':
        $view = 'mentions-legales';
        $title = 'mentions-legales';

        break;

    default :
        $view = 'notFound404';
        $title = '404';
}


include('view/' . $view . '.php');


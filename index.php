<?php
session_start();
include ('controller/functions.php');
include ('view/functions.php');

// Appel du contrôleur selon paramètre GET

if (!isset($_GET['target']) || empty($_GET['target'])) {
    $target = "home";
} else {
    $target = $_GET['target'];
}

switch ($target) {
    case 'home' :
        $domain = 'home';
        break;

    case 'user' :
        $domain = 'user';
        break;

    case 'admin' :
        $domain = $_SESSION['admin'] == 1 ? 'admin' : 'home';
        break;
    
    case 'edition_compte-controller' :
        $domain = 'edition_compte-controller' ;
        break;

    default :
        $domain = 'home';
        break;
}

include('controller/' . $domain . '.php');
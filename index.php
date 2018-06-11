<?php
session_start();
include('controller/functions.php');
include('view/functions.php');

// Appel du contrôleur selon paramètre GET

if (!isset($_GET['target']) or empty($_GET['target'])) {
    $target = "home";
} else {
    $target = $_GET['target'];
}

if (empty($_SESSION))
    $target = "home";

switch ($target) {
    case 'home' :
        $domain = 'home';
        break;

    case 'user' :
        $domain = empty($_SESSION['userID']) ? 'home' : 'user';
        break;

    case 'admin' :
        $domain = $_SESSION['admin'] == 1 ? 'admin' : 'home';
        break;

    case 'manager' :
        $domain = $_SESSION['gestionnaire'] == 1 ? 'manager' : 'home';
        break;

    default :
        $domain = 'home';
        break;
}

include('controller/' . $domain . '.php');
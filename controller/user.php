<?php
include ('model/connectBDD.php');

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
        break;

    default :
        $title = '404';
        header('Location : /index.php?target=home&page=404');
        exit();
}


include('view/template.php');


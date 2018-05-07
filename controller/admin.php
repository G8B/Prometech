<?php
include ('model/connectBDD.php');

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "support";
} else {
    $page = $_GET['page'];
}

switch ($page) {
    case 'support' :
        $tab = 'support';
        $title = 'Support';
        break;

    default :
        $title = '404';
        header('Location : /index.php?target=home&page=404');
        exit();
}


include('view/template.php');


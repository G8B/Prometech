<?php

if (!isset($_GET['page']) || empty($_GET['page'])) {
    $page = "login";
} else {
    $page = $_GET['page'];
}

switch ($page) {
    case 'login' :
        $view = 'login';
        $title = 'Connexion';
}


include ('view/' . $view . '.php');


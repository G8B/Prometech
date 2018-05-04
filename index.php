<?php
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
        
    case 'edition_compte-controller' :
        $domain = 'edition_compte-controller' ;
        break;
        
    case 'secondaryUserController' :
        $domain = 'secondaryUserController';
        break;
        
    default :
        $domain = 'home';
        break;
}
include('controller/' . $domain . '.php');
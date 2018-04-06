<?php

// Appel du contrôleur selon paramètre GET

if(isset($_GET['target']) && !empty($_GET['target'])) {
    $url = $_GET['target'];
} else {
    $url = 'home';
}

include('controller/' . $url . '.php');
<?php

session_start();
require('tramesTreatment.php');
require('houses.php');
require('connectBDD.php');
$houses = getHouses($_SESSION['userID']);
foreach ($houses as $house){
    $rooms = getRooms($house['ID_logement']);
    foreach ($rooms as $room){
        $products = getProducts($room['ID']);
        
        foreach ($products as $product) {
            $values = getValSensor($product['numeroDeSerie']) ;
            $sensor = array( lectureDonnees($values['unite'], $values['valeur']));
            
            for($i = 0 ; $i < count($sensor) ; $i++ ){
                echo $sensor[$i];
            }
            
            
        }
        
    }
}



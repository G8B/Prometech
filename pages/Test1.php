<?php
require_once("User.php");
class Test1
{
}


$User = new Logement();

$User->setIDLogement(1);
$User->listePiece();
$Liste = $User->getListePiece();
echo $Liste[0]->getNom();

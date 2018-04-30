<?php
require_once("User.php");
class Test1
{
}


$User = new User();

$User->setAdresseMail('danystory@hotmail.fr');
$User->rechercheID();
echo $User->getID();
$User->ListeLogement();
$Liste = $User->getListeLogement();
echo $Liste[1]->getIDLogement();

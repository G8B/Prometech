<?php
require_once("User.php");
class Test1
{
}


$User = new User();

$User->setAdresseMail('danystory');
$User->rechercheID();
echo $User->getAdresseMail();
echo $User->getID();

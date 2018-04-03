<?php
require_once("User.php");
$User = new User();

$User->setAdresseMail('danystory');
$User->rechercheID();
echo $User->getID();

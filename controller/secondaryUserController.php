<?php
require('model/connectBDD.php');
require('model/secondaryUserModel.php');
$bdd=connectBDD();

include('view/secondary-user.php');
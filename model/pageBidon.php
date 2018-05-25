
<div id="dashboard-nav">
    <a class="dashboard-nav-link current-dashboard" href="#"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="#"><i class="fas fa-chart-bar"></i></a>
</div>

<?php

//$IDhousesManaged = getHousesManagement($iduser['ID_User']);
$IDhousesManaged  = getHousesManagement(4);


echo var_dump ($IDhousesManaged );


function getHousesManagement($iduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM gestionLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}



function connectBDD(): PDO
{
    $host = 'localhost';
    $db = 'prometech';
    $user = 'root';
    $pass = '';
    $charset = 'utf8';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    return new PDO($dsn, $user, $pass);
}

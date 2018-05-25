<div id="dashboard-nav">
    <a class="dashboard-nav-link current-dashboard" href="#"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="#"><i class="fas fa-chart-bar"></i></a>
</div>

<?php

//$IDhousesManaged = getHousesManagement($iduser['ID_User']);
$IDhousesManaged  = getHousesManagement(1);

$adressesDistinctes = Array ();
$adressesNonDistinctes = Array ();

foreach ($IDhousesManaged as $housemanaged) :

    $adresse = getHouseAdress($housemanaged);
    $adressesNonDistinctes[] = $adresse;
    endforeach;

  //  $adressesDistinctes = array_unique($adressesNonDistinctes[$sort_flags = SORT_STRING ]);
$adressesDistinctes = array_unique($adressesNonDistinctes);

$i = 0;
foreach ( $adressesNonDistinctes as $adresseDistincte) :?>
        <div class="user-house-dashboard">
        <h1 class="user-house-name"><?php echo $adresseDistincte; ?></h1>
       <?php

      $logements = getIDHousesFromAdress($adresseDistincte);
      $j = 0;
       foreach ($logements as $logement) : ?>


        <div class="accordion-tab">
        <input id="accordion<?php echo $i ?>-tab-<?php echo 'appartement' +$logement ?>" type="radio" name="accordion<?php echo $i ?>">
               checked>
        </div>
            <?php
            $j++;
        endforeach; ?>
        </div>
    <?php
    $i++;
endforeach;

?>


<?php

function getIDHousesFromAdress($adresseduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements WHERE adresse =?');
    $req->execute(array($adresseduser));
    $IDhouses = $req->fetchAll();
    return $IDhouses;
}

function getHousesManagement($iduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM gestionLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}



function addBuilding(){
    $bdd=connectBDD();
    $req = $bdd->prepare('SELECT ID FROM logements WHERE adresse = ?');
    $req->execute(array($_POST["adresse"]));
    $ID_logement = $req->fetch()['ID'];
    $req = $bdd->prepare('INSERT INTO gestionlogement(ID_utilisateur, ID_logement) VALUES(:ID_utilisateur, :ID_logement)');
    $req->execute(array(
        'ID_utilisateur' => $_SESSION['userID'],
        'ID_logement' => $ID_logement
    ));

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


function getHouses($iduser) : array
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT ID_logement FROM occupationLogement WHERE ID_utilisateur = ?');
    $req->execute(array($iduser));
    $houses = $req->fetchAll();
    return $houses;
}

function getHouseAdress($idHouse)
{
    $bdd = connectBDD();
    $req = $bdd->prepare('SELECT adresse FROM logements WHERE ID = ?');
    $req->execute(array($idHouse));
    return $req->fetch()['adresse'];
}



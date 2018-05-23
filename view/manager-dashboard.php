<div id="dashboard-nav">
    <a class="dashboard-nav-link current-dashboard" href="#"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="#"><i class="fas fa-chart-bar"></i></a>
</div>
<?php

//$IDhousesManaged = getHousesManagement($iduser['ID_User']);
$IDhousesManaged  = getHousesManagement($iduser[1]);
$adressesDistinctes = Array ();
$adressesNonDistinctes = Array ();

foreach ($IDhousesManaged as $housemanaged) :

    $adresse = getHouseAdress($housemanaged);
    $adressesNonDistinctes[] = $adresse;
    endforeach;

  $adressesDistinctes ( $adressesNonDistinctes[  $sort_flags = SORT_STRING ] );


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
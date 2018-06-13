<div id="dashboard-nav">
    <a class="dashboard-nav-link current-dashboard" href="#"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="#"><i class="fas fa-chart-bar"></i></a>
</div>

<?php
$adressesDistinctes = Array ();
$adressesNonDistinctes = Array ();

foreach ($IDhousesManaged as $idhousemanaged) :

    $adresse = getHouseAdressManager($idhousemanaged);
    $adressesNonDistinctes[] = $adresse;

    endforeach;


$adressesDistinctes = array_unique($adressesNonDistinctes);

$i = 0;
foreach ( $adressesDistinctes as $adresseDistincte) :?>
        <div class="user-house-dashboard">
        <h1 class="user-house-name"><?php echo $adresseDistincte; ?></h1>
       <?php

      $logements = getIDHousesFromAdress($adresseDistincte);


      $j = 0;
       foreach ($logements as $logement) :?>

        <div class="accordion-tab">
        <input id="accordion<?php echo $i ?>-tab-<?php echo $j ?>" type="radio" name="accordion<?php echo $i ?>" checked>
        <label for="accordion<?php echo $i ?>-tab-<?php echo $j ?>"><?php echo 'Logement '; ?><?php echo $logement["ID"] ; ?></label>
        </div>

            <?php
            $j++;
        endforeach; ?>
        </div>
    <?php
    $i++;
endforeach;

?>





<div id="dashboard-nav">
    <a class="dashboard-nav-link active" href="../index.php?target=user&page=dashboard&spage=capteur_piece"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="../index.php?target=user&page=dashboard-conso&spage=graph_conso"><i class="fas fa-chart-bar"></i></a>
</div>

<?php


if(!isset($_GET['spage'])){
    $_GET['spage'] = '';
}

        $i = 0;
        foreach ($houses as $house) : ?>
            <div class="user-house-dashboard">
            <br>
                <h1 class="user-house-name"><?php echo getHouseAdress($house['ID_logement']); ?></h1>
            <br>
                <?php $rooms = getRooms($house['ID_logement']);
                $j = 0;
                foreach ($rooms as $room) : ?>
                    <div class="accordion-tab">
                        <input id="accordion<?php echo $i ?>-tab-<?php echo $j ?>" type="radio" name="accordion<?php echo $i ?>"
                              checked>
                        <label for="accordion<?php echo $i ?>-tab-<?php echo $j ?>" ><?php echo getRoomName($room['ID']); ?></label>
                        <div class="accordion-tab-content">
                            <div class="product-grid">
                                <?php $products = getProducts($room['ID']); $k = 0 ;
                                foreach ($products as $product) : $k++ ;  ?>
                                    <div class="product-box" id = <?php echo $k ;  ?>><?php echo getProductInfos($product['numeroDeSerie'])['nom'] . ' a pour numéro de série ' . $product['numeroDeSerie'] ;
                                    $values = getValSensor($product['numeroDeSerie']) ; 
                                   
                                        echo '<p class="lastValueSensor"> Dernière valeur enregistrée : ' . lectureDonnees($values['unite'], $values['valeur']) . ' ' . $values['unite'] . '</p>' ;
                                        echo '<p class="lastDate"> Dernière mise à jour le : ' . $values['date'] . '</p>';
                                        
                                     

                                    ?></div> <!-- affichage du nom des capteurs  -->
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php
                    $j++;
                endforeach; ?>
            </div>
            <?php
            $i++;

        endforeach; ?>



<script type="text/javascript" src="/public/js/trames.js" >

</script>
<script type="text/javascript" >

</script>



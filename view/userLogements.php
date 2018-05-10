<?php
$i = 0;
foreach ($houses as $house) : ?>
    <div class="user-house-dashboard">
        <h1 class="user-house-name"><?php echo getHouseAdress($house['ID_logement']); ?></h1>
        <?php $rooms = getRooms($house['ID_logement']);
        $j = 0;
        foreach ($rooms as $room) : ?>
            <div class="accordion-tab">
                <input id="accordion<?php echo $i ?>-tab-<?php echo $j ?>" type="radio" name="accordion<?php echo $i ?>"
                       checked>
                <label for="accordion<?php echo $i ?>-tab-<?php echo $j ?>"><?php echo getRoomName($room['ID']); ?></label>
                <div class="accordion-tab-content">
                    <div class="product-grid">
                        <?php $products = getProducts($room['ID']);
                        foreach ($products as $product) : ?>
                        <div class="product-box"><?php echo getProductInfos($product['numeroDeSerie'])['nom'] ?></div>
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
<a id="addProd" href="../index.php?target=user&page=ajout-produit"><i class="fas fa-plus-square">Ajouter Produit</i></a>
<a id="addProd" href="../index.php?target=user&page=newHouse"><i class="fas fa-plus-square">Ajouter Logement</i></a>




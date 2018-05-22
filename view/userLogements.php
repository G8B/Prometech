<?php
$i = 0;
foreach ($houses as $house) : ?>
    <div class="user-house-dashboard" id="<?php echo $house['ID_logement'] ?>">
        <h1 class="user-house-name"><?php echo getHouseAdress($house['ID_logement']); ?><button class="supprimer delete-btn house-delete" type="button" id="supprimer"><i class="fas fa-minus"></i></button></h1>
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
<a id="addProd" href="../index.php?target=user&page=ajout-piece"><i class="fas fa-plus-square">Ajouter Pièce</i></a>

<div id="confirmationModale" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Êtes vous sûr de vouloir supprimer ce logement ?</h1>
        <h2>Cette action est irréversible !</h2>
        <div style="margin-left: 20%;">
            <button type="button" class="form-button confirm-delete-btn" id="deleteElement">Supprimer</button>
            <button type="button" class="form-button" id="cancel">Annuler</button>
        </div>
    </div>
</div>





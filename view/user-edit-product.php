<div class="form_logement">
    <form method="post" action="" id="moveProduit">

        <h1>Déplacement du produit <?php echo $productInfos['nom']?></h1>

        <p>
            <select title="idPiece" name="idPiece" form="moveProduit">
                <?php foreach ($houses as $house) : ?>
                    <optgroup label="<?php echo getHouseAdress($house['ID_logement']); ?>">
                        <?php $rooms = getRooms($house['ID_logement']);
                        foreach ($rooms as $room) : ?>
                            <option value="<?php echo $room['ID'] ?>"><?php echo getRoomName($room['ID']); ?></option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>
        </p>


        <input id='ajoutProduitButton' class="form-button" type="submit" value="Déplacer le produit"/>
    </form>
</div>


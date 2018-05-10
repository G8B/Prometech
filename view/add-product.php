<div class="form">
    <form method="post" action="" id="ajoutProduit">

        <p>
            <label for="numeroDeSerie"></label>
            <input type="text" name="numeroDeSerie" placeholder="Numéro de série" size="25"/>
        </p>

        <p>
            <select title="idPiece" name="idPiece" form="ajoutProduit">
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


        <input id='inscription' class="form-button" type="submit" value="Ajouter produit"/>
    </form>
</div>



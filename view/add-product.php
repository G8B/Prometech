<div class="form_logement">
    <form method="post" action="" id="ajoutProduit">

        <h1>Ajouter un produit</h1>

        <p>
            <label for="numeroDeSerie"></label>
            <input type="text" name="numeroDeSerie" placeholder="Numéro de série" size="25"/>
        </p>

        <p>
            <label for="nomCapteur"></label>
            <input type="text" name="nomCapteur" placeholder="Nom du produit" size="25"/>
        </p>



        <p>
            <label for="pièce"> Pièce choisie :</label>
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
        <p>
            <label for="cemac"> Numéro de Cemac :</label>
            <select title="idCemac" name="Cemac" form="ajoutProduit">

                <?php foreach ($houses as $house) : ?>
                    <optgroup label="<?php echo getHouseAdress($house['ID_logement']); ?>">
                        <?php $numbers = getCemacLogement($house['ID_logement']);
                        foreach ($numbers as $number) : ?>
                            <option value="<?php echo $number['numero'] ?>"><?php echo $number['numero']; ?> </option>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>

        </p>











        <input id='ajoutProduitButton' class="form-button" type="submit" value="Ajouter produit"/>
    </form>
</div>



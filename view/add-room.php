<div class="form_logement">
    <form method="post" action="" id="ajoutPiece">

        <h1>Ajouter une pièce</h1>

        <p>
            <label for="nomPiece"></label>
            <input type="text" name="nomPiece" placeholder="Nom de la pièce" size="25"/>
        </p>

        <p>
            <select title="idHouse" name="idHouse" form="ajoutPiece">
                <?php foreach ($houses as $house) : ?>
                    <option value="<?php echo $house['ID_logement'] ?>"><?php echo getHouseAdress($house['ID_logement']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>


        <input id='ajoutPieceButton' class="form-button" type="submit" value="Ajouter produit"/>
    </form>
</div>








<div class="form_cemac">

    <form action="" method="post" id="form_cemac">

        <h1>Ajouter un Cemac</h1>
        <br>

        <p >
            Numéro de Cemac :
            <input  class ="compte" type="number" name="number" size="50"/>
        </p>

        <p>
            <select title="idHouse" name="idHouse" form="form_cemac">
                <?php foreach ($houses as $house) : ?>
                    <option value="<?php echo $house['ID_logement'] ?>"><?php echo getHouseAdress($house['ID_logement']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>


        <input id='ajoutPieceButton' class="form-button" type="submit" value="Ajouter Cemac"/>
    </form>
</div>
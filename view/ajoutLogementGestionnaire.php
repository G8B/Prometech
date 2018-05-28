<link rel="stylesheet" type="text/css" href="/public/css/mon_compte.css">


<div class="form_logement">
    <form method="post" action="" >

        <h1>Ajouter un logement</h1>

        <p>
            <label for="nomLogement"></label>
            <input type="text" name="nomLogement" placeholder="Nom du logement" size="25"/>
        </p>

        <p>
            <select title="idHouse" name="idHouse" form="ajoutLogement">
                <?php foreach ($houses as $house) : ?>
                    <option value="<?php echo $house['ID_logement'] ?>"><?php echo getHouseAdress($house['ID_logement']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>


        <input id='ajoutPieceButton' class="form-button" type="submit" value="Ajouter pièce"/>
    </form>
</div>
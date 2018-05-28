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
                <?php foreach ($logements as $logement) : ?>
                    <option value="<?php echo 'Appartement '; ?><?php echo $logement["ID"] ; ?>">
                        <?php echo 'Appartement '; ?><?php echo $logement["ID"] ; ?></option>
                <?php endforeach; ?>
            </select>
        </p>


        <input id='ajoutLogementButton' class="form-button" type="submit" value="Ajouter logement"/>
    </form>
</div>
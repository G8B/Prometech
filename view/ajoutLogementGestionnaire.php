<link rel="stylesheet" type="text/css" href="/public/css/mon_compte.css">


<div class="form_logement">
    <form method="post" action="" id="ajoutLogement" >

        <h1>Ajouter un logement</h1>

        <p>
            <label for="nomLogement"></label>
            <input type="text" name="nomLogement" placeholder="Nom du logement" size="25"/>
        </p>


        <p>
            <select title="idHouse" name="idHouse" form="ajoutLogement">
                <?php

                $logements = getIDhousesFromadresseManaged($_SESSION['adresse']);
                foreach ($logements as $logement) : ?>
                    <option value="<?php echo $logement ["ID"] ; ?>">
                        <?php echo 'Logement '.$logement ["ID"] ; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <div class="bouton">
            <button class="form-button">Confirmer</button>
        </div>
        <input class="form-button" type="submit" value="Ajouter Logement"/>
    </form>
</div>

<div class="form_logement">
    <form method="post" action="" id="supprimerLogement" >

        <h1>Supprimer un logement</h1>

        <p>
            <label for="nomLogement"></label>
            <input type="text" name="nomLogement" placeholder="Nom du logement" size="25"/>
        </p>


        <p>
            <select title="idHouseSuppr" name="idHouseSuppr" form="supprimerLogement">
                <?php
                $logements = getIDhousesFromadresseAldreadyManaged($_SESSION['adresse']);
                foreach ($logements as $logement) : ?>
                    <option value="<?php echo $logement ["ID"] ; ?>">
                        <?php echo 'Logement '.$logement ["ID"] ; ?></option>
                <?php endforeach; ?>
            </select>
        </p>

        <div class="bouton">
            <button class="form-button">Confirmer</button>
        </div>
        <input class="form-button" type="submit" value="Supprimer Logement"/>
    </form>
</div>
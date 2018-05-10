<div class="form_logement">
    <form method="post" action="">

        <p>
            <img src="logo.png"/>
        </p>
        <p>
            <label for="Adresse">Adresse :</label>
            <input type="adress" name="adresse" size="25"/>
        </p>
        <p>
            <label for="Nombre de pieces">Nombres de pièces :</label>
            <input type="number" name="nbrPieces"  min = 1 max = 1000 step = 1 size="25" />
        </p>
        <p>
            <label for="Nombre d'habitants">Nombre d'habitants :</label>
            <input type="number" name="nbrHabitants"  min = 1 max = 1000 step = 1 size="25"/>
        </p>
        <p>
            <label for="Superficie">Superficie (m²) :</label>
            <input type="number" name="superficie"  min = 1 max = 10000 step = 1 size="25"/>
        </p>




        <input id='inscription' class="form-button" type="submit" value=" +Ajouter le logement"/>
    </form>



</div>
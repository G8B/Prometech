<div id="dashboard-nav">
    <a class="dashboard-nav-link" href="index.php?target=user&page=dashboard&spage=capteur_piece"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link active" href="index.php?target=user&page=dashboard-conso&spage=graph_conso"><i class="fas fa-chart-bar"></i></a>

</div>



<div class="form_logement">
    <form method="post" action="" id="choixConso">

        <h1>Choisir le capteur</h1>


        <p>
            <label for="name"> Capteur choisie :</label>
            <select title="idSerie" name="nomCapteur" form="choixConso">
                <?php foreach ($houses as $house) : ?>
                    <optgroup label="<?php echo getHouseAdress($house['ID_logement']); ?>">
                        <?php $rooms = getRooms($house['ID_logement']);
                        foreach ($rooms as $room) : ?>
                            <optgroup label="<?php echo  getRoomName($room['ID']); ?>">
                                <?php $names = getNames($room['ID']);
                                foreach ($names as $name) : ?>
                                    <option value="<?php echo $name['numeroDeSerie'] ?>"><?php echo $name['nom_capteur']; ?></option>
                                <?php endforeach; ?>
                            </optgroup>
                        <?php endforeach; ?>
                    </optgroup>
                <?php endforeach; ?>
            </select>


        </p>

        <input class="form-button" type="submit" value="Valider"/>
    </form>
</div>


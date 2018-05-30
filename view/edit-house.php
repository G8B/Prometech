<link rel="stylesheet" href="/public/css/editerLogement.css"/>


<div>
    <form method="post" action="" id="updateLogement">

        <h1>Editer le logement <?php echo getHouseAdress($idHouse); ?></h1>


        <p>
            Nombres de pieces :
            <input class="logement" type="number" name="nbrPieces" min=1 max=1000 step=1 size="50"/>
        </p>
        <br>

        <p>
            Nombre d'habitants :
            <input class="logement" type="number" name="nbrHabitants" min=1 max=1000 step=1 size="50"/>
        </p>
        <br>
        <p>
            Superficie :
            <input class="logement" type="number" name="superficie" min=1 max=10000 step=1 size="50"/>
        </p>
        <br>


        <input class="logement" type="submit" value="Editer son logement"/>

    </form>
</div>

<div style="margin-left: 100px">
    <h1>Supprimer une pièce</h1>
    <table>
        <tbody>
        <?php $rooms = getRooms($idHouse);
        foreach ($rooms as $room) : ?>
        <tr>
            <td><?php echo getRoomName($room['ID']); ?></td>
            <td>
                <button class="supprimer delete-btn house-delete" type="button" id="supprimer"><i
                            class="fas fa-minus"></i>
                </button>
            </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div id="confirmationModale" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h1>Êtes vous sûr de vouloir supprimer cette pièce ?</h1>
        <h2>Cette action est irréversible !</h2>
        <div style="margin-left: 20%;">
            <button type="button" class="form-button confirm-delete-btn" id="deleteElement">Supprimer</button>
            <button type="button" class="form-button" id="cancel">Annuler</button>
        </div>
    </div>
</div>

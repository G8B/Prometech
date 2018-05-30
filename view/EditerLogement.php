


<link rel="stylesheet" href="/public/css/editerLogement.css"/>



<div>
    <form method="post" action="" id="updateLogement">

        <h1>Editer le logement <?php echo getHouseAdress($idHouse); ?></h1>


        <p>
            Nombres de pieces :
            <input class ="logement" type="number" name="nbrPieces"  min = 1 max = 1000 step = 1 size="50" />
        </p>
        <br>

        <p>
            Nombre d'habitants :
            <input class ="logement" type="number" name="nbrHabitants"  min = 1 max = 1000 step = 1 size="50"/>
        </p>
        <br>
        <p>
            Superficie :
            <input class ="logement" type="number" name="superficie"  min = 1 max = 10000 step = 1 size="50"/>
        </p>
        <br>




        <input class ="logement" type="submit" value="Editer son logement"/>

    </form>
</div>
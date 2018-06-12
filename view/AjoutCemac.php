<?php include('pages/RecupTrames.php') ?>
<link rel="stylesheet" type="text/css" href="/public/css/cemac.css">


<div class="form_cemac">

    <form action="" method="post" id="form_cemac">

        <h1>Gestion des Cemacs</h1>
        <br>
        
        <p>Voici la liste des Cemacs à votre nom : 
        <ul>
         <?php $listCemacs = getCemacUser($_SESSION['userID']) ; 
        foreach ($listCemacs as $listCemac) :?>
        <li><?php echo $listCemac['numero'] ?>
        <?php endforeach; ?></li>
       
        </ul>
        </p>
        <br>

        <p >
            Numéro de la Cemac à ajouter : 
            <input  class ="compte" type="text" name="number" size="50"/>
        </p>
        <br>

        <p>
        Logement associé : 
            <select title="idHouse" name="idHouse" form="form_cemac" class="compte">
                <?php foreach ($houses as $house) : ?>
                    <option value="<?php echo $house['ID_logement'] ?>"><?php echo getHouseAdress($house['ID_logement']); ?></option>
                <?php endforeach; ?>
            </select>
        </p>
        <br>
        <p><input id='ajoutPieceButton' class="form-button" type="submit" value="Ajouter Cemac"/></p>
        
        <div class="supressioncemac">
       
       <p> Numéro de la Cemac à supprimer : <input  class ="compte" type="text" name="numbersuppr" size="50"/></p>
       
       <p><input id='ajoutPieceButton' class="form-button" type="submit" value="Retirer Cemac"/></p> 
      
        
        </div>
        
        
       
        </div>

        
    </form>
</div>

    <?php
$cemacs = getCemacs();
foreach ($cemacs as $cemac){
    $data_tab = get_data($cemac['numero']);
    //IDNumSerie($data_tab);
    
    decode_trame($data_tab, $cemac['numero'] );
}


?>
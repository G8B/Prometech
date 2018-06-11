
<link rel="stylesheet" type="text/css" href="/public/css/mon_compte.css">


<div class="form_logement">
	
		<form action="" method="post">
	
		<h1>Ajouter un logement</h1>
		<br>
				
		<p >
             Adresse :
            <input  class ="compte" type="adress" name="adresse" size="50"/>
        </p>
        <br>
        
        <p >
             Nombres de pieces :
            <input class="compte" type="number" name="nbrPieces"  min = 1 max = 1000 step = 1 size="50" />
        </p>
        <br>
    
        <p >
             Nombre d'habitants :
            <input class="compte" type="number" name="nbrHabitants"  min = 1 max = 1000 step = 1 size="50"/>
        </p>
        <br>
        <p >
            Superficie :
            <input class="compte" type="number" name="superficie"  min = 1 max = 10000 step = 1 size="50"/>
        </p>        
        <br>
        
        <div class="bouton">
        	<button class="form-button">Confirmer</button>
        </div>
        
	</form>
	

	
</div>


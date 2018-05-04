<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="abc.css" />
        <title> ISEP </title>
    </head>

    <body>

        <div id="main_wrapper">
       	    <form action="ajoutSecondUserTreatment.php" method="post">
       	    	
       	    
            <label for="nom"></label>
            <input type="text" name="nom" placeholder="Nom" size="25"/>
        </p>
        <p>
            <label for="prenom"></label>
            <input type="text" name="prenom" placeholder="Prenom" size="25"/>
        </p>
        <p>
            <label for="Email"></label>
            <input type="email" name="email" placeholder="Email" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="mot de passe" id="mot de passe" placeholder="Mot de passe" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Confirmer mot de passe" size="25"/>
        </p>
        
         <input id='createSecondaryUser' class="form-button" type="submit" value="Ajouter l'utilisateur"/>
    	    
       	    </form>

        </div>

    </body>

</html>


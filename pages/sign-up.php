<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="inscription.css" />
</head>
<body>
<center>
    <form method="post" action="signupTreatment.php">

        <p>
            <img src = "original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
        </p>
        <p>
            <label for="nom"></label>
            <input type="name" name="nom" id="nom" placeholder="Nom" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="prenom"></label>
            <input type="name" name="prenom" id="prenom" placeholder="Prénom" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="pseudo"></label>
            <input type="email" name="email" id="email" placeholder="Email" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="adresse"></label>
            <input type="adresse" name="adresse" id="adresse" placeholder="Adresse" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="mot de passe" id="mot de passe" placeholder="Mot de passe" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="password" id="password" placeholder="Confirmer mot de passe" size="25" style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"  />
        </p>
        <p>
            <label for="nom"></label>
            <input type="checkbox" name="choix1" id="choix1"  /> <label for="choix1"> J'utilise des produits Domisep </label> <br />
            <input type="checkbox" name="choix2" id="choix2"/> <label for="choix2"> Je gère un immeuble </label>
        </p>
        <form   action="signupTreatment.php">
            <input id = 'inscription' type="submit" value="S'inscrire >"  style="color:black; background-color:#E67E30; border-radius: 5px; height: 25px;width: 200px; font-weight: bold; margin-bottom: 10px;"/>
        </form>




        <hr width="15%" color="black">

        <form   action="inscription.php">
            <input id ='deja' type="submit" value="Déjà inscrit ? "  style="color:black; background-color:#E67E30; border-radius: 5px; height: 25px;width: 200px; font-weight: bold; margin-top: 10px; margin-bottom: 110px;"/>

</center>

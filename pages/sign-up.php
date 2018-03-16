<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../styles/sign-up.css"/>
    <link rel="stylesheet" href="../styles/login.css"/>
</head>
<body>
<div class="form">
    <form method="post" action="signupTreatment.php">

        <p>
            <img src="../ressources/original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
        </p>
        <p>
            <label for="nom"></label>
            <input type="text" name="nom" placeholder="Nom" size="25"/>
        </p>
        <p>
            <label for="prenom"></label>
            <input type="text" name="prenom" placeholder="Prénom" size="25"/>
        </p>
        <p>
            <label for="pseudo"></label>
            <input type="email" name="email" placeholder="Email" size="25"/>
        </p>
        <p>
            <label for="adresse"></label>
            <input type="text" name="adresse" placeholder="Adresse" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="mot de passe" id="mot de passe" placeholder="Mot de passe" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Confirmer mot de passe" size="25"/>
        </p>
        <p class="form-checkbox">
            <input type="checkbox" name="choix1" id="choix1"/> <label for="choix1"> J'utilise des produits
                Domisep </label> <br/>
            <input type="checkbox" name="choix2" id="choix2"/> <label for="choix2"> Je gère un immeuble </label>
        </p>
        <form action="signupTreatment.php">
            <input id='inscription' class="form-button" type="submit" value="S'inscrire >"/>
        </form>


        <hr width="15%" color="black">

        <form action="../pages/login.php">
            <input class="form-button" type="submit" value="Déjà inscrit ? "/>

</div>

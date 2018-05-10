<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/public/css/sign-up.css"/>
    <link rel="stylesheet" href="/public/css/login.css"/>
    <title><?php echo $title ?></title>
</head>
<body>
<div class="form">
    <form method="post" action="">

        <p>
            <img src="/public/images/original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
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
            <label for="password"></label>
            <input type="password" name="mot de passe" id="mot de passe" placeholder="Mot de passe" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Confirmer mot de passe" size="25"/>
        </p>

        <p class="form-checkbox">
            <input type="checkbox" name="choixUtilisateur" id="choixUtilisateur" value="true"/> <label
                    for="choixUtilisateur"> J'utilise des produits
                Domisep </label> <br/>
            <input type="checkbox" name="choixGestionnaire" id="choixGestionnaire" value="true"/> <label
                    for="choixGestionnaire"> Je gère un immeuble </label>
        </p>


        <input id='inscription' class="form-button" type="submit" value="S'inscrire >"/>
    </form>


    <hr width="15%" color="black">

    <p><a href="/index.php?target=home&page=login">Déjà inscrit ?</a></p>

</div>

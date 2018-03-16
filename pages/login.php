<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../styles/login.css"/>
    <link rel="stylesheet" href="../styles/sign-up.css"/>
</head>
<body>
<div class="form">
    <p>
        <img src="../ressources/original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
    </p>
    <form method="post" action="signInTreatment.php">
        <p >
            <label for="email"></label>
            <input type="email" name="email"  placeholder="Email" size="25"/>
        </p>
        <p >
            <label for="password"></label>
            <input type="password" name="mot_de_passe"  placeholder="Mot de passe" size="25"/>
        </p>
        <p>
            <input class="form-button" type="submit" value="Se connecter >"/>
        </p>
    </form>

    <hr width="15%" color="black">


    <p>

    <form action="sign-up.php">
        <input class="form-button" type="submit" value="S'inscrire >"/>
    </form>
</div>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../styles/sign-up.css"/>
</head>
<body>
<div class="form">
    <p>
        <img src="../ressources/original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
    </p>
    <form method="post" action="signInTreatment.php">
        <p id="email">
            <label for="email"></label>
            <input type="email" name="email" id="email" placeholder="Email" size="25"
                   style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"/>
        </p>
        <p id="mdp">
            <label for="password"></label>
            <input type="password" name="mot_de_passe" id="mot_de_passe" placeholder="Mot de passe" size="25"
                   style="color:black; background-color:#FFCB60; border-radius: 5px; height: 20px;"/>
        </p>
        <p>
            <input id="envoyer" type="submit" value="Se connecter >"
                   style="color:black; background-color:#E29845; border-radius: 5px; height: 25px;width: 200px; font-weight: bold;"/>
        </p>
    </form>

    <hr width="15%" color="black">


    <p>

    <form action="sign-up.php">
        <input id="inscription" type="submit" value="S'inscrire >"
               style="color:black; background-color:#E29845; border-radius: 5px; height: 25px;width: 200px; font-weight: bold;margin-bottom: 340px;"/>
    </form>
</div>


</body>
</html>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="/public/css/sign-up.css"/>
    <link rel="stylesheet" href="/public/css/login.css"/>
    <link rel="icon" type="image/png" href="/public/images/original-logos_2018_Feb_4074-5a815ae404ef4.png" />
    <title><?php echo $title ?></title>
</head>
<body>
<?php echo AfficheAlerte($alerte); ?>
<div class="form">
    <p>
        <img src="/public/images/original-logos_2018_Feb_4074-5a815ae404ef4.png"/>
    </p>
    <form method="post" action="">
        <p>
            <label for="email"></label>
            <input type="email" name="email" placeholder="Email" size="25"/>
        </p>
        <p>
            <label for="password"></label>
            <input type="password" name="password" placeholder="Mot de passe" size="25"/>
        </p>
        <p>
            <input class="form-button" type="submit" value="Se connecter >"/>
        </p>
    </form>

    <hr width="15%" color="black">


    <p><a href="/index.php?target=home&page=signup">S'inscrire</a></p>
</div>

<?php include("home-footer.php"); ?>

</body>
</html>
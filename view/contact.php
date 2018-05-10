<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="/public/css/contact.css">
    <title><?php echo $title ?></title>
</head>
<body>
<?php echo AfficheAlerte($alerte); ?>
<div class="header">
    <a href="/index.php?target=home&page=login" id="logo">
        <img src="/public/images/logopromSideWHITE.png" alt="logoprom Side WHITE" id="whiteLogo"/>
    </a>
</div>

<h1>Nous contacter</h1>


<form method="post" action="">
    <p>
        <label for="email"></label>
        <input type="email" name="email" placeholder="Email" size="25"/>
    </p>
    <p>
        <label for="objet"></label>
        <input type="text" name="objet" placeholder="Objet" size="25"/>
    </p>
    <p>
        <label for="priorite">Priorité : </label><br>
        <select name="priorite" id="priorite">
            <option value="1">Haute</option>
            <option value="2" selected>Moyenne</option>
            <option value="3">Basse</option>
        </select>
    </p>
    <p>
        <label for="message"></label>
        <textarea name="message" id="message" placeholder="Message"></textarea>
    </p>
    <p>
        <input class="form-button" type="submit" value="Envoyer"/>
    </p>
</form>
<?php include("home-footer.php"); ?>
</body>
</html>

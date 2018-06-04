<link rel="stylesheet" href="/public/css/reception.css">
<html>
<body><div id ="reception">
    <h1>Welcome ! </h1></br></br>
    <p> Bienvenue sur notre site  <?php echo $_SESSION['prenom']?> !</br>
        Vous avez <?php echo getNumberProducts($_SESSION['userID'])?> produit(s) actif(s)  dans <?php echo getNumberLogements($_SESSION['userID'])?> logement(s) enregistré(s).
    </p>

</div>
</body></html>


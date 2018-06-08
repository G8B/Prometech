<link rel="stylesheet" href="/public/css/reception.css">
<html>
<body>
<div id="reception">
    <h1>Bonjour <?php echo $_SESSION['prenom'] ?>! </h1><br>
    <p> Bienvenue sur votre interface Domisep !<br>
        Vous avez <?php echo getNumberProducts($_SESSION['userID']) ?> produit(s) actif(s)
        dans <?php echo getNumberLogements($_SESSION['userID']) ?> logement(s) enregistré(s).
    </p>
</div>
</body>
</html>


<link rel="stylesheet" href="/public/css/reception.css">
<html>
<body>
<div id="reception">
    <h1>Bonjour <?php echo $_SESSION['prenom'] ?>! </h1><br>
    <p> Bienvenue sur votre interface de gestionnaire Prométech !<br>
        Vous gérez <?php echo count(getHousesManagement($_SESSION['userID'])) ?> immeubles.
    </p>
</div>
</body>
</html>

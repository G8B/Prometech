<link rel="stylesheet" href="/public/css/reception.css">
<html>
<body>
<div id="reception">
    <h1>Bonjour <?php echo $_SESSION['prenom'] ?> ! </h1><br>
    <p> Bienvenue sur votre interface administrateur Prométech !<br>
        Il y a <?php echo countOpenTickets() ?> ticket(s) ouvert(s).
    </p>
</div>
</body>
</html>

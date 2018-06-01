
<body><div id ="reception">
    <h1>Welcome ! </h1>
    <p> Bienvenue sur notre site  <?php echo $_SESSION['prenom']?> !</p>
    <p> Vous avez <?php echo getNumberProducts($_SESSION['userID'])?> produit(s) actif(s)  dans <?php echo getNumberLogements($_SESSION['userID'])?> logement(s) enregistré(s)
    </p>

</div>



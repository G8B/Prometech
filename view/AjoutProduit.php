<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <link rel="stylesheet" href="/public/css/contact.css">
    <title>Ajout de produit </title>
</head>
<body>

<!--
require_once("User.php");
$User = new User();
$User->setAdresseMail('danystory@hotmail.fr');
$User->rechercheID();
echo $User->getID();
$User->ListeLogement();
$Liste = $User->getListeLogement();
echo $Liste[1]->getIDLogement();
-->

<!--<form method="add" class="modal_content" action="add_product.php"> -->
    <form >
    <label for="NumeroDeSerie">Numéro de série :</label>

    <input type="text" ;name="NumeroDeSerie" id;="NumeroDeSerie"; placeholder="Ex : 9658"; size="30" ;maxlength="10" />

    </br>

    <label>Logement</label>

    <?php
    echo'<select name="choix_logement">';


    //Requete sur les logements
    $req_logements = $bdd->prepare('SELECT ID_logement FROM occupationlogement WHERE ID_utilisateur=1');
    $req_logements->execute(array($_SESSION['userID']));
    $logement = $req_logements->fetch();

    while ($logement = $req_logements->fetch())
    {
    ?>
    <option value="<?php echo $logement['ID_logement']; ?>"> <!--Menu déroulant dynamique avec l'ID des logements-->
        <?php echo $logement['ID_logement']; ?>
    </option>


    <?php  } echo '</select>';    ?>

</form>

</br>

<form >
    <label>Pièce</label>

    <?php
    echo'<select name="choix_piece">';


    //Requete sur les pièces

    $req_piece = $bdd->prepare('SELECT nom FROM pieces INNER JOIN logements ON logements.ID= pièces.ID_logement');
    $req_piece->execute(array($logement['logement']));
    while ($piece = $req_piece->fetch())
    {?>

    <option value="<?php echo $piece['nom']; ?>"> <!--Menu déroulant dynamique avec le nom des pieces-->
        <?php echo $piece['nom']; ?>
    </option>


    <?php } echo '</select>'; ?>


    <form>
        <input type="submit" value="Ajouter produit"  />
    </form>

</form>

</body>
</html>

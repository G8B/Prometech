<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="DocumentCSS.html"/>
    <script>

        function check() {
            var inputs = document.getElementsByTagName('input'),

                inputsLength = inputs.length;
            var caseCochee = 0;
            var longueurNomMatiere = inputs[0].value.length;
            {
            }

            for (var i = 0; i < inputsLength; i++) {
                if (inputs[i].type == 'radio' && inputs[i].checked  ) {
                    caseCochee = caseCochee + 1;

                }

            }
            if (caseCochee == 0){
                alert("Veuillez choisir une requête parmis celle proposées")
                return false;
            }

            if (inputs[0].checked && longueurNomMatiere== 0 ){
                alert("Veuillez choisir un nom pour la matière à ajouter");
                return false;

            }
        }
    </script>

    <title>Formulaire G8</title>
    <meta charset="utf-8">
</head>
<body>


<form name ="myForm" method="post"  onsubmit=" return check()"  action="traitementDuFormulaire.php">
    <label for="matière"> Nom :</label> <input type="text" name="matière" id ="inputMatiere"><br />
    <label for="annee"> Année :</label>
    <select name = "annee" id = "inputAnnee">


        <?php
        $bdd = new PDO('mysql:host=localhost;dbname=TP-APP-G8;charset=utf8', 'root', '');
        $reponse = $bdd->query('SELECT * FROM annee');
        while ($annee = $reponse->fetch()) {?>

            <option value="<?php echo $annee["id"] ?>"><?php echo $annee["Année"]?></option>
        <?php } ?>
    </select>


    <h2> Que souhaitez-vous faire ? </h2>

    <div class="form">


        <input type="radio" name="Choix1" id="Choix1" value="true"/> <label
                for="choix1"> Ajouter une nouvelle matière </label> <br/>
        <input type="radio" name="Choix2" id="Choix2" value="true"/> <label
                for="choix2"> Afficher la liste de matière par année </label><br />
        <input type="radio" name="Choix3" id="Choix3" value="true"/> <label
                for="choix3"> Afficher le nombre de matière par année </label><br />

    </div>

    <input type="submit" class = "form-button"  value="Valider" >
</form>


</body>
</html>
<?php
$bdd = new PDO('mysql:host=localhost;dbname=TP-APP-G8;charset=utf8', 'root', '');

if (isset($_POST['Choix1'])) {
    $req = $bdd->prepare('INSERT INTO matiere(libelle,id_annee) VALUES(:libelle,:id_annee)');
    $req->execute(array(
        'libelle' => $_POST["matière"],
        'id_annee' => $_POST["annee"],

    ));

    echo "Votre matière a été ajouté à la base de données";

}


if (isset($_POST['Choix2'])){


    $reponse = $bdd->query('SELECT libelle FROM matiere ORDER BY id_annee ');
    while ($matiereTriee = $reponse->fetch()) {
        echo  $matiereTriee["libelle"];?>
        </br>
        <?php
    };


    echo "Vous avez choisis d'afficher la liste des matières triés par année.";
}


if (isset($_POST['Choix3'])){

    echo "Vous avez choisis d'afficher le nombre de matières par année.";
    $reponse = $bdd->query('SELECT COUNT(*) FROM matiere WHERE id_annee=1 ');
    $nombreDeMatiereAnnee1 = $reponse->fetch();
        echo "Il y a "+ $nombreDeMatiereAnnee1 +" durant l'annee 1";?>
        </br>
        <?php
    ;

    $reponse = $bdd->query('SELECT COUNT(*) FROM matiere WHERE id_annee=2 ');
    $nombreDeMatiereAnnee2 = $reponse->fetch();
    echo "Il y a "+ $nombreDeMatiereAnnee1 +" durant l'annee 2";?>
    </br>
    <?php
    ;

    $reponse = $bdd->query('SELECT COUNT(*) FROM matiere WHERE id_annee=3 ');
    $nombreDeMatiereAnnee3 = $reponse->fetch();
    echo "Il y a "+ $nombreDeMatiereAnnee1 +" durant l'annee 3";?>
    </br>
    <?php
    ;


}

<?php

$bdd = new PDO('mysql:host=localhost;dbname=prometech;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT email, password, prenom FROM utilisateurs WHERE email = :email');
$req->execute(array(
    'email' => $_POST['email']));
$resultat = $req->fetch();

if (!$resultat) {
    echo 'Identifiant ou mot de passe incorrect';
    header('Location: /view/login.php');
}

if (isset($_POST['mot_de_passe']) && $_POST['mot_de_passe'] == $resultat['mot_de_passe']) {
    session_start();
    $_SESSION['prenom'] = $resultat['prenom'];
    header('Location: /view/user-main.php');

} else { ?>
    <script language="JavaScript">
        window.location.replace("/view/login.php");
        alert("Login ou mot de passe incorrect. Merci de recommencer");
    </script>';
<?php }






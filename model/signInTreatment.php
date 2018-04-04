<?php

$bdd = new PDO('mysql:host=localhost;dbname=membres;charset=utf8', 'root', '');

$req = $bdd->prepare('SELECT email, mot_de_passe, prenom FROM membres WHERE email = :email');
$req->execute(array(
    'email' => $_POST['email']));
$resultat = $req->fetch();

if (!$resultat) {
    echo 'Identifiant ou mot de passe incorrect';
    header('Location: /prometech/view/login.php');
}

if (isset($_POST['mot_de_passe']) && $_POST['mot_de_passe'] == $resultat['mot_de_passe']) {
    session_start();
    $_SESSION['prenom'] = $resultat['prenom'];
    header('Location: /prometech/view/user-main.php');

} else { ?>
    <script language="JavaScript">
        window.location.replace("/prometech/view/login.php");
        alert("Login ou mot de passe incorrect. Merci de recommencer");
    </script>';
<?php }






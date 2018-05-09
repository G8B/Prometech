<div id="sidebar">
    <?php
    switch ($_GET['target']) {
        case 'user' :?>
    <a class="side-button" href="../index.php?target=user&page=myinfos" >Mon compte</a>
    <a class="side-button" href="#">Gestion utilisateurs</a>
    <a class="side-button" href="#">Gestion logements</a>
    <a class="side-button" href="#">Tableau de bord</a>
    <?php break;

        case 'admin' :?>
    <a class="side-button" href="../index.php?target=admin&page=myinfos" >Mon compte</a>
    <a class="side-button" href="#">Gestion produits</a>
    <a class="side-button" href="#">Gestion comptes</a>
    <a class="side-button" href="#">Support</a>
    <a class="side-button" href="#">Logs</a>
    <?php
    }
    ?>


    <ul id="link-footer">
        <li><a href="/index.php?target=home&page=login">Accueil</a></li>
        <li><a href="#">CGU</a></li>
        <li><a href="/index.php?target=home&page=contact">Contact</a></li>
    </ul>
</div>
<div id="sidebar">
    <?php
    switch ($_GET['target']) {
        case 'user' :
            ?>
            <a class="side-button" href="../index.php?target=user&page=myinfos">Mon compte</a>
            <a class="side-button" href="../index.php?target=user&page=logements">Gestion logements</a>
            <a class="side-button" href="../index.php?target=user&page=dashboard">Tableau de bord</a>
            <?php break;

        case 'manager' :
            ?>
            <a class="side-button" href="../index.php?target=manager&page=myinfos">Mon compte</a>
            <a class="side-button" href="../index.php?target=manager&page=gestionImmeubles">Gestion Immeubles</a>
            <a class="side-button" href="../index.php?target=manager&page=dashboard">Tableau de bord</a>
            <?php break;

        case 'admin' :
            ?>
            <a class="side-button" href="../index.php?target=admin&page=myinfos">Mon compte</a>
            <a class="side-button" href="../index.php?target=admin&page=produits">Gestion produits</a>
            <a class="side-button" href="../index.php?target=admin&page=accounts-management">Gestion comptes</a>
            <a class="side-button" href="../index.php?target=admin&page=support">Support</a>
            <a class="side-button" href="../index.php?target=admin&page=logs">Logs</a>
        <?php
    }
    ?>


    <ul id="link-footer">
        <li><a href="<?php echo $home ?>">Accueil</a></li>
        <li><a href="/index.php?target=home&page=mentions-legales">ML</a></li>
        <li><a href="/index.php?target=home&page=contact">Contact</a></li>
    </ul>
</div>
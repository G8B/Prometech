<div class="main-header">
    <a href="<?php echo $home ?>" id="logo">
        <img src="/public/images/logopromSideWHITE.png" alt="logoprom Side WHITE" id="whiteLogo"/>
    </a>
    <a id="bars-button" href="#"><i class="fa fa-bars" id="icon-bars"></i></a>
    <div id="dropdown-user">
        <button id="userProfile-button">
            <i class="fa fa-user-circle" id="icon-user"></i> <br>
            <p id="username"><?php echo $_SESSION['prenom'] ?></p>
        </button>
        <div class="dropdown-content">
            <div class="triangle"></div>
            <div class="drop-element-container">
                <?php if ($_SESSION['user'] == 1 and $_GET['target'] !== "user") : ?>
                    <a href="/index.php?target=user" class="dropdown-element">Interface Client</a>
                <?php endif;
                if ($_SESSION['admin'] == 1 and $_GET['target'] !== "admin") : ?>
                    <a href="/index.php?target=admin" class="dropdown-element">Interface Administrateur</a>
                <?php endif;
                if ($_SESSION['gestionnaire'] == 1 and $_GET['target'] !== "manager") : ?>
                    <a href="/index.php?target=manager" class="dropdown-element">Interface Gestionnaire</a>
                <?php endif; ?>
                <a href="/index.php" class="dropdown-element disconnect">Déconnexion</a>
            </div>
        </div>
    </div>
</div>

<script>
    $('#userProfile-button').click(function () {
        $('.dropdown-content').toggle();
    });
</script>
<div class="main-header">
    <a href="#" id="logo">
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
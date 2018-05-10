<div id="user-compte">

    <form action="" method="post">
        <?php $h1 = isset($id) ? "Compte n° " . $id : "Mon compte"; ?>

        <h1><?php echo $h1; ?></h1>
        <br>

        <p>
            Nom :
            <input class="compte" type="text" name="newnom" placeholder="<?php echo $userInfos['nom'] ?>" size="25"/>
        </p>
        <br>
        <p>
            Prenom :
            <input class="compte" type="text" name="newprenom" placeholder="<?php echo $userInfos['prenom'] ?>"
                   size="25"/>
        </p>
        <br>
        <p>
            Email :
            <input class="compte" type="email" name="newmail" placeholder="<?php echo $userInfos['email'] ?>"
                   size="25"/>
        </p>
        <br>
        <?php if (!isset($id)) : ?>
            <p>
                Mot de passe actuel :
                <input class="compte" type="password" name="mdpactuel" placeholder="Actual password" size="25"/>
            </p>
            <br>
            <p>
                Nouveau mot de passe:
                <input class="compte" type="password" name="newmdp1" placeholder="New password" size="25"/>
            </p>
            <br>
            <p>
                Confirmer nouveau mot de passe:
                <input class="compte" type="password" name="newmdp2" placeholder="New password" size="25"/>
            </p>
        <?php else : ?>
            <p>
                Type de compte : <br/>
                <input type="checkbox" name="choixUtilisateur" id="choixUtilisateur" value="true" checked/> <label for="choixUtilisateur"> Client </label> <br/>
                <input type="checkbox" name="choixGestionnaire" id="choixGestionnaire" value="true"/> <label for="choixGestionnaire"> Gestionnaire </label> <br/>
                <input type="checkbox" name="choixAdmin" id="choixAdmin" value="true"/> <label for="choixAdmin"> Administrateur </label> <br/>
            </p>
        <?php endif; ?>
        <div class="bouton">
            <button class="form-button">Confirmer</button>
        </div>
    </form>
</div>

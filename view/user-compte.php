<div id="user-compte">

    <form action="" method="post" id="form">
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
            <p>
                Type de compte : <br/>
                <input type="checkbox" name="typesCompte[]" id="choixUtilisateur"
                       value="client" <?php if ($userInfos['statutClient']) {
                    echo "checked";
                } ?>/> <label for="choixUtilisateur"> Client </label> <br/>
                <input type="checkbox" name="typesCompte[]" id="choixGestionnaire"
                       value="gestionnaire" <?php if ($userInfos['statutGestionnaire']) {
                    echo "checked";
                } ?>/> <label for="choixGestionnaire"> Gestionnaire </label> <br/>
                <input type="checkbox" name="typesCompte[]" id="choixAdmin"
                       value="admin" <?php if ($userInfos['statutAdmin']) {
                    echo "checked";
                } ?>/> <label for="choixAdmin"> Administrateur </label> <br/>
            </p>

            <div class="bouton">
                <button class="form-button supprimer confirm-delete-btn" type="button">Supprimer</button>
            </div>

            <div id="confirmationModale" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <h1>Êtes vous sûr de vouloir supprimer ce compte ?</h1>
                    <h2>Cette action est irréversible !</h2>
                    <div style="margin-left: 20%;">
                        <button type="button" class="form-button confirm-delete-btn" id="deleteElement">Supprimer
                        </button>
                        <button type="button" class="form-button" id="cancel">Annuler</button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="bouton">
            <button class="form-button">Confirmer</button>
        </div>
    </form>
</div>

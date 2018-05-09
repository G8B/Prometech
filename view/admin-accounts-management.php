<div class="table">

    <div class="row header">
        <div class="cell">
            ID
        </div>
        <div class="cell">
            Nom
        </div>
        <div class="cell">
            Prénom
        </div>
        <div class="cell">
            Email
        </div>
        <div class="cell">
            Type de compte
        </div>
        <div class="cell">
            Éditer
        </div>
    </div>

    <?php
    foreach ($accounts as $account) : ?>

        <div class="row result">
            <div class="cell" data-title="ID">
                <?php echo $account['ID'] ?>
            </div>
            <div class="cell" data-title="Nom">
                <?php echo $account['nom'] ?>
            </div>
            <div class="cell" data-title="Prénom">
                <?php echo $account['prenom'] ?>
            </div>
            <div class="cell" data-title="Email">
                <?php echo $account['email'] ?>
            </div>
            <div class="cell" data-title="Type de compte">
                <?php
                if ($account['statutClient'] == 1)
                    echo "Client ";
                if ($account['statutGestionnaire'] == 1)
                    echo "Gestionnaire  ";
                if ($account['statutAdmin'] == 1)
                    echo "Administrateur ";
                if ($account['statutSubordonne'] == 1)
                    echo "Compte subordonné ";
                ?>
            </div>
            <div class="cell">
                <a href="#"><i class="fas fa-pencil-alt"></i></i></a>
            </div>
        </div>

    <?php endforeach; ?>

</div>
<div id="dashboard-nav">
    <a class="dashboard-nav-link" href="index.php?target=user&page=dashboard&spage=capteur_piece"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link active" href="index.php?target=user&page=dashboard-conso&spage=graph_conso"><i class="fas fa-chart-bar"></i></a>
</div>


<?php
        $k=0;
        foreach ($houses as $houseconso):?>
            <div class="user-house-dashboard">
                </br>
                <h1 class="user-house-name"><?php echo getHouseAdress($houseconso['ID_logement']);?></h1>
                </br>
                <div class="accordion-tab">
                    <h2 class="type_conso">Variation intensité lumineuse</h2>
                    <div class="product-grid-conso">
                        <?php echo "Ajouter graphique variation intensité lumineuse";?>
                    </div>
                </div>
                <div class="accordion-tab">
                    <h2 class="type_conso">Fréquence d'allumage de la LED</h2>
                    <div class="product-grid-conso">
                        <?php echo "Ajouter graphique fréquence d'allumage de la LED";?>
                    </div>
                </div>
            </div>
            <?php $k++;
        endforeach; ?>

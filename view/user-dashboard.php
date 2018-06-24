<div id="dashboard-nav">
    <a class="dashboard-nav-link active" href="../index.php?target=user&page=dashboard&spage=capteur_piece"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="../index.php?target=user&page=dashboard-conso&spage=graph_conso"><i class="fas fa-chart-bar"></i></a>
</div>

<?php
if(!isset($_GET['spage'])){
    $_GET['spage'] = '';
}

$i = 0;
foreach ($houses as $house) : ?>
    <div class="user-house-dashboard">
        <br>
        <h1 class="user-house-name"><?php echo getHouseAdress($house['ID_logement']); ?></h1>
        <br>
        <?php $rooms = getRooms($house['ID_logement']);
        $j = 0;
        foreach ($rooms as $room) : ?>
            <div class="accordion-tab">
                <input id="accordion<?php echo $i ?>-tab-<?php echo $j ?>" type="radio" name="accordion<?php echo $i ?>"
                       checked>
                <label for="accordion<?php echo $i ?>-tab-<?php echo $j ?>"><?php echo getRoomName($room['ID']); ?></label>
                <div class="accordion-tab-content">
                    <div class="product-grid">
                        <?php $products = getProducts($room['ID']);
                        foreach ($products as $product) : ?>
                            <div class="product-box">
                                <?php echo getProductInfos($product['numeroDeSerie'])['nom'] ?>
                                <i class="<?php echo getIcon(getProductInfos($product['numeroDeSerie'])['modele']) ?>" > </i>
                            </div>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php
            $j++;
        endforeach; ?>
    </div>
    <?php
    $i++;

endforeach; ?>

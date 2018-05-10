<div id="dashboard-nav">
    <a class="dashboard-nav-link current-dashboard" href="#"><i class="fas fa-sliders-h"></i></a>
    <a class="dashboard-nav-link" href="#"><i class="fas fa-chart-bar"></i></a>
</div>
<?php
$i = 0;
foreach ($houses as $house) : ?>
    <div class="user-house-dashboard">
        <h1 class="user-house-name"><?php echo getHouseAdress($house['ID_logement']); ?></h1>
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
                            <div class="product-box"><?php echo getProductInfos($product['numeroDeSerie'])['nom'] ?></div>
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
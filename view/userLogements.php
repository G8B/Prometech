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
<div class="user-house-dashboard">
    <h1 class="user-house-name">Logement 2</h1>
    <div class="accordion-tab">
        <input id="accordion2-tab-one" type="radio" name="accordion2" checked>
        <label for="accordion2-tab-one">Salon</label>
        <div class="accordion-tab-content">
            <div class="product-grid">
                <div class="product-box">Capteur 1</div>
                <div class="product-box">Actionneur 1</div>
                <div class="product-box">Capteur 2</div>
                <div class="product-box">Actionneur 2</div>
            </div>
        </div>
    </div>
    <div class="accordion-tab">
        <input id="accordion2-tab-two" type="radio" name="accordion2">
        <label for="accordion2-tab-two">Chambre Parents</label>
        <div class="accordion-tab-content">
            <div class="product-grid">
                <div class="product-box">Capteur 1</div>
                <div class="product-box">Actionneur 1</div>
                <div class="product-box">Capteur 2</div>
                <div class="product-box">Actionneur 2</div>
            </div>
        </div>
    </div>
    <div class="accordion-tab">
        <input id="accordion2-tab-three" type="radio" name="accordion2">
        <label for="accordion2-tab-three">Chambre Enfants</label>
        <div class="accordion-tab-content">
            <div class="product-grid">
                <div class="product-box">Capteur 1</div>
                <div class="product-box">Actionneur 1</div>
                <div class="product-box">Capteur 2</div>
                <div class="product-box">Actionneur 2</div>
            </div>
        </div>
    </div>

</div>


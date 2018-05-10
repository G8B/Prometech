<?php
$i = 0;
foreach ($houses as $house) : ?>
<div class="user-house-dashboard">
    <h1 class="user-house-name"><?php echo getHouseAdress($house)['adresse']; ?></h1>
    <div class="accordion-tab">
        <input id="accordion<?php echo $i ?>-tab-one" type="radio" name="accordion<?php echo $i ?>" checked>
        <label for="accordion<?php echo $i ?>-tab-one">Salon</label>
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
        <input id="accordion<?php echo $i ?>-tab-two" type="radio" name="accordion<?php echo $i ?>">
        <label for="accordion<?php echo $i ?>-tab-two">Chambre Parents</label>
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


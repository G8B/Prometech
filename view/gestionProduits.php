<?php echo AfficheAlerte($alerte);?>
<link rel="stylesheet" type="text/css" href="/public/css/products.css">

<div id="main-wrap">
    <?php $Models = getModelsList(); ?>

    <div class="products" id="productsList">
        <h2>Liste des modèles disponibles</h2>
        <table id="test">
            <?php foreach ($Models as $Model) : ?>
                <tr>
                    <td><i class="<?php echo getIcon($Model['modele']) ?>"></i><?php echo $Model['modele']; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>

    <div class="products" id="product-form">

        <form action="" method="post">

            <div class="products" id="icons">
                <p>Voici la liste de icônes possibles : </p><br>
                <table>
                    <?php $icons = listIcons();
                    $i = 0;
                    $indexes = array();
                    ?>
                    <?php foreach ($icons as $icon) : $i++;
                        array_push($indexes, $i) ?>
                        <tr>
                            <td><?php echo $i . ". "; ?><i class="<?php echo $icon; ?>"></i></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
                <br>
            </div>

            <div class="Add">
                <input type="text" name="addModel" id="addModel" placeholder="Nom du modèle" class="add"> <br>
                <select id="iconsList" name="iconsList">
                    <?php foreach ($indexes as $index) : ?>
                        <option value="<?php echo $index; ?>"> <?php echo $index; ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <button><i class="fa fa-plus"> Ajouter un modèle </i></button>
            </div>

            <div class="remove">
                <select name="removeModel">
                    <option></option>
                    <?php foreach ($Models as $Model) : ?>
                        <option><?php echo $Model['modele'] ?></option>
                    <?php endforeach; ?>
                </select>

                <button><i class="fa fa-minus"> Supprimer un modèle </i></button>


            </div>

        </form>
    </div>

</div>

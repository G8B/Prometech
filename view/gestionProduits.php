<link rel="stylesheet" type="text/css" href="/public/css/products.css">

<div id="main-wrap">

	<div class="products" id="productsList">
		<h2>Liste des produits disponibles</h2>
	
	</div>
	
	<div class="products" id="product-form">
	
		<form action="" method="post">
			<div class="Add">
				<input type="text" name="addModel" placeholder="Nom du modèle" class="add"> 
				<button ><i class="fa fa-plus"> Ajouter un modèle </i></button>
			</div>
			
			<div class="remove">
			<?php $Models = getModels()?>
				<select name ="removeModel" >
					<option></option>
					<?php foreach ($Models as $Model) :?>
					<option><?php  echo $Model['modele']?></option>
					<?php endforeach;?>
				</select>
				
				<button><i class="fa fa-minus"> Supprimer un modèle </i></button>
			
			
			</div>

		</form>
	</div>



</div>
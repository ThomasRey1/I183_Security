<div class="container">

	<h2>Ajouter un article</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form method="post" enctype="multipart/form-data" action="index.php?controller=admin&action=update&id=<?php echo $id; ?>">
				<div class="form-group">
					<label for="productName">Nom de l'article</label>
					<input name="productName" type="text" class="form-control" id="productName" value="<?php echo $product[0]['proName']; ?>" />
				</div>
				<div class="form-group">
					<label for="productDescription">Description</label>
					<textarea name="productDescription" class="form-control" id="productDescription"><?php echo $product[0]['proDescription']; ?></textarea>
				</div>
				<div class="form-group">
					<label for="productPrice">Prix</label>
					<input name="productPrice" type="text" class="form-control" id="productPrice" value="<?php echo $product[0]['proPrice']; ?>" />
				</div>
				<div class="form-group">
					<label for="productQuantity">Stock</label>
					<input name="productQuantity" type="number" class="form-control" id="productQuantity" value="<?php echo $product[0]['proQuantity']; ?>" />
				</div>
				<div class="form-group">
					<label for="productCategory">Catégory</label>
					<select id="productCategory" name="productCategory" class="form-control">
						<option>-- Choisir --</option>
						<?php
						foreach($categories as $category) {
							if($category['idCategory'] == $product[0]['idCategory']) {
								echo '<option value="' . htmlspecialchars($category['idCategory']) .'" selected="true">' . htmlspecialchars($category['catName']) . '</option>';
							} else {
								echo '<option value="' . htmlspecialchars($category['idCategory']) .'">' . htmlspecialchars($category['catName']) . '</option>';
							}
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="productFile">Image du produit</label>
					<input name="productFile" type="file" id="productFile">
				</div>
				<button type="submit" class="btn btn-default">Enregistrer</button>
			</form>
		</div>
	</div>
</div>

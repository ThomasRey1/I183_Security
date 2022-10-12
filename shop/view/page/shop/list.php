<div class="container">

	<h2>Liste des articles</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<?php
		foreach ($products as $product) {
			echo '<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">';
			echo '<div class="boxProduct">';
			echo '<div class="nameProduct"><h4>' . htmlspecialchars($product['proName']) . '</h4></div>';
			echo '<div class="imageProduct"><img src="scriptImage.php?image=' . htmlspecialchars($product['proImage']) . '"/></div>';
			echo '<div class="priceProduct">CHF ' . htmlspecialchars($product['proPrice']) . '</div>';
			echo '<a class="btn btn-default" href="index.php?controller=shop&action=detail&id=' . htmlspecialchars($product['idProduct']) . '">Détail</a>';
			echo '</div>';
			echo '</div>';
		}
		?>

	</div>
</div>
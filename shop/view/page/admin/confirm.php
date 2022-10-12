<div class="container">

	<h2>Administration des articles</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php
			if($text != "") {
				echo "Votre produit a été " . htmlspecialchars($text);
			} else {
				echo "Une erreur s'est produite";
			}
		?>
		<p><a href="index.php?controller=admin&action=index">Retour à la liste des produits [ADMIN]</a></p>
		</div>
</div>

<div class="container">

	<h2>
		<?php
			echo htmlspecialchars($product[0]['proName']);
		?>
	</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php
			echo '<p>' . htmlspecialchars($product[0]['proDescription']) . '</p>';
			echo '<p>Encore : ' . htmlspecialchars($product[0]['proQuantity']) . ' en stock</p>';

		?>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php
			echo '<img src="scriptImage.php?image=' . htmlspecialchars($product[0]['proImage']) . '"/>';
		?>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php
			echo '<p> CHF : ' . htmlspecialchars($product[0]['proPrice']) . '</p>';

			if($product[0]['proLike'] > 0) {
				echo '<p>Ce produit est aimée déjà  <strong>' . htmlspecialchars($product[0]['proLike']) . '</strong> fois ! </p>';
			}
		?>
		</div>
	</div>
</div>
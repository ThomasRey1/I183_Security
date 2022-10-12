<div class="container">

	<h2>Administration des articles</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div>
				<a href="index.php?controller=admin&action=formAdd" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un article</a>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Description</th>
						<th>Prix</th>
						<th>Stock</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($products as $product) {
						echo '<tr>';
							echo '<td>' . htmlspecialchars($product['idProduct']) . '</td>';
							echo '<td>' . htmlspecialchars($product['proName']) . '</td>';
							echo '<td>' . htmlspecialchars($product['proDescription']) . '</td>';
							echo '<td>CHF ' . htmlspecialchars($product['proPrice']) . '</td>';
							echo '<td>' . htmlspecialchars($product['proQuantity']) . '</td>';
							echo '<td>';
								echo '<a class="btn btn-default" href="index.php?controller=admin&action=formUpdate&id=' . htmlspecialchars($product['idProduct']) . '"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
								echo '<a onclick="return confirm(\'Etes-vous sûr ? \')" class="btn btn-default" href="index.php?controller=admin&action=remove&id=' . htmlspecialchars($product['idProduct']) . '"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>';
							echo '</td>';
						echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

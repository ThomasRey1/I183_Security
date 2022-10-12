<div class="container">

	<h2>Administration des utilisateurs</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div>
				<a href="notImplemented" onclick="alert('pas implémenté'); return false" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur</a>
			</div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Login</th>
					</tr>
				</thead>
				<tbody>
				<?php
					foreach ($users as $userTab ) {
                        echo '<tr>';
                        foreach ($userTab as $user ) {

                                echo '<td>';
                                echo htmlspecialchars($user);
                                echo '</td>';

                        }
                        echo '</tr>';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<div class="container">

	<h2>Se connecter</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form method="post" action="index.php?controller=login&action=login">
			<?php $_SESSION['token'] = [md5(uniqid(mt_rand(), true)) => date("d/m/y:h:i")];

				foreach($_SESSION['token'] as $key => $value){                              

					$lastToken = $key;
				}
				?>
				<input type="hidden" id="csrf-token" name="token" value="<?=$lastToken?>"/>

				<div class="form-group">
					<label for="login">Login</label>
					<input name="login" type="text" class="form-control" id="login">
				</div>
				<div class="form-group">
					<label for="password">Mot de passe</label>
					<input name="password" type="password" class="form-control" id="password">
				</div>
				<button type="submit" class="btn btn-default">Se connecter</button>
			</form>
		</div>
	</div>
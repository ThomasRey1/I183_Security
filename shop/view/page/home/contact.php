<div class="container">

	<h2>Contact</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<form action="" method="post">
				<div id="captchaBackground">
					<input type="text" name="Name" id="Name" placeholder="Name"><br>
					<input type="text" name="Email" id="Email" placeholder="Email"><br>
					<textarea name="message" id="message" placeholder="message" cols="30" rows="10"></textarea><br>
					<div>
					<canvas id="captcha">captcha text</canvas><br>
					<input id="textBox" type="text" name="text">
					<div id="buttons">
						<input id="submitButton" type="submit">
						<button id="refreshButton" type="submit">Refresh</button>
					</div>
					</div>
					<span id="output"></span>
				</div>
			</form>
			<input class="btn btn-default" onclick="showEmail()" type="button" value="Clicquez pour afficher l'email pour nous contacter">
			<p id="Email"></p>
		</div>
	</div>
</div>
<script src="resources/js/script.js"></script>
<script src="resources/js/capcha.js"></script>


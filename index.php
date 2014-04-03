<!DOCTYPE html >
<html>
<head>
	<?php 
		include 'accesso.php';

	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VolterraOrganizations</title>
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="img/logo.png" />
</head>
<body>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40230484-2', 'altervista.org');
		  ga('send', 'pageview');

	</script>
	<div class="row-fluid">
		<div class="span10 offset1">
			<div class="row-fluid">
					<div class="span10">
						<h1>Organizzazione scolastica Vito Volterra</h1>
						<p>Se sei uno studente del Volterra Sandonatese, registrati con i tuoi dati e iscriviti alle proposte offerte dalla organizzazione!</p>
					</div>
			</div>
			<div class="row-fluid">
					<div class="span6">
						<form method="post" action="?login" class="">
							<div class="control-group">
								<label class="control-label">Mail:</label>
								<div class="controls">
									<input type="text" name="mail" />
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Password:</label>
								<div class="controls">
									<input type="password" name="password"/>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button type="submit" class="btn">LOGIN</button>
								</div>
							</div>
						</form>
						<a href="registrazione.html.php">Registrati</a><br>
						<a href="recuperoPassword.php">Hai dimenticato la password?</a>
					</div>
			</div>
			<div class="row-fluid">
					<div class="span10">
						<p style="color:red"><em>Cerchiamo sviluppatori che siano in grado di programmare in HTML5/CSS3/PHP/MYSQL</em> Se siete interessati scrivete <a href="mailto:riccardo.pasianotto@gmail.com">qui</a></p>
						<p>Cerchiamo anche grafici che vogliano collaborare per una migliore realizzazione grafica!</p>
					</div>
			</div>
		</div>
	</div>
</body>


</html>
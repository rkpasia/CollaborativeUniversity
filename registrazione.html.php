<!DOCTYPE html >
<html>
<head>
	<?php 
		include 'registrazione.php';
		include 'analytics.php';
	?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VolterraOrganizations</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="img/logo.png" />
</head>
<body>
	<script src="http://code.jquery.com/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-collapse.js"></script>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40230484-2', 'altervista.org');
		  ga('send', 'pageview');

	</script>

	<div class="row-fluid">
		<div class="span10 offset1 alert alert-info">
			<a href="index.php">Home</a>
			<h3>Modulo di registrazione:</h3>
			<div id="registrazione"	>
				<form class="form-horizontal" method="POST" action="?registrazione">
					<div class="control-group">
						<label class="control-label">Nome</label>
						<div class="controls">
							<input type="text" name="nome"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Cognome</label>
						<div class="controls">
							<input type="text" name="cognome"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Mail</label>
						<div class="controls">
							<input type="text" name="mail"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Classe</label>
						<div class="controls">
							<input size=2 type="text" name="classe"/>(es 5A)
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Password</label>
						<div class="controls">
							<input type="password" name="password"/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Conferma password</label>
						<div class="controls">
							<input type="password" name="verificaPassword"/>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-info" type="submit">Registrati</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>


</html>
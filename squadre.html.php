<!DOCTYPE html >
<html>
<head>
	<?php 
		include 'connessione.php';
		include 'controlloAccesso.php';
		include 'functions.php';
		include 'iscrizione.php';
		include 'adfunctions.php';
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
	
	<?php menu(); ?>

	<div class="row-fluid">
		<div class="span12">
			<div class="row-fluid">
				<div class="span10 offset1">
					<h3>Iscrizione Squadre:</h3>
					<p class="alert alert-info">Iscrivi la tua squadra ad un attività specifica</p>

						<form class="form-horizontal" action ="?regSquadra" method="post">
							<div class="control-gorup">
								<label class="control-label">Nome Squadra</label>
								<div class="controls">
									<input type="text" name="nomeSquadra"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Numero Componenti</label>
								<div class="controls">
									<input type="text" maxlength="2" name="numeroComponenti"/>
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Classe Squadra</label>
								<div class="controls">
									<input maxlength="2" type="text" name="classeSquadra"/>(es 5A)
								</div>
							</div>
							<div class="control-group">
								<label class="control-label">Attività</label>
								<div class="controls">
									<select name="activity"><?php opzioniRuoli(); ?></select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button class="btn" type="submit">Iscrivi</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		<?php descrizioneTornei(); ?>
		</div>
	</div>
</body>


</html>
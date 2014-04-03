<!DOCTYPE html >
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>VolterraOrganizations</title>
	<link href="css/bootstrap.css" rel="stylesheet" media="screen">
	<link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
	<link href="style.css" type="text/css" rel="stylesheet" />
	<link rel="shortcut icon" href="img/logo.png" />
</head>
<body>
	<?php 
		include 'connessione.php';
		include 'controlloAccesso.php';
		include 'functions.php';
		
		include 'adfunctions.php';
	?>
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

	<?php 

		menu(); 
		include 'iscrizione.php';

	?>

	<div class="row-fluid">
		<div class="span10 offset1">
			<?php specializzazioneStaff();?>
			<div class="row-fluid">
				<div class="span10 offset1">
					<h3>Prendi parte all'organizzazione della festa di fine anno, successivamente scegli quale attività vuoi organizzare!</h3>	
					<p>Se hai suggerimenti per attività da svolgere all'aperto scrivi a: <em>riccardo.pasianotto@gmail.com</em> </p>
					<p class="alert alert-info">Alcune attività hanno raggiunto il numero massimo di iscritti</p>
				</div>
			</div>
			<div class="row-fluid">
				<div class="span10 offset1">
					<h3>Modulo di iscrizione:</h3>
						<form action ="?regStaff" method="post">
							<input type="submit" class="btn" value="Staff specializzato"/>
						</form>	
						<form action="?specializzazione" method="post">
							<input type="submit" class="btn" value="Sono già registrato ma non specializzato"/>
						</form>
						<form action="?affariGenerali" method="post">
							<input type="submit" class="btn" value="Staff organizzazzione generale"/>
						</form>
				</div>
			</div>
			<?php descrizioneRuoli(); ?>
		</div>
	</div>
</body>


</html>
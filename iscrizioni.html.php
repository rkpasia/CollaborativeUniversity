<!DOCTYPE html >
<html>
<head>
	<?php
		include 'functions.php';
		include 'connessione.php';
		include 'adfunctions.php';
		include 'controlloAccesso.php';
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

	<?php 
		if($_SESSION['squadra']){
			echo('<p class="alert alert-success text-center">Grazie di aver inviato la tua richiesta</p>');
			$_SESSION['squadra']=false;
		}
		if($_SESSION['iscrizione']){
			echo('<p class="alert alert-success text-center">Grazie per la tua collaborazione</p>');
			$_SESSION['iscrizione']=false;
		}
	?>


	<div class="row-fluid">
		<div class="span10 offset1 alert alert-info">
					<h3>Benvenuto nella nuova versione del sito</h3>
					<p>Troverai tutto ciò che ti serve nelle varie sezioni sopraelencate!</p>
		</div>
	</div>
	<?php stampaNews();?>
</body>


</html>
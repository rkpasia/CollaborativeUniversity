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
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
</head>
<body>
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="fancybox/source/jquery.fancybox.js"></script>
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
		<div class="span10 offset1">
			<p class="alert alert-info text-center">AVETE A DISPOSIZIONE UN SOLO VOTO</p>
			<?php votazioniMaglie(); ?>
		</div>
	</div>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".fancybox").fancybox();
		});
	</script>
</body>


</html>
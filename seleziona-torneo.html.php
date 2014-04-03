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
						<form class="form-horizontal" action ="?regTorneo" method="post">
							<div class="control-group">
								<label class="control-label">Attività</label>
								<div class="controls">
									<select name="activity"><?php opzioniRuoli(); ?></select>
								</div>
							</div>
							<div class="control-group">
								<div class="controls">
									<button class="btn" type="submit">Seleziona</button>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</body>


</html>
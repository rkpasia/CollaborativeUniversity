<!DOCTYPE html >
<html>
<head>
	<?php 
		include 'connessione.php';
		include 'iscrizione.php';
		include 'controlloAccesso.php';
	?>
	<meta charset="utf-8">
	<title>VolterraOrganizations</title>
	<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
	<script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-40230484-2', 'altervista.org');
		  ga('send', 'pageview');

		</script>

	<h1><a href="iscrizioni.html.php">Organizzazione scolastica Vito Volterra</a>>Iscrizione Calcetto</h1>

	<form method="post" action="?regCalcetto">
		Giochi in una squadra di calcio con un associazione a livello agonistico?<br>
		<input type="text" size="50" name="esperienza"/><br>
		In che ruolo vuoi proporti?<br>
		<input type="text" name="ruolo"/><br>
		<button type="submit" >Invia Richiesta</button>
	</form>


</body>


</html>
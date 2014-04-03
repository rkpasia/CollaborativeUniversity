<?php
	
	if(isset($_REQUEST['ordinaMaglia'])){
		if(!$_COOKIE['ordine']){
			$sql='INSERT INTO ORDINI SET codice_utente="'.$_SESSION['id'].'",taglia="'.$_REQUEST['taglia'].'"';
			$pdo->exec($sql);
			echo('<p class="alert alert-success text-center">Il tuo ordine è stato effettuato correttamente</p>');
		}else{
			echo('<p class="alert text-center alert-error">Hai già ordinato la tua maglietta</p>');
		}
		setcookie('ordine',1,time()+60*60*60*30);
		//header('Location: iscrizioni.html.php');
	}

	if(isset($_REQUEST['add'])){
		$sql = 'UPDATE MAGLIE SET voto = voto + 1 WHERE codice_maglia="'.$_GET['codice_maglia'].'"';
		$pdo->exec($sql);
		setcookie("voted",1,time()+60*60*60*30);
		header('Location: vota-t-shirt.html.php');
	}

	if(isset($_REQUEST['recuperoPassword'])){
		$sql = 'SELECT password FROM UTENTI WHERE mail="'.$_REQUEST['mail'].'"';
		$result = $pdo->query($sql);
		$dati = $result->fetch();
		$password = $dati['password'];
		$headers = "From: riccardo.pasianotto@gmail.com\r\n" .
			    "Reply-To: riccardo.pasianotto@gmail.com\r\n" .
			    'X-Mailer: PHP/' . phpversion();
		mail($_REQUEST['mail'],'Recupero Password',"Ecco la tua password:\r\n".$password,$headers);
		header('Location: index.php');
	}

	/*-------------------------------*/
	//
	//
	//
	//			FUNCTION
	//
	//
	//
	/*-------------------------------*/


	function menu(){
		echo('
		<div class="row-fluid">
			<div class="span10 offset1">
						<div class="navbar">
						  <div class="navbar-inner">
						    <div class="container">
						 
						      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
						      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						        <span class="icon-bar"></span>
						      </a>
						 
						      <!-- Be sure to leave the brand out there if you want it shown -->
						      <ul class="nav">
							     <li class="dropdown-toggle">
							      <a class="dropdown-toggle brand" href="#" data-toggle="dropdown">'.$_SESSION['nome'].'</a>
								    <ul class="dropdown-menu">
								      <li><a href="index.php">Home</a></li>
								      <li><a href="#">Il mio account</a><li>
								      <li><a href="logout.php">Logout</a><li>
								    </ul>
						 	  	 </li>
								</ul>
						      <!-- Everything you want hidden at 940px or less, place within here -->
						      <div class="nav-collapse collapse">
						        <!-- .nav, .navbar-search, .navbar-form, etc -->
						        <ul class="nav">
						        	<li><a href="staff.html.php">STAFF</a></li>
						        	<li><a href="#">SQUADRE</a></li>
						        	<li class="dropdown">
									    <a class="dropdown-toggle" href="#" data-toggle="dropdown">T-SHIRT</a>
									    <ul class="dropdown-menu">
									      <li><a href="ordine-t-shirt.html.php">Ordina</a><li>
									    </ul>
								  	</li>
								  	'.staffMenu().adminMenu().'
						        </ul>
						      </div>
						 
						    </div>
						  </div>
						</div>
					</div>
				</div>
		');
	}



	function adminMenu(){
		if($_SESSION['admin']){
			return('
					<li class="dropdown">
					    <a class="dropdown-toggle" href="#" data-toggle="dropdown">MENU ADMIN</a>
					    <ul class="dropdown-menu">
					      <li><a href="admin.html.php?utentiIscritti">Utenti Iscritti</a></li>
					      <li><a href="admin.html.php?staffRequest">Staff Iscritto</a></li>
					      <li><a href="admin.html.php?descrizioneRuoli">Attività</a></li>
					      <li><a href="admin.html.php?inserimentoRuolo">Aggiungi attività</a></li>
					      <li><a href="admin.html.php?descrizioneTornei">Tornei</a></li>
					      <li><a href="admin.html.php?inserimentoTorneo">Aggiungi torneo</a></li>
					      <li><a href="admin.html.php?mailBlock">Mail</a></li>
					      <li><a href="admin.html.php?inserimentoNews">News</a></li>
					      <li><a href="admin.html.php?numeroOrdini">Ordini</a></li>
					    </ul>
				  	</li>
				');
		}
	}

	function staffMenu(){
		if($_SESSION['staff']){
			return('
					<li class="dropdown">
					    <a class="dropdown-toggle" href="#" data-toggle="dropdown">MENU STAFF</a>
					    <ul class="dropdown-menu">
					      <li><a href="#">Colleghi</a></li>
					      <li><a href="#">Comunicazioni</a><li>
					    </ul>
				  	</li>
				');
		}
	}


	function opzioniRuoli(){
			include 'connessione.php';
			$sql = 'SELECT nome_torneo,codice_torneo FROM TORNEI';
			$result = $pdo->query($sql);
			while($dati = $result->fetch()){
				$nome_torneo[] = $dati['nome_torneo'];
				$codice_torneo[] = $dati['codice_torneo'];
			}
			for($i=0;$i<count($nome_torneo);$i++){
				echo('<option value="'.$codice_torneo[$i].'">'.$nome_torneo[$i].'</option>');
			}
		}


	function descrizioneRuoli(){
		include 'connessione.php';
		$sql = 'SELECT nome_ruolo,descrizione_ruolo FROM RUOLI';
		$result = $pdo->query($sql);
		while($dati = $result->fetch()){
			$nome_ruolo[] = $dati['nome_ruolo'];
			$descrizione_ruolo[] = $dati['descrizione_ruolo'];
		}
		echo('
				<div class="row-fluid">
					<div class="span10 offset1">
						<h3> Attività presenti:</h3>
			');
		for($i=0;$i<count($nome_ruolo);$i++){
			echo('<div class="span12"><strong>'.$nome_ruolo[$i].'</strong><br>'.$descrizione_ruolo[$i].'</div>');
		}
		echo('</div></div>');
	}

	function descrizioneTornei(){
		include 'connessione.php';
		$sql = 'SELECT nome_torneo,descrizione_torneo FROM TORNEI';
		$result = $pdo->query($sql);
		while($dati = $result->fetch()){
			$nome_torneo[] = $dati['nome_torneo'];
			$descrizione_torneo[] = $dati['descrizione_torneo'];
		}
		echo('
				<div class="row-fluid">
					<div class="span10 offset1">
						<h3> Attività presenti:</h3>
			');
		for($i=0;$i<count($nome_torneo);$i++){
			echo('<div class="span12"><strong>'.$nome_torneo[$i].'</strong><br>'.$descrizione_torneo[$i].'</div>');
		}
		echo('</div></div>');
	}


	function votazioniMaglie(){
		include 'connessione.php';
		$sql = 'SELECT path,codice_maglia,voto,codice_utente FROM MAGLIE';
		$result = $pdo->query($sql);
		while($row = $result->fetch()){
			$paths[] = $row['path'];
			$codice_maglia[] = $row['codice_maglia'];
			$voto[] = $row['voto'];
			$codice_utente[] = $row['codice_utente'];
		}
		for($i=0;$i<count($paths);$i++){
			$sql = 'SELECT nome,cognome FROM UTENTI WHERE id="'.$codice_utente[$i].'"';
			$result = $pdo->query($sql);
			$dati = $result->fetch();
			if($i%2==0){
				echo('<div class="row-fluid"><div class="span12">');
				$j=0;
			}
			echo('
				<div class="maglia span4 offset2">
					<a class="fancybox img-maglia" rel="group" href="'.$paths[$i].'"><img class="img-maglia" src="'.$paths[$i].'"/></a><br>
					<p>Inviata da:'.$dati['nome'].' '.$dati['cognome'].'</p>');
			//if(!$_COOKIE['voted']) echo('<a href="vota-t-shirt.html.php?add&codice_maglia='.$codice_maglia[$i].'">VOTA +1</a>');
			echo('<p>Votazioni terminate</p>');
			echo('<p>Voti maglia:'.$voto[$i].'</p>');
			if($_SESSION['admin']){
				echo('<a href="vota-t-shirt.html.php?deleteT&codice_maglia='.$codice_maglia[$i].'">Delete</a>');
			}
			echo('</div>');
			if($j==2)echo('</div></div>');
			$j+=1;
		}
	}

	function specializzazioneStaff(){

		function optionRuoli(){
			include 'connessione.php';
			$sql = 'SELECT nome_ruolo,codice_ruolo FROM RUOLI';
			$result = $pdo->query($sql);
			while($dati = $result->fetch()){
				$nome_ruolo[] = $dati['nome_ruolo'];
				$codice_ruolo[] = $dati['codice_ruolo'];
			}
			for($i=0;$i<count($nome_ruolo);$i++){
				if(($codice_ruolo[$i]!=='10')){
					echo('<option value="'.$codice_ruolo[$i].'">'.$nome_ruolo[$i].'</option>');
				}
			}
		}

		if(($_SESSION['specializzazione'])&&(!$_SESSION['update'])){
			echo('	
				<div class="row-fluid">
					<div class="span10 offset1 alert alert-success">
						<h3>Seleziona attività</h3>
						<form action="?insSpecializzazione" method="post">
							<label class="control-label">Seleziona Attività</label><select name="codiceRuolo">');
			optionRuoli();
			echo('</select><br>
							<input type="submit" class="btn" value="Registrami">
						</form>
					</div>
				</div>
				');
		}elseif($_SESSION['update']){
			echo('	
				<div class="row-fluid">
					<div class="span10 offset1 alert alert-success">
						<h3>Seleziona attività</h3>
						<form action="?insSpecializzazioneUpdate" method="post">
							<label class="control-label">Seleziona Attività</label><select name="codiceRuolo">');
			optionRuoli();
			echo('</select><br>
							<input type="submit" class="btn" value="Registrami">
						</form>
					</div>
				</div>
				');
		}
	}

	function stampaNews(){

		function richiediNews(){
			include 'connessione.php';
			$sql='SELECT titolo,testo FROM NEWS';
			$result = $pdo->query($sql);
			while($dati = $result->fetch()){
				$titoli[]=$dati['titolo'];
				$testi[]=$dati['testo'];
			}
			for($i=0;$i<=count($titoli);$i++){
				echo('
						<div class="row-fluid">
							<div class="span10 offset1">
								<h3>'.$titoli[$i].'</h3>
								<p>'.$testi[$i].'</p>
							</div>
						</div>
					');
			}
		}

		echo('
			<div class="row-fluid">
				<div class="span10 offset1">
					<h3 class="alert alert-success">News:</h3>
			');
		richiediNews();
		echo('</div></div>');
	}
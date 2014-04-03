<?php 
	
	if(isset($_REQUEST['deleteT'])){
		$sql= 'DELETE FROM MAGLIE WHERE codice_maglia="'.$_GET['codice_maglia'].'"';
		$pdo->exec($sql);
		header('Location: vota-t-shirt.html.php');
	}

	if(isset($_REQUEST['sendMail'])){
		$sql = 'SELECT mail FROM UTENTI';
		$result = $pdo->query($sql);
		while($mail = $result->fetch()){
			//$mail = $result->fetch();
			$destinatario      = $mail['mail'];
			$oggetto = $_POST['oggetto'];
			$messaggio = $_POST['messaggio'];
			$headers = 'From: '.$_SESSION['mail']. "\r\n" .
			    'Reply-To: '.$_SESSION['mail']."\r\n" .
			    'X-Mailer: PHP/' . phpversion();
			mail($destinatario, $oggetto, $messaggio, $headers);
		}
		header('Location: iscrizioni.html.php');
	}

	if(isset($_REQUEST['insRuolo'])){
		$sql = 'INSERT INTO RUOLI SET nome_ruolo="'.$_POST['nomeRuolo'].'", descrizione_ruolo="'.$_POST['descrizioneRuolo'].'"';
		$pdo->exec($sql);
		header('Location: iscrizioni.html.php');
	}

	if(isset($_REQUEST['insTorneo'])){
		$sql = 'INSERT INTO TORNEI SET nome_torneo="'.$_POST['nomeTorneo'].'", descrizione_torneo="'.$_POST['descrizioneTorneo'].'"';
		$pdo->exec($sql);
		header('Location: iscrizioni.html.php');
	}

	if(isset($_REQUEST['insNews'])){
		$sql = 'INSERT INTO NEWS SET titolo="'.$_POST['titoloNews'].'", testo="'.$_POST['testoNews'].'"';
		$pdo->exec($sql);
		header('Location: iscrizioni.html.php');
	}


	//ADMIN FUNCTIONS&ACTIONS

	



	function retriveStaff(){
		if($_SESSION['admin']){
			include 'connessione.php';
			$sql = 'SELECT codice_utente FROM STAFF';
			$result = $pdo->query($sql);
			while($row = $result->fetch()){
				$codici[] = $row['codice_utente'];
			}
			//print_r($codici);
			echo('STUDENTI ISCRITTI:<br>');
			for($i=0;$i<count($codici);$i++){
				$sql = 'SELECT nome,cognome FROM UTENTI WHERE 
						id="'.$codici[$i].'"
						';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$nome = $dati['nome'];
				$cognome = $dati['cognome'];
				echo('-'.$nome.' '.$cognome.'<br>');
			}
		}
	}

	function bloccoSelezionato(){


		//function retriveUtenti(){
		if(isset($_REQUEST['utentiIscritti'])){
			include 'connessione.php';
			if($_SESSION['admin']){
				$sql = 'SELECT nome,cognome,mail FROM UTENTI';
				$result = $pdo->query($sql);
				while($dati = $result->fetch()){
					$nomi[] = $dati['nome'];
					$cognomi[] = $dati['cognome'];
					$mail[] = $dati['mail'];
				}
				echo('
					<div class="row-fluid">
						<div class="span10 offset1">
							<h3>Utenti iscritti:</h3>
					');
				for($i=0;$i<count($nomi);$i++){
					echo('<div class="span3">'.($i+1).'- '.$nomi[$i].' '.$cognomi[$i].' <p> mail:'.$mail[$i].'</p></div>');
				}
				echo('</div></div>');
			}
		}


		//function mailBlock(){
		if(isset($_REQUEST['mailBlock'])){
			if($_SESSION['admin']){
				echo('
					<div class="row-fluid">
						<div class="span10 offset1 poup">
						<h3>Invio mail utenti database:</h3>
						<p class="alert alert-error">Attenzione questo blocco invia una mail a tutti gli utenti del sito</p>
							<form class="form-horizontal" action="?sendMail" method="post">
								<div class="control-group">
									<label class="control-label">Oggetto:</label>
									<div class="controls">
										<input type="text" name="oggetto"/>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Testo:</label>
									<div class="controls">
										<textarea rows=4 cols=50 name="messaggio"></textarea>
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<button class="btn" type="submit">Invia</button>
									</div>
								</div>
							</form>
						</div>
					</div>
					');
			}
		}


		//function elencoStaffIscritti(){
		if(isset($_REQUEST['staffRequest'])){
				include 'connessione.php';
					$sql = 'SELECT UTENTI.nome,UTENTI.cognome,RUOLI.nome_ruolo FROM UTENTI INNER JOIN RUOLI ON UTENTI.staff=RUOLI.codice_ruolo ORDER BY RUOLI.nome_ruolo';
					$result = $pdo->query($sql);
					while($dati = $result->fetch()){
						$nomi[] = $dati['nome'];
						$cognomi[] = $dati['cognome'];
						$ruoli[] = $dati['nome_ruolo'];
					}
				$numero_staff=count($nomi);
				$controllo=$ruoli[0];
				$count=0;
				echo('<div class="row-fluid">
							<div class="span10 offset1">
								<h3>Studenti dello STAFF:</h3><p class="alert alert-info text-center">Numero iscritti:'.$numero_staff.'</p>');
					for($i=0;$i<count($nomi);$i++){
						/*if($i%3===0){ 
							echo('<div class="row-fluid"><div class="span12">');
							$j=0;
						}
						echo('<div class="span4 poup">'.$nomi[$i].' '.$cognomi[$i].'<br>'.$ruoli[$i].'</div>');
						if($j==3)echo('</div></div>');
						$j+=1;*/
						
						if($controllo !== $ruoli[$i]){
							echo('<div class="row-fluid"><div class="span12"><h3 class="alert text-center">'.$ruoli[$i].'</h3></div></div><div class="row-fluid"><div class="span12">');
							$count=0;
						}elseif($count%3 == 0){
							if($i==0)echo('<div class="row-fluid"><div class="span12"><h3 class="alert text-center">'.$ruoli[$i].'</h3></div></div>');
							echo('<div class="row-fluid"><div class="span12">');
						}
						$count+=1;
						echo('<div class="span4 poup">'.$nomi[$i].' '.$cognomi[$i].'<br>'.$ruoli[$i].'</div>');
						if($count==3){
							echo('</div></div>');
							$count=0;
						}
						$controllo = $ruoli[$i];
						
					}
				echo('</div></div>');
		}

		//function bloccoInserimentoRuoli(){
		if(isset($_REQUEST['inserimentoRuolo'])){
			if($_SESSION['admin']){
				echo('	<div class="row-fluid">
							<div class="span10 offset1">
								<h3>Inserimento attività database:</h3>
								<form class="form-horizontal" action="?insRuolo" method="post">
									<div class="control-group">
										<label class="control-label">Nome Attività</label>
										<div class="controls">
											<input type="text" name="nomeRuolo"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Descrizione Attività</label>
										<div class="controls">
											<textarea rows=4 cols=50 name="descrizioneRuolo"></textarea>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn" type="submit" value="Carica">
										</div>
									</div>
								</form>
							</div>
						</div>
					');
			}
		}

		if(isset($_REQUEST['inserimentoTorneo'])){
			if($_SESSION['admin']){
				echo('	<div class="row-fluid">
							<div class="span10 offset1">
								<h3>Inserimento torneo database:</h3>
								<form class="form-horizontal" action="?insTorneo" method="post">
									<div class="control-group">
										<label class="control-label">Nome Attività</label>
										<div class="controls">
											<input type="text" name="nomeTorneo"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Descrizione Attività</label>
										<div class="controls">
											<textarea rows=4 cols=50 name="descrizioneTorneo"></textarea>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn" type="submit" value="Carica">
										</div>
									</div>
								</form>
							</div>
						</div>
					');
			}
		}

		if(isset($_REQUEST['deleteNews'])){
			include 'connessione.php';
			$sql = 'DELETE FROM NEWS WHERE codice_news="'.$_GET['codice'].'"';
			$pdo->exec($sql);
		}

		//function bloccoInserimentoNews(){
		if(isset($_REQUEST['inserimentoNews'])){
			include 'connessione.php';
			if($_SESSION['admin']){
				echo('	<div class="row-fluid">
							<div class="span10 offset1">
								<h3>Inserimento news database:</h3>
								<form class="form-horizontal" action="?insNews" method="post">
									<div class="control-group">
										<label class="control-label">Titolo</label>
										<div class="controls">
											<input type="text" name="titoloNews"/>
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Testo</label>
										<div class="controls">
											<textarea rows=4 cols=50 name="testoNews"></textarea>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="btn" type="submit" value="Carica">
										</div>
									</div>
								</form>
							</div>
						</div>
					');
				$sql='SELECT titolo,codice_news FROM NEWS';
				$result = $pdo->query($sql);
				while($dati = $result->fetch()){
					$titoli[] = $dati['titolo'];
					$codici[] = $dati['codice_news'];
				}
				for($i=0;$i<count($titoli);$i++){
				echo('
					<div class="row-fluid">
						<div class="span10 offset1">
							<h3>Cancella news</h3>
							<a href="admin.html.php?deleteNews&codice='.$codici[$i].'">Delete '.$titoli[$i].'</a>
						</div>
					</div>
					');
				}
			}
		}

		//function ADdescrizioneRuoli(){
		if(isset($_REQUEST['descrizioneRuoli'])){
			if($_SESSION['admin']){
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
							<h3>Attività database:</h3>
					');
				for($i=0;$i<count($nome_ruolo);$i++){
					echo('<div class="span10 poup"><strong>'.$nome_ruolo[$i].'</strong><br>'.$descrizione_ruolo[$i].'</div>');
				}
				echo('</div>');
			}
		}

		if(isset($_REQUEST['descrizioneTornei'])){
			if($_SESSION['admin']){
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
							<h3>Tornei database:</h3>
					');
				for($i=0;$i<count($nome_torneo);$i++){
					echo('<div class="span10 poup"><strong>'.$nome_torneo[$i].'</strong><br>'.$descrizione_torneo[$i].'</div>');
				}
				echo('</div>');
			}
		}

		if(isset($_REQUEST['numeroOrdini'])){
			if($_SESSION['admin']){
				include 'connessione.php';
				$sql = 'SELECT codice_utente FROM ORDINI';
				$result = $pdo->query($sql);
				while($dati = $result->fetch()){
					$nordini[] = $dati['codice_utente'];
				}
				echo('
					<div class="row-fluid">
						<div class="span10 offset1">
							<h3>Maglie ordinate:'.count($nordini).'</h3>
						</div>
					</div>
					');
			}
		}


	}
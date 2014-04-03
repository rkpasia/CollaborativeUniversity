<?php
	
	include 'connessione.php';

	if(isset($_REQUEST['regCalcetto'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			try{
				$sql='	INSERT INTO CALCIATORI SET 
					codice_utente="'.$_SESSION['id'].'", 
					ruolo="'.$_POST['ruolo'].'",
					esperienza="'.$_POST['esperienza'].'"';

				$pdo->exec($sql);
				$_SESSION['iscrizione'] = true;
				echo('Richiesta inviata torna alla <a href="iscrizioni.html.php">home</a>');
			}catch(PDOException $e){
				echo('Ti sei già iscritto.');
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}


	if(isset($_REQUEST['regStaff'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			if(!$_SESSION['staff']){
				$_SESSION['specializzazione'] = true;
			}else{
				echo('<p>Ti sei registrato torna alla <a href="index.php">HOME</a>.');
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}

	if(isset($_REQUEST['affariGenerali'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			if(!$_SESSION['staff']){
				try{
					$sql='UPDATE UTENTI SET staff="0" WHERE id="'.$_SESSION['id'].'"';
					$pdo->exec($sql);
					$_SESSION['iscrizione'] = true;
					header('Location: iscrizioni.html.php');
				}catch(PDOException $e){
					echo('Ti sei già registrato.<br>
						Torna alla <a href="iscrizioni.html.php">home</a>	
						');
				}
			}else{
				echo('<p>Ti sei registrato torna alla <a href="index.php">HOME</a>');
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}


	if(isset($_REQUEST['insSpecializzazione'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			try{
				$sql='UPDATE UTENTI SET staff="'.$_POST['codiceRuolo'].'" WHERE id="'.$_SESSION['id'].'"';
				$pdo->exec($sql);
				$_SESSION['iscrizione'] = true;
				$_SESSION['specializzazione'] = false;
				header('Location: staff.html.php');
			}catch(PDOException $e){
				echo('Ti sei già registrato.<br>
					Torna alla <a href="iscrizioni.html.php">home</a>	
					');
				$_SESSION['specializzazione'] = false;
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}

	if(isset($_REQUEST['insSpecializzazioneUpdate'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			try{
				$sql='UPDATE UTENTI SET staff="'.$_POST['codiceRuolo'].'" WHERE id="'.$_SESSION['id'].'"';
				$pdo->exec($sql);
				$_SESSION['iscrizione'] = true;
				$_SESSION['specializzazione'] = false;
				$_SESSION['update'] = false;
				header('Location: iscrizioni.html.php');
			}catch(PDOException $e){
				echo('Ti sei già registrato.<br>
					Torna alla <a href="iscrizioni.html.php">home</a>	
					');
				$_SESSION['specializzazione'] = false;
				$_SESSION['update'] = false;
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}


	if(isset($_REQUEST['specializzazione'])){
		$_SESSION['specializzazione'] = true;
		$_SESSION['update'] = true;
		header('Location: staff.html.php');
	}

	if(isset($_REQUEST['regSquadra'])){
		try{
			if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
			}
			try{
				$sql='	INSERT INTO SQUADRE SET 
						nome_squadra="'.$_POST['nomeSquadra'].'",
						numero_componenti="'.$_POST['numeroComponenti'].'",
						classe_squadra="'.$_POST['classeSquadra'].'",
						codice_attivita="'.$_POST['activity'].'",
						codice_responsabile="'.$_SESSION['id'].'"';
				$pdo->exec($sql);
				$_SESSION['squadra'] = true;
				header('Location: iscrizioni.html.php');
			}catch(PDOException $e){
				echo('Ci deve essere un problema, manda una mail a riccardo.pasianotto@gmail.com');
			}
		}catch(PDOException $e){
			$e->getMessage();
			echo($e);
		}
	}
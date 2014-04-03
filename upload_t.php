<?php
	include 'connessione.php';
	if ($_FILES["file"]["error"] > 0){
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
	}
	else{
		if($_FILES["file"]["size"] < 2000000){
		  	move_uploaded_file($_FILES['file']['tmp_name'], 'maglie/'.$_FILES['file']['name']);
		  	$_SESSION['upload'] = true;
		}else{
			echo 'errore il file che vuoi caricare sul server pesa troppo';	
		}
		if(!isset($_SESSION['id'])){
				$sql = 'SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
				$result = $pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['id'] = $dati['id'];
		}
		$sql='	INSERT INTO MAGLIE SET 
					codice_utente="'.$_SESSION['id'].'", 
					path="maglie/'.$_FILES['file']['name'].'"';
		$pdo->exec($sql);
		header('Location: iscrizioni.html.php');
	}

<?php 
	
	include 'connessione.php';

	if($_SESSION['start']==true){
		header('Location: iscrizioni.html.php');
	}else{
		if(isset($_REQUEST['login'])){
			$sql='	SELECT mail,password FROM UTENTI WHERE
					mail="'.$_POST['mail'].'" AND
					password="'.$_POST['password'].'"';
			$result=$pdo->query($sql);
			$rows=$result->rowCount();
			if($rows==1){
				$sql = 'SELECT nome,cognome,id,admin,staff FROM UTENTI WHERE
						mail="'.$_POST['mail'].'"
						';
				$result=$pdo->query($sql);
				$dati = $result->fetch();
				$_SESSION['start']=true;
				$_SESSION['nome'] = $dati['nome'];
				$_SESSION['cognome'] = $dati['cognome'];
				$_SESSION['mail'] = $_POST['mail'];
				$_SESSION['id'] = $dati['id'];
				if($dati['admin']){
					$_SESSION['admin'] = true;
				}
				if($dati['staff']>=0){
					$_SESSION['staff'] = true;
				}
				header('Location: iscrizioni.html.php');
			}
		}
	}


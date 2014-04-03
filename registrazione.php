<?php

	include 'connessione.php';

	if(isset($_REQUEST['registrazione'])){
		if(!$_COOKIE['registrato']){
			if(!($_POST['nome']=='')&&!($_POST['cognome']=='')&&!($_POST['mail']=='')&&!($_POST['classe']=='')&&!($_POST['password']=='')&&!($_POST['verificaPassword']=='')){

				if($_POST['password']==$_POST['verificaPassword']){
					try{    
	                                       $nome=ucfirst($_POST['nome']);
	                                       $cognome=ucfirst($_POST['cognome']);
	                                       $classe=strtoupper($_POST['classe']);
	                                    
	                                    
						$sql='INSERT INTO UTENTI SET 
								nome="'.$nome.'", 
								cognome="'.$cognome.'", 
								classe="'.$classe.'", 
								mail="'.$_POST['mail'].'", 
								password="'.$_POST['password'].'"';
						$pdo->exec($sql);
						$_SESSION['mail'] = $_POST['mail'];
						$sql ='SELECT id FROM UTENTI WHERE mail="'.$_SESSION['mail'].'"';
						$result = $pdo->query($sql);
						$id = $result->fetch();
						$_SESSION['id'] = $id['id'];
						$_SESSION['start'] = true;
						$_SESSION['nome'] = $_POST['nome'];
						$_SESSION['cognome'] = $_POST['cognome'];
						
						//setcookie('registrato',1,time()+60*60*60*60);
						header('Location: iscrizioni.html.php');
	 				}
					catch(PDOException $e){
						$e->getMessage();
						echo($e);
					}
				}else{
					echo('Hai sbagliato la conferma della password');
				}
			}else{
				echo('Non hai inserito correttamente i campi, ricontrolla!');
			}
		}else{
			echo('<p class="alert alert-error">Ti sei già registrato</p>');
		}
	}
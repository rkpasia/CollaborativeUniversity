<?php

	try{
	  $pdo = new PDO('mysql:host=localhost;dbname=orgScuola', 'root', 'root');
	  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  $pdo->exec('SET NAMES "utf8"');
  		//echo('<i>CONNESSIONE AL DATABASE ESEGUITA CON SUCCESSO</i><br><br>');
	  session_start();
	}
	catch (PDOException $e)
	{
	  $error = 'Unable to connect to the database server.';
	  echo('<i>CONNESSIONE AL DATABASE <b>FALLITA</b></i>');
	  exit();
	}
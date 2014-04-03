<?php

	if(!$_SESSION['start']==true){
		header('Location: notAutorized.html.php');
	}
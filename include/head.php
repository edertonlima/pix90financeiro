<?php
	
	session_start();
	$_SESSION["id_usuario"] = 'Ederton';
	$_SESSION["nome_usuario"] = 'edertton';

	// variaveis
	$url_servidor = 'http://localhost:7880';
	$home_url = '/pix90financeiro';

	if( !isset($_SESSION["id_usuario"]) || !isset($_SESSION["nome_usuario"]) ) :
	
		header("Location: {$home_url}/login.php"); 
		exit;
	
	endif;

?>
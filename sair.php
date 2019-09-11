<?php 
	require 'include/head.php';

	// Inicia sessões, para assim poder destruí-las 
	session_destroy(); 
	 
	header("Location: {$home_url}"); 
?>
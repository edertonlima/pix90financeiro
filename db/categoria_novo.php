<?php
	include 'login_db.php';

	$descricao = $_GET['pg_descricao'];

	$ct_nome = $_GET['ct_nome'];
	$ct_color = $_GET['ct_color'];
	
	$sql = "INSERT INTO `categoria`(`ct_id`,`ct_nome`,`ct_color`) VALUES (NULL,'{$ct_nome}','{$ct_color}')";

	//echo(json_encode($sql));

	if ($mysqli->query($sql) === TRUE) {
		echo $mysqli->insert_id;
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>



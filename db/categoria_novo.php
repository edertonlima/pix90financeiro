<?php
	include 'login_db.php';

	$ct_nome = $_GET['ct_nome'];
	$ct_color = $_GET['ct_color'];
	
	$sql = "INSERT INTO `categoria`(`ct_id`,`ct_nome`,`ct_color`) VALUES (NULL,'{$ct_nome}','{$ct_color}')";

	//echo(json_encode($sql)).'<br><br>';

	if ($mysqli->query($sql) === TRUE) {
		$cadastro = array('id' => $mysqli->insert_id, 'titulo' => $ct_nome, 'color' => $ct_color);
		//return $cadastro;
		echo json_encode($cadastro);
		//echo $mysqli->insert_id;
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>



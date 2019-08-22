<?php
	include 'login_db.php';

	$ct_id = $_GET['ct_id'];
	$ct_nome = $_GET['ct_nome'];
	$ct_color = $_GET['ct_color'];

	$sql = "UPDATE categoria SET ct_nome='{$ct_nome}', ct_color= '{$ct_color}' WHERE ct_id='{$ct_id}'"; 
	
	//$sql = "INSERT INTO `categoria`(`ct_id`,`ct_nome`,`ct_color`) VALUES (NULL,'{$ct_nome}','{$ct_color}')";

	//echo(json_encode($sql));

	if ($mysqli->query($sql) === TRUE) {
		$editar = array('ct_id' => $ct_id, 'ct_nome' => $ct_nome, 'ct_color' => $ct_color);
		//return $editar;
		echo json_encode($editar);
		//echo $mysqli->insert_id;
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>



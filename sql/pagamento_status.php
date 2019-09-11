<?php
	include 'login_db.php';

	$pg_id = $_GET['pg_id'];
	$pg_status = $_GET['pg_status'];
	$pg_data = $_GET['pg_data'];
	$pg_datapagamento = $_GET['pg_datapagamento'];

	if($pg_status == 'pago'){
		$pg_datapagamento = 'NULL';
		$pg_status = 'pendente';
		$sql = "UPDATE pagamento SET pg_datapagamento = NULL WHERE pg_id = {$pg_id}";
	}else{
		$pg_status = 'pago';
		$sql = "UPDATE pagamento SET pg_datapagamento = '{$pg_datapagamento}' WHERE pg_id = {$pg_id}";
	}

	
	//$sql = "UPDATE pagamento SET ct_nome='{$ct_nome}', ct_color= '{$ct_color}' WHERE ct_id='{$ct_id}'"; 
	
	//$sql = "INSERT INTO `categoria`(`ct_id`,`ct_nome`,`ct_color`) VALUES (NULL,'{$ct_nome}','{$ct_color}')";

	//echo(json_encode($sql));

	if ($mysqli->query($sql) === TRUE) {
		$editar = array('pg_id' => $pg_id, 'pg_status' => $pg_status, 'pg_datapagamento' => $pg_datapagamento, 'pg_data' => $pg_data);
		//return $editar;
		echo json_encode($editar);
		//echo $mysqli->insert_id;
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>



<?php
	include 'login_db.php';

	$descricao = $_GET['pg_descricao'];

	$ct_id = $_GET['ct_id'];
	$cd_id = $_GET['cd_id'];
	
	$valor = $_GET['pg_valor'];
	$valor = str_replace(",", ".", $valor);

	$data = $_GET['pg_data'];
	//$metodopagamento = $_GET['pg_metodopagamento'];
	//$cateogira = $_GET['pg_categoria'];
	$observacao = $_GET['pg_observacao'];

	$pg_datapagamento = $_GET['pg_datapagamento'];

	if($pg_datapagamento){
		$pg_datapagamento = date('Y-m-d');
		$pg_datapagamento_formato = date_create($pg_datapagamento);
	}else{
		$pg_datapagamento = 'NULL';
		$pg_datapagamento_formato = false;
	}

	/*$sql = "INSERT INTO `pagamento` (`pg_descricao`,`pg_data`,`pg_valor`,`pg_observacao`)";
	$sql .= " VALUES (`$descricao`,`$data`,`$valor`,`$observacao`)";*/

	$sql = "INSERT INTO `pagamento` (`pg_id`, `pg_descricao`, `pg_data`, `pg_valor`, `pg_datapagamento`, `pg_observacao`, `ct_id`, `cd_id`) VALUES (NULL, '{$descricao}', '{$data}', '{$valor}', NULL, '{$observacao}', '{$ct_id}', '{$cd_id}')";

	//echo(json_encode($sql));

	$data = date_create($data);

	if ($mysqli->query($sql) === TRUE) {
		$pagamento = array(
			'pg_id' => $mysqli->insert_id, 
			'pg_descricao' => $descricao, 
			'pg_data' => $data->format('d/m/Y'),
			'pg_valor' => $valor,
			'pg_datapagamento' => $pg_datapagamento_formato->format('d/m/Y'),
			'pg_observacao' => $observacao,
			'ct_id' => $ct_id,
			'cd_id' => $cd_id
		);

	echo(json_encode($pagamento));

	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
	//Mesas do Escritório
?>



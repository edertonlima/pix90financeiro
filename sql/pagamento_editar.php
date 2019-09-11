<?php
	include 'login_db.php';

	$pg_id = $_GET['pg_id'];
	$descricao = $_GET['pg_descricao'];

	$ct_id = $_GET['ct_id'];
	$cd_id = $_GET['cd_id'];
	
	$valor = $_GET['pg_valor'];
	$valor = str_replace(",", ".", $valor);

	$data = $_GET['pg_data'];
	//$metodopagamento = $_GET['pg_metodopagamento'];
	//$cateogira = $_GET['pg_categoria'];
	$observacao = $_GET['pg_observacao'];

	/*$sql = "INSERT INTO `pagamento` (`pg_descricao`,`pg_data`,`pg_valor`,`pg_observacao`)";
	$sql .= " VALUES (`$descricao`,`$data`,`$valor`,`$observacao`)";*/

	$sql = "UPDATE `pagamento` SET `pg_descricao` = '{$descricao}', `pg_data` = '{$data}', `pg_valor` = '{$valor}', `pg_observacao` = '{$observacao}', `ct_id` = '{$ct_id}', `cd_id` = '{$cd_id}' WHERE `pagamento`.`pg_id` = '{$pg_id}'";
	//$sql = "INSERT INTO `pagamento` (`pg_id`, `pg_descricao`, `pg_data`, `pg_valor`, `pg_datapagamento`, `pg_observacao`, `ct_id`, `cd_id`) VALUES (NULL, '{$descricao}', '{$data}', '{$valor}', NULL, '{$observacao}', '{$ct_id}', '{$cd_id}')";

	echo(json_encode($sql));

	if ($mysqli->query($sql) === TRUE) {
		//echo 'ok';
	} else {
		//echo(json_encode($mysqli->error));
	}

	$mysqli->close();
	//Mesas do Escritório
?>



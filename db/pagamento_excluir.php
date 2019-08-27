<?php
	include 'login_db.php';

	$pg_id = $_GET['pg_id'];

	$sql = "DELETE FROM `pagamento` WHERE `pagamento`.`pg_id` = '{$pg_id}'";

	if ($mysqli->query($sql) === TRUE) {
		$excluir = array('pg_id' => $pg_id);

		echo json_encode($excluir);
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>
<?php
	include 'login_db.php';

	$ct_id = $_GET['ct_id'];

	$sql = "DELETE FROM `categoria` WHERE `categoria`.`ct_id` = '{$ct_id}'";

	if ($mysqli->query($sql) === TRUE) {
		$excluir = array('ct_id' => $ct_id);

		echo json_encode($excluir);
	} else {
		echo(json_encode($mysqli->error));
	}

	$mysqli->close();
?>



<?php
	include 'login_db.php';

	function get_cadastro($id){
		global $mysqli;
 		$query = "SELECT * FROM `cadastro` WHERE `cd_id` = '$id'";
		$result = $mysqli->query($query);
		$row = mysqli_fetch_object($result);
		return $row;
	}

	function get_cadastros(){
		global $mysqli;
		$query = "SELECT * FROM `cadastro`";
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

	$result = $mysqli->query($query);
    while ($row = $result->fetch_object()){
        $user_arr[] = $row;
    }

		
		//$row = mysqli_fetch_array($result);
		return $user_arr;
	}

	/* categorias */
	function get_categoria($id){
		global $mysqli;
		//$id = false;

		if($id):
			$query = "SELECT * FROM `categoria` WHERE `ct_id` = '{$id}'";
		else:
			$query = "SELECT * FROM `categoria` ORDER BY `ct_nome` ASC";
		endif;

		
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

		$result = $mysqli->query($query);
	    while ($row = $result->fetch_object()){
	        $user_arr[] = $row;
	    }

		
		//$row = mysqli_fetch_array($result);
		return $user_arr;
	}	


	/* pagamentos */
	function get_pagamento(/*$id*/){
		global $mysqli;
		$id = false;

		if($id):
			$query = "SELECT * FROM `categoria` WHERE `ct_id` = '$id' ORDER BY `pg_data` ASC";
		else:
			$query = "SELECT * FROM `pagamento` ORDER BY `pg_data` ASC";
		endif;

		
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

		$result = $mysqli->query($query);
	    while ($row = $result->fetch_object()){
	        $user_arr[] = $row;
	    }

		
		//$row = mysqli_fetch_array($result);
		return $user_arr;
	}	
?>
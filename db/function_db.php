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

	/* pagamentos */
	//get_pagamento_filtro();
	function get_pagamento_filtro($data1,$data2,$categoria){
		global $mysqli;

		if(($data1) and ($data2) and ($categoria)){
			$query = "SELECT * FROM `pagamento` 
				WHERE (`pg_data` between '{$data1}' and '{$data2}') 
					AND (`ct_id` = '{$categoria}') 
				ORDER BY `pg_data` ASC";
		}else{
			if(!$categoria){
				if(($data1) and ($data2)){
					$query = "SELECT * FROM `pagamento` 
						WHERE (`pg_data` between '{$data1}' and '{$data2}') 
						ORDER BY `pg_data` ASC";
				}else{
					if($data1){
						$query = "SELECT * FROM `pagamento` 
							WHERE (`pg_data` >= '{$data1}') 
							ORDER BY `pg_data` ASC";
					}else{
						$query = "SELECT * FROM `pagamento` 
							ORDER BY `pg_data` ASC";
					}
				}
			}else{
				$query = "SELECT * FROM `pagamento` 
					WHERE (`ct_id` = '{$categoria}') 
					ORDER BY `pg_data` ASC";
			}
		}
		
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

		if ($result = $mysqli->query($query)) {
		    while ($row = $result->fetch_object()){
		        $user_arr[] = $row;
		    }

		    if(isset($user_arr)){
		    	return $user_arr;
		    }
	    }
	}
?>
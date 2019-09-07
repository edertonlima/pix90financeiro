<?php
	include 'login_db.php';

		global $mysqli;

		$data1 = $_GET['data1'];
		$data2 = $_GET['data2'];

		$cadastro = $_GET['cadastro'];
		if($cadastro == 0){
			$cadastro = '';
		}else{
			$cadastro = "AND (`cadastro`.`cd_id` = {$cadastro}) ";
		}

		$categoria = $_GET['categoria'];
		if($categoria == 0){
			$categoria = '';
		}else{
			$categoria = "AND (`categoria`.`ct_id` = {$categoria}) ";
		}

		$status = $_GET['status'];
		switch ($status) {
			case 'avencer':
				$data1 = date('Y-m-d');
				$pg_datapagamento = 'AND (`pg_datapagamento` IS NULL) ';
				break;

			case 'vencidas':
				$data2 = date('Y-m-d',strtotime("-1 day"));
				$pg_datapagamento = 'AND (`pg_datapagamento` IS NULL) ';
				break;

			case 'pagas':
				$pg_datapagamento = 'AND (`pg_datapagamento` IS NOT NULL) ';
				break;

			case 'todos':				
				$pg_datapagamento = '';
				break;
		}

		//`cd_id` IS NOT NULL

		$query = "SELECT * FROM `pagamento` 
			INNER JOIN categoria 
			ON `pagamento`.`ct_id` = `categoria`.`ct_id` 
				{$categoria} 
			
			INNER JOIN cadastro 
			ON `pagamento`.`cd_id` = `cadastro`.`cd_id` 
				{$cadastro} 
			
			WHERE (`pg_data` between '{$data1}' and '{$data2}') 
				{$pg_datapagamento} 
			ORDER BY `pg_data` ASC";

		/*if(($data1) and ($data2) and ($categoria) and ($cadastro)){
			$query = "SELECT * FROM `pagamento` 
				WHERE (`pg_data` between '{$data1}' and '{$data2}') 
					AND (`ct_id` = '{$categoria}') 
					AND (`cd_id` = '{$cadastro}') 
				ORDER BY `pg_data` ASC";
		}else{
			if(!$cadastro){
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
		}*/
		
		//$result = $mysqli->query($query);
		//$row = mysqli_num_rows($result);

		//echo $query.'<br><br>';

		if ($result = $mysqli->query($query)) {
		    while ($row = $result->fetch_object()){
		        //$pagamento[] = $row;

				$pg_data = date_create($row->pg_data);
				$pg_valor = 'R$' . number_format($row->pg_valor, 2, ',', '.');

				$pg_datapagamento = $row->pg_datapagamento;
				if($pg_datapagamento != null){
					$pg_datapagamento = date_create($row->pg_datapagamento);
					$pg_datapagamento = $pg_datapagamento->format('d/m/Y');
				}else{
					$pg_datapagamento = '';
				}

				$pagamento[] = array(
					'pg_data' => $pg_data->format('d/m/Y'),					
					'pg_descricao' => $row->pg_descricao,
					'cd_id' => $row->cd_nome,
					'ct_id' => $row->ct_nome,
					'pg_valor' => $pg_valor,
					'pg_datapagamento' => $pg_datapagamento
				);
		    }

		    /*if(isset($pagamento)){
		    	return $pagamento;
		    }*/
	    }

	    //var_dump($pagamento);

	echo json_encode($pagamento);

	/*if ($mysqli->query($query) === TRUE) {
		print json_encode($pagamento);
	} else {
		echo json_encode($mysqli->error);
	}*/

	$mysqli->close();
?>



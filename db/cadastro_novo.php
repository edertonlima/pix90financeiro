<?php
	include 'login_db.php';

	$nome = $_GET['nome'];
	$resumo = $_GET['resumo'];
	$data_nascimento = $_GET['data_nascimento'];
	$cpf_cnpj = $_GET['cpf_cnpj'];
	$rua = $_GET['endereco'];
	$numero = $_GET['numero'];
	$bairro = $_GET['bairro'];
	$cidade = $_GET['cidade'];
	$estado = $_GET['estado'];
	$cep = $_GET['cep'];
	$email = $_GET['email'];
	$telefone = $_GET['telefone'];


	$sql = "INSERT INTO `cadastro`(`cd_nome`,";

	if($resumo != ''): $sql .= ' `cd_resumo`,'; endif;
	if($data_nascimento != ''): $sql .= ' `cd_datanascimento`,'; endif;
	
	if($cpf_cnpj != ''): $sql .= ' `cd_cpfcnpj`,'; endif;
	if($rua != ''): $sql .= ' `cd_rua`,'; endif;
	if($numero != ''): $sql .= ' `cd_numero`,'; endif;
	if($bairro != ''): $sql .= ' `cd_bairro`,'; endif;
	if($cidade != ''): $sql .= ' `cd_cidade`,'; endif;
	if($estado != ''): $sql .= ' `cd_estado`,'; endif;
	if($cep != ''): $sql .= ' `cd_cep`,'; endif;
	
	$sql .= " `cd_email`, `cd_telefone`) VALUES ('$nome',";
	
	if($resumo != ''): $sql .= "'$resumo', "; endif;
	if($data_nascimento != ''): $sql .= "'$data_nascimento', "; endif;
	if($cpf_cnpj != ''): $sql .= "'$cpf_cnpj', "; endif;
	if($rua != ''): $sql .= "'$rua', "; endif;
	if($numero != ''): $sql .= "'$numero', "; endif;
	if($bairro != ''): $sql .= "'$bairro', "; endif;
	if($cidade != ''): $sql .= "'$cidade', "; endif;
	if($estado != ''): $sql .= "'$estado', "; endif;
	if($cep != ''): $sql .= "'$cep', "; endif;
	
	$sql .= "'$email','$telefone')";

	/*$sql = "INSERT INTO cadastro ";
	$sql .= "('cd_nome','cd_resumo','cd_resumo','cd_cpfcnpj','cd_rua','cd_numero','cd_bairro','cd_cidade','cd_estado','cd_cep','cd_email','cd_telefone')";
	$sql .= ' VALUES ';
	$sql .= "($nome','$resumo','$data_nascimento','$cpf_cnpj','$rua','$numero','$bairro','$cidade','$estado','$cep','$email','$telefone')";*/

	//echo $sql;

	/*$resultado = mysqli_query($conexao,$sql);
	if (!$resultado) {
		die('Invalid query: ' . mysql_error());
	}*/

	if ($mysqli->query($sql) === TRUE) {
		echo $mysqli->insert_id;
		//echo(json_encode('ok'));
		//echo "New record created successfully";
	} else {
		echo(json_encode($mysqli->error));
		//echo $mysqli->error;
	}

	$mysqli->close();
?>



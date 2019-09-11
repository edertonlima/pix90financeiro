<?php 
// Conexão com o banco de dados 
require "../sql/login_db.php"; 
 
// Inicia sessões 
session_start(); 
 
// Recupera o login 
$email = isset($_POST["email"]) ? addslashes(trim($_POST["email"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["senha"]) ? md5(trim($_POST["senha"])) : FALSE; 

 
// Usuário não forneceu a senha ou o login 
if(!$email || !$senha) 
{ 
	$_SESSION["erro_login"] = "Você deve digitar sua senha e login!"; 
	header("Location: ../../pix90financeiro/login.php"); 
	exit; 
} 
 
/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/

/*$SQL = "SELECT us_id, us_nome, us_email, us_status 
FROM usuario 
WHERE us_email = "" . $email . """; 
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!"); 
$total = @mysql_num_rows($result_id); */

global $mysqli;
$query = "SELECT us_id, us_nome, us_email, us_senha, us_status FROM `usuario` WHERE `us_email` = '$email'";
$result = $mysqli->query($query);
 
// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if(mysqli_num_rows($result)) 
{ 
	// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
	$dados = mysqli_fetch_array($result); 
	//var_dump($dados);
 
	// Agora verifica a senha 
	if(!strcmp($senha, $dados["us_senha"])) 
	{ 
		// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário ''
		$_SESSION["id_usuario"]= $dados["us_id"]; 
		$_SESSION["nome_usuario"] = $dados["us_nome"]; 
		header("Location: ../../pix90financeiro/index.php"); 
		exit; 
	} 
	// Senha inválida 
	else
	{ 
		$_SESSION["erro_login"] = "<br>Senha inválida!"; 
	exit; 
	} 
} 
	// Login inválido 
else
{ 
	$_SESSION["erro_login"] =  "O login fornecido por você é inexistente!"; 
	header("Location: ../../login.php"); 
	exit; 
} 


//echo $_SESSION["erro_login"];
?>
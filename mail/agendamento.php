<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require_once('/home/storage/1/f8/69/flames2/public_html/producao/wp-content/themes/lush/phpmailer/PHPMailer.php');
	require_once('/home/storage/1/f8/69/flames2/public_html/producao/wp-content/themes/lush/phpmailer/Exception.php');

	$nome = $_GET['nome'];
	$email = $_GET['email'];
	$celular = $_GET['celular'];
	$data = $_GET['data'];
	$observacoes = $_GET['observacoes'];

	$nome_site = 'Flames Records';
	$para = 'victorflames@gmail.com';

	$email_remetente = 'contato@estudioflames.com.br';

	$port = 465;
	$host = 'email-ssl.com.br';
	$password = '@EstudioFlames2019';

	$mailer = new PHPMailer();
	$mailer->IsHTML(true);
	$mailer->CharSet = "text/html; charset=UTF-8;";
	//$mailer->IsSMTP();
	$mailer->WordWrap = 80;
	$mailer->SMTPDebug = 1;
	$mailer->Port = $port; //Indica a porta de conexÃ£o 
	$mailer->Host = $host;//EndereÃ§o do Host do SMTP 
	$mailer->SMTPAuth = true; //define se haverÃ¡ ou nÃ£o autenticaÃ§Ã£o 
	$mailer->Username = $email_remetente; //Login de autenticaÃ§Ã£o do SMTP
	$mailer->Password = $password; //Senha de autenticaÃ§Ã£o do SMTP
	$mailer->FromName = $nome_site; //Nome que serÃ¡ exibido
	$mailer->From = $email_remetente; //ObrigatÃ³rio ser a mesma caixa postal configurada no remetente do SMTP
	$mailer->AddAddress($para,'Victor, '.$nome_site);
	$mailer->addBCC('renanvcrocha@gmail.com','Renan, '.$nome_site);
	$mailer->addBCC('alerta@webis.rio','Livia, '.$nome_site);
	$mailer->addBCC('edertton@gmail.com','Ederton, '.$nome_site);
	$mailer->Subject = 'Novo agendamento';

	$conteudo = '<p><strong><font size="5">Olá Flames,</font></strong><br>Foi feito um novo agendamento!</p>';
	$conteudo .= '<p>';
	$conteudo .= '<strong>Nome:</strong> '.$nome;
	$conteudo .= '<br><strong>E-mail:</strong> '.$email;
	$conteudo .= '<br><strong>Celular:</strong> '.$celular;

	if(($observacoes != 'Observações') && ($observacoes != '')){
		$conteudo .= '<br><strong>Observações:</strong><br>'.$observacoes;
	}

	$conteudo .= '<br><br><strong>Agendamento:</strong>'.$data;
	$conteudo .= '</p>';

	$mailer->Body = $conteudo;
	//echo $mailer->msgHTML( $conteudo );
	
	if($mailer->Send()){
		//echo "Message was not sent";
		//echo "Mailer Error: " . $mailer->ErrorInfo;

		/* RESPOSTA CLIENTE */
		$mailer_cliente = new PHPMailer();
		$mailer_cliente->IsHTML(true);
		//$mailer_cliente->CharSet = "text/html; charset=UTF-8;";
		$mailer_cliente->CharSet = 'UTF-8';
		$mailer_cliente->Encoding = 'base64';
		//$mailer->IsSMTP();
		$mailer_cliente->WordWrap = 80;
		$mailer_cliente->SMTPDebug = 1;
		$mailer_cliente->Port = $port; //Indica a porta de conexÃ£o 
		$mailer_cliente->Host = $host;//EndereÃ§o do Host do SMTP 
		$mailer_cliente->SMTPAuth = true; //define se haverÃ¡ ou nÃ£o autenticaÃ§Ã£o 
		$mailer_cliente->Username = $email_remetente; //Login de autenticaÃ§Ã£o do SMTP
		$mailer_cliente->Password = $password; //Senha de autenticaÃ§Ã£o do SMTP
		$mailer_cliente->FromName = $nome_site; //Nome que serÃ¡ exibido
		$mailer_cliente->From = $email_remetente; //ObrigatÃ³rio ser a mesma caixa postal configurada no remetente do SMTP

		$mailer_cliente->AddAddress($email,$nome);
		$mailer_cliente->addBCC('edertton@gmail.com','Ederton');
		$mailer_cliente->Subject = 'Confirmação de Agendamento, Flames Records';

		$conteudo_cliente = '<p><strong><font size="5">Olá ' .$nome. ',</font></strong><br>Recebemos o seu agendamento. Entraremos em contato para confirmação!</p>';
		$conteudo_cliente .= '<p>';
		$conteudo_cliente .= '<br><strong>Agendamento:</strong>'.$data;
		$conteudo_cliente .= '</p>';
		
		$conteudo_cliente .= '<p><br><strong>Endereço:</strong><br>';
		$conteudo_cliente .= 'Américas Avenue Business Square <br> Av. das Américas, 12900 <br> Bloco 03 - Loja 129 parte (ao lado da administração) <br> Recreio dos bandeirantes <br>Rio de Janeiro/RJ';
		$conteudo_cliente .= '</p>';

		$mailer_cliente->Body = $conteudo_cliente;
		//echo $mailer->msgHTML( $conteudo );
		
		$mailer_cliente->Send();

		echo(json_encode('Agendamento enviado com sucesso. Entraremos em contato para confirmação!'));
		exit;
	}else{
		echo(json_encode("Desculpe, algo deu errado. <br>Por favor, tente novamente mais tarde."));
	}
	
?>
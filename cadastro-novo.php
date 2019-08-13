<?php 
	include 'include/head.php';
	$page = 'cadastro';
	$subpage = 'cadastro-novo'
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Contas a Pagar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
	<link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

	<link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
	<link rel="stylesheet" href="css/vendor/select2.min.css" />
	<link rel="stylesheet" href="css/vendor/select2-bootstrap.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap-datepicker3.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap-tagsinput.css" />
	<link rel="stylesheet" href="css/vendor/component-custom-switch.min.css" />
	<link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
	<link rel="stylesheet" href="css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">

	<?php include 'include/nav-top.php'; ?>
	<?php include 'include/menu.php'; ?>

	<form id="form-cadastro-novo" novalidate>

		<main>
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<h1><i class="iconsminds-add-user"></i> Novo Cadastro</h1>

						<div class="text-zero top-right-button-container">
							<button type="submit" id="submit-cadastro-novo" class="btn btn-primary btn-lg top-right-button mr-1">CADASTRAR</button>
						</div>
					</div>
				</div>

				<div class="row">
				   	<div class="col-lg-6 col-12 mb-6">
						<div class="card">
							<div class="card-body">
								<h5 class="mb-4">Informações Gerais</h5>

								<div class="form-row">
									<label class="form-group col-md-12 has-float-label">
										<input name="nome" id="nome" required="" class="form-control"  type="text">
										<span>*Nome</span>
									</label>

									<label class="form-group col-md-12 has-float-label">
										<textarea name="resumo" id="resumo" class="form-control"></textarea>
										<span>Resumo</span>
									</label>


									<label class="form-group col-md-6 has-float-label">
										<input name="data_nascimento" id="data_nascimento" class="form-control datepicker" type="text">
										<span>Data de Nascimento</span>
									</label>

									<label class="form-group col-md-6 has-float-label">
										<input name="cpf_cnpj" id="cpf_cnpj" class="form-control" placeholder="" type="text">
										<span>CPF / CNPJ</span>
									</label>
								
									<label class="form-group col-md-6 has-float-label">
										<input name="endereco" id="endereco" class="form-control" placeholder="" type="text">
										<span>Endereço</span>
									</label>

									<label class="form-group col-md-2 has-float-label">
										<input name="numero" id="numero" class="form-control" placeholder="" type="text">
										<span>Número</span>
									</label>

									<label class="form-group col-md-4 has-float-label">
										<input name="bairro" id="bairro" class="form-control" placeholder="" type="text">
										<span>Bairro</span>
									</label>

									<label class="form-group col-md-4 has-float-label">
										<select name="estado" id="estado" class="form-control select2-single">
											<option label="&nbsp;">&nbsp;</option>
											<option value="AC">Acre</option>
											<option value="AL">Alagoas</option>
											<option value="AP">Amapá</option>
											<option value="AM">Amazonas</option>
											<option value="BA">Bahia</option>
											<option value="CE">Ceará</option>
											<option value="DF">Distrito Federal</option>
											<option value="ES">Espírito Santo</option>
											<option value="GO">Goiás</option>
											<option value="MA">Maranhão</option>
											<option value="MT">Mato Grosso</option>
											<option value="MS">Mato Grosso do Sul</option>
											<option value="MG">Minas Gerais</option>
											<option value="PA">Pará</option>
											<option value="PB">Paraíba</option>
											<option value="PR">Paraná</option>
											<option value="PE">Pernambuco</option>
											<option value="PI">Piauí</option>
											<option value="RJ">Rio de Janeiro</option>
											<option value="RN">Rio Grande do Norte</option>
											<option value="RS">Rio Grande do Sul</option>
											<option value="RO">Rondônia</option>
											<option value="RR">Roraima</option>
											<option value="SC">Santa Catarina</option>
											<option value="SP">São Paulo</option>
											<option value="SE">Sergipe</option>
											<option value="TO">Tocantins</option>
										</select>
										<span>Estado</span>
									</label>

									<label class="form-group col-md-4 has-float-label">
										<input name="cidade" id="cidade" class="form-control" placeholder="" type="text">
										<span>Cidade</span>
									</label>

									<label class="form-group col-md-4 has-float-label">
										<input name="cep" id="cep" class="form-control" placeholder="" type="text">
										<span>CEP</span>
									</label>
								</div>
								
							</div>
						</div>
					</div>

				   <div class="col-lg-6 col-12 mb-6 cad-info-contato">
					   <div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-4">Informações de Contato</h5>

								<div class="form-row">
									<label class="form-group col-md-6 has-float-label">
										<input name="email" type="email" required id="email" class="form-control" />
										<span>*E-mail</span>
									</label>

									<label class="form-group col-md-6 has-float-label">
										<input name="telefone" required="" id="telefone" class="form-control" type="tel">
										<span>*Telefone</span>
									</label>
								</div>							
							</div>
						</div>

					   <div class="card mb-4">
							<div class="card-body">
								<h5 class="mb-4">Método de Pagamento</h5>

								<div class="form-row">
									<label class="form-group col-md-12 has-float-label">
										<select name="metodo_pagamento" id="metodo_pagamento" class="form-control select2-single">
											<option label="&nbsp;">&nbsp;</option>
											<option value="1">Boleto</option>
											<option value="2">Transferência Bancária</option>
										</select>
										<span>Escolha um Método</span>
									</label>

									<label class="form-group col-md-12 has-float-label label-hidden label-hidden-1">
										<textarea name="resumo-metodo-1" id="resumo-metodo-1" class="form-control"></textarea>
										<span>Observações</span>
									</label>

									<label class="form-group col-md-12 has-float-label label-hidden label-hidden-2">
										<input name="banco" id="banco" class="form-control" type="text">
										<span>Banco</span>
									</label>

									<label class="form-group col-md-12 has-float-label label-hidden label-hidden-2">
										<input name="agencia" id="agencia" class="form-control" type="text">
										<span>Agência</span>
									</label>

									<label class="form-group col-md-12 has-float-label label-hidden label-hidden-2">
										<input name="conta" id="conta" class="form-control" type="text">
										<span>Conta</span>
									</label>

									<label class="form-group col-md-12 has-float-label label-hidden label-hidden-2">
										<textarea name="resumo-metodo-2" id="resumo-metodo-2" class="form-control"></textarea>
										<span>Observações</span>
									</label>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</main>

	</form>

	<script src="js/vendor/jquery-3.3.1.min.js"></script>
	<script src="js/vendor/bootstrap.bundle.min.js"></script>
	<script src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="js/vendor/select2.full.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/bootstrap-tagsinput.min.js"></script>
    <script src="js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="js/vendor/jquery.validate/additional-methods.min.js"></script>

    <script src="js/vendor/jquery.maskedinput.min.js"></script>
	
	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript">
		
		/* validação */
		$('#form-cadastro-novo').validate({ 
    		submitHandler: function(form) {

				nome = $('#nome').val();
				resumo = $('#resumo').val();

				data_nascimento = $('#data_nascimento').val();
				if(data_nascimento != ''){
					parts = data_nascimento.split('/');
					data_nascimento = parts[2]+'-'+parts[1]+'-'+parts[0];
				}

				cpf_cnpj = $('#cpf_cnpj').val();
				endereco = $('#endereco').val();
				numero = $('#numero').val();
				bairro = $('#bairro').val();
				estado = $('#estado').val();
				cidade = $('#cidade').val();
				cep = $('#cep').val();
				email = $('#email').val();
				telefone = $('#telefone').val();
				metodo_pagamento = $('#metodo_pagamento').val();

				observacoes = '';
				if(metodo_pagamento == 1){
					observacoes = '<p class="text-muted text-small mb-2">Observações:</p><p class="mb-3">' + $('#resumo-metodo-1').val() + '</p>';
				}

				if(metodo_pagamento == 2){
					observacoes = $('#banco').val() + '<br>';
					observacoes = '<p class="mb-3">Agência: ' + $('#agencia').val() + '<br>';
					observacoes = 'Conta: ' + $('#conta').val() + '</p><br><br>';
					observacoes = '<p class="text-muted text-small mb-2">Observações:</p><p class="mb-3">' + $('#resumo-metodo-2').val() + '</p>';
				}
				
					$.getJSON("db/cadastro_novo.php", { 
						nome:nome,
						resumo:resumo,
						data_nascimento:data_nascimento,
						cpf_cnpj:cpf_cnpj,
						endereco:endereco,
						numero:numero,
						bairro:bairro,
						estado:estado,
						cidade:cidade,
						cep:cep,
						email:email,
						telefone:telefone,
						metodo_pagamento:metodo_pagamento,
						observacoes:observacoes
					}, function(result){

						url_cadastro = '<?php echo $home_url; ?>/cadastro-det.php?cadastro='+result+'&novocadastro=success';
						$(location).attr('href',url_cadastro);
						return false;
					});
    		}
    	});

		$('#nome').rules( "add", {
				required: true,
				messages: {
					required: "Este campo é obrigatório!"
				}
		});
		$('#email').rules( "add", {
				required: true,
				email: true,
				messages: {
					required: "Este campo é obrigatório!",
					email: "E-mail incorreto!"
				}
		});
		$('#telefone').rules( "add", {
				required: true,
				messages: {
					required: "Este campo é obrigatório!"
				}
		});


		/* mascara */
		$("#telefone")
	        .mask("(99) 9999-9999?9")
	        .focusout(function (event) {  
	            var target, phone, element;  
	            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
	            phone = target.value.replace(/\D/g, '');
	            element = $(target);  
	            element.unmask();  
	            if(phone.length > 10) {  
	                element.mask("(99) 9 9999-999?9");  
	            } else {  
	                element.mask("(99) 9999-9999?9");  
	            }  
	        });


		$('#metodo_pagamento').change(function(){
			$('.label-hidden').hide();
			$('.label-hidden-'+ $(this).val()).show();
		});

		$("#submit-cadastro-novo").click(function(){

			//return false;



		//jQuery("#btn-mensagem").click(function(){
			/*jQuery('#btn-mensagem').html('ENVIANDO').prop( "disabled", true );
			jQuery('#mensagem .msg-form').removeClass('erro ok').html('');
			var nome = jQuery('#mensagem #nome').val();
			var email = jQuery('#mensagem #email').val();
			var telefone = jQuery('#mensagem #telefone').val();
			var mensagem = jQuery('#mensagem #textarea').val();

			if(nome == ''){
				jQuery('#mensagem #nome').parent().addClass('erro');
			}

			if(email == ''){
				jQuery('#mensagem #email').parent().addClass('erro');
			}

			if(telefone == ''){
				jQuery('#mensagem #telefone').parent().addClass('erro');
			}

			if(mensagem == ''){
				jQuery('#mensagem #textarea').parent().addClass('erro');
			}

			if((nome == '') || (email == '') || (telefone == '') || (mensagem == '')){
				jQuery('#mensagem .msg-form').html('Todos os campos são obrigatórios!');

				jQuery('#btn-mensagem').html('ENVIAR').prop( "disabled", false );
			}else{
				jQuery.getJSON("mail.php", { nome:nome, email:email, telefone:telefone, mensagem:mensagem }, function(result){		
					if(result=='ok'){
						resultado = 'Solicitação enviada com sucesso!';
						classe = 'ok';
					}else{
						resultado = result;
						classe = 'erro';
					}
					jQuery('#mensagem .msg-form').addClass(classe).html(resultado);
					jQuery('#mensagem').trigger("reset");
					jQuery('#btn-mensagem').html('ENVIAR').prop( "disabled", false );
				});
			}*/
		});
	</script>
</body>

</html>
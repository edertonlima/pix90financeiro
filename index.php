<?php 
	include 'include/head.php';
	include 'db/function_db.php';
	$page = 'pagamento';
	$subpage = 'pagamento-list';
	$pagamentos = get_pagamento();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Contas a Pagar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
	<link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />

	<link rel="stylesheet" href="css/vendor/dataTables.bootstrap4.min.css" />
	<link rel="stylesheet" href="css/vendor/datatables.responsive.bootstrap4.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap-float-label.min.css" />
	<link rel="stylesheet" href="css/vendor/select2.min.css" />
	<link rel="stylesheet" href="css/vendor/select2-bootstrap.min.css" />
	<link rel="stylesheet" href="css/vendor/bootstrap-datepicker3.min.css" />

	<link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
	<link rel="stylesheet" href="css/vendor/component-custom-switch.min.css" />
	<link rel="stylesheet" href="css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">
	
	<?php include 'include/nav-top.php'; ?>
	<?php include 'include/menu.php'; ?>

	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1><i class="iconsminds-coins"></i> Pagamentos</h1>

					<div class="text-zero top-right-button-container">
	                    <div class="btn-group mb-1">
	                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#form-pagamento">
	                            NOVO PAGAMENTO
	                        </button>
	                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="sr-only"></span>
	                        </button>
	                        <div class="dropdown-menu">
	                            <a class="dropdown-item" href="#">Nova Categoria</a>
	                            <a class="dropdown-item" href="#">Editar Categorias</a>
	                        </div>
	                    </div>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="header-table">
								<div class="filtro-data">
									<i class="fas fa-chevron-left"></i>
									<span>11 de Ago à 17 de Ago</span>
									<i class="fas fa-chevron-right"></i>
								</div>
							</div>
							<table class="table data-table data-tables-pagination responsive table-striped" 
								data-order="[[ 0, &quot;asc&quot; ]]">
								<thead class="no-thead">
									<tr>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php //var_dump($pagamentos); if(count($pagamentos) > 0){
										$i = 0;
										foreach ($pagamentos as $key => $pagamento) { ?>
											<tr>
												<td class="align-middle">
													<span style="display: none;"><?php echo $i; ?></span>
													<?php 
														if($pagamento->pg_datapagamento){ ?>
															<i class="fas fa-circle text-success"></i>
														<?php }else{
															if($pagamento->pg_data < date('Y-m-d')){ ?>
																<i class="fas fa-circle text-danger"></i>
															<?php }else{
																if($pagamento->pg_data == date('Y-m-d')){ ?>
																	<i class="fas fa-circle text-warning "></i>
																<?php }else{ ?>
																	<i class="fas fa-circle text-muted"></i>
																<?php }
															}
														}
													?>
												</td>
												<td class="align-middle"><span class="data-pagamento">
													<?php
	                                            		$date = date_create($pagamento->pg_data);
	                                            		echo $date->format('d/m/Y');
	                                            	?>													
													</span></td>
												<td class="align-middle">
													<a href="javascript:" data-toggle="modal" data-backdrop="static" data-target="#detalhe-pagamento-<?php echo $pagamento->pg_id; ?>" rel="<?php echo $pagamento->pg_id; ?>">
														<?php echo $pagamento->pg_descricao; ?>
													</a>
												</td>
												<td class="align-middle">
													<?php
														if($pagamento->ct_id != 0){
															$categoria_current = get_categoria($pagamento->ct_id);
															foreach ($categoria_current as $key => $categoria) { 
																if($categoria->ct_rgbbg){
																	$bg_color = 'background-color:'.$categoria->ct_rgbbg.'!important;';
																}else{
																	$bg_color = '';
																}
																if($categoria->ct_rgbtxt){
																	$txt_color = 'color:'.$categoria->ct_rgbtxt.'!important;';
																}else{
																	$txt_color = '';
																}
																?>
																<span class="badge badge-pill badge-primary" style="<?php echo $bg_color.$txt_color; ?>">
																	<?php echo $categoria->ct_nome; ?>
																</span>
															<?php }
														}
													?>
												</td>
												<td class="align-middle">
													R$ 
													<?php echo number_format($pagamento->pg_valor, 2, ',', '.'); ?>
												</td>
												<td class="align-middle">
													<?php if($pagamento->pg_datapagamento){ ?>
														<i class="fas fa-lg fa-thumbs-up text-success"></i>
													<?php }else{ ?>
														<i class="fas fa-lg fa-thumbs-up text-muted"></i>
													<?php } ?>

	<!-- MODAL DETALHE PAGAMENTO -->
	<div class="modal fade modal-bottom modal-no-scrolling detalhe-pagamento" id="detalhe-pagamento-<?php echo $pagamento->pg_id; ?>" tabindex="-1" role="dialog"
		aria-labelledby="detalhe-pagamento" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header contaner-info">			
	
					<h2 class="modal-title">
						<?php 
							if($pagamento->pg_datapagamento){ ?>
								<i class="fas fa-circle text-success"></i>
							<?php }else{
								if($pagamento->pg_data < date('Y-m-d')){ ?>
									<i class="fas fa-circle text-danger"></i>
								<?php }else{
									if($pagamento->pg_data == date('Y-m-d')){ ?>
										<i class="fas fa-circle text-warning "></i>
									<?php }else{ ?>
										<i class="fas fa-circle text-muted"></i>
									<?php }
								}
							}
						?>
						<strong><?php echo $pagamento->pg_descricao; ?></strong>
					</h2>					
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body contaner-info">

					<div class="valor-pagamento">
						<strong>R$ <?php echo number_format($pagamento->pg_valor, 2, ',', '.'); ?></strong>
						<?php
							if($pagamento->ct_id != 0){
								$categoria_current = get_categoria($pagamento->ct_id);
								foreach ($categoria_current as $key => $categoria) { ?>
									<span class="badge badge-pill badge-primary">
										<?php echo $categoria->ct_nome; ?>
									</span>
								<?php }
							}
						?>
						<span class="nome-cadastro"><i class="iconsminds-male"></i> 
							<?php 
								$cadastro = get_cadastro($pagamento->pg_id);
								echo $cadastro->cd_nome;
							?>
						</span>
					</div>

					<div class="det-pagamento">
						<div class="item">
							<span class="text-muted">Data</span>
							<?php echo $date->format('d/m/Y'); ?>
						 </div>

						 <div class="item" style="display: none;">
							<span class="text-muted">Forma de Pagamento</span>
							Boleto
						 </div>

						<?php if($pagamento->pg_observacao){ ?>
							 <div class="item">
								<span class="text-muted">Observação</span>
								<?php echo $pagamento->pg_observacao; ?>
							 </div>
						<?php } ?>
					</div>

				</div>
				<div class="modal-footer">
					<div class="item">
						<?php if($pagamento->pg_datapagamento){ ?>
							<i class="fas fa-lg fa-thumbs-up text-success"></i>Pagamento efetuado em 12/07/2019
						<?php }else{ ?>
							<i class="fas fa-lg fa-thumbs-up text-muted"></i>Marcar como pago
						<?php } ?>
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted close-det-pagamento editar-pagamento" id="" title="" data-toggle="modal" data-target="#form-pagamento-<?php echo $pagamento->pg_id; ?>"><i class="far fa-edit"></i>Editar</a>
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted close-det-pagamento" id="copiar-pagamento" title=""><i class="far fa-copy"></i>Copiar</a>
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted" title=""><i class="far fa-trash-alt"></i>Excluir</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- EDITAR -->
	<div class="modal fade" id="form-pagamento-<?php echo $pagamento->pg_id; ?>" tabindex="-2" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalContentLabel"><i class="iconsminds-coins"></i> Editar Pagamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-pagamento-novo" novalidate>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input type="text" name="pg_descricao" id="pg_descricao" class="form-control " required="" value="<?php echo $pagamento->pg_descricao; ?>" />
								<span>Descrição</span>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input id="pg_valor" class="form-control " data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '€ ', 'placeholder': '0'" required="" />
								<span>Valor</span>
								<small>R$</small>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input id="pg_data" class="form-control datepicker" required="" />
								<span>Data de Pagamento</span>
								<small><i class="far fa-calendar-alt"></i></small>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select id="cd_id" class="form-control select2-single ">
									<?php
										$cadastro = get_cadastros();
										//$cadastros = get_cadastros();
										foreach ($cadastro as $key => $value) { ?>
											<option value="<?php echo $value->cd_id; ?>"><?php echo $value->cd_nome; ?></option>
										<?php }
									?>
								</select>
								<span>Beneficiário</span>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select class="form-control select2-single"  id="ct_id">
									<?php
										$categorias = get_categoria(null);
										//$cadastros = get_cadastros();
										foreach ($categorias as $key => $value) { ?>
											<option value="<?php echo $value->ct_id; ?>" <?php if($value->ct_id == 1): echo 'selected="selected"'; endif; ?>><?php echo $value->ct_nome; ?></option>
										<?php }
									?>
								</select>
								<span>Categoria</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<textarea name="pg_observacao" class="form-control" id="pg_observacao"></textarea>
								<span>Observação</span>
							</label>
						</div>
					</form>
				</div>
				<div class="modal-footer hover-item">
					<div class="item">
						<button type="button" rel="" class="btn btn-success submit-form-pagamento-novo"><i class="fas fa-check"></i> Salvar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
												</td>
											</tr>
										<?php $i = $i+1; }
									//} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<!-- MODAL CADASTRO / EDITAR -->
	<div class="modal fade" id="form-pagamento" tabindex="-2" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalContentLabel"><i class="iconsminds-coins"></i> Novo Pagamento</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-pagamento-novo" novalidate>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input type="text" name="pg_descricao" id="pg_descricao" class="form-control " required="" />
								<span>Descrição</span>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input id="pg_valor" class="form-control " data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '€ ', 'placeholder': '0'" required="" />
								<span>Valor</span>
								<small>R$</small>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input id="pg_data" class="form-control datepicker" required="" />
								<span>Data de Pagamento</span>
								<small><i class="far fa-calendar-alt"></i></small>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select id="cd_id" class="form-control select2-single ">
									<?php
										$cadastro = get_cadastros();
										//$cadastros = get_cadastros();
										foreach ($cadastro as $key => $value) { ?>
											<option value="<?php echo $value->cd_id; ?>"><?php echo $value->cd_nome; ?></option>
										<?php }
									?>
								</select>
								<span>Beneficiário</span>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select class="form-control select2-single"  id="ct_id">
									<?php
										$categorias = get_categoria(null);
										//$cadastros = get_cadastros();
										foreach ($categorias as $key => $value) { ?>
											<option value="<?php echo $value->ct_id; ?>" <?php if($value->ct_id == 1): echo 'selected="selected"'; endif; ?>><?php echo $value->ct_nome; ?></option>
										<?php }
									?>
								</select>
								<span>Categoria</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<textarea name="pg_observacao" class="form-control" id="pg_observacao"></textarea>
								<span>Observação</span>
							</label>
						</div>
					</form>
				</div>
				<div class="modal-footer hover-item">
					<div class="item item-hover">
						<a href="javascript:" class="text-muted" title="" data-dismiss="modal"><i class="fas fa-check" style="display: none;"></i>Salvar e criar outra</a>
					</div>
					<div class="item">
						<button type="button" id="submit-form-pagamento-novo" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL DETALHE PAGAMENTO -->
	<div class="modal fade modal-bottom modal-no-scrolling" id="detalhe-pagamento2" tabindex="-1" role="dialog"
		aria-labelledby="detalhe-pagamento" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header contaner-info">			
	
					<h2 class="modal-title">
						<i class="fas fa-circle text-success"></i>
						<strong>Sistema de controle de contas</strong>
					</h2>					
					
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body contaner-info">

					<div class="valor-pagamento">
						<strong>R$ 2600,00</strong>
						<span class="badge badge-pill badge-primary">Salário</span>
						<span class="nome-cadastro"><i class="iconsminds-male"></i> Ederton Cirino Lima</span>
					</div>

					<div class="det-pagamento">
						<div class="item">
							<span class="text-muted">Data</span>
							15/07/2019
						 </div>

						 <div class="item">
							<span class="text-muted">Forma de Pagamento</span>
							Boleto
						 </div>

						 <div class="item">
							<span class="text-muted">Observação</span>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
						 </div>
					</div>

				</div>
				<div class="modal-footer">
					<div class="item">
						<i class="fas fa-lg fa-thumbs-up text-success"></i>Pagamento efetuado em 12/07/2019
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted close-det-pagamento" id="editar-pagamento" title="" data-toggle="modal" data-target="#form-pagamento"><i class="far fa-edit"></i>Editar</a>
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted close-det-pagamento" id="copiar-pagamento" title=""><i class="far fa-copy"></i>Copiar</a>
					</div>
					<div class="item">
						<a href="javascript:" class="text-muted" title=""><i class="far fa-trash-alt"></i>Excluir</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/vendor/jquery-3.3.1.min.js"></script>
	<script src="js/vendor/bootstrap.bundle.min.js"></script>
	<script src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="js/vendor/bootstrap-notify.min.js"></script>
	<script src="js/vendor/select2.full.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/mousetrap.min.js"></script>
	<script src="js/vendor/datatables.min.js"></script>

    <script src="js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="js/vendor/jquery.validate/additional-methods.min.js"></script>

    <script src="js/vendor/jquery.mask.min.js"></script>

	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript">

		/* #form-pagamento-novo */
		$('#submit-form-pagamento-novo').click(function(){
			$('#form-pagamento-novo').submit(); 		
		});

		$('#form-pagamento-novo').validate({
    		submitHandler: function(form) {

				pg_descricao = $('#pg_descricao').val();
				pg_valor = $('#pg_valor').val();

				ct_id = $('#ct_id').val();
				cd_id = $('#cd_id').val();

				pg_data = $('#pg_data').val();
				if(pg_data != ''){
					parts = pg_data.split('/');
					pg_data = parts[2]+'-'+parts[1]+'-'+parts[0];
				}

				pg_categoria = $('#pg_categoria').val();
				pg_observacao = $('#pg_observacao').val();
			
					$.getJSON("db/pagamento_novo.php", { 
						pg_descricao:pg_descricao,
						pg_valor:pg_valor,
						pg_data:pg_data,
						pg_categoria:pg_categoria,
						pg_observacao:pg_observacao,
						cd_id:cd_id,
						ct_id:ct_id
					}, function(result){
						//alert(result);
						url_cadastro = '<?php echo $home_url; ?>?&novopagamento=success';
						//alert(url_cadastro);
						$(location).attr('href',url_cadastro);
						return false;
					});
    		}
    	});

		$('#pg_descricao').rules( "add", {
			required: true,
			messages: {
				required: "Este campo é obrigatório!"
			}
		});

		$('#pg_valor').rules( "add", {
			required: true,
			messages: {
				required: "Este campo é obrigatório!"
			}
		});

		$('#pg_data').rules( "add", {
			required: true,
			messages: {
				required: "Este campo é obrigatório!"
			}
		});

		$('#pg_categoria').rules( "add", {
			required: true,
			messages: {
				required: "Este campo é obrigatório!"
			}
		});

		$('#pg_data').rules( "add", {
			required: true,
			messages: {
				required: "Este campo é obrigatório!"
			}
		});


		/* modal pagamento novo */
		$('.close-det-pagamento').click(function(){
			$('#detalhe-pagamento').modal('hide');
		});

		$('#copiar-pagamento').click(function(){
			//$('#detalhe-pagamento').modal('hide');
		});

		$('.editar-pagamento').click(function(){
			$('.modal').modal('hide');
		});

		/* MASCARA */
		$('#pg_valor').mask('000000000000000,00', {reverse: true});

		$(document).ready(function() {
			/*$('#form-pagamento').modal('show');
			setInterval(function(){ 
				$('.modal-backdrop').css('opacity','.5');
			}, 1000);*/
		});


        <?php if(isset($_GET['novopagamento'])){ 
        	if($_GET['novopagamento'] == 'success'){ ?>

	            $.notify({
	                // options
	                title: 'Lançamento salvo com sucesso!',
	                message: '' 

	            },{
	                // settings
	                type: 'success',
	                placement: {
	                    from: "bottom",
	                    align: "right"
	                },
	            });

        	<?php }
        } ?>
	</script>
</body>

</html>
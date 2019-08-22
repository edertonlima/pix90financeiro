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
	                            <i class="fas fa-plus" style="margin-right: 5px;"></i>NOVO PAGAMENTO
	                        </button>
	                        <button type="button" class="btn btn-primary dropdown-toggle novo-pagamento" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="sr-only"></span>
	                        </button>
	                        <div class="dropdown-menu">
	                            <button class="dropdown-item" id="btn_nova_categoria" data-toggle="modal" data-target="#nova_categoria">Nova Categoria</button>
	                            <a class="dropdown-item" href="<?php echo $home_url; ?>/categorias.php">Editar Categorias</a> 
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
															foreach ($categoria_current as $key => $categoria) { ?>
																<i class="fas fa-square" style="padding-right: 2px; color: <?php echo $categoria->ct_color; ?>"></i> 
																<?php echo $categoria->ct_nome; ?>
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
									<span class="nome-cadastro">
										<i class="fas fa-square" style="padding-right: 2px; color: <?php echo $categoria->ct_color; ?>"></i> 
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
								<select id="cd_id" name="cd_id" class="form-control select2-single">
									<option label="&nbsp;">&nbsp;</option>
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


	<!-- MODAL NOVA CATEGORIA -->
	<div class="modal fade" id="nova_categoria" tabindex="-2" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalContentLabel"><i class="fas fa-square text-primary"></i> Nova Categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-categoria-novo" novalidate>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input type="text" name="ct_nome" id="ct_nome" class="form-control " required="" />
								<span>Título</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<span class="tit-color">Selecione uma cor: </span>
								<input name="ct_color" id="ct_color" class="form-control" required="" value="rgb(240, 240, 240)" style="background-color: rgb(240, 240, 240);" />
								<ul id="list-cores">
									<li rel="rgb(240, 240, 240)" style="background-color: rgb(240, 240, 240)"></li>
									<li rel="rgb(255, 214, 214)" style="background-color: rgb(255, 214, 214)"></li>
									<li rel="rgb(255, 214, 173)" style="background-color: rgb(255, 214, 173)"></li>
									<li rel="rgb(255, 240, 225)" style="background-color: rgb(255, 240, 225)"></li>
									<li rel="rgb(227, 243, 198)" style="background-color: rgb(227, 243, 198)"></li>
									<li rel="rgb(163, 234, 194)" style="background-color: rgb(163, 234, 194)"></li>
									<li rel="rgb(154, 222, 223)" style="background-color: rgb(154, 222, 223)"></li>
									<li rel="rgb(221, 255, 255)" style="background-color: rgb(221, 255, 255)"></li>
									<li rel="rgb(213, 214, 255)" style="background-color: rgb(213, 214, 255)"></li>
									<li rel="rgb(255, 213, 255)" style="background-color: rgb(255, 213, 255)"></li>

									<li rel="rgb(219, 223, 220)" style="background-color: rgb(219, 223, 220)"></li>
									<li rel="rgb(255, 157, 157)" style="background-color: rgb(255, 157, 157)"></li>
									<li rel="rgb(255, 189, 92)" style="background-color: rgb(255, 189, 92)"></li>
									<li rel="rgb(254, 233, 183)" style="background-color: rgb(254, 233, 183)"></li>
									<li rel="rgb(218, 238, 142)" style="background-color: rgb(218, 238, 142)"></li>
									<li rel="rgb(130, 215, 172)" style="background-color: rgb(130, 215, 172)"></li>
									<li rel="rgb(37, 213, 186)" style="background-color: rgb(37, 213, 186)"></li>
									<li rel="rgb(82, 214, 255)" style="background-color: rgb(82, 214, 255)"></li>
									<li rel="rgb(171, 172, 255)" style="background-color: rgb(171, 172, 255)"></li>
									<li rel="rgb(255, 171, 255)" style="background-color: rgb(255, 171, 255)"></li>

									<li rel="rgb(202, 207, 210)" style="background-color: rgb(202, 207, 210)"></li>
									<li rel="rgb(255, 133, 133)" style="background-color: rgb(255, 133, 133)"></li>
									<li rel="rgb(237, 152, 54)" style="background-color: rgb(237, 152, 54)"></li>
									<li rel="rgb(251, 217, 133" style="background-color: rgb(251, 217, 133)"></li>
									<li rel="rgb(141, 212, 127)" style="background-color: rgb(141, 212, 127)"></li>
									<li rel="rgb(75, 207, 153)" style="background-color: rgb(75, 207, 153)"></li>
									<li rel="rgb(70, 193, 160)" style="background-color: rgb(70, 193, 160)"></li>
									<li rel="rgb(57, 196, 255)" style="background-color: rgb(57, 196, 255)"></li>
									<li rel="rgb(131, 132, 216" style="background-color: rgb(131, 132, 216)"></li>
									<li rel="rgb(215, 131, 215" style="background-color: rgb(215, 131, 215)"></li>
									
									<li rel="rgb(170, 183, 184" style="background-color: rgb(170, 183, 184)"></li>
									<li rel="rgb(245, 81, 66)" style="background-color: rgb(245, 81, 66)"></li>
									<li rel="rgb(250, 135, 62)" style="background-color: rgb(250, 135, 62)"></li>
									<li rel="rgb(255, 215, 25)" style="background-color: rgb(255, 215, 25)"></li>
									<li rel="rgb(190, 222, 52)" style="background-color: rgb(190, 222, 52)"></li>
									<li rel="rgb(41, 194, 135)" style="background-color: rgb(41, 194, 135)"></li>
									<li rel="rgb(66, 181, 177)" style="background-color: rgb(66, 181, 177)"></li>
									<li rel="rgb(0, 122, 193)" style="background-color: rgb(0, 122, 193)"></li>
									<li rel="rgb(110, 96, 187)" style="background-color: rgb(110, 96, 187)"></li>
									<li rel="rgb(205, 111, 206" style="background-color: rgb(205, 111, 206)"></li>
									
									<li rel="rgb(137, 149, 161)" style="background-color: rgb(137, 149, 161)"></li>
									<li rel="rgb(222, 106, 103)" style="background-color: rgb(222, 106, 103)"></li>
									<li rel="rgb(220, 118, 51)" style="background-color: rgb(220, 118, 51)"></li>
									<li rel="rgb(252, 184, 19)" style="background-color: rgb(252, 184, 19)"></li>
									<li rel="rgb(167, 203, 52)" style="background-color: rgb(167, 203, 52)"></li>
									<li rel="rgb(158, 221, 148)" style="background-color: rgb(158, 221, 148)"></li>
									<li rel="rgb(60, 193, 191)" style="background-color: rgb(60, 193, 191)"></li>
									<li rel="rgb(108, 145, 200)" style="background-color: rgb(108, 145, 200)"></li>
									<li rel="rgb(114, 106, 175)" style="background-color: rgb(114, 106, 175)"></li>
									<li rel="rgb(175, 121, 198)" style="background-color: rgb(175, 121, 198)"></li>
									
									<li rel="rgb(86, 101, 115)" style="background-color: rgb(86, 101, 115)"></li>
									<li rel="rgb(225, 75, 70)" style="background-color: rgb(225, 75, 70)"></li>
									<li rel="rgb(198, 97, 54)" style="background-color: rgb(198, 97, 54)"></li>
									<li rel="rgb(216, 173, 87)" style="background-color: rgb(216, 173, 87)"></li>
									<li rel="rgb(252, 184, 19)" style="background-color: rgb(252, 184, 19)"></li>
									<li rel="rgb(136, 181, 56)" style="background-color: rgb(136, 181, 56)"></li>
									<li rel="rgb(67, 139, 131)" style="background-color: rgb(67, 139, 131)"></li>
									<li rel="rgb(95, 116, 176)" style="background-color: rgb(95, 116, 176)"></li>
									<li rel="rgb(106, 99, 153)" style="background-color: rgb(106, 99, 153)"></li>
									<li rel="rgb(137, 92, 169)" style="background-color: rgb(137, 92, 169)"></li>
									
									<li rel="rgb(76, 86, 97)" style="background-color: rgb(76, 86, 97)"></li>
									<li rel="rgb(171, 83, 73)" style="background-color: rgb(171, 83, 73)"></li>
									<li rel="rgb(157, 75, 72)" style="background-color: rgb(157, 75, 72)"></li>
									<li rel="rgb(174, 133, 90)" style="background-color: rgb(174, 133, 90)"></li>
									<li rel="rgb(113, 154, 56)" style="background-color: rgb(113, 154, 56)"></li>
									<li rel="rgb(67, 122, 88)" style="background-color: rgb(67, 122, 88)"></li>
									<li rel="rgb(70, 124, 110)" style="background-color: rgb(70, 124, 110)"></li>
									<li rel="rgb(48, 76, 143)" style="background-color: rgb(48, 76, 143)"></li>
									<li rel="rgb(96, 87, 145)" style="background-color: rgb(96, 87, 145)"></li>
									<li rel="rgb(112, 81, 140)" style="background-color: rgb(112, 81, 140)"></li>
								</ul>
							</label>

							<div class="footer-form">
								<button type="button" id="submit-form-categoria-novo" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Salvar</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


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

		$(document).ready(function() {
			//$('#nova_categoria').modal('show');
			setInterval(function(){ 
				//$('.modal-backdrop').css('opacity','.5');
			}, 1000);
		});

		/* #form-categoria-novo */
		$('#submit-form-categoria-novo').click(function(){
			$('#form-categoria-novo').submit(); 		
		});
		$('#form-categoria-novo').validate({
    		submitHandler: function(form) {

				ct_nome = $('#ct_nome').val();
				ct_color = $('#ct_color').val();
		
				$.getJSON("db/categoria_novo.php", { 
					ct_nome:ct_nome,
					ct_color:ct_color,
				}, function(result){
					//alert(result);
					$('#nova_categoria').modal('hide');
					$('#form-categoria-novo').trigger("reset");

		            $.notify({
		                // options
		                title: 'Categoria cadastrada com sucesso!',
		                message: ''

		            },{
		                // settings
		                type: 'success',
		                placement: {
		                    from: "bottom",
		                    align: "right"
		                },
		            });

					return false;
				});
    		}
    	});


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

        $('#list-cores li').click(function(){
        	$('#list-cores li').removeClass('active');
        	$(this).addClass('active');
        	color = $(this).attr('rel');
        	$('#ct_color').val(color).css('background-color',color);
        });
	</script>
</body>

</html>
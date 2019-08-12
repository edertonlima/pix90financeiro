<?php 
	include 'include/head.php';
	$page = 'pagamento';
	$subpage = 'pagamento-list'
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
						<a href="javascript:" class="btn btn-primary btn-lg top-right-button mr-1" title="Cadastrar Novo" data-toggle="modal" data-target="#form-pagamento">CADASTRAR</a>
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
								data-order="[[ 1, &quot;asc&quot; ]]">
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
									<?php for ($i=0; $i < 1; $i++) { ?>
									<tr>
										<td class="align-middle"><i class="fas fa-circle text-success"></i></td>
										<td class="align-middle"><span class="data-pagamento">15/07/19</span></td>
										<td class="align-middle"><a href="javascript:" data-toggle="modal" data-backdrop="static" data-target="#detalhe-pagamento">Salário, Ederton Cirino Lima</a></td>
										<td class="align-middle"><span class="badge badge-pill badge-primary">Salário</span></td>
										<td class="align-middle">R$ 2600,00</td>
										<td class="align-middle"><i class="fas fa-lg fa-thumbs-up text-success"></i></td>
									</tr>

									<tr>
										<td><i class="fas fa-circle text-muted"></i></td>
										<td class="align-middle"><span class="data-pagamento">01/05/19</span></td>
										<td><a href="#">Almoço, Mimo Marmitaria</a></td>
										<td><span class="badge badge-pill badge-info">Alimentação</span></td>
										<td>R$ 100,00</td>
										<td><i class="far fa-lg fa-thumbs-up text-muted"></i></td>
									</tr>

									<tr>
										<td><i class="fas fa-circle text-danger"></i></td>
										<td class="align-middle"><span class="data-pagamento">15/12/19</span></td>
										<td><a href="#">Mesas, Roberto Marcineiro</a></td>
										<td><span class="badge badge-pill badge-warning">Escritório</span></td>
										<td>R$ 1250,00</td>
										<td><i class="far fa-lg fa-thumbs-down text-danger"></i></td>
									</tr>
									<?php } ?>
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
					<form>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input class="form-control" />
								<span>Descrição</span>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input class="form-control" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'autoGroup': true, 'digits': 2, 'digitsOptional': false, 'prefix': '€ ', 'placeholder': '0'" />
								<span>Valor</span>
								<small>R$</small>
							</label>

							<label class="form-group col-md-6 has-float-label input-legenda">
								<input class="form-control datepicker" />
								<span>Data de Pagamento</span>
								<small><i class="far fa-calendar-alt"></i></small>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select class="form-control select2-single">
									<option label="1">Boleto</option>
									<option label="2">Trasferência</option>
								</select>
								<span>Método de Pagamento</span>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<select class="form-control select2-single">
									<option label="1">Alimentação</option>
									<option label="2">Salário</option>
									<option label="3">Escritório</option>
								</select>
								<span>Categoria</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<textarea class="form-control" id="message-text"></textarea>
								<span>Observação</span>
							</label>
						</div>
					</form>
				</div>
				<div class="modal-footer hover-item">
					<div class="item item-hover">
						<a href="javascript:" class="text-muted" title="" data-dismiss="modal"><i class="fas fa-times"></i>Cancelar</a>
					</div>
					<div class="item">
						<button type="button" class="btn btn-success"><i class="fas fa-check"></i> Salvar</button>
					</div>
					<div class="item item-hover">
						<a href="javascript:" class="text-muted" title="" data-dismiss="modal"><i class="fas fa-check"></i>Salvar e criar outra</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MODAL DETALHE PAGAMENTO -->
	<div class="modal fade modal-bottom modal-no-scrolling" id="detalhe-pagamento" tabindex="-1" role="dialog"
		aria-labelledby="detalhe-pagamento" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header contaner-info">			
	
					<h2 class="modal-title">
						<i class="fas fa-circle text-success"></i>
						<strong>Salário, Ederton Cirino Lima</strong>
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
	<script src="js/vendor/select2.full.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/mousetrap.min.js"></script>
	<script src="js/vendor/datatables.min.js"></script>
	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript">
		$('.close-det-pagamento').click(function(){
			$('#detalhe-pagamento').modal('hide');
		});

		$('#copiar-pagamento').click(function(){
			//$('#detalhe-pagamento').modal('hide');
		});

		$('#editar-pagamento').click(function(){
			//$('#detalhe-pagamento').modal('hide');
		});

		$(document).ready(function() {
			//$('#form-pagamento').modal('show');
			//$('#form-pagamento').modal('show');
			setInterval(function(){ 
				//$('.modal-backdrop').css('opacity','.5');
			}, 1000);
		});
	</script>
</body>

</html>
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
					<h1><i class="iconsminds-coins"></i> Categorias</h1>

					<div class="text-zero top-right-button-container">
	                    <div class="btn-group mb-1">
	                        <button type="button" class="btn btn-primary" id="btn_nova_categoria" data-toggle="modal" data-target="#nova_categoria"><i class="fas fa-plus" style="margin-right: 5px;"></i> NOVA CATEGORIA</button>
	                    </div>
					</div>
				</div>
			</div>

			<div class="row mb-4">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<table class="table data-table responsive table-striped" 
								data-order="[[ 1, &quot;asc&quot; ]]" id="list-categoria">
								<thead class="no-thead">
									<tr>
										<th></th>
										<th>Título</th>
									</tr>
								</thead>
								<tbody>

									<?php
										$categorias = get_categoria(null);
										//$cadastros = get_cadastros();
										foreach ($categorias as $key => $value) { ?>
											<tr id="categoria-<?php echo $value->ct_id; ?>">
												<td width="30"><i class="fas fa-square" style="font-size: 1.5rem; color: <?php echo $value->ct_color; ?>"></i> </td>
												<td class="align-middle">
													<a href="javascript:" class="editar_categoria" 
														data-id="<?php echo $value->ct_id; ?>" 
														data-nome="<?php echo $value->ct_nome; ?>" 
														data-cor="<?php echo $value->ct_color; ?>">
														<?php echo $value->ct_nome; ?>
													</a>
												</td>
											</tr>
										<?php }
									?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>


	<!-- MODAL EDITAR CATEGORIA -->
	<div class="modal fade" id="editar_categoria" tabindex="-2" role="dialog"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalContentLabel"><i class="fas fa-square text-primary"></i> Editar Categoria</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="form-categoria-editar" novalidate>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input type="text" name="editar_ct_nome" id="editar_ct_nome" class="form-control " required="" />
								<span>Título</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<span class="tit-color">Selecione uma cor: </span>
								<input name="editar_ct_color" id="editar_ct_color" class="form-control ct_color" required="" value="" style="" />
								<ul class="list-cores">
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
								<input type="hidden" name="editar_ct_id" id="editar_ct_id" value="">
								<button type="button" id="submit-form-categoria-editar" class="btn btn-sm btn-success"><i class="fas fa-check"></i> Salvar</button>
								<a href="javascript:" class="btn-excluir-cat text-danger" data-id=""><i class="fas fa-times"></i> Excluir</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


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
								<input name="ct_color" id="ct_color" class="form-control ct_color" required="" value="rgb(240, 240, 240)" style="background-color: rgb(240, 240, 240);" />
								<ul class="list-cores">
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

	<script src="js/vendor/jquery-3.3.1.min.js"></script>
	<script src="js/vendor/bootstrap.bundle.min.js"></script>
	<script src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="js/vendor/bootstrap-notify.min.js"></script>
	<script src="js/vendor/select2.full.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/mousetrap.min.js"></script>
	
	<script src="js/vendor/datatables.min.js"></script>
	<script src="js/vendor/colReorder.bootstrap4.min.js"></script>

    <script src="js/vendor/jquery.validate/jquery.validate.min.js"></script>
    <script src="js/vendor/jquery.validate/additional-methods.min.js"></script>

	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript">

		// datatable
		var tabela_categoria = $('#list-categoria').DataTable({
			responsive: false,
	        bLengthChange: false,
	        searching: true,
	        destroy: true,
	        info: false,
	        sDom: '<"row view-filter"<"col-sm-12"<"float-left"l><"float-right"f><"clearfix">>>t<"row view-pager"<"col-sm-12"<"text-center"ip>>>',
	        pageLength: 8,
	        language: {
	        	emptyTable: "Sem dados disponíveis na tabela",
	          	sSearch: "Pesquisar:&nbsp;&nbsp;&nbsp;",
	          	paginate: {
	            	previous: "<i class='simple-icon-arrow-left'></i>",
	            	next: "<i class='simple-icon-arrow-right'></i>"
	          	}
	        },
	        drawCallback: function () {
	          $($(".dataTables_wrapper .pagination li:first-of-type"))
	            .find("a")
	            .addClass("prev");
	          $($(".dataTables_wrapper .pagination li:last-of-type"))
	            .find("a")
	            .addClass("next");

	          $(".dataTables_wrapper .pagination").addClass("pagination-sm");
	        }
		});


		$(document).ready(function() {
			// excluir categoria
			$('.btn-excluir-cat').click(function(){

					ct_id = $(this).attr('data-id');
					result = new Array();
			
					$.getJSON("db/categoria_excluir.php", { 
						ct_id:ct_id,
					}, function(result){
						
						$('#editar_categoria').modal('hide');
						$('#form-categoria-editar').trigger("reset");

						tabela_categoria
						.row( $('#categoria-'+result.ct_id) )
						.remove()
						.draw();

			            $.notify({
			                title: 'Categoria excluida com sucesso!',
			                message: ''

			            },{
			                type: 'success',
			                placement: {
			                    from: "bottom",
			                    align: "right"
			                },
			            });

						return false;
					});
	    	});


	    	// #form-categoria-novo
			$('#btn_nova_categoria').click(function(){
				$('#form-categoria-novo').trigger("reset");
				$('#form-categoria-novo #ct_color').css('background-color','');	
			});

			$('#submit-form-categoria-novo').click(function(){
				$('#form-categoria-novo').submit(); 		
			});
			$('#form-categoria-novo').validate({
	    		submitHandler: function(form) {

					ct_nome = $('#ct_nome').val();
					ct_color = $('#ct_color').val();
					result = new Array();
			
					$.getJSON("db/categoria_novo.php", { 
						ct_nome:ct_nome,
						ct_color:ct_color
					}, function(result){
						
						$('#nova_categoria').modal('hide');
						$('#form-categoria-novo').trigger("reset");
						$('#form-categoria-novo #ct_color').css('background-color','');

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

						tabela_categoria
						.row.add( [
							'<td width="30"><i class="fas fa-square" style="font-size: 1.5rem; color: '+result.color+'"></i></td>',
							'<td class="sorting_1"><a href="javascript:" class="editar_categoria" data-id="'+result.id+'" data-nome="'+result.titulo+'" data-cor="'+result.color+'">'+result.titulo+'</a></td>'
						] )
						.draw()
						.node()
						.id = 'categoria-'+result.id;

						/*tabela_categoria
						.order( [ 1, 'asc' ] )
						.draw();*/

						/*$( rowNode )
							.css( 'color', 'red' )
							.animate( { color: 'black' } );*/

						return false;
					});
	    		}
	    	});





			// #form-categoria-editar
			$('#submit-form-categoria-editar').click(function(){
				$('#form-categoria-editar').submit(); 		
			});
			$('#form-categoria-editar').validate({
	    		submitHandler: function(form) {

					ct_nome = $('#editar_ct_nome').val();
					ct_color = $('#editar_ct_color').val();
					ct_id = $('#editar_ct_id').val();
					result = new Array();
			
					$.getJSON("db/categoria_editar.php", { 
						ct_id:ct_id,
						ct_nome:ct_nome,
						ct_color:ct_color,
					}, function(result){
						
						$('#editar_categoria').modal('hide');
						$('#form-categoria-editar').trigger("reset");

						$('#categoria-'+result.ct_id+' .fa-square').css('color',result.ct_color);
						$('#categoria-'+result.ct_id+' a').html(result.ct_nome).attr('data-nome',result.ct_nome).attr('data-cor',result.ct_color);

			            $.notify({
			                // options
			                title: 'Categoria alterada com sucesso!',
			                message: ''

			            },{
			                // settings
			                type: 'success',
			                placement: {
			                    from: "bottom",
			                    align: "right"
			                },
			            });


						/*tabela_categoria
						.row.add( [
							'<td width="30"><i class="fas fa-square" style="font-size: 1.5rem; color: '+result.color+'"></i>',
							'<td class="align-middle"><a href="javascript:" class="editar_categoria" rel="'+result.id+'">'+result.titulo+'</a></td>'
						] )
						.draw( false );

						/*tabela_categoria
						.order( [ 1, 'asc' ] )
						.draw();*/

						return false;
					});
	    		}
	    	});

	    });
	</script>

	<script type="text/javascript">
		// pick color
        $('.list-cores li').click(function(){
        	$('.list-cores li').removeClass('active');
        	$(this).addClass('active');
        	color = $(this).attr('rel');
        	$(this).parents('label').find('input').val(color).css('background-color',color);
        });


        // modal editar categoria
		$(document).on('click','.editar_categoria',function(){
        	$('.btn-excluir-cat').attr('data-id',$(this).attr('data-id'));
        	$('#form-categoria-editar input[name="editar_ct_id"]').val($(this).attr('data-id'));
        	$('#form-categoria-editar input[name="editar_ct_nome"]').val($(this).attr('data-nome'));
        	$('#form-categoria-editar input[name="editar_ct_color"]').val($(this).attr('data-cor')).css('background-color',$(this).attr('data-cor'));
        	$('#editar_categoria').modal('show');
		});
        /*$('.editar_categoria').click(function(){

        });*/
	</script>
</body>

</html>
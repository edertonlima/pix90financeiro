<?php 
	include 'include/head.php';
	include 'db/function_db.php';
	$page = 'relatorio';
	$subpage = '';

	/*if(isset($_POST['filtro'])){
		if($_POST['filtro'] == 'on'){ //var_dump($_POST);
			
			if($_POST['data1'] != ''){
				$data = explode("/", $_POST['data1']);
				$data1 = $data[2].'-'.$data[1].'-'.$data[0];

				if($_POST['data2'] != ''){
					$data = explode("/", $_POST['data2']);
					$data2 = $data[2].'-'.$data[1].'-'.$data[0];
				}else{
					$data2 = null;	
				}
			}else{
				$data1 = null;
				$data2 = null;
			}

			if($_POST['filtro_categoria']){
				$filtro_categoria = $_POST['filtro_categoria'];
			}else{
				$filtro_categoria = null;
			}

			$status = $_POST['status'];
			$pagamentos = get_pagamento_filtro($data1,$data2,$filtro_categoria,$status);
		}
	}else{*/
		$data1 = date('Y-m-d',strtotime("-5 day"));
		$data2 = date('Y-m-d',strtotime("+5 day"));
		$filtro_categoria = null;
		$status = 'todos';
		$pagamentos = get_pagamento_filtro($data1,$data2,$filtro_categoria,$status);
	//}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Relatório, Pagamentos</title>
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
					<h1><i class="iconsminds-coins"></i> Relatórios</h1>

					<div class="text-zero top-right-button-container">
	                    <div class="btn-group mb-1">
	                        <button type="button" class="btn btn-outline-primary" id="print">
	                        	<i class="iconsminds-printer"></i>
	                            IMPRIMIR
	                        </button>
	                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <span class="sr-only"></span>
	                        	<i class="simple-icon-cloud-download"></i>
	                            BAIXAR
	                        </button>
	                        <div class="dropdown-menu">
	                            <a class="dropdown-item" href="#" id="pdf"><i class="fas fa-file-pdf"></i> PDF</a>
	                            <a class="dropdown-item" href="#" id="excel"><i class="fas fa-file-excel"></i> EXCEL</a>
	                            <a class="dropdown-item" href="#" id="csv"><i class="fas fa-file-csv"></i> CSV</a>
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
								<?php /* <div class="filtro-data">
									<i class="fas fa-chevron-left"></i>
									<span>11 de Ago à 17 de Ago</span>
									<i class="fas fa-chevron-right"></i>
								</div> */ ?>

<form action="<?php echo $home_url; ?>/relatorio.php" method="post">
	<div class="row mb-4">

		<div class="form-group col-12 col-md-5">
			<div class="input-group mr-2 mb-1" role="group">
				<input name="data1" id="data1" type="text" class="form-control datepicker" placeholder="" value="<?php if($data1){ $date = date_create($data1); echo $date->format('d/m/Y');}; ?>">
				
				<div class="input-group-append">
					<span class="input-group-text" id="basic-addon2">até</span>
				</div>
				
				<input name="data2" id="data2" type="text" class="form-control datepicker" value="<?php if($data2){ $date = date_create($data2); echo $date->format('d/m/Y');}; ?>" style="margin-left: -1px;">
			</div>
		</div>

		<div class="form-group col-12 col-md-7 text-center">
			<div class="btn-group mr-2 mb-1 btn-group-toggle" data-toggle="buttons">
				<label id="todos" class="btn filtro-status-pg btn-outline-primary <?php if($status == 'todos'){ echo 'active'; } ?>" >
					<input type="radio" name="status" value="todos" <?php if($status == 'todos'){ echo 'checked="checked"'; } ?> > Todos
				</label>
				<label id="a-vencer" class="btn filtro-status-pg btn-outline-primary <?php if($status == 'avencer'){ echo 'active'; } ?>">
					<input type="radio" name="status" value="avencer" <?php if($status == 'avencer'){ echo 'checked="checked"'; } ?>> À vencer
				</label>
				<label id="vencidas" class="btn filtro-status-pg btn-outline-primary <?php if($status == 'vencidas'){ echo 'active'; } ?>">
					<input type="radio" name="status" value="vencidas" <?php if($status == 'vencidas'){ echo 'checked="checked"'; } ?>> Vencidas
				</label>
				<label id="pagas" class="btn filtro-status-pg btn-outline-primary <?php if($status == 'pagas'){ echo 'active'; } ?>">
					<input type="radio" name="status" value="pagas" <?php if($status == 'pagas'){ echo 'checked="checked"'; } ?>> Pagas
				</label>
			</div>
		</div>

        <div class="form-group col-12 col-md-5">							
			<select name="filtro_categoria" id="filtro_categoria" class="form-control select2-single">
				<option value="0">Todas as categorias</option>
				<?php
					$categorias = get_categoria(null);
					//$cadastros = get_cadastros();
					foreach ($categorias as $key => $value) { ?>
						<option value="<?php echo $value->ct_id; ?>" <?php if($filtro_categoria == $value->ct_id){ echo 'selected="selected"'; } ?>><?php echo $value->ct_nome; ?></option>
					<?php }
				?>
			</select>
		</div>

        <div class="form-group col-12 col-md-5">							
			<select name="filtro_cadastro" id="filtro_cadastro" class="form-control select2-single">
				<option value="0">Todas os Beneficiário</option>
				<?php
					$cadastro = get_cadastros();
					//$cadastros = get_cadastros();
					foreach ($cadastro as $key => $value) { ?>
						<option value="<?php echo $value->cd_id; ?>"><?php echo $value->cd_nome; ?></option>
					<?php }
				?>
			</select>
		</div>

		<div class="form-group col-12 col-md-2">
            <div class="input-group-append" style="justify-content: right;">
            	<input type="hidden" name="filtro" value="on">
                <button class="btn btn-primary" type="button" id="filtro">FILTRAR</button>
            </div>
        </div>

		<?php /*<div class="input-group col-md-4">

			<label class="form-group btn-group-sm col-md-4">
				<select name="estado" id="estado" class="form-control select2-single">
					<?php
						$categorias = get_categoria(null);
						//$cadastros = get_cadastros();
						foreach ($categorias as $key => $value) { ?>
							<option value="<?php echo $value->ct_id; ?>" <?php if($value->ct_id == 1): echo 'selected="selected"'; endif; ?>><?php echo $value->ct_nome; ?></option>
						<?php }
					?>
				</select>
			</label>

		</div>*/ ?>
	</div>
</form>

							</div>
							<table class="table data-table responsive table-striped" 
								data-order="[[ 0, &quot;asc&quot; ]]" id="relatorio">
								<thead class="">
									<tr>
										<th width="80">Data</th>
										<th>Descrição</th>
										<th>Beneficiário</th>
										<th width="150">Categoria</th>
										<th width="100">Valor</th>
										<th width="80">Pago em</th>
									</tr>
								</thead>
								<tbody>
									<?php //var_dump($pagamentos); if(count($pagamentos) > 0){
										$i = 0;
										if($pagamentos){
											foreach ($pagamentos as $key => $pagamento) { ?>
												<tr>
													<td class="align-middle">
														<?php
		                                            		$date = date_create($pagamento->pg_data);
		                                            		echo $date->format('d/m/Y');
		                                            	?>													
													</td>
													<td class="align-middle">
														<?php echo $pagamento->pg_descricao; ?>
													</td>

													<td>
														<?php
															$cadastro = get_cadastro($pagamento->cd_id);
															echo $cadastro->cd_nome;
														?>
													</td>

													<td class="align-middle">
														<?php
															if($pagamento->ct_id != 0){
																$categoria_current = get_categoria($pagamento->ct_id);
																foreach ($categoria_current as $key => $categoria) { 
																	
																	echo $categoria->ct_nome;

																}
															}
														?>
													</td>
													<td class="align-middle">
														R$<?php echo number_format($pagamento->pg_valor, 2, ',', '.'); ?>
													</td>
													<td class="align-middle" align="">
														<?php if($pagamento->pg_datapagamento){ ?>
															<?php
			                                            		$date = date_create($pagamento->pg_datapagamento);
			                                            		echo $date->format('d/m/Y');
			                                            	?>	
														<?php }else{ /*?>
															<i class="fas fa-ellipsis-h text-muted"></i>
														<?php */} ?>
													</td>
												</tr>
											<?php $i = $i+1; }
										}
									//} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="js/vendor/jquery-3.3.1.min.js"></script>
	<script src="js/vendor/bootstrap.bundle.min.js"></script>
	<script src="js/vendor/perfect-scrollbar.min.js"></script>
	<script src="js/vendor/select2.full.js"></script>
	<script src="js/vendor/bootstrap-datepicker.js"></script>
	<script src="js/vendor/mousetrap.min.js"></script>

	<script src="js/vendor/datatables.min.js"></script>
	<script src="js/vendor/dataTables.buttons.min.js"></script>
	<script src="js/vendor/jszip.min.js"></script>
	<script src="js/vendor/pdfmake.min.js"></script>
	<script src="js/vendor/vfs_fonts.js"></script>
	<script src="js/vendor/buttons.html5.min.js"></script>
	<script src="js/vendor/buttons.print.min.js"></script>

    <script src="js/vendor/jquery.validate/jquery.validate.min.js"></script>

	<script src="js/dore-plugins/select.from.library.js"></script>
	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>

	<script type="text/javascript">

	$(document).ready(function() {

	    $('#print').click(function(){
	    	$('.buttons-print').trigger('click');  
	    });

	    $('#excel').click(function(){
	    	$('.buttons-excel').trigger('click');  
	    });

	    $('#csv').click(function(){
	    	$('.buttons-csv').trigger('click');  
	    });

	    $('#pdf').click(function(){
	    	$('.buttons-pdf').trigger('click');  
	    });

	});

	</script>

	<?php include 'js_filtro.php'; ?>
</body>

</html>
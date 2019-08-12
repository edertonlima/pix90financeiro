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

<form>

	<main>
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<h1><i class="iconsminds-add-user"></i> Novo Cadastro</h1>

					<div class="text-zero top-right-button-container">
						<button type="submit" class="btn btn-primary btn-lg top-right-button mr-1">CADASTRAR</button>
					</div>
				</div>
			</div>

			<div class="row">
			   <div class="col-6">
				<div class="card">
					<div class="card-body">
						<h5 class="mb-4">Informações Gerais</h5>

						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input class="form-control" />
								<span>Nome</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<textarea class="form-control"></textarea>
								<span>Resumo</span>
							</label>


							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" type="text">
								<span>Data de Nascimento</span>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>CPF / CNPJ</span>
							</label>
						
							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Endereço</span>
							</label>

							<label class="form-group col-md-2 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Número</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Bairro</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<select class="form-control select2-single">
									<option label="&nbsp;">&nbsp;</option>

									<optgroup label="Alaskan/Hawaiian Time Zone">
										<option value="AK">Alaska</option>
										<option value="HI">Hawaii</option>
									</optgroup>
									<optgroup label="Pacific Time Zone">
										<option value="CA">California</option>
										<option value="NV">Nevada</option>
										<option value="OR">Oregon</option>
										<option value="WA">Washington</option>
									</optgroup>
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option>
										<option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
									<optgroup label="Central Time Zone">
										<option value="AL">Alabama</option>
										<option value="AR">Arkansas</option>
										<option value="IL">Illinois</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="OK">Oklahoma</option>
										<option value="SD">South Dakota</option>
										<option value="TX">Texas</option>
										<option value="TN">Tennessee</option>
										<option value="WI">Wisconsin</option>
									</optgroup>
									<optgroup label="Eastern Time Zone">
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="IN">Indiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="OH">Ohio</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WV">West Virginia</option>
									</optgroup>
									<option value="TNOGZ" disabled="disabled">The No Optgroup Zone</option>
									<option value="TPZ">The Panic Zone</option>
									<option value="TTZ">The Twilight Zone</option>
								</select>
								<span>Estado</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control" placeholder="">
								<span>Cidade</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control" placeholder="">
								<span>CEP</span>
							</label>
						</div>

							<?php /* <button class="btn btn-primary" type="submit">Sign up</button> */ ?>
						
					</div>
				</div>
				</div>

			   <div class="col-6">
			   <div class="card">
					<div class="card-body">
						<h5 class="mb-4">Informações Gerais</h5>

						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input class="form-control" />
								<span>Nome</span>
							</label>

							<label class="form-group col-md-12 has-float-label">
								<textarea class="form-control"></textarea>
								<span>Resumo</span>
							</label>


							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" type="text">
								<span>Data de Nascimento</span>
							</label>

							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>CPF / CNPJ</span>
							</label>
						
							<label class="form-group col-md-6 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Endereço</span>
							</label>

							<label class="form-group col-md-2 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Número</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control datepicker" placeholder="">
								<span>Bairro</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control" placeholder="">
								<span>Cidade</span>
							</label>

							<label class="form-group col-md-4 has-float-label">
								<input class="form-control" placeholder="">
								<span>CEP</span>
							</label>
						</div>

						<h5 class="mb-4">Informações Gerais</h5>
						<div class="form-row">
							<label class="form-group col-md-12 has-float-label">
								<input class="form-control" />
								<span>Nome</span>
							</label>
						</div>

							<?php /* <button class="btn btn-primary" type="submit">Sign up</button> */ ?>
						
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
	<script src="js/dore.script.js"></script>
	<script src="js/scripts.js"></script>
</body>

</html>
<?php 
    include 'include/head.php';
    $page = 'cadastro';
    $subpage = 'cadastro-all'
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dore jQuery</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
    <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />
    <link rel="stylesheet" href="css/vendor/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/vendor/datatables.responsive.bootstrap4.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/bootstrap.rtl.only.min.css" />
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
                    <h1>Todos os Cadastro</h1>

                    <div class="text-zero top-right-button-container">
                        <a href="#" class="btn btn-primary btn-lg top-right-button mr-1" title="Cadastrar Novo">CADASTRAR</a>
                    </div>
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table data-table data-tables-pagination responsive table-striped"
                                data-order="[[ 0, &quot;asc&quot; ]]">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th class="">E-mail</th>
                                        <th>Telefone</th>
                                        <th>Função</th>
                                        <?php /*<th></th>*/ ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < 20; $i++) { ?>
                                    <tr>
                                        <td><strong><a href="<?php echo $home_url; ?>/cadastro-view.php">Roberta Silva Rodrigues Pereira Junior</a></strong></td>
                                        <td><a href="mailto:marble@gmail.com" title="Enviar E-mail">marble@gmail.com</a></td>
                                        <td><a href="tel:(14) 9 9825-2545" title="Fazer Ligação">(14) 9 9825-2545</a></td>
                                        <td><span class="badge badge-pill badge-primary">Digitador</span></td>
                                        <?php /*<td><a href="#" class="badge badge-danger mb-1"><i class="simple-icon-note"></i> Editar</a></td>*/ ?>
                                    </tr>
                                    <tr>
                                        <td><strong><a href="<?php echo $home_url; ?>/cadastro-view.php">Marble Cake</a></strong></td>
                                        <td><a href="mailto:marble@gmail.com" title="Enviar E-mail">marble@gmail.com</a></td>
                                        <td><a href="tel:(14) 9 9825-2545" title="Fazer Ligação">(14) 9 9825-2545</a></td>
                                        <td><span class="badge badge-pill badge-primary">Digitador</span></td>
                                        <?php /*<td><a href="#" class="badge badge-danger mb-1"><i class="simple-icon-note"></i> Editar</a></td>*/ ?>
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

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/datatables.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

</body>

</html>
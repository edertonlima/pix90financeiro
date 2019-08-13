<?php 
    include 'include/head.php';
    $page = 'cadastro';
    $subpage = 'cadastro-det'
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
    <link rel="stylesheet" href="css/vendor/perfect-scrollbar.css" />
    <link rel="stylesheet" href="css/vendor/select2.min.css" />
    <link rel="stylesheet" href="css/vendor/select2-bootstrap.min.css" />
    <link rel="stylesheet" href="css/vendor/component-custom-switch.min.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body id="app-container" class="menu-default show-spinner">

    <?php include 'include/nav-top.php'; ?>
    <?php include 'include/menu.php'; ?>

    <main>
        <div class="container-fluid">
            <div class="row app-row ">
                <div class="col-12 survey-app">
                    <div class="mb-2">
                        <h1>
                            <i class="iconsminds-male"></i>
                            Ederton Cirino Lima
                        </h1>
                        <div class="text-zero top-right-button-container">
                            <button type="button"
                                class="btn btn-lg btn-outline-primary dropdown-toggle dropdown-toggle-split top-right-button top-right-button-single"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                AÇÕES
                            </button>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Editar</a>
                                <a class="dropdown-item" href="#">Excluir</a>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card mb-4">
                                <div class="position-absolute card-top-buttons">
                                    <button class="btn btn-header-light icon-button">
                                        <i class="simple-icon-pencil"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="list-item-heading mb-4">Informações Gerais</p>
                                    <p class="text-muted text-small mb-2">Nome</p>
                                    <p class="mb-3">Ederton Lima</p>
                                    <p class="text-muted text-small mb-2">Resumo</p>
                                    <p class="mb-3">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    </p>

                                    <p class="text-muted text-small mb-2">Data de Nascimento</p>
                                    <p class="mb-3">
                                        12/06/1988
                                    </p>

                                    <p class="text-muted text-small mb-2">CPF / CNPJ</p>
                                    <p class="mb-3">
                                        24.875.587-87
                                    </p>

                                    <p class="text-muted text-small mb-2">Endereço</p>
                                    <p class="mb-3">
                                        Rua João Urias Batista, 665
                                        <br>
                                        Vila Santista, Bauru, SP
                                        <br>
                                        17054-610
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card mb-4">
                                <div class="position-absolute card-top-buttons">
                                    <button class="btn btn-header-light icon-button">
                                        <i class="simple-icon-pencil"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="list-item-heading mb-4">Informações de Contato</p>

                                    <p class="text-muted text-small mb-2">E-mail</p>
                                    <p class="mb-3"><a href="mailto:marble@gmail.com" title="Enviar E-mail">marble@gmail.com</a></p>

                                    <p class="text-muted text-small mb-2">Telefone</p>
                                    <p class="mb-3"><a href="tel:(14) 9 9825-2545" title="Fazer Ligação"> (14) 9 9825-2545</a></p>
<?php /*
                                    <p class="text-muted text-small mb-2">Social</p>
                                    <div class="social-icons">
                                        <ul class="list-unstyled list-inline">
                                            <li class="list-inline-item">
                                                <a href="#"><i class="simple-icon-social-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="simple-icon-social-twitter"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#"><i class="simple-icon-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
*/ ?>
                                </div>
                            </div>

                            <div class="card mb-4">
                                <div class="position-absolute card-top-buttons">
                                    <button class="btn btn-header-light icon-button">
                                        <i class="simple-icon-pencil"></i>
                                    </button>
                                </div>
                                <div class="card-body">
                                    <p class="list-item-heading mb-4">Método de Pagamento</p>

                                    <p class="text-muted text-small mb-2">Transferência Bancária</p>
                                    <p class="mb-3">
                                        Banco Itaú<br>
                                        Agência: 00975-3<br>
                                        Conta Corrênte: 12784-5
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-12 mb-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p class="list-item-heading mb-4">Notas</p>                           

                                    <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                        <div class="pl-3 flex-grow-1">
                                            <p class="font-weight-medium mb-0">Altivo Martins Jr.</p>
                                            <p class="text-muted mb-0 text-small">05 de Jan, 2019</p>
                                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row mb-3 border-bottom justify-content-between">
                                        <div class="pl-3 flex-grow-1">
                                            <p class="font-weight-medium mb-0">Bruna Roberta</p>
                                            <p class="text-muted mb-0 text-small">06 de Jan, 2019</p>
                                            <p class="mt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut.</p>
                                        </div>
                                    </div>

                                    <div class="comment-contaiener">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Adicione uma nota">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button"><span class="d-inline-block">Gravar</span> <i class="simple-icon-arrow-right ml-2"></i></button>
                                            </div>
                                        </div>
                                    </div>                                
                                    
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <div class="app-menu">
            <div class="p-4 h-100">
                <div class="scroll">

                    <p class="text-muted text-small">Pendentes de Pagamentos</p>
                    <ul class="list-unstyled mb-5">
                        <li>
                            <i class="iconsminds-like text-danger"></i>
                            01 de Ago, 2019
                            <span class="float-right text-danger">R$ 343,00</span>
                        </li>
                    </ul>

                    <p class="text-muted text-small">Próximos Pagamentos</p>
                    <ul class="list-unstyled mb-5">
                        <li>
                            <i class="iconsminds-like"></i>
                            12 de Ago, 2019
                            <span class="float-right">R$ 1750,00</span>
                        </li>
                        <li>
                            <i class="iconsminds-like"></i>
                            20 de Ago, 2019
                            <span class="float-right">R$ 600,00</span>
                        </li>
                        <li>
                            <i class="iconsminds-like"></i>
                            21 de Ago, 2019
                            <span class="float-right">R$ 250,00</span>
                        </li>
                    </ul>


                    <p class="text-muted text-small">Últimos Pagamentos</p>
                    <ul class="list-unstyled mb-5">
                        <li class="">
                            <i class="iconsminds-like text-success"></i>
                            01 de Ago, 2019
                            <span class="float-right text-success">R$ 180,00</span>
                        </li>
                    </ul>

                </div>
            </div>
            <a class="app-menu-button d-inline-block d-xl-none" href="#">
                <i class="simple-icon-options"></i>
            </a>
        </div>

    </main>

    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/vendor/perfect-scrollbar.min.js"></script>
    <script src="js/vendor/bootstrap-notify.min.js"></script>
    <script src="js/vendor/Chart.bundle.min.js"></script>
    <script src="js/vendor/Sortable.js"></script>
    <script src="js/vendor/select2.full.js"></script>
    <script src="js/vendor/mousetrap.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>

    <script type="text/javascript">
        <?php if($_GET['cadastro'] == 'success'){ ?>
            $.notify({
                // options
                title: 'Cadastro realizado com sucesso!',
                message: '' 

            },{
                // settings
                type: 'success',
                placement: {
                    from: "bottom",
                    align: "right"
                },
            });
        <?php } ?>
    </script>
</body>

</html>
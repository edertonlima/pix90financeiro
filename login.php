<?php
    session_start(); 
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
    <link rel="stylesheet" href="css/main.css" />
</head>

<body class="background show-spinner">
    <div class="fixed-background"></div>
    <main>
        <div class="container">
            <div class="row h-100">
                <div class="col-12 col-md-10 mx-auto my-auto">
                    <div class="card auth-card login">
                        <div class="position-relative image-side ">

                            <div class="block-vertical-center">
                                <div class="vertical-center">
                                    <img src="img/pix90.jpg" style="width: 100%;" />
                                </div>
                            </div>

                            <?php /*<p class=" text-white h2">MAGIC IS IN THE DETAILS</p>

                            <p class="white mb-0">
                                Please use your credentials to login.
                                <br>If you are not a member, please
                                <a href="#" class="white">register</a>.
                            </p> */ ?>
                        </div>
                        <div class="form-side">
                            <?php /*<a href="Dashboard.Default.html">
                                <span class="logo-single"></span>
                            </a>
                            <h6 class="mb-4">Login</h6> */ ?>

                            <div class="block-vertical-center">
                                <div class="vertical-center">
                                    
                                    <?php
                                        //isset($_POST["erro_login"]) ? echo '<p>' . $_POST["erro_login"] . '</p>';
                                        echo !isset($_SESSION["erro_login"]) ?? $_SESSION["erro_login"];
                                        echo $_SESSION["erro_login"];
                                    ?>

                                    <form action="include/login.php" method="post">
                                        <label class="form-group has-float-label mb-4">
                                            <input class="form-control" name="email" />
                                            <span>E-mail</span>
                                        </label>

                                        <label class="form-group has-float-label mb-4">
                                            <input class="form-control" type="password" placeholder="" name="Senha" />
                                            <span>Senha</span>
                                        </label>

                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="#">Esqueceu a sua senha?</a>
                                            <button class="btn btn-primary btn-lg btn-shadow" type="submit">ENTRAR</button>
                                        </div>
                                    </form>


                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="js/vendor/jquery-3.3.1.min.js"></script>
    <script src="js/vendor/bootstrap.bundle.min.js"></script>
    <script src="js/dore.script.js"></script>
    <script src="js/scripts.js"></script>
</body>

</html>
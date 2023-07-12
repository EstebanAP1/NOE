<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="description" content="NOE CajacopiEPS">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Esteban Padilla">
    <meta name="theme-color" content="#343a40">
    <link rel="shortcut icon" href="<?= media() ?>/images/logo_icon.svg" type="image/x-icon">
    <title>
        <?= $data['page_tag'] ?>
    </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= media() ?>/plugins/bootstrap/css/bootstrap-4.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= media() ?>/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= media() ?>/css/main.min.css">
    <!-- Own style -->
    <link rel="stylesheet" href="<?= media() ?>/css/style.css">
    <!-- Font Awesome -->
    <script src="<?= media() ?>/plugins/fontawesome/fontawesome.js"></script>
</head>

<body>
    <div id="divLoading">
        <div>
            <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
        </div>
    </div>
    <div class="login-page">
        <div class="login-box">
            <div class="card card-outline card-primary">
                <div class="card-header text-center login-logo">
                    <a><b>NOE</b> Inventarios</a>
                </div>
                <div class="card-body login-card-body">
                    <p class="login-box-msg">
                        <?= $data['page_title'] ?>
                    </p>
                    <form id="formLogin" name="formLogin">
                        <div class="input-group mb-3">
                            <input type="text" id="txtUsuario" name="txtUsuario" class="form-control valid validEmpty"
                                placeholder="Usuario">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" id="txtPass" name="txtPass" class="form-control valid validEmpty"
                                placeholder="Contraseña">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        const base_url = "<?= base_url() ?>";
        const nav_link = "";
        const nav_link_father = "";
    </script>
    <!-- jQuery -->
    <script src="<?= media() ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= media() ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sweetalert2 -->
    <script src="<?= media() ?>/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Template scripts -->
    <script src="<?= media() ?>/js/main.min.js"></script>
    <!-- Own scripts -->
    <script src="<?= media() ?>/js/functions/general.js"></script>
    <script src="<?= media() ?>/js/functions/<?= $data['page_function'] ?>"></script>
</body>

</html>
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
    <!-- Bootsrap select -->
    <link rel="stylesheet" href="<?= media() ?>/plugins/bootstrap-select/bootstrap-select.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= media() ?>/plugins/datatable/datatables/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="<?= media() ?>/plugins/datatable/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= media() ?>/plugins/datatable/buttons/css/buttons.bootstrap4.min.css">
    <!-- Template style -->
    <link rel="stylesheet" href="<?= media() ?>/css/main.min.css">
    <!-- Own style -->
    <link rel="stylesheet" href="<?= media() ?>/css/style.css">
    <!-- Font Awesome -->
    <script src="<?= media() ?>/plugins/fontawesome/fontawesome.js"></script>
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button" id="openSidebar"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= media() ?>/images/user-image.png" class="user-image img-circle elevation-2"
                            alt="User Image">

                        <span class="d-none d-md-inline">
                            <?= $_SESSION['userData']['nombres'] ?>
                        </span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="<?= media() ?>/images/user-image.png" class="user-image img-circle elevation-3"
                                alt="User Image">
                            <p>
                                <?= $_SESSION['userData']['nombres'] ?> -
                                <?= $_SESSION['userData']['nombrerol'] ?>
                                <small>Miembro desde
                                    <?= $_SESSION['userData']['fechaCreacion'] ?>
                                </small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Perfil</a>
                            <a href="<?= base_url() ?>/logout" class="btn btn-default btn-flat float-right">Cerrar
                                sesión</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
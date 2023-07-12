<?php
setHeader($data);
setNav($data);
getModal('modalUsuarios', $data);
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-tag"></i>
                        <?= $data['page_title'] ?>
                        <button type="button" class="btn btn-primary" id="btnCreateUser" data-toggle="tooltip"
                            data-placement="top" title="Crear nuevo usuario">
                            <i class="fas fa-circle-plus"></i> Nuevo
                        </button>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>"><i class="fas fa-house"></i></a>
                        </li>
                        <li class="breadcrumb-item active">
                            <?= $data['page_name'] ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="tableUsuario" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Usuario</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Usuario</th>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<?= setFooter($data) ?>
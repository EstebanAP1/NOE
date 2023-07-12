<?php
setHeader($data);
setNav($data);
getModal('modalRoles', $data);
?>

<div id="contentAjax"></div>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-user-tag"></i>
                        <?= $data['page_title'] ?>
                        <button type="button" class="btn btn-primary" id="btnCreateRol" data-toggle="tooltip"
                            data-placement="top" title="Crear nuevo rol">
                            <i class="fas fa-circle-plus"></i> Nuevo
                        </button>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>/dashboard"><i class="fas fa-house"></i></a>
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
                <table id="tableRoles" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
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
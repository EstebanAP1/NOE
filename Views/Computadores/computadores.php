<?php
setHeader($data);
setNav($data);
getModal('modalComputadores', $data);
?>

<div id="contentAjax"></div>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        <i class="fas fa-house"></i>
                        <?= $data['page_title'] ?>
                        <button type="button" class="btn btn-primary btnCreatePC" data-toggle="tooltip"
                            data-placement="top" title="Crear nuevo usuario">
                            <i class="fas fa-circle-plus"></i> Nuevo
                        </button>
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="tableComputador" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Seccional</th>
                            <th>Tipo</th>
                            <th>Serial</th>
                            <th>Nombre PC</th>
                            <th>Funcionario</th>
                            <th>Responsable</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Seccional</th>
                            <th>Tipo</th>
                            <th>Serial</th>
                            <th>Nombre PC</th>
                            <th>Funcionario</th>
                            <th>Responsable</th>
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
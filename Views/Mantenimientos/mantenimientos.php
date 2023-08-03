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
                    </h1>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body">
                <table id="tableMantenimiento" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Seccional</th>
                            <th>Tipo</th>
                            <th>Serial</th>
                            <th>Area</th>
                            <th>Funcionario</th>
                            <th>Fecha mantenimiento</th>
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
                            <th>Area</th>
                            <th>Funcionario</th>
                            <th>Fecha mantenimiento</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </section>
</div>

<?= setFooter($data) ?>
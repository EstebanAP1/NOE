<?php
setHeader($data);
setNav($data);
?>

<div id="contentAjax"></div>
<div id="contentAjaxViewActa"></div>
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
        <div class="card mantenimientos-card">
            <div class="card-header pb-0">
                <ul class="nav nav-tabs" id="custom-tabs-two-tab" role="tablist" style="border: none;">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-two-pendientes-tab" data-toggle="pill"
                            href="#custom-tabs-two-pendientes" role="tab" aria-controls="custom-tabs-two-pendientes"
                            aria-selected="true">Pendientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-two-realizados-tab" data-toggle="pill"
                            href="#custom-tabs-two-realizados" role="tab" aria-controls="custom-tabs-two-realizados"
                            aria-selected="false">Realizados</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-two-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-two-pendientes" role="tabpanel"
                        aria-labelledby="custom-tabs-two-pendientes-tab">

                        <table id="tableMantenimientoPendiente" class="table table-bordered table-hover">
                            <thead style="background-color: #343a40; color: #fff;">
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
                        </table>

                    </div>
                    <div class="tab-pane fade" id="custom-tabs-two-realizados" role="tabpanel"
                        aria-labelledby="custom-tabs-two-realizados-tab">
                        <table id="tableMantenimientoRealizado" class="table table-bordered table-hover">
                            <thead style="background-color: #343a40; color: #fff;">
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
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?= setFooter($data) ?>
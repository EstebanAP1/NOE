<?= setHeader($data) ?>
<?= setNav($data) ?>

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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box bg-dark">
                        <span class="info-box-icon bg-danger"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Actas pendientes</span>
                            <span class="info-box-number">200</span>
                            <div class="progress">
                                <div class="progress-bar" style="width: 10%"></div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="m-1" style="background-color: black;">a</div>

                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="m-1" style="background-color: black;">a</div>

                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="m-1" style="background-color: black;">a</div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Gráfica 1 (Datos provisionales)</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="chart">
                                        <canvas id="myChart" height="100"></canvas>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="info-box mb-5 bg-dark">
                                        <span class="info-box-icon"><i class="fas fa-tag"></i></span>
                                        <div class="info-box-content">
                                            <span class="info-box-text">Total equipos</span>
                                            <span class="info-box-number">100</span>
                                        </div>

                                    </div>

                                    <div class="progress-group">
                                        <span class="progress-text">Escritorio</span>
                                        <span class="float-right"><b>30</b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-danger" style="width: 30%"></div>
                                        </div>
                                    </div>

                                    <div class="progress-group">
                                        <span class="progress-text">Portatil</span>
                                        <span class="float-right"><b>70</b>/100</span>
                                        <div class="progress progress-sm">
                                            <div class="progress-bar bg-success" style="width: 70%"></div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Gráfica 2</h5>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-md-8">
                                    <div class="chart">
                                        <canvas id="myChart2" height="100"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= setFooter($data) ?>
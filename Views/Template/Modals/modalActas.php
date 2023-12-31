<div class="modal fade modalCargueActas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title">Subir acta de entrega para
                    <?= $data['serial'] ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" style="color: #fff;" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formCargueActa" name="formCargueActa" enctype="multipart/form-data" method="post">
                    <div class="form-group">
                        <input type="hidden" id="serialActa" name="serialActa" value="<?= $data['serial'] ?>">
                    </div>
                    <div class="form-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="fileActa" name="fileActa"
                                accept="application/pdf, .doc, .docx, .odf">
                            <label class="custom-file-label" for="fileActa">Elegir acta</label>
                        </div>
                    </div>
                    <div class="text-center mt-3">
                        <button type="submit" id="btnActionForm" class="btn btn-success"><i class="fas fa-upload"></i>
                            <span>Cargar</span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="far fa-xmark-circle"></i>
                            Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade modalViewActas" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="titleModal" class="modal-title">Historial de actas para
                    <?= $data['serial'] ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" style="color: #fff;" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="serialActa" id="serialActa" value="<?= $data['serial'] ?>">
                <table id="tableActas" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>ID</th>
                            <th>Funcionario</th>
                            <th>Responsable</th>
                            <th>Fecha</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
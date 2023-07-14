<div class="modal fade modalAddComments" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header headerComments">
                <h5 class="modal-title">Comentarios de actualización para
                    <?= $data['serial'] ?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formComentarios" name="formComentarios">
                    <?php
                    $cambios = $data['cambios'];

                    foreach ($cambios as $key => $value) {
                        ?>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                    <?= ucwords($key) ?>
                                </span>
                            </div>
                            <textarea class="form-control valid validEmpty" id="<?= $value ?>" name="<?= $value ?>" rows="1"
                                placeholder="Observación para <?= $key ?>"
                                style="min-height: 2.5rem;max-height: 10rem;"></textarea>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="mt-3">
                        <button type="submit" id="btnActionForm" class="btn btn-success"><i
                                class="far fa-check-circle"></i>
                            <span id="btnText">Guardar</span>
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                class="far fa-xmark-circle"></i>
                            Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
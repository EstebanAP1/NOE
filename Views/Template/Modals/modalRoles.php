<div class="modal fade modalFormRol" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header">
                <h5 id="titleModal" class="modal-title">Crear rol</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" style="color: #fff;" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRol" name="formRol">
                    <input type="hidden" id="idRol" name="idRol" value="">
                    <div class="form-group">
                        <label for="txtNombre">Nombre</label>
                        <input type="text" class="form-control valid validEmpty" id="txtNombre" name="txtNombre"
                            placeholder="Nombre del rol">
                    </div>
                    <div class="form-group">
                        <label for="txtDescripcion">Descripción</label>
                        <textarea class="form-control valid validEmpty" id="txtDescripcion" name="txtDescripcion"
                            rows="2" placeholder="Descripción del rol"
                            style="min-height: 3rem;max-height: 10rem;"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="listEstado">Estado</label>
                        <select class="custom-select" id="listEstado" name="listEstado">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btnActionForm" class="btn btn-primary"><i
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
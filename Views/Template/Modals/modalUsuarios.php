<div class="modal fade modalFormUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header headerRegister">
                <h5 id="titleModal" class="modal-title">Crear usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formUsuario" name="formUsuario" class="form-horizontal">
                    <input type="hidden" id="idUsuario" name="idUsuario" value="">
                    <p class="text-primary">Todos los campos son obligatorios</p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtId">Identificación</label>
                            <input type="number" class="form-control valid validNumber" id="txtId" name="txtId"
                                placeholder="Identificación personal" onkeypress="return controlTag(event)">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtUsuario">Usuario</label>
                            <input type="text" class="form-control valid validEmpty" id="txtUsuario" name="txtUsuario"
                                placeholder="Escribe el usuario">
                        </div>
                        <div class="form-group col-md-6 divPass">
                            <label for="txtPass">Contraseña</label>
                            <input type="password" class="form-control valid validEmpty" id="txtPass" name="txtPass"
                                placeholder="Escribe la contraseña"></input>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listRol">Tipo de usuario</label>
                            <select class="show-tick show-menu-arrow form-control" data-size="6" data-live-search="true"
                                title="Selecciona un rol de usuario" id="listRol" name="listRol">
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="listEstado">Estado</label>
                            <select class="selectpicker show-tick show-menu-arrow form-control" id="listEstado"
                                name="listEstado">
                                <option value="1">Activo</option>
                                <option value="2">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="text-center mt-3">
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

<div class="modal fade modalViewUsuario" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header headerView">
                <h5 id="titleModal" class="modal-title">Datos de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body table-responsive p-0" style="height: 100%;">
                    <table class="table table-hover table-bordered">
                        <tbody>
                            <tr>
                                <td>ID Usuario:</td>
                                <td id="celId"></td>
                            </tr>
                            <tr>
                                <td>Usuario:</td>
                                <td id="celUsuario"></td>
                            </tr>
                            <tr>
                                <td>Nombre:</td>
                                <td id="celNombre"></td>
                            </tr>
                            <tr>
                                <td>Rol:</td>
                                <td id="celRol"></td>
                            </tr>
                            <tr>
                                <td>Estado:</td>
                                <td id="celEstado"></td>
                            </tr>
                            <tr>
                                <td>Fecha registro:</td>
                                <td id="celCreated"></td>
                            </tr>
                            <tr>
                                <td>Última actualización:</td>
                                <td id="celUpdated"></td>
                            </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
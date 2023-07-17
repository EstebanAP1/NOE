<div class="modal fade modalFormComputadores" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header headerRegister">
                <h5 id="titleModal" class="modal-title">Agregar computador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <form id="formComputador" name="formComputador" class="form-horizontal">
                    <input type="hidden" id="accion" name="accion">
                    <p class="text-primary">Verifica los campos antes de terminar</p>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="listTipo">Tipo</label>
                            <select class="selectpicker show-tick show-menu-arrow form-control valid" id="listTipo"
                                name="listTipo">
                                <option value="ESCRITORIO">Escritorio</option>
                                <option value="PORTATIL">Portatil</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listMarca">Marca</label>
                            <select class="show-tick show-menu-arrow form-control valid" data-size="6"
                                data-live-search="true" title="Selecciona la marca" id="listMarca" name="listMarca">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listModelo">Modelo</label>
                            <select class="show-tick show-menu-arrow form-control valid" data-size="6"
                                data-live-search="true" title="Selecciona el modelo" id="listModelo" name="listModelo">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listCPU">Procesador</label>
                            <select class="show-tick show-menu-arrow form-control valid" data-size="6"
                                data-live-search="true" title="Selecciona el procesador" id="listCPU" name="listCPU">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listDisco">Disco</label>
                            <select class="show-tick show-menu-arrow form-control valid" data-size="6"
                                data-live-search="true" title="Selecciona el espacio" id="listDisco" name="listDisco">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listRAM">RAM</label>
                            <select class="show-tick show-menu-arrow form-control valid" data-size="6"
                                data-live-search="true" title="Selecciona la RAM" id="listRAM" name="listRAM">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listProcedencia">Procedencia</label>
                            <select class="selectpicker show-tick show-menu-arrow form-control valid"
                                id="listProcedencia" name="listProcedencia">
                                <option value="PROPIO">Propio</option>
                                <option value="RENTADO">Rentado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtSerial">Serial</label>
                            <input type="text" class="form-control valid validEmpty" id="txtSerial" name="txtSerial"
                                placeholder="Serial PC">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtSerialTIC">Serial TIC</label>
                            <input type="text" class="form-control valid validEmpty" id="txtSerialTIC"
                                name="txtSerialTIC" placeholder="Serial TIC PC"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtPantalla">Pantalla</label>
                            <input type="text" class="form-control valid validEmpty" id="txtPantalla" name="txtPantalla"
                                placeholder="Serial de pantalla">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtPantallaTIC">Pantalla TIC</label>
                            <input type="text" class="form-control valid validEmpty" id="txtPantallaTIC"
                                name="txtPantallaTIC" placeholder="Pantalla TIC">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtTeclado">Teclado</label>
                            <input type="text" class="form-control valid validEmpty" id="txtTeclado" name="txtTeclado"
                                placeholder="Serial de teclado"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtTecladoTIC">Teclado TIC</label>
                            <input type="text" class="form-control valid validEmpty" id="txtTecladoTIC"
                                name="txtTecladoTIC" placeholder="Teclado TIC"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtMouse">Mouse</label>
                            <input type="text" class="form-control valid validEmpty" id="txtMouse" name="txtMouse"
                                placeholder="Serial de mouse"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtMouseTIC">Mouse TIC</label>
                            <input type="text" class="form-control valid validEmpty" id="txtMouseTIC" name="txtMouseTIC"
                                placeholder="Mouse TIC"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtCargador">Cargador</label>
                            <input type="text" class="form-control valid validEmpty" id="txtCargador" name="txtCargador"
                                placeholder="Serial de cargador"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtCargadorTIC">Cargador TIC</label>
                            <input type="text" class="form-control valid validEmpty" id="txtCargadorTIC"
                                name="txtCargadorTIC" placeholder="Cargador TIC"></input>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtNombrePC">Nombre del equipo</label>
                            <input type="text" class="form-control valid validEmpty" id="txtNombrePC" name="txtNombrePC"
                                placeholder="Nombre del equipo"></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="listSO">Sistema operativo</label>
                            <select class="selectpicker show-tick show-menu-arrow form-control" id="listSO"
                                name="listSO">
                                <option value="WINDOWS 10">Windows 10</option>
                                <option value="WINDOWS 11">Windows 11</option>
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="txtEstado">Estado</label>
                            <input type="text" class="form-control valid validEmpty" id="txtEstado" name="txtEstado"
                                placeholder="Estado del equipo" readonly></input>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="listSeccional">Seccional</label>
                            <select class="show-tick show-menu-arrow form-control" data-size="6" data-live-search="true"
                                title="Seccional" id="listSeccional" name="listSeccional">
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="listMunicipio">Municipio</label>
                            <select class="show-tick show-menu-arrow form-control" data-size="6" data-live-search="true"
                                title="Municipio" id="listMunicipio" name="listMunicipio">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="listFuncionario">Funcionario</label>
                            <select class="show-tick show-menu-arrow form-control" data-size="6" data-live-search="true"
                                title="Selecciona el funcionario" id="listFuncionario" name="listFuncionario">
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtArea">Area</label>
                            <input type="text" class="form-control valid validEmpty" id="txtArea" name="txtArea"
                                placeholder="Área de funcionario" readonly></input>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtCargo">Cargo</label>
                            <input type="text" class="form-control valid validEmpty" id="txtCargo" name="txtCargo"
                                placeholder="Cargo de funcionario" readonly></input>
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


<div class="modal fade modalViewComputador" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header headerView">
                <h5 id="titleModal" class="modal-title">Mostrar computador</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="viewTipo">Tipo</label>
                        <input type="text" class="form-control" id="viewTipo" name="viewTipo" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewMarca">Marca</label>
                        <input type="text" class="form-control" id="viewMarca" name="viewMarca" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewModelo">Modelo</label>
                        <input type="text" class="form-control" id="viewModelo" name="viewModelo" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewCPU">Procesador</label>
                        <input type="text" class="form-control" id="viewCPU" name="viewCPU" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewDisco">Disco</label>
                        <input type="text" class="form-control" id="viewDisco" name="viewDisco" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewRAM">RAM</label>
                        <input type="text" class="form-control" id="viewRAM" name="viewRAM" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewProcedencia">Procedencia</label>
                        <input type="text" class="form-control" id="viewProcedencia" name="viewProcedencia" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewSerial">Serial</label>
                        <input type="text" class="form-control" id="viewSerial" name="viewSerial" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewSerialTIC">Serial TIC</label>
                        <input type="text" class="form-control" id="viewSerialTIC" name="viewSerialTIC"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewPantalla">Pantalla</label>
                        <input type="text" class="form-control" id="viewPantalla" name="viewPantalla" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewPantallaTIC">Pantalla TIC</label>
                        <input type="text" class="form-control" id="viewPantallaTIC" name="viewPantallaTIC" readonly>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewTeclado">Teclado</label>
                        <input type="text" class="form-control" id="viewTeclado" name="viewTeclado" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewTecladoTIC">Teclado TIC</label>
                        <input type="text" class="form-control" id="viewTecladoTIC" name="viewTecladoTIC"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewMouse">Mouse</label>
                        <input type="text" class="form-control" id="viewMouse" name="viewMouse" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewMouseTIC">Mouse TIC</label>
                        <input type="text" class="form-control" id="viewMouseTIC" name="viewMouseTIC" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewCargador">Cargador</label>
                        <input type="text" class="form-control" id="viewCargador" name="viewCargador" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewCargadorTIC">Cargador TIC</label>
                        <input type="text" class="form-control" id="viewCargadorTIC" name="viewCargadorTIC"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewNombrePC">Nombre del equipo</label>
                        <input type="text" class="form-control" id="viewNombrePC" name="viewNombrePC" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewSO">Sistema operativo</label>
                        <input type="text" class="form-control" id="viewSO" name="viewSO" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewEstado">Estado</label>
                        <input type="text" class="form-control" id="viewEstado" name="viewEstado" readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewSeccional">Seccional</label>
                        <input type="text" class="form-control" id="viewSeccional" name="viewSeccional"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="viewMunicipio">Municipio</label>
                        <input type="text" class="form-control" id="viewMunicipio" name="viewMunicipio"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewFuncionario">Funcionario</label>
                        <input type="text" class="form-control" id="viewFuncionario" name="viewFuncionario"
                            readonly></input>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewArea">Area</label>
                        <input type="text" class="form-control" id="viewArea" name="viewArea" readonly></input>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="viewCargo">Cargo</label>
                        <input type="text" class="form-control" id="viewCargo" name="viewCargo" readonly></input>
                    </div>
                </div>
                <div class="text-center mt-2 mb-3">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="far fa-xmark-circle"></i>
                        Cerrar</button>
                </div>
                <table id="tableComments" class="table table-bordered table-hover">
                    <thead class="bg-info">
                        <tr>
                            <th class="text-center" colspan="8">HISTORIAL DE CAMBIOS</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Serial</th>
                            <th>Tipo cambio</th>
                            <th>Anterior</th>
                            <th>Nuevo</th>
                            <th>Responsable</th>
                            <th>Observación</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
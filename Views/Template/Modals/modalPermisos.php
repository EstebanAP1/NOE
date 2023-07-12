<div class="modal fade modalAddPermisos" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div id="divLoading">
                <div>
                    <img src="<?= media() ?>/images/loading.svg" alt="Loading..." />
                </div>
            </div>
            <div class="modal-header headerPermisos">
                <h5 class="modal-title">Permisos de roles de usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-xmark" aria-hidden="true"></i>
                </button>
            </div>
            <div class="modal-body text-center">
                <form id="formPermisos" name="formPermisos">
                    <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol'] ?>">
                    <div class="card-body table-responsive p-0" style="height: 100%;">
                        <table class="table table-head-fixed table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Módulo</th>
                                    <th>Ver</th>
                                    <th>Crear</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $modulos = $data['modulos'];
                                for ($i = 0; $i < count($modulos); $i++) {
                                    $permisos = $modulos[$i]['permisos'];
                                    $rCheck = $permisos['r'] == 1 ? 'checked' : "";
                                    $wCheck = $permisos['w'] == 1 ? 'checked' : "";
                                    $uCheck = $permisos['u'] == 1 ? 'checked' : "";
                                    $dCheck = $permisos['d'] == 1 ? 'checked' : "";

                                    $idmod = $modulos[$i]['idmodulo'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?= $no ?>
                                            <input type="hidden" name="modulos[<?= $i ?>][idmodulo]" value="<?= $idmod ?>"
                                                required>
                                        </td>
                                        <td>
                                            <?= $modulos[$i]['titulo'] ?>
                                        </td>
                                        <td>
                                            <ul class="tg-list">
                                                <li class="tg-list-item">
                                                    <input type="checkbox" name="modulos[<?= $i ?>][r]"
                                                        class="tgl tgl-skewed" id="r<?= $no ?>" <?= $rCheck ?>>
                                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                                        for="r<?= $no ?>"></label>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="tg-list">
                                                <li class="tg-list-item">
                                                    <input type="checkbox" name="modulos[<?= $i ?>][w]"
                                                        class="tgl tgl-skewed" id="w<?= $no ?>" <?= $wCheck ?>>
                                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                                        for="w<?= $no ?>"></label>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="tg-list">
                                                <li class="tg-list-item">
                                                    <input type="checkbox" name="modulos[<?= $i ?>][u]"
                                                        class="tgl tgl-skewed" id="u<?= $no ?>" <?= $uCheck ?>>
                                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                                        for="u<?= $no ?>"></label>
                                                </li>
                                            </ul>
                                        </td>
                                        <td>
                                            <ul class="tg-list">
                                                <li class="tg-list-item">
                                                    <input type="checkbox" name="modulos[<?= $i ?>][d]"
                                                        class="tgl tgl-skewed" id="d<?= $no ?>" <?= $dCheck ?>>
                                                    <label class="tgl-btn" data-tg-off="OFF" data-tg-on="ON"
                                                        for="d<?= $no ?>"></label>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
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
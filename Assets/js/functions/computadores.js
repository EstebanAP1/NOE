var tableComputador;

$(function () {
    $("[data-toggle='tooltip']").tooltip();

    var ajaxUrlMarca = base_url + '/Computadores/getSelectMarcas';
    $.ajax({
        type: "GET",
        url: ajaxUrlMarca,
        success: function (response) {
            $('#listMarca').html(response);
            $('#listMarca').selectpicker('refresh');
        }
    });
    var ajaxUrlProcesador = base_url + '/Computadores/getSelectProcesadores';
    $.ajax({
        type: "GET",
        url: ajaxUrlProcesador,
        success: function (response) {
            $('#listCPU').html(response);
            $('#listCPU').selectpicker('refresh');
        }
    });
    var ajaxUrlDisco = base_url + '/Computadores/getSelectDiscos';
    $.ajax({
        type: "GET",
        url: ajaxUrlDisco,
        success: function (response) {
            $('#listDisco').html(response);
            $('#listDisco').selectpicker('refresh');
        }
    });
    var ajaxUrlRam = base_url + '/Computadores/getSelectRam';
    $.ajax({
        type: "GET",
        url: ajaxUrlRam,
        success: function (response) {
            $('#listRAM').html(response);
            $('#listRAM').selectpicker('refresh');
        }
    });
    var ajaxUrlSeccional = base_url + '/Computadores/getSelectSeccionales';
    $.ajax({
        type: "GET",
        url: ajaxUrlSeccional,
        success: function (response) {
            $('#listSeccional').html(response);
            $('#listSeccional').selectpicker('refresh');
        }
    });
    var ajaxUrlFuncionario = base_url + '/Computadores/getSelectFuncionarios';
    $.ajax({
        type: "GET",
        url: ajaxUrlFuncionario,
        success: function (response) {
            $('#listFuncionario').html(response);
            $('#listFuncionario').selectpicker('refresh');
        }
    });

    tableComputador = $('#tableComputador').DataTable({
        aProccesing: true,
        aServerSide: true,
        language: {
            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        ajax: {
            'url': base_url + '/Computadores/getComputadores',
            'dataSrc': ''
        },
        columns: [
            { 'data': 'numeracion' },
            { 'data': 'nom_seccional' },
            { 'data': 'tipo' },
            { 'data': 'serial' },
            { 'data': 'nombre_pc' },
            { 'data': 'funcionario' },
            { 'data': 'responsable' },
            { 'data': 'estado' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        bDestroy: true,
        autoWidth: false,
        iDisplayLength: 10,
        order: [[1, 'asc']]
    });
    tableComputador.on('order.dt search.dt', function () {
        let i = 1;

        tableComputador.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
});

$('.btnCreatePC').click(function () {
    $('#formComputador').trigger('reset');

    $('#titleModal').text('Agregar computador');
    document.querySelector(".modal-header").classList.replace("headerUpdate", "headerRegister");
    document.querySelector("#btnActionForm").classList.replace("btn-warning", "btn-primary");
    $('#accion').val('crear');
    $('#txtSerial').removeAttr('readonly');
    $('#txtSerialTIC').prop('disabled', 'true');
    $('#txtPantallaTIC').prop('disabled', 'true');
    $('#txtTecladoTIC').prop('disabled', 'true');
    $('#txtMouseTIC').prop('disabled', 'true');
    $('#txtCargadorTIC').prop('disabled', 'true');
    $('#listFuncionario').val('0001');
    $('#txtArea').val('TIC');
    $('#txtCargo').val('AUXILIAR NACIONAL DE TIC');
    $('#txtEstado').val('Disponible');
    $('#listTipo').selectpicker('refresh');
    $('#listMarca').selectpicker('refresh');
    $('#listModelo').html('');
    $('#listModelo').selectpicker('refresh');
    $('#listCPU').selectpicker('refresh');
    $('#listDisco').selectpicker('refresh');
    $('#listRAM').selectpicker('refresh');
    $('#listProcedencia').selectpicker('refresh');
    $('#listSO').selectpicker('refresh');
    $('#listSeccional').selectpicker('refresh');
    $('#listMunicipio').html('');
    $('#listMunicipio').selectpicker('refresh');
    $('#listFuncionario').selectpicker('refresh');

    $('.valid').removeClass('is-invalid');

    $('.modalFormComputadores').modal('show');
});

$('#listProcedencia').on('change', function () {
    if ($('#listProcedencia').val() == 'PROPIO') {
        $('#txtSerialTIC').prop('disabled', 'true');
        $('#txtPantallaTIC').prop('disabled', 'true');
        $('#txtTecladoTIC').prop('disabled', 'true');
        $('#txtMouseTIC').prop('disabled', 'true');
        $('#txtCargadorTIC').prop('disabled', 'true');
    } else {
        $('#txtSerialTIC').removeAttr('disabled');
        $('#txtPantallaTIC').removeAttr('disabled');
        $('#txtTecladoTIC').removeAttr('disabled');
        $('#txtMouseTIC').removeAttr('disabled');
        $('#txtCargadorTIC').removeAttr('disabled');
    }
});

function cargarModelo(marca) {
    var ajaxUrlModelo = base_url + '/Computadores/getSelectModelos/' + marca;
    $.ajax({
        type: "GET",
        url: ajaxUrlModelo,
        success: function (response) {
            $('#listModelo').html(response);
            $('#listModelo').selectpicker('refresh');
        }
    });
}

$('#listMarca').on('change', function () {
    var marca = $('#listMarca').val();
    cargarModelo(marca);
});

function cargarMunicipio(seccional) {
    var ajaxUrlMunicipio = base_url + '/Computadores/getSelectMunicipios/' + seccional;
    $.ajax({
        type: "GET",
        url: ajaxUrlMunicipio,
        success: function (response) {
            $('#listMunicipio').html(response);
            $('#listMunicipio').selectpicker('refresh');
        }
    });
}

$('#listSeccional').on('change', function () {
    var seccional = $('#listSeccional').val();
    cargarMunicipio(seccional);
});

$('#listFuncionario').on('change', function () {
    var funcionario = $('#listFuncionario').val();
    if (funcionario == '0003' || funcionario == '0004') {
        $('#txtEstado').val('Bodega');
    } else if (funcionario == '0001' || funcionario == '0002') {
        $('#txtEstado').val('Disponible');
    } else {
        $('#txtEstado').val('Pendiente');
    }

    var ajaxUrl = base_url + '/Computadores/getFuncionario/' + funcionario;
    $.ajax({
        type: "GET",
        url: ajaxUrl,
        success: function (response) {
            var objData = JSON.parse(response);

            if (objData.status) {
                var datos = objData.msg;

                $('#txtArea').val(datos.nom_area);
                $('#txtCargo').val(datos.nom_cargo);
            } else {
                Swal.fire({
                    icon: 'error',
                    text: objData.msg
                });
            }
        }
    });
});

$('#formComputador').on('submit', function (e) {
    e.preventDefault();

    $('#divLoading').css('display', 'flex');

    var sw = true;
    var bodega = false;
    var formData = $('#formComputador').serializeArray();

    formData.forEach(data => {
        if (!data.name.includes('TIC') && data.value == '') sw = false
    });

    let valid = document.getElementsByClassName("valid");
    for (let i = 0; i < valid.length; i++) {
        if (valid[i].classList.contains('is-invalid')) {
            sw = false;
        }
    }

    if (sw) {
        var ajaxUrl = base_url + '/Computadores/setComputador';
        $.ajax({
            type: 'POST',
            url: ajaxUrl,
            data: formData,
            success: function (response) {
                $('#divLoading').css('display', 'none');

                var objData = JSON.parse(response);
                if (objData.status) {

                    if (formData['0'].value == 'editar') {
                        var commentData = {
                            beforeData: objData.beforeData,
                            actualData: objData.actualData
                        }

                        console.log(commentData);

                        var ajaxUrlComments = base_url + '/Computadores/setComments';
                        $.ajax({
                            type: 'POST',
                            url: ajaxUrlComments,
                            data: commentData,
                            success: function (response) {

                            }
                        });
                    }
                    $('.modalFormComputadores').modal('hide');
                    $('#formComputador').trigger('reset');
                    Swal.fire({
                        icon: 'success',
                        title: 'Computadores',
                        text: objData.msg
                    });
                    tableComputador.ajax.reload();
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Computadores',
                        text: objData.msg
                    });
                }
            }
        });
    } else {
        $('#divLoading').css('display', 'none');
        Swal.fire({
            icon: 'error',
            title: 'Computadores',
            text: 'Por favor rellene todos los campos correctamente.'
        });
    }
});

$('#tableComputador').on('click', 'button.btnEditPC', function () {
    var datos = tableComputador.row($(this).parents('tr')).data();

    $('#formComputador').trigger('reset');

    $('#titleModal').text('Actualizar computador');
    document.querySelector(".modal-header").classList.replace("headerRegister", "headerUpdate");
    document.querySelector("#btnActionForm").classList.replace("btn-primary", "btn-warning");
    $('#btnText').text('Actualizar');

    $('#accion').val('editar');
    $('#txtSerial').prop('readonly', 'true');
    if ($('#listProcedencia').val() == 'PROPIO') {
        $('#txtSerialTIC').prop('disabled', 'true');
        $('#txtPantallaTIC').prop('disabled', 'true');
        $('#txtTecladoTIC').prop('disabled', 'true');
        $('#txtMouseTIC').prop('disabled', 'true');
        $('#txtCargadorTIC').prop('disabled', 'true');
    } else {
        $('#txtSerialTIC').removeAttr('disabled');
        $('#txtPantallaTIC').removeAttr('disabled');
        $('#txtTecladoTIC').removeAttr('disabled');
        $('#txtMouseTIC').removeAttr('disabled');
        $('#txtCargadorTIC').removeAttr('disabled');
    }

    $('.valid').removeClass('is-invalid');

    var ajaxUrl = base_url + '/Computadores/getComputador/' + datos.serial;
    $.ajax({
        type: "GET",
        url: ajaxUrl,
        success: function (response) {
            var objData = JSON.parse(response);

            if (objData.status) {
                var datos = objData.msg;

                cargarModelo(datos.cod_marca);
                cargarMunicipio(datos.cod_seccional);

                $('#listTipo').val(datos.tipo);
                $('#listMarca').val(datos.cod_marca);
                $('#listModelo').val(datos.cod_modelo);
                $('#listCPU').val(datos.procesador);
                $('#listDisco').val(datos.disco);
                $('#listRAM').val(datos.ram);
                $('#listProcedencia').val(datos.procedencia);
                $('#txtSerial').val(datos.serial);
                $('#txtSerialTIC').val(datos.cpu_tic);
                $('#txtPantalla').val(datos.pantalla);
                $('#txtPantallaTIC').val(datos.pantalla_tic);
                $('#txtTeclado').val(datos.teclado);
                $('#txtTecladoTIC').val(datos.teclado_tic);
                $('#txtMouse').val(datos.mouse);
                $('#txtMouseTIC').val(datos.mouse_tic);
                $('#txtCargador').val(datos.cargador);
                $('#txtCargadorTIC').val(datos.cargador_tic);
                $('#txtNombrePC').val(datos.nombre_pc);
                $('#listSO').val(datos.so);
                $('#txtEstado').val(datos.estado);
                $('#listSeccional').val(datos.cod_seccional);
                $('#listMunicipio').val(datos.cod_municipio);
                $('#listFuncionario').val(datos.num_doc);
                $('#txtArea').val(datos.nom_area);
                $('#txtCargo').val(datos.nom_cargo);

                $('#listTipo').selectpicker('refresh');
                $('#listMarca').selectpicker('refresh');
                $('#listModelo').selectpicker('refresh');
                $('#listCPU').selectpicker('refresh');
                $('#listDisco').selectpicker('refresh');
                $('#listRAM').selectpicker('refresh');
                $('#listProcedencia').selectpicker('refresh');
                $('#listSO').selectpicker('refresh');
                $('#listSeccional').selectpicker('refresh');
                $('#listMunicipio').selectpicker('refresh');
                $('#listFuncionario').selectpicker('refresh');

                //TODO: Buscar una solución sin timeout

                setTimeout(() => {
                    $('#listModelo').val(datos.cod_modelo);
                    $('#listModelo').selectpicker('refresh');
                    $('#listMunicipio').val(datos.cod_municipio);
                    $('#listMunicipio').selectpicker('refresh');
                }, 700);

                $('.modalFormComputadores').modal('show');
            } else {
                Swal.fire({
                    icon: 'error',
                    text: objData.msg
                });
            }
        }
    });
});
var tablePendientes;
var talbeRealizados;

$(function () {
    tablePendientes = $('#tableMantenimientoPendiente').DataTable({
        aProccesing: true,
        aServerSide: true,
        language: {
            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        ajax: {
            'url': base_url + '/Mantenimientos/getPendientes',
            'dataSrc': ''
        },
        columnDefs: [
            { 'className': 'dt-center', 'targets': '_all' }
        ],
        columns: [
            { 'data': 'numeracion' },
            { 'data': 'nom_seccional' },
            { 'data': 'tipo' },
            { 'data': 'serial' },
            { 'data': 'nom_area' },
            { 'data': 'funcionario' },
            { 'data': 'fecha' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        bDestroy: true,
        autoWidth: false,
        iDisplayLength: 10,
        order: [[1, 'asc']]
    });
    tablePendientes.on('order.dt search.dt', function () {
        let i = 1;

        tablePendientes.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();

    talbeRealizados = $('#tableMantenimientoRealizado').DataTable({
        aProccesing: true,
        aServerSide: true,
        language: {
            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
        },
        ajax: {
            'url': base_url + '/Mantenimientos/getRealizados',
            'dataSrc': ''
        },
        columnDefs: [
            { 'className': 'dt-center', 'targets': '_all' }
        ],
        columns: [
            { 'data': 'numeracion' },
            { 'data': 'nom_seccional' },
            { 'data': 'tipo' },
            { 'data': 'serial' },
            { 'data': 'nom_area' },
            { 'data': 'funcionario' },
            { 'data': 'fecha' },
            { 'data': 'acciones' }
        ],
        responsive: true,
        bDestroy: true,
        autoWidth: false,
        iDisplayLength: 10,
        order: [[1, 'asc']]
    });
    talbeRealizados.on('order.dt search.dt', function () {
        let i = 1;

        talbeRealizados.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
            this.data(i++);
        });
    }).draw();
});


$('#tableMantenimientoPendiente').on('click', 'button.btnActionMantenimiento', function () {
    let datos = tablePendientes.row($(this).parents('tr')).data();

    Swal.fire({
        icon: 'question',
        title: '¿Qué deseas hacer?',
        showDenyButton: true,
        confirmButtonColor: 'black',
        denyButtonColor: 'black',
        confirmButtonText: 'Subir acta',
        denyButtonText: 'Visualizar actas',
    }).then((result) => {
        if (result.isConfirmed) {
            let ajaxUrl = base_url + '/Mantenimientos/getActaModal';

            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                data: datos,
                success: function (response) {
                    document.querySelector("#contentAjax").innerHTML = response;
                    $('.modalCargueMantenimientos').modal('show');
                    bsCustomFileInput.init();

                    $('#formCargueMantenimiento').on('submit', function (e) {
                        e.preventDefault();

                        if ($('#fileMantenimiento').val() != '') {
                            let formData = new FormData(document.getElementById('formCargueMantenimiento'));
                            let ajaxUrl = base_url + '/Mantenimientos/uploadActa/' + $('#serialMantenimiento').val();

                            $.ajax({
                                type: "POST",
                                url: ajaxUrl,
                                data: formData,
                                dataType: "html",
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function (response) {
                                    let objData = JSON.parse(response);

                                    if (objData.status) {
                                        $('.modalCargueMantenimientos').modal('hide');
                                        tablePendientes.ajax.reload();
                                        talbeRealizados.ajax.reload();

                                        if (objData.warning) {
                                            Swal.fire({
                                                icon: 'warning',
                                                text: objData.msg
                                            });
                                        } else {
                                            Swal.fire({
                                                icon: 'success',
                                                text: objData.msg
                                            });
                                        }
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            text: objData.msg
                                        });
                                    }
                                }
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                text: 'Selecciona un archivo'
                            });
                        }
                    });
                }
            });
        } else if (result.isDenied) {
            let ajaxUrl = base_url + '/Mantenimientos/getActaModal';

            $.ajax({
                type: 'POST',
                url: ajaxUrl,
                data: datos,
                success: function (response) {
                    document.querySelector("#contentAjax").innerHTML = response;

                    let tableActas = $('#tableMantenimientos').DataTable({
                        aProccesing: true,
                        aServerSide: true,
                        language: {
                            'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                        },
                        ajax: {
                            'url': base_url + '/Mantenimientos/getActas/' + datos.serial,
                            'dataSrc': ''
                        },
                        columnDefs: [
                            { 'className': 'dt-center', 'targets': '_all' }
                        ],
                        columns: [
                            { 'data': 'numeracion' },
                            { 'data': 'id' },
                            { 'data': 'funcionario' },
                            { 'data': 'responsable' },
                            { 'data': 'fecha_cargue' },
                            { 'data': 'acciones' }
                        ],
                        responsive: true,
                        bDestroy: true,
                        autoWidth: false,
                        iDisplayLength: 10,
                        order: [[1, 'desc']],
                        initComplete: function () {
                            $('#tableActas').on('click', 'button.btnViewActa', function () {
                                let datos = tableActas.row($(this).parents('tr')).data();

                                let ajaxUrl = base_url + '/Computadores/viewActa/' + datos.id;

                                $.ajax({
                                    type: 'GET',
                                    url: ajaxUrl,
                                    success: function (response) {
                                        document.querySelector("#contentAjaxViewActa").innerHTML = response;

                                        $('.modalViewActaPDF').modal('show');
                                    }
                                });
                            });
                        }
                    });
                    tableActas.on('order.dt search.dt', function () {
                        let i = 1;

                        tableActas.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                            this.data(i++);
                        });
                    }).draw();

                    $('.modalViewMantenimientos').modal('show');
                }
            });
        }
    });
});

$('#tableMantenimientoRealizado').on('click', 'button.btnActionMantenimiento', function () {
    let datos = talbeRealizados.row($(this).parents('tr')).data();
    let ajaxUrl = base_url + '/Mantenimientos/getActaModal';

    $.ajax({
        type: 'POST',
        url: ajaxUrl,
        data: datos,
        success: function (response) {
            document.querySelector("#contentAjax").innerHTML = response;

            let tableActas = $('#tableMantenimientos').DataTable({
                aProccesing: true,
                aServerSide: true,
                language: {
                    'url': '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
                },
                ajax: {
                    'url': base_url + '/Mantenimientos/getActas/' + datos.serial,
                    'dataSrc': ''
                },
                columnDefs: [
                    { 'className': 'dt-center', 'targets': '_all' }
                ],
                columns: [
                    { 'data': 'numeracion' },
                    { 'data': 'id' },
                    { 'data': 'funcionario' },
                    { 'data': 'responsable' },
                    { 'data': 'fecha_cargue' },
                    { 'data': 'acciones' }
                ],
                responsive: true,
                bDestroy: true,
                autoWidth: false,
                iDisplayLength: 10,
                order: [[1, 'desc']],
                initComplete: function () {
                    $('#tableMantenimientos').on('click', 'button.btnViewActa', function () {
                        let datos = tableActas.row($(this).parents('tr')).data();

                        let ajaxUrl = base_url + '/Mantenimientos/viewActa/' + datos.id;

                        $.ajax({
                            type: 'GET',
                            url: ajaxUrl,
                            success: function (response) {
                                document.querySelector("#contentAjaxViewActa").innerHTML = response;

                                $('.modalViewActaPDF').modal('show');
                            }
                        });
                    });
                }
            });
            tableActas.on('order.dt search.dt', function () {
                let i = 1;

                tableActas.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
                    this.data(i++);
                });
            }).draw();

            $('.modalViewMantenimientos').modal('show');
        }
    });
});